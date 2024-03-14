<?php

define( 'TITLE', "Perfil" );
include '../assets/layouts/header.php';
check_verified();

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
    height: 100%;
    background: linear-gradient(341deg, black, #2034a5);
}
.centralizar_div {
    width: 100%;
    display: flex;
    justify-content: center;
    background: linear-gradient(341deg, black, #df1717);
}
.campos {
    font-size: 14px;
    font-weight: bold;
}
.item_profile {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 48%;
    margin-top: -27%;
}
.branco {
    color: white;
    font-size: 30px;
    margin-bottom: 21%;
}
.linha1 {
}
.campo_sobre_mim {
}
</style>

<div class="corpo">
  <div class="tudo">
    <div class="linha1"> </div>
    <div class=" shadow rounded overflow-hidden centralizar_div">
      <div class="item_profile">
        <div class="media profile-header">
          <div class="profile mr-3">
            <div class="img_perfil"> <img src="../assets/uploads/users/<?php echo $_SESSION['profile_image']; ?>" alt="..." width="130" class="rounded mb-2 img-thumbnail"> </div>
            <a href="../profile-edit" class="btn btn-dark btn-sm btn-block">Editar perfil</a> </div>
          <br>
          <br>
          <div class="media-body mb-5 text-white"> <?php echo '<label class="campos" > Usuário: </label>&nbsp&nbsp'. $_SESSION['username'].'<br>'; ?>
            <p class="small">
              <?php

              echo '<label class="campos" > Sexo: </label>&nbsp&nbsp';

              if ( $_SESSION[ 'gender' ] == 'm' ) {
                ?>
              <i class="fa fa-male"></i>
              <?php } elseif ($_SESSION['gender'] == 'f'){ ?>
              <i class="fa fa-female"></i>
              <?php } ?>
              <?php echo '<br>'; ?> <?php echo '<label class="campos" > Nome: </label>&nbsp&nbsp'. $_SESSION['first_name'] . ' ' . $_SESSION['last_name']. '<br>'; ?> <?php echo '<label class="campos" > Função: </label>&nbsp&nbsp'. $_SESSION['headline'].'<br>'; ?> <?php echo '<label class="campos"  > Sobre mim: </label>&nbsp&nbsp'. $_SESSION['bio']; ?> </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
<div class="row bio">
  <div class="col-xl-6 col-md-9 col-sm-12 mx-auto"> <?php echo $_SESSION['bio']; ?> </div>
</div>
<?php

include '../assets/layouts/footer.php'

?>