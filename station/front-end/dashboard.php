
<?php 
session_start ();

if(!isset($_SESSION['login_username']))
{header("Location: http://127.0.0.1/station/back-end/index.php");}

?>

<!DOCTYPE html>
<html lang="en" >
<head>
<meta charset="UTF-8">
<title>Dashboard </title>
<script src="static/js/jquery.min.js"></script>
<script src="static/js/main.js"></script>
<link rel="stylesheet" type="text/css" href="static/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="static/css/navabar.css">
<link rel="stylesheet" type="text/css" href="static/css/main.css">
<link rel="stylesheet" type="text/css" href="static/css/w3.css">

<script>
function InitDashBoard ()
{
   OloadInitiApplication();
   CountTotalFromDataBase (total_staffs_api,'staff-span');
   CountTotalFromDataBase (total_ridders_api,'ridders-span');
   CountTotalFromDataBase (total_stages_api,'stages-span');
   CountTotalFromDataBase (total_todays_oil_sales_api,'todays-oil-sales-span');
   CountTotalFromDataBase (total_todays_fuel_sales_api,'todays-fuel-sales-span');
   CountTotalFromDataBase (total_todays_fuel_ltrs_api,'todays-fuel-ltrs-span');
   CountTotalFromDataBase (total_todays_oil_ltrs_api,'todays-oil-ltrs-span');
   CountTotalFromDataBase (total_todays_expenses_api,'todays-expenses-span');
   CountTotalFromDataBase (total_oil_defaulters_api,'oil-defaulters-span');
   CountTotalFromDataBase (total_fuel_defaulters_api,'fuel-defaulters-span');
   CountTotalFromDataBase (total_fuel_payments_api,'fuel-payments-span');
   CountTotalFromDataBase (total_oil_payments_api,'oil-payments-span');
   ViewBalancing (view_balancing_today_api);
}

</script>

</head>

