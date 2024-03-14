<?php
define( 'TITLE', "Login" );
include '../assets/layouts/header.php';
?>
<style>
.tudo {
    height: 100vh;
    width: 100%;
    background: white;
    display: flex;
}
.titulo_sistema_login {
    color: white;
    font-size: 50px;
    font-family: arial;
}
.btn_login {
    border-radius: 20px;
    background: none;
    color: black;
}
.btn_login:hover {
    border-radius: 20px;
    background: none;
    box-shadow: -1px 0px 20px 4px white;
}
.img_logo_login {
    margin-top: -36%;
}
.preto {
    color: black !important;
}
.col1 {
    width: 50%;
    height: 160%;
    background: linear-gradient(341deg, black, #df1717);
    border-top-right-radius: 52%;
    border-bottom-right-radius: 65%;
    display: flex;
    justify-content: center;
    align-items: center;
    position: fixed;
    margin-top: -10%;
}
.col2 {
    width: 50%;
    margin-left: 50%;
    margin-top: 4%;
}
.campo_login {
    border-style: solid;
    border-width: 1px;
    border-color: black;
}
.titulo_notas {
    font-size: 50px;
    font-weight: bolder;
}
.form-auth .form-control .preto {
    position: relative;
    box-sizing: border-box;
    height: auto;
    padding: 10px;
    font-size: 16px;
    border-radius: 20px;
    background: none;
    color: black !important;
}
</style>

<div class="tudo">
  <div class="col1"> <img  class="img_logo_login"src="../assets/images/logo_megamidia.png" width="118" height="94" alt=""/> </div>
  <div class="col2">
    <div class="container">
      <div class="row">
        <div class="col-sm-4"> </div>
        <div class="col-sm-4">
          <form class="form-auth" action="includes/login.inc.php" method="post">
            <?php insert_csrf_token(); ?>
            <div class="text-center mb-3"> <small class="text-success font-weight-bold">
              <?php
                            if (isset($_SESSION['STATUS']['loginstatus']))
                                echo $_SESSION['STATUS']['loginstatus'];

                        ?>
              </small> </div>
            <div class="form-group">
              <label class="titulo_notas">CONTROLE DE ESTOQUE</label>
              <label for="username" class="sr-only">Usuário</label>
              <input type="text" id="username" name="username" class="form-control campo_login preto" placeholder="Informe o seu usuário" required autofocus>
              <sub class="text-danger">
              <?php
                           if (isset($_SESSION['ERRORS']['nouser']))
                                echo $_SESSION['ERRORS']['nouser'];
                        ?>
              </sub> </div>
            <div class="form-group">
              <label for="password" class="sr-only">Senha</label>
              <input type="password" id="password" name="password" class="form-control campo_login preto" placeholder="Informe a sua senha" required>
              <sub class="text-danger">
              <?php
                            if (isset($_SESSION['ERRORS']['wrongpassword']))
                                echo $_SESSION['ERRORS']['wrongpassword'];
                        ?>
              </sub> </div>
            <button class="btn btn-lg btn-primary btn-block btn_login" type="submit" value="loginsubmit" name="loginsubmit">Login</button>
          </form>
        </div>
        <div class="col-sm-4"> </div>
      </div>
    </div>
  </div>
</div>
<?php

include '../assets/layouts/footer.php'

?>