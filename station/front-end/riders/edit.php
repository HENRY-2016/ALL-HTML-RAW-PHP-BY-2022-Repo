<?php 
session_start ();

if(!isset($_SESSION['login_username']))
{header("Location: http://127.0.0.1/station/back-end/index.php");}

?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Rider | Edit </title>
  <script src="../static/js/jquery.min.js"></script>
   <script src="../static/js/main.js"></script>
   <link rel="stylesheet" type="text/css" href="../static/css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="../static/css/navabar.css">
   <link rel="stylesheet" type="text/css" href="../static/css/main.css">
   <link rel="stylesheet" type="text/css" href="../static/css/w3.css">
<script>
   function InitiApplication ()
{
   display_Date ();
   ViewRiddersEditData (view_ridders_url,edit_ridder_api,delete_ridder_api);
}
</script>
</head>

<body onload="InitiApplication ()" class="app-body">
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
         <ul class="sidebar-nav nav-pills nav-stacked" id="menu">
             <li class="main-navi-links">
                <a href="../dashboard.php"><img src="../static/imgs/dashboard.png" class="my-fas-img">Dashboard</a>
             </li>
            
            <li >
               <a href="#"><img src="../static/imgs/oil.png" class="my-fas-img"> Oil &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class='fa fa-angle-down pointing-arrows'></i></a>
               <ul class="nav-pills nav-stacked nav-drop-down-list-links">
                  <li><a href="/station/front-end/oil/view.php"><img src="../static/imgs/circle.png" class="my-list-fas-img">View</a></li>
                  <li><a href="/station/front-end/oil/edit.php"><img src="../static/imgs/circle.png" class="my-list-fas-img"> Edit admin... </a></li>
                  <li><a href="/station/front-end/oil/record_taken.php"><img src="../static/imgs/circle.png" class="my-list-fas-img"> Record Taken</a></li>
                  <li><a href="/station/front-end/oil/record_payment.php"><img src="../static/imgs/circle.png" class="my-list-fas-img"> Record Payment</a></li>
               </ul>
            </li>
            <li >
               <a href="#"><img src="../static/imgs/fuel.png" class="my-fas-img"> Fuel &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class='fa fa-angle-down pointing-arrows'></i></a>
               <ul class="nav-pills nav-stacked nav-drop-down-list-links">
               <li><a href="/station/front-end/fuel/view.php"><img src="../static/imgs/circle.png" class="my-list-fas-img"> View</a></li>
                  <li><a href="/station/front-end/fuel/edit.php"><img src="../static/imgs/circle.png" class="my-list-fas-img"> Edit admin... </a></li>
                  <li><a href="/station/front-end/fuel/record_fuel.php"><img src="../static/imgs/circle.png" class="my-list-fas-img"> Record Taken</a></li>
                  <li><a href="/station/front-end/fuel/record_payment.php"><img src="../static/imgs/circle.png" class="my-list-fas-img"> Record Payment</a></li>
               </ul>
            </li>
            <li >
               <a href="#"><img src="../static/imgs/rider.png" class="my-fas-img">Riders&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; <i class='fa fa-angle-down pointing-arrows'></i></a>
               <ul class="nav-pills nav-stacked nav-drop-down-list-links">
                  <li><a href="/station/front-end/riders/add.php"><img src="../static/imgs/circle.png" class="my-list-fas-img"> Add Riders</a></li>
                  <li><a href="/station/front-end/riders/edit.php"><img src="../static/imgs/circle.png" class="my-list-fas-img"> Edit Riders admin..</a></li>
                  <li><a href="/station/front-end/riders/list.php"><img src="../static/imgs/circle.png" class="my-list-fas-img"> List Riders</a></li>
               </ul>
            </li>
            <li >
               <a href="#"><img src="../static/imgs/defaulters.png" class="my-fas-img">Defaulters&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; <i class='fa fa-angle-down pointing-arrows'></i></a>
               <ul class="nav-pills nav-stacked nav-drop-down-list-links">
                  <li><a href="/station/front-end/defaulters/oil.php"><img src="../static/imgs/circle.png" class="my-list-fas-img"> Oil</a></li>
                  <li><a href="/station/front-end/defaulters/fuel.php"><img src="../static/imgs/circle.png" class="my-list-fas-img"> Fuel</a></li>
               </ul>
            </li>
            <li >
               <a href="#"><img src="../static/imgs/expenses.png" class="my-fas-img">Expenses&nbsp; <i class='fa fa-angle-down pointing-arrows'></i></a>
               <ul class="nav-pills nav-stacked nav-drop-down-list-links" >
               <li><a href="/station/front-end/expenses/add.php"><img src="../static/imgs/circle.png" class="my-list-fas-img"> Add Expense</a></li>
                  <li><a href="/station/front-end/expenses/edit.php"><img src="../static/imgs/circle.png" class="my-list-fas-img"> Edit Expense </a></li>
                  <li><a href="/station/front-end/expenses/list.php"><img src="../static/imgs/circle.png" class="my-list-fas-img"> List Expenses</a></li>
               </ul>
            </li>
            <li>
               <a href="#"><img src="../static/imgs/staff.png" class="my-fas-img">Staffs&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class='fa fa-angle-down pointing-arrows'></i></a>
               <ul class="nav-pills nav-stacked nav-drop-down-list-links">
               <li><a href="/station/front-end/staffs/add.php"><img src="../static/imgs/circle.png" class="my-list-fas-img"> Add Staff admin..</a></li>
                  <li><a href="/station/front-end/staffs/edit.php"><img src="../static/imgs/circle.png" class="my-list-fas-img"> Edit Staff admin..</a></li>
                  <li><a href="/station/front-end/staffs/list.php"><img src="../static/imgs/circle.png" class="my-list-fas-img"> List Staff admin..</a></li>
               </ul>
            </li>
            <li>
               <a href="#"><img src="../static/imgs/report.png" class="my-fas-img">Reports&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class='fa fa-angle-down pointing-arrows'></i></a>
               <ul class="nav-pills nav-stacked nav-drop-down-list-links">
               <li><a href="/station/front-end/reports/oil.php"><img src="../static/imgs/circle.png" class="my-list-fas-img"> Oil </a></li>
               <li><a href="/station/front-end/reports/fuel.php"><img src="../static/imgs/circle.png" class="my-list-fas-img"> Fuel </a></li>
               <li><a href="/station/front-end/reports/balances.php"><img src="../static/imgs/circle.png" class="my-list-fas-img"> Balances </a></li>
               <li><a href="/station/front-end/reports/payments.php"><img src="../static/imgs/circle.png" class="my-list-fas-img"> Payments </a></li>
               <li><a href="/station/front-end/reports/expenses.php"><img src="../static/imgs/circle.png" class="my-list-fas-img"> Expenses </a></li>
               </ul>
            </li>
            

         </ul>
      </div>
      <!-- /#sidebar-wrapper -->
      <!-- Page Content -->
      <div id="page-content-wrapper">
         <div class="container-fluid main-section-content">
            <label class="page-title-label" >Riders | Edit </label>
            <div id="feedback-popup" class="feedback-popup-window w3-dropdown-content  w3-card-4 w3-animate-zoom">
               <div id="feedback-div" >
                  <center>
                     <label id="feedback-label" class="feedback-label" ></label>
                  </center><br><br>
                  <button  onclick="OpenFeedbackPopupWindowAndResetForm()" class="btn btn-primary submit-btn">Ok</button>
               </div>
            </div>
            <div id="navi-links">
               <button type="button" onclick="location.reload()" class="btn btn-primary">Refresh</button>
               <button type="submit" onclick="document.getElementById('options-modal').style.display='block'" class="btn btn-primary ">Options</button>
               <button id="download" onclick="PrintDocument('quick-links-div-2','Pdf')" class="btn btn-success">Print</button>
            </div>
            <div id="quick-links-div-2">
               <div id="view-div">
                  <div style="text-align:justify; overflow: auto; height: 500px;" class="user-view-area">
                     <table id="html-table-id" class="w3-card-4" >
                        <thead></thead>
                        <tbody id="html-tbody-id"></tbody>
                     </table>
                  </div>
               </div>
               <div id="update-div">
               <form id="my-form">
                     <div class="my-grid-container">
                        <div class="my-grid-item">
                           <label class="input-labels" >First Name:</label>
                           <input required type="text" id="fname-input-id" class="form-control" name="fname" placeholder="First Name:"  autocomplete="off">
                        </div>

                        <div class="my-grid-item">
                           <label class="input-labels" >Last Name:</label>
                           <input required type="text" id="lname-input-id" class="form-control" name="lname" placeholder="Last Name"  autocomplete="off">
                        </div>
                        <div class="my-grid-item">
                           <label class="input-labels" >Full Name:</label>
                           <input required type="text" id="fullname-input-id" class="form-control" name="fulname"  placeholder="Last Name"  autocomplete="off">
                        </div>
                        <div class="my-grid-item">
                           <label class="input-labels">Gender:</label>
                           <select required selected="Male" id="gender-input-id" class="form-control" name="gender">
                              <option value="Male" >Male</option>
                              <option value="Female">Female</option>
                           </select>
                        </div>
                        <div class="my-grid-item">
                           <label class="input-labels"> Number Plate:</label>
                           <input required type="text" id="numberplate-input-id" class="form-control" maxlength="8" oninput=" this.value = this.value.toLocaleUpperCase()" name="number_plate" placeholder="UBD 769T"  autocomplete="off">
                        </div>
                        <div class="my-grid-item">
                           <label class="input-labels" >Contact:</label>
                           <input required type="text" id="contact-input-id" name="contact" class="form-control" maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '')" placeholder="contact"  autocomplete="off">
                        </div>
                        <div  class="my-grid-item">
                           <label class="input-labels" >Stage Name:</label>
                           <input required type="text" id="stage-input-id" required class="form-control" placeholder="Stage Name" name="stage"  autocomplete="off">
                        </div>
                        <div class="my-grid-item">
                           <label class="input-labels" >Date:</label>
                           <input required type="date" id="date-input-id" class="form-control" name="reg_date"  autocomplete="off">
                        </div>

                        <input type="text"  id="input-id" style="display:none"  required name="id" placeholder="id"  autocomplete="off">
                        
                        <div class="my-grid-item">
                           <button type="submit" onclick="submitFormData ('my-form',update_ridder_api)" class="btn btn-primary submit-btn">Submit</button>
                        </div>
                        
                     </div>
                  </form>
               </div>
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
   <center>
   <div id="options-modal" class="w3-modal">
      <div class="w3-modal-content w3-animate-top w3-card-4">
            <div class="w3-container first-pop-up-window">
               <br>
                  <center>
                  <div class="options-main-div" >
                     <div class="options-grid-item ">
                        <button type="button" onclick="ShowTodaysData ()" class="btn btn-info range-view-btns">Today</button><br><br>
                        <button type="button" onclick="ShowAllData()" class="btn btn-info range-view-btns">All</button><br><br>

                        <form id="range-form">
                           <div class="view-by-name-div">
                              <label class="input-labels" >View By Range</label><br>
                                 <label>From old date</label>
                                 <input  required type="date" class="form-control range-view-inputs" name="from_date" placeholder="From"  autocomplete="off"><br>
                                 <label>To new date</label>
                                 <input  required type="date" class="form-control range-view-inputs" name="to_date" placeholder="From"  autocomplete="off">
                              <button type="submit" onclick="submitFormDataAndGet ('range-form',view_range_oil_url)" class="btn btn-info range-view-btns">View</button>
                           </div>
                        </form>
                     </div>

                     <div class="options-grid-item ">
                        <button type="button" onclick="ShowThisWeekData()" class="btn btn-info range-view-btns">This Week</button><br><br>
                        <button type="button" onclick="ShowThisMonthData()" class="btn btn-info range-view-btns">This Month</button><br><br>

                        <form id="name-form">
                           <div class="view-by-name-div">
                              <label class="input-labels" >View By Name</label>
                              <div class="autocomplete">
                                 <input id="ridder-name-input-id" required type="text" class="form-control range-view-inputs" name="name" placeholder="Rider's Name"  autocomplete="off">
                              </div>
                              <button type="submit" onclick="submitFormDataAndGet ('name-form',view_by_name_oil_url)" class="btn btn-info range-view-btns">View</button>
                           </div>
                        </form>
                     </div>
                  </div>
                  <script>
                     function ShowTodaysData ()
                        {ViewOilFuelData (view_today_oil_url,edit_ridder_api,delete_ridder_api);document.getElementById('options-modal').style.display='none';}
                     function ShowAllData ()
                        {ViewOilFuelData (view_all_oil_url,edit_ridder_api,delete_ridder_api);document.getElementById('options-modal').style.display='none';}
                     function ShowThisWeekData ()
                        {ViewOilFuelData (view_this_week_oil_url,edit_ridder_api,delete_ridder_api);document.getElementById('options-modal').style.display='none';}
                     function ShowThisMonthData ()
                        {ViewOilFuelData (view_this_month_oil_url,edit_ridder_api,delete_ridder_api);document.getElementById('options-modal').style.display='none';}
                              
                  </script>
                  </center>
               <br><br>
               <button onclick="document.getElementById('options-modal').style.display='none'" type="button" class="close-popup-label" >Close</button><br>
            </div>		
      </div>
   </div>
   </center>
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
