<?php 
session_start ();

if(!isset($_SESSION['login_username']))
{header("Location: http://127.0.0.1/station/back-end/index.php");}

?>

<!DOCTYPE html>
<html lang="en" >
<head>
<meta charset="UTF-8">
<title>Admin | Account </title>
<script src="../static/js/jquery.min.js"></script>
<script src="../static/js/main.js"></script>
<link rel="stylesheet" type="text/css" href="../static/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../static/css/navabar.css">
<link rel="stylesheet" type="text/css" href="../static/css/main.css">
<link rel="stylesheet" type="text/css" href="../static/css/w3.css">
<script>

function SetupAutocompleteTypes () 
{autocomplete(document.getElementById("staff-name-input-id"), staffs_names);}
function SetUpMemberNames (){ Load_Staff_Names(names_staffs_api);}

function Do_Logic ()
{
display_Date ();
// ViewStaffsData (view_staffs_url);
// setTimeout(SetUpMemberNames,2000)
// setTimeout(SetupAutocompleteTypes,3000)
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
        <label class="page-title-label" >Admin | Account </label>
        <div id="feedback-popup" class="feedback-popup-window w3-dropdown-content  w3-card-4 w3-animate-zoom">
            <div id="feedback-div" >
            <center>
                <label id="feedback-label" class="feedback-label" ></label>
            </center><br><br>
            <button  onclick="OpenFeedbackPopupWindowAndResetForm()" class="btn btn-primary submit-btn">Ok</button>
            </div>
        </div>
        <div id="navi-links">
            <!-- <button type="submit" onclick="document.getElementById('options-modal').style.display='block'" class="btn btn-primary ">Options</button>
            <button id="download" onclick="PrintDocument('quick-links-div-2','Pdf')" class="btn btn-success">Print</button> -->
        </div>  
            <div id="quick-links-div-2">
                <div class="account-grid-container">
                    <div class="account-grid-item ">
                        <img src="../static/imgs/male.png" class="user-account-img"><br><br>
                        <?php 
                            if(isset($_SESSION['login_username'])) : 
                                        $username = $_SESSION['login_username'];
                                echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.'<label class="input-labels" >'.$username.'</label>';
                            else:
                                echo '';
                            endif 
                            ?>
                    </div>

                    <div class="account-grid-item ">
                    <form id="my-form">
                        <input style="display: none;"  type="text" name="username" value="
                        <?php if(isset($_SESSION['username'])) : 
                        $name = $_SESSION['username'];
                        echo $name;
                        endif 
                        ?>">
                        <label class="input-labels" >Change Password</label><br><br>
                        <label class="input-labels" >Old Password</label><br>
                        <input required  type="password" class="form-control" name="oldpassword" placeholder="Old Password:"  autocomplete="off"><br>
                        <label class="input-labels" >New Password</label><br>
                        <input required  type="password" class="form-control" name="newpassword" placeholder="New Password:"  autocomplete="off">
                        <div class="my-grid-item">
                            <button type="submit" onclick="submitFormData ('my-form',admin_update_password_api)" class="btn btn-primary submit-btn">Submit</button>
                        </div>
                    </form>
                    </div>
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
