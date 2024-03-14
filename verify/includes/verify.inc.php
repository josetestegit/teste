<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="css/bootstrap-4.4.1.css" rel="stylesheet" type="text/css">
<div class="media-object-default">
  <div class="media"> <img class="d-flex mr-3" src="images/MediaObj_Placeholder.png" alt="placeholder image">
    <div class="media-body">
      <h5 class="mt-0">Media heading 1</h5>
      This is the content inside the media-body. By default the media is top-aligned. Use class "align-self-center" or "align-self-end" to middle align or bottom align them, respectively. </div>
  </div>
  <div class="media"> <img class="d-flex mr-3" src="images/MediaObj_Placeholder.png" alt="placeholder image">
    <div class="media-body">
      <h5 class="mt-0">Media heading 2</h5>
      This is the content inside the media-body. By default the media is top-aligned. Use class "align-self-center" or "align-self-end" to middle align or bottom align them, respectively.
      <div class="media"> <img class="d-flex mr-3" src="images/MediaObj_Placeholder.png" alt="placeholder image">
        <div class="media-body">
          <h5 class="mt-0">Nested media heading</h5>
          This is the content inside the nested media-body. By default the media is top-aligned. Use class "align-self-center" or "align-self-end" to middle align or bottom align them, respectively. </div>
      </div>
    </div>
  </div>
  <div class="media">
    <div class="media-body">
      <h5 class="mt-0">Media heading 4</h5>
      This is the content inside the media-body. By default the media is top-aligned. Use class "align-self-center" or "align-self-end" to middle align or bottom align them, respectively. </div>
    <img class="d-flex ml-3" src="images/MediaObj_Placeholder.png" alt="placeholder image"> </div>
  <div class="media"> <img class="d-flex mr-3" src="images/MediaObj_Placeholder.png" alt="placeholder image">
    <div class="media-body">
      <h5 class="mt-0">Media heading 5</h5>
      This is the content inside the media-body. By default the media is top-aligned. Use class "align-self-center" or "align-self-end" to middle align or bottom align them, respectively. </div>
    <img class="d-flex ml-3" src="images/MediaObj_Placeholder.png" alt="placeholder image"> </div>
</div>
<?php

session_start();

require '../../assets/setup/env.php';
require '../../assets/setup/db.inc.php';
require '../../assets/includes/security_functions.php';

if (isset($_GET['selector']) && isset($_GET['validator'])) {

    /*
    * -------------------------------------------------------------------------------
    *   Securing against Header Injection
    * -------------------------------------------------------------------------------
    */

    foreach($_GET as $key => $value){

        $_GET[$key] = _cleaninjections(trim($value));
    }



    $selector = $_GET['selector'];
    $validator = $_GET['validator'];

    if (empty($selector) || empty($validator)) {

        $_SESSION['STATUS']['verify'] = 'token inválido, use um novo e-mail de verificação';
        header("Location: ../");
        exit();
    }

    $sql = "SELECT * FROM auth_tokens WHERE auth_type='account_verify' AND selector=? AND expires_at >= NOW() LIMIT 1;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {

        $_SESSION['ERRORS']['scripterror'] = 'SQL ERROR';
        header("Location: ../");
        exit();
    }
    else {

        mysqli_stmt_bind_param($stmt, "s", $selector);
        mysqli_stmt_execute($stmt);
        $results = mysqli_stmt_get_result($stmt);

        if (!($row = mysqli_fetch_assoc($results))) {

            $_SESSION['STATUS']['verify'] = 'token inexistente ou expirado, use um novo e-mail de verificação';
            header("Location: ../");
            exit();
        }
        else {

            $tokenBin = hex2bin($validator);
            $tokenCheck = password_verify($tokenBin, $row['token']);

            if ($tokenCheck === false) {

                $_SESSION['STATUS']['verify'] = 'token inválido, use um novo e-mail de verificação';
                header("Location: ../");
                exit();
            }
            else if ($tokenCheck === true) {

                $tokenEmail = $row['user_email'];

                $sql = 'SELECT * FROM users WHERE email=? LIMIT 1;';
                $stmt = mysqli_stmt_init($conn);

                if (!mysqli_stmt_prepare($stmt, $sql)){

                    $_SESSION['ERRORS']['scripterror'] = 'SQL ERROR';
                    header("Location: ../");
                    exit();
                }
                else {

                    mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                    mysqli_stmt_execute($stmt);
                    $results = mysqli_stmt_get_result($stmt);

                    if (!$row = mysqli_fetch_assoc($results)) {
                        
                        $_SESSION['STATUS']['resentsend'] = 'token inválido, use um novo e-mail de verificação';
                        header("Location: ../");
                        exit();
                    }
                    else {

                        $sql = 'UPDATE users SET verified_at=NOW() WHERE email=?;';
                        $stmt = mysqli_stmt_init($conn);

                        if (!mysqli_stmt_prepare($stmt, $sql))
                        {
                            $_SESSION['ERRORS']['scripterror'] = 'SQL ERROR';
                            header("Location: ../");
                            exit();
                        }
                        else {

                            mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                            mysqli_stmt_execute($stmt);

                            $sql = "DELETE FROM auth_tokens WHERE user_email=? AND auth_type='account_verify';";
                            $stmt = mysqli_stmt_init($conn);
                            if (!mysqli_stmt_prepare($stmt, $sql)){

                                $_SESSION['ERRORS']['scripterror'] = 'SQL ERROR';
                                header("Location: ../");
                                exit();
                            }
                            else {

                                mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                                mysqli_stmt_execute($stmt);
                                
                                if (isset($_SESSION['auth'])){

                                    $_SESSION['auth'] = 'verified';
                                }

                                $_SESSION['STATUS']['loginstatus'] = 'conta ativada, entre com seu login';
                                header ("Location: ../../login/");
                            }
                        }
                    }
                }
            }
        }
    }
}
else {

    header("Location: ../");
    exit();
}