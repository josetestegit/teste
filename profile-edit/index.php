<?php

define( 'TITLE', "Edit Profile" );
include '../assets/layouts/header.php';
check_verified();

function xss_filter( $data ) {
  $data = trim( $data );
  $data = stripslashes( $data );
  $data = htmlspecialchars( $data );
  return $data;
}

?>
<style>
a {
    color: #ffffff !important;
    text-decoration: none !important;
    background-color: transparent !important;
    -webkit-text-decoration-skip: objects !important;
}
.corpo {
    width: 100%;
    height: 100vh;
}
.bg-dark {
    background-color: #000000 !important;
}
.tudo {
    display: flex;
    background: linear-gradient(341deg, black, #df1717);
}
.fonte {
    color: white;
}
.input {
}
.corpo {
    width: 100%;
    height: 100vh;
    height: fit-content;
}
.branco {
    color: white;
}
.row_justify {
    justify-content: center;
}
.div_centralizada {
    width: 100%;
    display: flex;
    justify-content: center;
}
.alinhar_esquerda {
    text-align: left;
}
.btn_confirmar {
    width: 250px !important;
    border-radius: 20px !important;
    background: none !important;
    color: white !important;
    padding-left: 2% !important;
    width: 250px !important;
    font-size: 16px !important;
    padding-right: 2% !important;
}
.centralizar_campos {
    display: flex;
    justify-content: center;
    align-items: center;
}
.campo_cadastro_editar {
    width: 50%;
}
.conteudo_campos_editar {
}
</style>

<div class="corpo">
  <div class="tudo">
    <div class="container">
      <div class="row row_justify">
        <div class="col-md-1"> </div>
        <div class="col-lg-7">
          <form class="form-auth" action="includes/profile-edit.inc.php" method="post" enctype="multipart/form-data" autocomplete="off">
            <?php insert_csrf_token(); ?>
            <div class="picCard text-center">
              <div class="avatar-upload">
                <div class="avatar-preview text-center">
                  <div id="imagePreview" style="background-image: url( ../assets/uploads/users/<?php echo $_SESSION['profile_image'] ?> );"> </div>
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
            <div class="text-center"> <small class="text-success font-weight-bold">
              <?php
                            if (isset($_SESSION['STATUS']['editstatus']))
                                echo $_SESSION['STATUS']['editstatus'];

                        ?>
              </small> </div>
            <h6 class="h3 mt-3 mb-3 font-weight-normal text-muted text-center">Editar perfil</h6>
            <label class="fonte" for="username">Username</label>
            <br>
            <div class="form-group centralizar_campos"> &nbsp;&nbsp;&nbsp;&nbsp;
              <input type="text" id="username"  name="username" class="form-control campo_cadastro_editar" placeholder="Username" value="<?php echo xss_filter($_SESSION['username']); ?>" autocomplete="off">
              <sub class="text-danger">
              <?php
                            if (isset($_SESSION['ERRORS']['usernameerror']))
                                echo $_SESSION['ERRORS']['usernameerror'];

                        ?>
              </sub> </div>
            <label class="fonte" for="email">Email:</label>
            <br>
            <div class="form-group centralizar_campos"> &nbsp;&nbsp;&nbsp;&nbsp;
              <input type="email" id="email" name="email" class="form-control campo_cadastro_editar" placeholder="Email address" value="<?php echo xss_filter($_SESSION['email']); ?>">
              <sub class="text-danger">
              <?php
                            if (isset($_SESSION['ERRORS']['emailerror']))
                                echo $_SESSION['ERRORS']['emailerror'];

                        ?>
              </sub> </div>
            <label class="fonte" for="first_name">Nome</label>
            <br>
            <div class="form-group centralizar_campos"> &nbsp;&nbsp;&nbsp;&nbsp;
              <input type="text" id="first_name"  name="first_name" class="form-control campo_cadastro_editar" placeholder="Informe seu nome" value="<?php echo xss_filter($_SESSION['first_name']); ?>">
            </div>
            <label class="fonte" for="last_name">Sobrenome</label>
            <div class="form-group centralizar_campos"> &nbsp;&nbsp;&nbsp;&nbsp;
              <input type="text" id="last_name"  name="last_name" class="form-control campo_cadastro_editar" placeholder="Informe seu sobrenome" value="<?php echo xss_filter($_SESSION['last_name']); ?>">
            </div>
            <label class="fonte" for="headline">Função</label>
            <br>
            <div class="form-group centralizar_campos mt-4"> &nbsp;&nbsp;&nbsp;&nbsp;
              <input type="text"  id="headline" name="headline" class="form-control campo_cadastro_editar" placeholder="Informe sua função" value="<?php echo xss_filter($_SESSION['headline']); ?>">
            </div>
            <label class="fonte" for="bio">Sobre vocÊ</label>
            <br>
            <div class="form-group centralizar_campos"> &nbsp;&nbsp;&nbsp;&nbsp;
              <textarea type="text" id="bio" maxlength="500" name="bio" class="form-control campo_cadastro_editar" placeholder="Fale sobre voce..."><?php echo xss_filter($_SESSION['bio']); ?></textarea>
            </div>
            <label class="fonte" >Gênero</label>
            <br>
            <div class="form-group centralizar_campos mb-5 ">
              <div class="custom-control custom-radio custom-control">
                <input type="radio" id="male" name="gender" class="custom-control-input campo_cadastro_editar" value="m" <?php if ($_SESSION['gender'] == 'm') echo 'checked' ?>>
                <label class="custom-control-label branco" for="male">Homem</label>
              </div>
              <div class="custom-control custom-radio custom-control">
                <input type="radio" id="female" name="gender" class="custom-control-input campo_cadastro_editar" value="f" <?php if ($_SESSION['gender'] == 'f') echo 'checked' ?>>
                <label class="custom-control-label branco" for="female">Mulher</label>
              </div>
            </div>
            <hr>
            <span class="h5 font-weight-normal text-muted mb-4">Alterar senha</span> <br>
            <sub class="text-danger mb-4">
            <?php
                            if (isset($_SESSION['ERRORS']['passworderror']))
                                echo $_SESSION['ERRORS']['passworderror'];

                        ?>
            </sub> <br>
            <br>
            <div class="form-group div_centralizada">
              <input type="password" id="password" name="password" class="form-control campo_cadastro_editar" placeholder="Senha atual" autocomplete="new-password">
            </div>
            <div class=" form-group div_centralizada ">
              <input type="password" id="newpassword" name="newpassword" class="form-control campo_cadastro_editar" placeholder="Nova senha" autocomplete="new-password">
            </div>
            <div class=" form-group mb-5 div_centralizada ">
              <input type="password" id="confirmpassword" name="confirmpassword" class="form-control campo_cadastro_editar" placeholder="Confirm Password" autocomplete="new-password">
            </div>
            <div class="div_centralizada ">
              <button class="btn btn-lg btn-primary btn-block mb-5 btn_confirmar" type="submit" name='update-profile'>Confirmar Alterações</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php

include '../assets/layouts/footer.php';

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