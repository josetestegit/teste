<?php if (!isset($_SESSION['auth'])) { ?>
<style> 

    .subtitulo{
            height: 44px !important;
    }

</style>
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm p-2">
<?php } else { ?>

<div style="background: black; color: white; text-align: center; font-weight: bold;
    font-family: arial;
    font-size: 20px;">
  <label> ESTOQUE </label>
</div>
<nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm p-2 subtitulo">
  <?php } ?>
  <br>
  <div class="container"> <a class="navbar-brand" href="../home">
    <?php if (!isset($_SESSION['auth'])) { ?>
      <img src="../assets/images/logo_megamidia.png" alt="" width="25" height="25" class="mr-3">
      <?php } else { ?>
      <img src="../assets/images/logo_megamidia.png" alt="" width="25" height="25" class="mr-3">
      <?php } ?>
    <?php echo APP_NAME; ?> <a href="../profile/" > <?php echo 'Usuário:'. $_SESSION['username']; ?></a> </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}"> <span class="navbar-toggler-icon"></span> </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
      </ul>
      <ul class="navbar-nav ml-auto">
        
        <!--<li class="nav-item">
                            <a class="nav-link" href="">xxxx</a>
                        </li>-->
        
        <?php if (!isset($_SESSION['auth'])) { ?>
          <li class="nav-item"> <a class="nav-link" href="../home/estoque1_inicial.php">ESTOQUE 1 - ÁGUA VERDE</a> </li>
          <li class="nav-item"> <a class="nav-link" href="../home/estoque2_inicial.php">ESTOQUE 2 - SÃO JOSÉ</a> </li>
          <li class="nav-item"> <a class="nav-link" href="../home/estoque3_inicial.php">ESTOQUE 3 - SÃO PAULO</a> </li>
          <?php } else { ?>
          
          <!--<li class="nav-item">
                                <a class="nav-link" href="../home/nova_nota.php">Novo</a>
                            </li>
                        
                        -->
          
          <div class="dropdown"> </div>
          <div class="dropdown">
            <button class="btn btn-dark dropdown-toggle" type="button" id="imgdropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <img class="navbar-img" src="../assets/uploads/users/<?php echo $_SESSION['profile_image'] ?>"> <span class="caret"></span> </button>
            <div class="dropdown-menu" aria-labelledby="imgdropdown"> <a class="dropdown-item text-muted" href="../home/nova_nota.php"><i class="fa fa-user pr-2"></i> Novo Orçamento</a> <a class="dropdown-item text-muted" href="../home/notas_a_aprovar.php"><i class="fa fa-pencil" aria-hidden="true"></i> Orçamentos à aprovar</a> <a class="dropdown-item text-muted" href="../home/notas_aprovadas.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Orçamentos aprovados</a> <a class="dropdown-item text-muted" href="../home/notas_nao_aprovadas.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Orçamentos não aprovados</a> <a class="dropdown-item text-muted" href="../home/todas_as_notas.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Todas os Orç.</a> </div>
          </div>
          <div class="dropdown">
            <button class="btn btn-dark dropdown-toggle" type="button" id="imgdropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <img class="navbar-img" src="../assets/uploads/users/<?php echo $_SESSION['profile_image'] ?>"> <span class="caret"></span> </button>
            <div class="dropdown-menu" aria-labelledby="imgdropdown"> <a class="dropdown-item text-muted" href="../register"><i class="fa fa-user pr-2" style='font-size:30px; color: black;'></i> Novo usuário</a> <a class="dropdown-item text-muted" href="../profile"><i class="fa fa-user pr-2" style='font-size:30px; color: black;'></i> Perfil</a> <a class="dropdown-item text-muted" href="../profile-edit"><i class="fa fa-pencil" style='font-size:30px; color: black;' aria-hidden="true"></i> Editar Perfil</a> <a class="dropdown-item text-muted" href="../profile-edit"><i class="fa fa-pencil" style='font-size:30px; color: black;' aria-hidden="true"></i> Suporte</a> <a class="dropdown-item text-muted" href="../logout"><i class="fa fa-sign-out" style='font-size:30px; color: black;' aria-hidden="true"></i> Sair</a> </div>
          </div>
          <?php } ?>
      </ul>
    </div>
  </div>
</nav>
