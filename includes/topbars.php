    <!-- begin:topbar -->
    <div class="topbar">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <ul class="topbar-nav topbar-left">
              <li class="disabled"><a href="#"><i class="fa fa-envelope"></i> thehometeam@theshattowgroup.com</a></li>
              <li class="disabled"><a href="#"><i class="fa fa-phone"></i> (561) 371-9119</a></li>
            </ul>
            <ul class="topbar-nav topbar-right hidden-xs">
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
              <li><a href="#"><i class="fa fa-youtube"></i></a></li>
              <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
              <li><a href="#"><i class="fa fa-instagram"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- end:topbar -->

    <!-- begin:navbar -->

      <nav id="nav-wrapper" class="navbar navbar-default navbar-fixed-top" role="navigation">
      
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-top">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/index.php"><img src="/img/logo.png" alt="shattow"><!-- <span>The Shattow Group</span> --></a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="navbar-top">
            <ul class="nav navbar-nav navbar-right">
             <!--  <li><a href="/">Home</a></li>  -->
              <li><a href="/index.php" >Home</a></li> 
              <!-- <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Cities <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="/fl/west-palm-beach">West Palm Beach</a></li>
                  <li><a href="/fl/jupiter">Jupiter</a></li>
                  <li><a href="/fl/boca-raton">Boca Raton</a></li>
                  <li><a href="/fl/wellington">Wellington</a></li>
                  <li><a href="/fl/palm-beach9">Palm Beach</a></li>
                </ul>
              </li>  -->
             
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Special Features</a>
                <ul class="dropdown-menu">
                  <li><a href="/contact.php">Mortgage Calc</a></li>
                  <li><a href="/about.php">School Locator</a></li>
                </ul>
              </li>  
              
              <li><a href="/about.php" >About</a></li>
              <li><a href="/contact.php" >Contact</a></li>
              
              <? if (!isset($_SESSION['loggedin'])) { ?>
              
                <li><a href="#modal-signin" class="signin" data-toggle="modal" data-target="#modal-signin">Sign in</a></li>
                <li><a href="#modal-signup" class="signup" data-toggle="modal" data-target="#modal-signup">Sign up</a></li>
                
              <? } else { ?>
              
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?= $_SESSION['email']; ?> <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="/logoffuser.php">Log Off</a></li>
                  </ul>
                </li>
                
              <? } ?>
            </ul>   
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
      </nav>

    <!-- end:navbar -->
   