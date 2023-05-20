<?php 
session_start ();

if(!isset($_SESSION['login_username']))
{header("Location: http://127.0.0.1/station/back-end/index.php");}

?>
<!DOCTYPE html>
<html lang="en" >
<head>
<meta charset="UTF-8">
<title>Oil | Payment </title>
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
   // autocomplete(document.getElementById("staff-id-input-id"), staffs_ids);
}
function SetUpMemberNames ()
{ 
   Load_Names(names_ridders_api);Load_Stage_Names(ridders_stage_api);Load_Stage_Number_Plate(ridders_numberplate_api);
   Load_Staff_Names(names_staffs_api);Load_Staff_Ids(names_staffs_id_api);
}

function Do_Logic ()
{
   OloadInitiApplication ();
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
            <label class="page-title-label" >Oil | Record Payment</label>
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
								<input type="text" class="form-control" required name="amount" maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '')" placeholder="Amount"  autocomplete="off">
							</div>
							<!-- <div class="my-grid-item">
								<label class="input-labels" >Date:</label>
								<input type="date" class="form-control" required name="reg_date" placeholder="Enter password"  autocomplete="off">
							</div> -->
							
                     <div class="my-grid-item">
								<label class="input-labels" >Staff Name:</label><br>
                        <div class="autocomplete">
								<input id="staff-name-input-id" type="text" class="form-control" required name="staffname" placeholder="Staff Name:" autocomplete="off">
                        </div>
							</div>
                     
                     <!-- <div class="my-grid-item">
								<label class="input-labels" >Staff  Id:</label><br>
                        <div class="autocomplete">
								<input type="text" id="staff-id-input-id" class="form-control" required name="staffid" placeholder="Staff Name:" autocomplete="off">
                        </div>
							</div> -->
                     <div class="my-grid-item">
								<label class="input-labels" style="display:none" >Staff  Id:</label><br>
							</div>
							<div class="my-grid-item">
                        <button type="submit" onclick="submitFormData ('my-form',add_oil_payment_url)" class="btn btn-primary submit-btn">Submit</button>
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
