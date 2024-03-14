<?php

if (isset($_POST['update-profile'])) {

    if( !empty($oldPassword) && !empty($newpassword) && !empty($passwordrepeat)){

        $sql = "SELECT password FROM users WHERE id=?;";
        $stmt = mysqli_stmt_init($conn);
        
        if (!mysqli_stmt_prepare($stmt, $sql)) {

            $_SESSION['ERRORS']['sqlerror'] = 'SQL ERROR';
            header("Location: ../");
            exit();
        }
        else {

            mysqli_stmt_bind_param($stmt, "s", $_SESSION['id']);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if($row = mysqli_fetch_assoc($result)){

                $pwdCheck = password_verify($oldPassword, $row['password']);

                if ($pwdCheck == false){

                    $_SESSION['ERRORS']['passworderror'] = 'senha atual incorreta';
                    header("Location: ../");
                    exit();
                }
                if ($oldPassword == $newpassword){

                    $_SESSION['ERRORS']['passworderror'] = 'a nova senha não pode ser igual à senha antiga';
                    header("Location: ../");
                    exit();
                }
                if ($newpassword !== $passwordrepeat){

                    $_SESSION['ERRORS']['passworderror'] = 'a senha confirmada não corresponde à nova senha';
                    header("Location: ../");
                    exit();
                }

                $passwordUpdated = true;

                // script endpoint --------->>
            }
        }
    }
    else{

        $_SESSION['ERRORS']['passworderror'] = 'campos de senha não podem ficar vazios para atualização de senha';
        header("Location: ../");
        exit();
    }  
} 
else {

    header("Location: ../");
    exit();
}

