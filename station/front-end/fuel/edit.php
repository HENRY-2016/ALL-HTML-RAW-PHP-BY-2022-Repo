<?php 
session_start ();

if(!isset($_SESSION['login_username']))
{header("Location: http://127.0.0.1/station/back-end/index.php");}

?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Fuel | Edit </title>
  <script src="../static/js/jquery.min.js"></script>
   <script src="../static/js/main.js"></script>
   <link rel="stylesheet" type="text/css" href="../static/css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="../static/css/navabar.css">
   <link rel="stylesheet" type="text/css" href="../static/css/main.css">
   <link rel="stylesheet" type="text/css" href="../static/css/w3.css">

<script>
function SetupAutocompleteTypes () 
{
   autocomplete(document.getElementById("ridder-name-input-id"), ridders_names);    
   autocomplete(document.getElementById("ridder-stage-input-id"), ridders_stage);    
   autocomplete(document.getElementById("ridder-numberplate-input-id"), ridders_numberplate);    
   autocomplete(document.getElementById("staff-name-input-id"), staffs_names);    
   autocomplete(document.getElementById("staff-id-input-id"), staffs_ids);    
}

function SetUpMemberNames ()
{ 
   Load_Names(names_ridders_api);Load_Stage_Names(ridders_stage_api);
   Load_Stage_Number_Plate(ridders_numberplate_api);
   Load_Staff_Names(names_staffs_api);Load_Staff_Ids(names_staffs_id_api);
}

function Do_Logic ()
{
   OloadInitiApplication ();
   ViewOilFuelEditData (view_today_fuel_url,edit_fuel_api,delete_fuel_api);
   setTimeout(SetUpMemberNames,2000)
   setTimeout(SetupAutocompleteTypes,3000)
}
</script>
</head>

<body onload="Do_Logic ()" class="app-body">
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
            <label class="page-title-label" >Fuel | Edit</label>
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
               <a href="/station/front-end/fuel/edit_payments.php"><button type="button" class="btn btn-info">Edit Payments</button></a>
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
                           <label class="input-labels"> Liters:</label>
                           <input required type="text" id="ridder-ltrs-input-id"  required class="form-control" name="ltrs" placeholder="Number Plate"  autocomplete="off">
                        </div>
                        <div class="my-grid-item">
                           <label class="input-labels" >Amount:</label>
                           <input required type="text" id="amount-input-id" required class="form-control" name="amount" maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '')" placeholder="Amount"  autocomplete="off">
                        </div>
                        <div class="my-grid-item">
                           <label class="input-labels" >Date:</label>
                           <input required type="date" id="date-input-id" required class="form-control" name="reg_date" placeholder="Enter password"  autocomplete="off">
                        </div>
                           <!-- <div class="my-grid-item">
                              <label class="input-labels" style="display:none" >Description:</label>
                              <input type="email" class="form-control" style="display:none" placeholder="Description"  autocomplete="off">
                           </div> -->
                        <div class="my-grid-item">
                           <label class="input-labels" >Staff Name:</label><br>
                           <div class="autocomplete">
                           <input id="staff-name-input-id" required type="text" required class="form-control" name="staffname" placeholder="Staff Name:"  autocomplete="off">
                           </div>
                        </div>
                        <div class="my-grid-item">
                           <label class="input-labels" >Staff Id:</label><br>
                           <div class="autocomplete">
                           <input id="staff-id-input-id" required type="text" required class="form-control" name="staffid" placeholder="Staff Name:"  autocomplete="off">
                           </div>
                        </div>
                        <input type="text"  id="input-id" style="display:none"  required name="id" placeholder="id"  autocomplete="off">
                        <div class="my-grid-item">
                           <button type="submit" onclick="submitFormData ('my-form',update_fuel_api)" class="btn btn-primary submit-btn">Submit</button>
                        </div>
                        <div class="my-grid-item">
                           <label class="input-labels" style="display:none"> Fuel Type:</label>
                           <select  required style="display:none" selected="Petro" class="form-control" required name="fuel_type" >
                              <option>..</option>
                              <option value="Petro">Petro</option>
                              <option value="Diesel" >Diesel</option>
                           </select>
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
                              <button type="submit" onclick="submitFormDataAndGet ('range-form',view_range_fuel_url)" class="btn btn-info range-view-btns">View</button>
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
                              <button type="submit" onclick="submitFormDataAndGet ('my-form',view_by_name_fuel_url)" class="btn btn-info range-view-btns">View</button>
                           </div>
                        </form>
                     </div>
                  </div>
                  <script>
                     function ShowTodaysData ()
                        {ViewOilFuelEditData (view_today_oil_url,edit_fuel_api,delete_fuel_api);document.getElementById('options-modal').style.display='none';}
                     function ShowAllData ()
                        {ViewOilFuelEditData (view_all_oil_url,edit_fuel_api,delete_fuel_api);document.getElementById('options-modal').style.display='none';}
                     function ShowThisWeekData ()
                        {ViewOilFuelEditData (view_this_week_oil_url,edit_fuel_api,delete_fuel_api);document.getElementById('options-modal').style.display='none';}
                     function ShowThisMonthData ()
                        {ViewOilFuelEditData (view_this_month_oil_url,edit_fuel_api,delete_fuel_api);document.getElementById('options-modal').style.display='none';}
                              
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