<body onload=" InitDashBoard()" class="app-body">
   <nav class="navbar navbar-default no-margin">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="side-header-navbar navbar-header fixed-brand">
         <div id="log-name-div" >
         <label class="navbar-brand-label">TOTAL-GAPCO Wandegeya</label>
         </div>
      </div>
      <!-- navbar-header-->
      <div class="header-navbar collapse navbar-collapse" id="bs-example-navbar-collapse-1">
         <ul class="nav navbar-nav">
            <li >
               <button class="menu-btn-link navbar-toggle collapse in" data-toggle="collapse" id="menu-toggle-2">
                  <img src="static/imgs/menu.png" class="menu-fas-img">
               </button>
            </li>
         </ul>

         <div id="header-navbar-inner-div">
            <button class="header-semi-navi-btn"><span id="date-span" ></span></button>
            <?php 
               if(isset($_SESSION['login_username'])) : 
						$username = $_SESSION['login_username'];
                  echo '&nbsp;&nbsp;&nbsp;&nbsp;<img class="uesr-btn-img" src="static/imgs/male.png" />';
                  echo '&nbsp;&nbsp;&nbsp;&nbsp;'.$username;
                  echo'&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" onclick="Log_Out_User ()" class="btn btn-danger">Log Out</button>&nbsp;&nbsp;&nbsp;&nbsp;';
               else:
                  echo '&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" onclick="Log_In_User ()"  class="btn btn-info">Log In</button>&nbsp;&nbsp;&nbsp;&nbsp;';
               endif 
            ?>
         </div>
      </div>
      <!-- bs-example-navbar-collapse-1 -->
   </nav>
   <div id="wrapper">
         
      <!-- Sidebar -->
      <div id="sidebar-wrapper">

         
         <ul class="sidebar-nav nav-pills nav-stacked" id="menu">
            <li>
               <div id="logo-div">
                     <img class="logo-img" src="static/imgs/logo.png" />
                  </div>
            </li>
            <li class="main-navi-links">
               <a href="#"><img src="static/imgs/dashboard.png" class="my-fas-img">Dashboard</a>
            </li>
         
			<li >
               <a href="#"><img src="static/imgs/oil.png" class="my-fas-img"> Oil &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class='fa fa-angle-down pointing-arrows'></i></a>
               <ul class="nav-pills nav-stacked nav-drop-down-list-links">
                  <li><a href="/station/front-end/oil/view.php"><img src="static/imgs/circle.png" class="my-list-fas-img">View</a></li>
                  <?php 
                     if(isset($_SESSION['Admin_User_Type'])) :
                        echo '<li><a href="/station/front-end/oil/edit.php"><img src="static/imgs/circle.png" class="my-list-fas-img"> Edit </a></li>';
                     else:
                        echo "";
                     endif 
                  ?>
                  <li><a href="/station/front-end/oil/record_taken.php"><img src="static/imgs/circle.png" class="my-list-fas-img"> Record Taken</a></li>
                  <li><a href="/station/front-end/oil/record_payment.php"><img src="static/imgs/circle.png" class="my-list-fas-img"> Record Payment</a></li>
               </ul>
            </li>
            <li >
               <a href="#"><img src="static/imgs/fuel.png" class="my-fas-img"> Fuel &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class='fa fa-angle-down pointing-arrows'></i></a>
               <ul class="nav-pills nav-stacked nav-drop-down-list-links">
               <li><a href="/station/front-end/fuel/view.php"><img src="static/imgs/circle.png" class="my-list-fas-img"> View</a></li>
                  <?php 
                     if(isset($_SESSION['Admin_User_Type'])) :
                        echo '<li><a href="/station/front-end/fuel/edit.php"><img src="static/imgs/circle.png" class="my-list-fas-img"> Edit </a></li>';
                     else:
                        echo "";
                     endif 
                  ?>
                  <li><a href="/station/front-end/fuel/record_fuel.php"><img src="static/imgs/circle.png" class="my-list-fas-img"> Record Taken</a></li>
                  <li><a href="/station/front-end/fuel/record_payment.php"><img src="static/imgs/circle.png" class="my-list-fas-img"> Record Payment</a></li>
               </ul>
            </li>
            <li >
               <a href="#"><img src="static/imgs/rider.png" class="my-fas-img">Riders&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; <i class='fa fa-angle-down pointing-arrows'></i></a>
               <ul class="nav-pills nav-stacked nav-drop-down-list-links">
                  <li><a href="/station/front-end/riders/add.php"><img src="static/imgs/circle.png" class="my-list-fas-img"> Add Riders</a></li>
                  <?php 
                     if(isset($_SESSION['Admin_User_Type'])) :
                        echo '<li><a href="/station/front-end/riders/edit.php"><img src="static/imgs/circle.png" class="my-list-fas-img"> Edit Riders</a></li>';
                     else:
                        echo "";
                     endif 
                  ?>
                  <li><a href="/station/front-end/riders/list.php"><img src="static/imgs/circle.png" class="my-list-fas-img"> List Riders</a></li>
               </ul>
            </li>
            <li >
               <a href="#"><img src="static/imgs/defaulters.png" class="my-fas-img">Defaulters&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; <i class='fa fa-angle-down pointing-arrows'></i></a>
               <ul class="nav-pills nav-stacked nav-drop-down-list-links">
                  <li><a href="/station/front-end/defaulters/oil.php"><img src="static/imgs/circle.png" class="my-list-fas-img"> Oil</a></li>
                  <li><a href="/station/front-end/defaulters/fuel.php"><img src="static/imgs/circle.png" class="my-list-fas-img"> Fuel</a></li>
               </ul>
            </li>
            <li >
               <a href="#"><img src="static/imgs/expenses.png" class="my-fas-img">Expenses&nbsp; <i class='fa fa-angle-down pointing-arrows'></i></a>
               <ul class="nav-pills nav-stacked nav-drop-down-list-links" >
               <li><a href="/station/front-end/expenses/add.php"><img src="static/imgs/circle.png" class="my-list-fas-img"> Add Expense</a></li>
               <?php 
                  if(isset($_SESSION['Admin_User_Type'])) :
                     echo '<li><a href="/station/front-end/expenses/edit.php"><img src="static/imgs/circle.png" class="my-list-fas-img"> Edit Expense </a></li>';
                  else:
                     echo "";
                  endif 
               ?>
                  <li><a href="/station/front-end/expenses/list.php"><img src="static/imgs/circle.png" class="my-list-fas-img"> List Expenses</a></li>
               </ul>
            </li>
            <li>
               <a href="#"><img src="static/imgs/staff.png" class="my-fas-img">Staffs&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class='fa fa-angle-down pointing-arrows'></i></a>
               <ul class="nav-pills nav-stacked nav-drop-down-list-links">
               <li><a href="/station/front-end/staffs/add.php"><img src="static/imgs/circle.png" class="my-list-fas-img"> Add Staff </a></li>
               <li><a href="/station/front-end/staffs/list.php"><img src="static/imgs/circle.png" class="my-list-fas-img"> List Staff </a></li>

               <?php 
                  if(isset($_SESSION['Admin_User_Type'])) :
                     echo '<li><a href="/station/front-end/staffs/edit.php"><img src="static/imgs/circle.png" class="my-list-fas-img"> Edit Staff </a></li>';
                     echo '<li><a href="/station/front-end/staffs/adminadd.php"><img src="static/imgs/circle.png" class="my-list-fas-img"> Admin Add</a></li>';
                     echo '<li><a href="/station/front-end/staffs/adminview.php"><img src="static/imgs/circle.png" class="my-list-fas-img">Admin View  </a></li>';
                  else:
                     echo "";
                  endif 
               ?>
               </ul>
            </li>
            <li>
               <a href="#"><img src="static/imgs/report.png" class="my-fas-img">Reports&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class='fa fa-angle-down pointing-arrows'></i></a>
               <ul class="nav-pills nav-stacked nav-drop-down-list-links">
               <li><a href="/station/front-end/reports/oil.php"><img src="static/imgs/circle.png" class="my-list-fas-img"> Oil </a></li>
               <li><a href="/station/front-end/reports/fuel.php"><img src="static/imgs/circle.png" class="my-list-fas-img"> Fuel </a></li>
               <li><a href="/station/front-end/reports/balances.php"><img src="static/imgs/circle.png" class="my-list-fas-img"> Balances </a></li>
               </ul>
            </li>

            <li >
               <a href="#"><img src="static/imgs/settings.png" class="my-fas-img">Settings&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; <i class='fa fa-angle-down pointing-arrows'></i></a>
               <ul class="nav-pills nav-stacked nav-drop-down-list-links">
               <?php 
                  if(isset($_SESSION['Admin_User_Type'])) :
                     echo '<li><a href="/station/front-end/accounts/admin.php""><img src="static/imgs/circle.png" class="my-list-fas-img">Account  </a></li>';
                  else:
                     echo '<li><a href="/station/front-end/accounts/account.php"><img src="static/imgs/circle.png" class="my-list-fas-img">Account</a></li>';
                  endif 
                  ?>
               </ul>
            </li>
            

         </ul>
      </div>
      <!-- /#sidebar-wrapper -->
      <!-- Page Content -->
      <div id="page-content-wrapper">
         <div class="container-fluid main-section-content">
            <label>Dashboard</label>
               <div id="quick-links-div">
                  <div class="dashboard-grid-container">
                     <div class="dashboard-grid-item ">
                        <div class="dashboard-icon-div fuel-card">
                           <img src="static/imgs/fuel.png" class="dashboard-fas-img">
                        </div>
                        <div class="dashboard-label-div-2">
                           <label class="dashboard-labels">
                              Fuel Income<br>
                                 <center><span id="todays-fuel-sales-span"></span></center>
                           </label>
                        </div>
                     </div>

                     <div class="dashboard-grid-item ">
                        <div class="dashboard-icon-div oil-card">
                           <img src="static/imgs/oil.png" class="dashboard-fas-img">
                        </div>
                        <div class="dashboard-label-div-2">
                           <label class="dashboard-labels">
                              Oil Income<br>
                                 <center><span id="todays-oil-sales-span"></span></center>
                           </label>
                        </div>
                     </div>

                     <div class="dashboard-grid-item ">
                        <div class="dashboard-icon-div expenses-card">
                           <img src="static/imgs/expenses.png" class="dashboard-fas-img">
                        </div>
                        <div class="dashboard-label-div-2">
                           <label class="dashboard-labels">
                              Expenses<br>
                                 <center><span id="todays-expenses-span"></span></center>
                           </label>
                        </div>
                     </div>

                     <div class="dashboard-grid-item">
                        <div class="dashboard-icon-div ridders-card">
                           <img src="static/imgs/rider.png" class="dashboard-fas-img">
                        </div>
                        <div class="dashboard-label-div-2">
                           <label class="dashboard-labels">
                              Total Ridders<br>
                                 <center><span id="ridders-span"></span></center>
                           </label>
                        </div>
                     </div>

                     <div class="dashboard-grid-item ">
                        <div class="dashboard-icon-div fuel-card">
                           <img src="static/imgs/fuel.png" class="dashboard-fas-img">
                        </div>
                        <div class="dashboard-label-div-2">
                           <label class="dashboard-labels">
                              Fuel Liters<br>
                                 <center><span id="todays-fuel-ltrs-span"></span></center>
                           </label>
                        </div>
                     </div>

                     <div class="dashboard-grid-item">
                        <div class="dashboard-icon-div oil-card">
                           <img src="static/imgs/oil.png" class="dashboard-fas-img">
                        </div>
                        <div class="dashboard-label-div-2">
                           <label class="dashboard-labels">
                              Oil Liters <br>
                                 <center><span id="todays-oil-ltrs-span"></span></center>
                           </label>
                        </div>
                     </div>

                     <div class="dashboard-grid-item ">
                        <div class="dashboard-icon-div defaulters-card">
                           <img src="static/imgs/fuel.png" class="dashboard-fas-img">
                        </div>
                        <div class="dashboard-label-div-2">
                           <label class="dashboard-labels">
                              Fuel Defaulters<br>
                                 <center><span id="fuel-defaulters-span"></span></center>
                           </label>
                        </div>
                     </div>

                     <div class="dashboard-grid-item ">
                        <div class="dashboard-icon-div ridders-card">
                              <img src="static/imgs/stage.png" class="dashboard-fas-img">
                           </div>
                           <div class="dashboard-label-div-2">
                              <label class="dashboard-labels">
                                 Total Stages<br>
                                    <center><span id="stages-span"></span></center>
                              </label>
                           </div>
                     </div>

                     <div class="dashboard-grid-item">
                        <div class="dashboard-icon-div fuel-card">
                           <img src="static/imgs/fuel.png " class="dashboard-fas-img">
                        </div>
                        <div class="dashboard-label-div-2">
                           <label class="dashboard-labels">
                              Fuel Payments<br>
                                 <center><span id="fuel-payments-span"></span></center>
                           </label>
                        </div>
                     </div>

                     <div class="dashboard-grid-item ">
                           <div class="dashboard-icon-div oil-card">
                              <img src="static/imgs/oil.png" class="dashboard-fas-img">
                           </div>
                        <div class="dashboard-label-div-2">
                           <label class="dashboard-labels">
                           Oil Payments<br>
                                 <center><span id="oil-payments-span"></span></center>
                           </label>
                        </div>
                     </div>

                     <div class="dashboard-grid-item">
                        <div class="dashboard-icon-div defaulters-card">
                           <img src="static/imgs/oil.png" class="dashboard-fas-img">
                        </div>
                        <div class="dashboard-label-div-2">
                           <label class="dashboard-labels">
                              Oil Defaulters<br>
                                 <center><span id="oil-defaulters-span"></span></center>
                           </label>
                        </div>
                     </div>

                     <div class="dashboard-grid-item ">
                        <div class="dashboard-icon-div staff-card">
                                 <img src="static/imgs/staff.png" class="dashboard-fas-img">
                           </div>
                           <div class="dashboard-label-div-2">
                              <label class="dashboard-labels">
                                    Total Staffs<br>
                                       <center><span id="staff-span"></span></center>
                                 </label>
                           </div>
                     </div>


                  </div>
               </div>
               <div id="sales-products-outer-div">
                  <div id="sales-chart-div" >
                     <label>Sales Chart</label><br>
               </div>
               <div id="top-products-div" >
                     <label class="page-title-label">Todys</label>
                     <center>
                     <br>
                     <label class="page-title-label">Total Oil Collections:<span id="oil-collection-id">  </span> </label><br>
                     <label class="page-title-label">Total Fuel Collections:<span id="fuel-collection-id">  </span> </label><br>
                     <label class="page-title-label">Total Expenses Made:<span id="expenses-collection-id">  </span> </label><br>
                     <label class="page-title-label">-----------------------------------------------</label><br>
                     <label class="page-title-label">Total Oil & Fuel:<span id="oil-fuel-id">  </span> </label><br>
                     <label class="page-title-label">Total Expenses :<span id="expenses-id">  </span> </label><br>
                     <label class="page-title-label">Balance:<span id="balance-id">  </span> </label><br>
                  </center>
               </div>
               </div>

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
