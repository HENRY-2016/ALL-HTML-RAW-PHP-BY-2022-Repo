<?php 
session_start ();

if(!isset($_SESSION['login_username']))
{header("Location: http://127.0.0.1/station/back-end/index.php");}

?>
<!DOCTYPE html>
<html lang="en" >
<head>
<meta charset="UTF-8">
<title>Oil | Edit | Payments </title>
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
   ViewOilFuelPaymentsEditData (view_today_fuel_payments_url,edit_fuel_payments_api,delete_fuel_payments_api);
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
         <?php include '../navigation.php' ?>
      </div>
      <!-- /#sidebar-wrapper -->
      <!-- Page Content -->
      <div id="page-content-wrapper">
         <div class="container-fluid main-section-content">
            <label class="page-title-label" >Fuel | Edit Payments</label>
            <div id="feedback-popup" class="feedback-popup-window w3-dropdown-content  w3-card-4 w3-animate-zoom">
               <div id="feedback-div" >
                  <center>
                     <label id="feedback-label" class="feedback-label" ></label>
                  </center><br><br>
                  <button  onclick="OpenFeedbackPopupWindowAndResetForm()" class="btn btn-primary submit-btn">Ok</button>
               </div>
            </div>
            <div id="navi-links">
            <a href="/station/front-end/fuel/edit.php"><button type="button" class="btn btn-info">Edit Taken</button></a>
               <a href="/station/front-end/fuel/payment.php"><button type="button" class="btn btn-info">Edit Payments</button></a>
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
                           <label class="input-labels" >Rider's Name:</label><br>
                           <div class="autocomplete">
                              <input id="ridder-name-input-id" required type="text" class="form-control" name="ridder" placeholder="Rider's Name"  autocomplete="off">
                           </div>
                        </div>
                        <div class="my-grid-item">
                           <label class="input-labels">Number Plate:</label><br>
                           <div class="autocomplete">
                              <input id="ridder-numberplate-input-id" required type="text" class="form-control" name="number_plate" maxlength="8" oninput=" this.value = this.value.toLocaleUpperCase()" placeholder="UBD 769T"  autocomplete="off">
                           </div>
                        </div>
                        <div class="my-grid-item">
                           <label class="input-labels"> Stage:</label><br>
                           <div class="autocomplete">
                              <input id="ridder-stage-input-id" required type="text" class="form-control" name="stage" placeholder="Stage"  autocomplete="off">
                           </div>
                        </div>
                        <div class="my-grid-item">
                           <label class="input-labels"> Amount:</label>
                           <input required type="text" id="amount-input-id" class="form-control" required name="amount" maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '')" placeholder="Amount"  autocomplete="off">
                        </div>
                        <div class="my-grid-item">
                           <label class="input-labels" >Date:</label>
                           <input required type="date" id="date-input-id" class="form-control" required name="reg_date" placeholder="Enter password"  autocomplete="off">
                        </div>
                        <div class="my-grid-item">
                           <label class="input-labels" >Staff Name:</label><br>
                           <div class="autocomplete">
                           <input id="staff-name-input-id" required type="text" class="form-control" required name="staffname" placeholder="Staff Name:" autocomplete="off">
                           </div>
                        </div>

                        <div class="my-grid-item" >
                           <label class="input-labels">staff Id:</label><br>
                           <div class="autocomplete">
                           <input id="staff-id-input-id" required type="text" class="form-control" required name="staffid" placeholder="Enter password"  autocomplete="off">
                           </div>
                        </div>
                        <input type="text"  id="input-id" style="display:none"  required name="id" placeholder="id"  autocomplete="off">
                        <div class="my-grid-item">
                           <button type="submit" onclick="submitFormData ('my-form',update_fuel_payments_api)" class="btn btn-primary submit-btn">Submit</button>
                        </div>
                        
                     </div>
                  </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div id="id01" class="w3-modal">
         <div class="w3-modal-content w3-animate-top w3-card-4">
            <div class="w3-container">
               <br>
               <div id="feedback-div" >
                  <center>
                     <label id="feedback-label" class="feedback-label" ></label>
                  </center>
               </div>
               <br>
            <label  onclick="document.getElementById('id01').style.display='none';" type="button" class="close-popup-label" >Close</label><br>
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
                              <button type="submit" onclick="submitFormDataAndGet ('range-form',view_range_oil_payments_url)" class="btn btn-info range-view-btns">View</button>
                           </div>
                        </form>
                     </div>

                     <div class="options-grid-item ">
                        <button type="button" onclick="ShowThisWeekData()" class="btn btn-info range-view-btns">This Week</button><br><br>
                        <button type="button" onclick="ShowThisMonthData()" class="btn btn-info range-view-btns">This Month</button><br><br>

                        <form id="my-form">
                           <div class="view-by-name-div">
                              <label class="input-labels" >View By Name</label>
                              <div class="autocomplete">
                                 <input id="ridder-name-input-id" required type="text" class="form-control range-view-inputs" name="name" placeholder="Rider's Name"  autocomplete="off">
                              </div>
                              <button type="submit" onclick="submitFormDataAndGet ('my-form',view_by_name_oil_payments_url)" class="btn btn-info range-view-btns">View</button>
                           </div>
                        </form>
                     </div>
                  </div>
                  <script>
                     function ShowTodaysData ()
                        {ViewOilFuelPaymentsEditData (view_today_fuel_payments_url,edit_fuel_payments_api,delete_fuel_payments_api);document.getElementById('options-modal').style.display='none';}
                     function ShowAllData ()
                        {ViewOilFuelPaymentsEditData (view_all_fuel_payments_url,edit_fuel_payments_api,delete_fuel_payments_api);document.getElementById('options-modal').style.display='none';}
                     function ShowThisWeekData ()
                        {ViewOilFuelPaymentsEditData (view_this_week_fuel_payments_url,edit_fuel_payments_api,delete_fuel_payments_api);document.getElementById('options-modal').style.display='none';}
                     function ShowThisMonthData ()
                        {ViewOilFuelPaymentsEditData (view_this_month_fuel_payments_url,edit_fuel_payments_api,delete_fuel_payments_api);document.getElementById('options-modal').style.display='none';}
                              
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
