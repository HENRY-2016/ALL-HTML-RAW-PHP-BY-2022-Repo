<?php 
session_start ();

if(!isset($_SESSION['login_username']))
{header("Location: http://127.0.0.1/station/back-end/index.php");}

?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Admin | Add </title>
  <script src="../static/js/jquery.min.js"></script>
   <script src="../static/js/main.js"></script>
   <link rel="stylesheet" type="text/css" href="../static/css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="../static/css/navabar.css">
   <link rel="stylesheet" type="text/css" href="../static/css/main.css">
   <link rel="stylesheet" type="text/css" href="../static/css/w3.css">

</head>

<body onload="OloadInitiApplication ()" class="app-body">
   <nav class="navbar navbar-default no-margin">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="side-header-navbar navbar-header fixed-brand">
      <div id="log-name-div" >
            <?php include '../name.php'; ?>
         </div>
      </div>
      <!-- navbar-header-->
      <div class="header-navbar collapse navbar-collapse" id="bs-example-navbar-collapse-1">
         <ul class="nav navbar-nav">
            <li >
               <button class="menu-btn-link navbar-toggle collapse in" data-toggle="collapse" id="menu-toggle-2">
                  <img src="../static/imgs/menu.png" class="menu-fas-img">
               </button>
            </li>
         </ul>

         <div id="header-navbar-inner-div">
            <?php include '../header.php'; ?>
         </div>
      </div>
      <!-- bs-example-navbar-collapse-1 -->
   </nav>
   <div id="wrapper">
      <!-- Sidebar -->
      <div id="sidebar-wrapper">
         <?php include '../navigation.php' ?>
      </div>
      <!-- /#sidebar-wrapper -->
      <!-- Page Content -->
      <div id="page-content-wrapper">
         <div class="container-fluid main-section-content">
            <label class="page-title-label" >Admin | Add </label>
                  <div id="feedback-popup" class="feedback-popup-window w3-dropdown-content  w3-card-4 w3-animate-zoom">
                     <div id="feedback-div" >
                        <center>
                           <label id="feedback-label" class="feedback-label" ></label>
                        </center><br><br>
                        <button  onclick="OpenFeedbackPopupWindowAndResetForm()" class="btn btn-primary submit-btn">Ok</button>
                     </div>
                  </div>
                  <div id="quick-links-div-2">
                  <form id="my-form">
                     <div class="my-grid-container">
                     <div class="my-grid-item">
                           <label class="input-labels" >First Name</label>
                           <input required  type="text" class="form-control" name="fname" placeholder="F Name"  autocomplete="off">
                        </div>

                        <div class="my-grid-item">
                           <label class="input-labels" >Last Name</label>
                           <input required type="text" class="form-control" name="lname"   placeholder="L Name"   autocomplete="off">
                        </div>

                        <div class="my-grid-item">
                           <label class="input-labels" >Gender:</label>
                           <select required selected="Male" class="form-control" name="gender">
                              <option>..</option>
                              <option value="Male" >Male</option>
                              <option value="Female">Female</option>
                           </select>
                        </div>
                        
                        <div class="my-grid-item">
                           <label class="input-labels" >User Name</label>
                           <input required  type="text" class="form-control" name="username" placeholder="Log In Name"  autocomplete="off">
                        </div>

                        <div class="my-grid-item">
                           <label class="input-labels" >Password:</label>
                           <input required type="password" class="form-control" name="password" maxlength="8"  placeholder="Log In Password"   autocomplete="off">
                        </div>
                        
                        <div class="my-grid-item">
                           <label style="display:none" class="input-labels" >Password:</label>
                        </div>
                        
                        <div class="my-grid-item">
                           <button type="submit" onclick="submitFormData ('my-form',create_admin_url)" class="btn btn-primary submit-btn">Submit</button>
                        </div>

                        </div>
                     </div>
                  </form>
                  </div>
                  <!-- <div id="sales-products-outer-div">
                     <div id="sales-chart-div" >
                        <label>Sales Chart</label><br>
                     </div>
                     <div id="top-products-div" >
                        <label>Top Products (February 2022)</label><br>
                     </div>
                  </div> -->
                     
            </div>
         </div>
      </div>
      <!-- /#page-content-wrapper -->
   </div>

   <footer class="main-footer">
      <div class="pull-right">
         Version <strong>4.0.19</strong>
      </div>

        <span class="copyright-span"> Copyright © 2022 Liquor Store. All rights reserved.</span>
    </footer>


  <script>
  $("#menu-toggle").click(function(e) {
     e.preventDefault();
     $("#wrapper").toggleClass("toggled");
  });
  $("#menu-toggle-2").click(function(e) {
     e.preventDefault();
     $("#wrapper").toggleClass("toggled-2");
     $('#menu ul').hide();
  });

  function initMenu() {
     $('#menu ul').hide();
     $('#menu ul').children('.current').parent().show();
     //$('#menu ul:first').show();
     $('#menu li a').click(
        function() {
           var checkElement = $(this).next();
           if ((checkElement.is('ul')) && (checkElement.is(':visible'))) {
              return false;
           }
           if ((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
              $('#menu ul:visible').slideUp('normal');
              checkElement.slideDown('normal');
              return false;
           }
        }
     );
  }
  $(document).ready(function() {
     initMenu();
  });
  </script>
</body>
</html>
