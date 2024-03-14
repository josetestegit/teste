<?php if (isset($_SESSION['auth'])) { ?>

</body>
<style>
#myFooter {
    position : absolute;
    bottom : 0;
    height : 40px;
    margin-top : 40px;
    width: 100%;
  }
    
    #myFooter .footer-copyright {
    background-color: #000000;
    padding-top: 3px;
    padding-bottom: 3px;
    text-align: center;
}

</style>
<footer id="myFooter">
  <div class="footer-copyright">
    <p> <a href="" >Desenvolvido por José Carlos Teixeira Junior &copy; Megamidia</a> </p>
  </div>
</footer>
<?php } ?>
<script src="../assets/vendor/js/jquery-3.4.1.min.js"></script>
<script src="../assets/vendor/js/popper.min.js"></script>
<script src="../assets/vendor/bootstrap-4.3.1/js/bootstrap.min.js"></script>
<?php if(isset($_SESSION['auth'])) { ?>
<script src="../assets/js/check_inactive.js"></script>
<?php } ?>

</body>
</html><?php

if (isset($_SESSION['ERRORS']))
    $_SESSION['ERRORS'] = NULL;
if (isset($_SESSION['STATUS']))
    $_SESSION['STATUS'] = NULL;

?>