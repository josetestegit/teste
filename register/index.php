<?php

define( 'TITLE', "Signup" );
include '../assets/layouts/header.php';
?>

<style>
a {
    color: #ffffff !important;
    text-decoration: none !important;
    background-color: transparent !important;
    -webkit-text-decoration-skip: objects !important;
}
.tudo {
    display: flex;
    background: linear-gradient(341deg, black, #df1717);
    background-size: cover;
}
.bg-dark {
    background-color: #000000 !important;
}
.white {
    color: white !important;
}
.branco {
    color: white !important;
}
.btn_voltar {
    border-radius: 20px;
    background: none;
    color: white;
    padding-left: 2%;
    width: 150px;
    font-size: 16px;
    padding-right: 2%;
}
.btn_voltar:hover {
    border-radius: 20px;
    background: none;
    color: white;
    padding-left: 2%;
    width: 150px;
    font-size: 16px;
    padding-right: 2%;
    box-shadow: -1px 0px 20px 4px white;
}
.btn_cadastrar {
    width: 250px !important;
    border-radius: 20px !important;
    background: none !important;
    color: white !important;
    padding-left: 2% !important;
    width: 250px !important;
    font-size: 16px !important;
    padding-right: 2% !important;
}
.col3_voltar {
    display: flex;
    justify-content: center;
    margin-top: 20%;
}
.div_centralizada {
    width: 100%;
    display: flex;
    justify-content: center;
}
.alinhar_esquerda {
    text-align: left;
}
.centralizar_campos {
    display: flex;
    justify-content: center;
}
.campo_cadastro {
    width: 50%;
}
</style>

<div class="tudo">
  <div class="container">
    <div class="row">
      <div class="col-md-4"> </div>
      <div class="col-lg-4">
        <form class="form-auth" action="includes/register.inc.php" method="post" enctype="multipart/form-data">
          <?php insert_csrf_token(); ?>
          <div class="picCard text-center">
            <div class="avatar-upload">
              <div class="avatar-preview text-center">
                <div id="imagePreview" style="background-image: url( ../assets/uploads/users/_defaultUser.png );"></div>
              </div>
              <div class="avatar-edit">
                <input name='avatar' id="avatar" class="fas fa-pencil" type='file' />
                <label for="avatar"></label>
              </div>
            </div>
          </div>
          <div class="text-center"> <sub class="text-danger">
            <?php
                            if (isset($_SESSION['ERRORS']['imageerror']))
                                echo $_SESSION['ERRORS']['imageerror'];

                        ?>
            </sub> </div>
          <h6 class="h3 mt-3 mb-3 font-weight-normal text-muted text-center">Crie a sua conta aqui.</h6>
          <div class="text-center mb-3"> <small class="text-success font-weight-bold">
            <?php
                            if (isset($_SESSION['STATUS']['signupstatus']))
                                echo $_SESSION['STATUS']['signupstatus'];

                        ?>
            </small> </div>
          <div class="form-group centralizar_campos">
            <label for="username" class="sr-only">Usuário</label>
            <input type="text" id="username"  name="username" class="form-control campo_cadastro" placeholder="Usuário" required maxlength="20" autofocus>
            <sub class="text-danger">
            <?php
                            if (isset($_SESSION['ERRORS']['usernameerror']))
                                echo $_SESSION['ERRORS']['usernameerror'];

                        ?>
            </sub> </div>
          <div class="form-group centralizar_campos">
            <label for="email" class="sr-only">Email</label>
            <input type="email" id="email" name="email" class="form-control campo_cadastro" placeholder="Informe seu email" required maxlength="70" autofocus>
            <sub class="text-danger">
            <?php
                            if (isset($_SESSION['ERRORS']['emailerror']))
                                echo $_SESSION['ERRORS']['emailerror'];

                        ?>
            </sub> </div>
          <div class="form-group centralizar_campos">
            <label for="password" class="sr-only">Senha</label>
            <input type="password" id="password" name="password" class="form-control campo_cadastro" placeholder="Informe uma senha" required maxlength="20">
          </div>
          <div class="form-group mb-4 centralizar_campos">
            <label for="confirmpassword" class="sr-only">Confirmar senha</label>
            <input type="password" id="confirmpassword" name="confirmpassword" class="form-control campo_cadastro" placeholder="Confirme sua senha" required maxlength="20">
            <sub class="text-danger mb-4">
            <?php
                            if (isset($_SESSION['ERRORS']['passworderror']))
                                echo $_SESSION['ERRORS']['passworderror'];

                        ?>
            </sub> </div>
          <hr>
          <span class="h5 mb-3 font-weight-normal text-muted text-center branco">Opcional</span> <br>
          <br>
          <div class="form-group centralizar_campos">
            <label for="first_name" class="sr-only">Nome</label>
            <input type="text" id="first_name" name="first_name"  maxlength="50" class="form-control campo_cadastro" placeholder="Informe seu nome">
          </div>
          <div class="form-group centralizar_campos">
            <label for="last_name" class="sr-only">Sobrenome</label>
            <input type="text" id="last_name" name="last_name"  maxlength="50" class="form-control campo_cadastro" placeholder="Informe seu sobrenome">
          </div>
          <div class="form-group centralizar_campos mt-4">
            <label for="headline" class="sr-only">Setor</label>
            <input type="text" id="setor" name="setor"  maxlength="30" class="form-control campo_cadastro" placeholder="Informe o setor">
          </div>
          <div class="form-group centralizar_campos mt-4">
            <label for="headline" class="sr-only">Função</label>
            <input type="text" id="headline" name="headline"  maxlength="30" class="form-control campo_cadastro" placeholder="Informe sua função">
          </div>
          <div class="form-group centralizar_campos">
            <label for="bio" class="sr-only">Sobre você</label>
            <textarea type="text" id="bio" name="bio"  maxlength="500" class="form-control campo_cadastro" placeholder="Fale sobre você..."></textarea>
          </div>
          <div class="form-group alinhar_esquerda  centralizar_campos">
            <label class="branco"  >Gênero</label>
            <div class="custom-control custom-radio custom-control">
              <input type="radio" id="male" name="gender" class="custom-control-input" value="m">
              <label class="custom-control-label branco" for="male">Homem</label>
            </div>
            <div class="custom-control custom-radio custom-control">
              <input type="radio" id="female" name="gender" class="custom-control-input" value="f">
              <label class="custom-control-label branco" for="female">Mulher</label>
            </div>
          </div>
          <div class="div_centralizada">
            <button class="btn btn-lg btn-primary btn-block btn_cadastrar" type="submit" name='signupsubmit'>Cadastrar</button>
          </div>
        </form>
      </div>
      <div class="col-md-4 col3_voltar">
        <div class="div_voltar"> <a href="../home/inventario.php">
          <button class="btn_voltar">VOLTAR</button>
          </a> </div>
      </div>
    </div>
  </div>
</div>
<?php

include '../assets/layouts/footer.php'

?>
<script type="text/javascript">
    function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                $('#imagePreview').hide();
                $('#imagePreview').fadeIn(650);

            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#avatar").change(function() {
        console.log("here");
        readURL(this);
    });
</script>