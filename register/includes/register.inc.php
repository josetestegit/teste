<?php

session_start();

require '../../assets/includes/auth_functions.php';
require '../../assets/includes/datacheck.php';
require '../../assets/includes/security_functions.php';

/*check_logged_out();*/


if (isset($_POST['signupsubmit'])) {

    /*
    * -------------------------------------------------------------------------------
    *   Securing against Header Injection
    * -------------------------------------------------------------------------------
    */

    foreach($_POST as $key => $value){

        $_POST[$key] = _cleaninjections(trim($value));
    }

    /*
    * -------------------------------------------------------------------------------
    *   Verifying CSRF token
    * -------------------------------------------------------------------------------
    */

    if (!verify_csrf_token()){

        $_SESSION['STATUS']['signupstatus'] = 'A solicitação não pôde ser validada';
        header("Location: ../");
        exit();
    }



    require '../../assets/setup/db.inc.php';
    
    //filter POST data
    function input_filter($data) {
        $data= trim($data);
        $data= stripslashes($data);
        $data= htmlspecialchars($data);
        return $data;
    }
    $setor = input_filter($_POST['setor']);
    $username = input_filter($_POST['username']);
    $email = input_filter($_POST['email']);
    $password = input_filter($_POST['password']);
    $passwordRepeat  = input_filter($_POST['confirmpassword']);
    $headline = input_filter($_POST['headline']);
    $bio = input_filter($_POST['bio']);
    $full_name = input_filter($_POST['first_name']);
    $last_name = input_filter($_POST['last_name']);

    if (isset($_POST['gender'])) 
        $gender = input_filter($_POST['gender']);
    else
        $gender = NULL;


    /*
    * -------------------------------------------------------------------------------
    *   Data Validation
    * -------------------------------------------------------------------------------
    */

    if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {

        $_SESSION['ERRORS']['formerror'] = 'os campos obrigatórios não podem ficar vazios, tente novamente';
        header("Location: ../");
        exit();
    } else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {

        $_SESSION['ERRORS']['usernameerror'] = 'nome de usuário Inválido';
        header("Location: ../");
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $_SESSION['ERRORS']['emailerror'] = 'e-mail inválido';
        header("Location: ../");
        exit();
    } else if ($password !== $passwordRepeat) {

        $_SESSION['ERRORS']['passworderror'] = 'as senhas não coincidem';
        header("Location: ../");
        exit();
    } else {

        if (!availableUsername($conn, $username)){

            $_SESSION['ERRORS']['usernameerror'] = 'nome de usuário já utilizado';
            header("Location: ../");
            exit();
        }
        if (!availableEmail($conn, $email)){

            $_SESSION['ERRORS']['emailerror'] = 'e-mail já recebido';
            header("Location: ../");
            exit();
        }

        /*
        * -------------------------------------------------------------------------------
        *   Image Upload
        * -------------------------------------------------------------------------------
        */

        $FileNameNew = '_defaultUser.png';
        $file = $_FILES['avatar'];

        if (!empty($_FILES['avatar']['name'])){

            $fileName = $_FILES['avatar']['name'];
            $fileTmpName = $_FILES['avatar']['tmp_name'];
            $fileSize = $_FILES['avatar']['size'];
            $fileError = $_FILES['avatar']['error'];
            $fileType = $_FILES['avatar']['type']; 

            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));

            $allowed = array('jpg', 'jpeg', 'png', 'gif');
            if (in_array($fileActualExt, $allowed)){

                if ($fileError === 0){

                    if ($fileSize < 500000){

                        $FileNameNew = uniqid('', true) . "." . $fileActualExt;
                        $fileDestination = '../../assets/uploads/users/' . $FileNameNew;
                        move_uploaded_file($fileTmpName, $fileDestination);

                    }
                    else {

                        $_SESSION['ERRORS']['imageerror'] = 'o tamanho da imagem deve ser inferior a 500 Kbytes';
                        header("Location: ../");
                        exit(); 
                    }
                }
                else {

                    $_SESSION['ERRORS']['imageerror'] = 'falha no upload da imagem, tente novamente';
                    header("Location: ../");
                    exit();
                }
            }
            else {

                $_SESSION['ERRORS']['imageerror'] = 'tipo de imagem inválido, tente novamente';
                
                header("Location: ../");
                exit();
            }
        }


        /*
        * -------------------------------------------------------------------------------
        *   User Creation
        * -------------------------------------------------------------------------------
        */

        $sql = "insert into users(username, email, password, first_name, last_name, gender, 
                headline, bio, setor, profile_image, created_at, verified_at) 
                values ( ?,?,?,?,?,?,?,?,?,?, NOW(), NOW() )";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {

            $_SESSION['ERRORS']['scripterror'] = 'SQL ERROR';
            header("Location: ../");
            exit();
        } 
        else {

            $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

          
             mysqli_stmt_bind_param($stmt, "ssssssssss", $username, $email, $hashedPwd, $full_name, $last_name, $gender, $headline, $bio, $setor, $FileNameNew);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);

            /*
            * -------------------------------------------------------------------------------
            *   Sending Verification Email for Account Activation
            * -------------------------------------------------------------------------------
            */
            
            require 'sendverificationemail.inc.php';

            $_SESSION['STATUS']['loginstatus'] = 'Conta criada, entre com seu login';
            header("Location: ../../home/cadastro_ok.php");
            exit();
        }
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} 
else {

    header("Location: ../../");
    exit();
}
