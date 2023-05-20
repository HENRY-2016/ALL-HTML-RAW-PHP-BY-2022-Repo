
<!-- <label>TOTAL-GAPCO Wandegeya</label> -->
<button class="header-semi-navi-btn"><span id="date-span" ></span></button>
<?php 
if(isset($_SESSION['login_username'])) : 
            $username = $_SESSION['login_username'];
    echo '&nbsp;&nbsp;&nbsp;&nbsp;<img class="uesr-btn-img" src="../static/imgs/male.png" />';
    echo '&nbsp;&nbsp;&nbsp;&nbsp;'.$username;
    echo'&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" onclick="Log_Out_User ()" class="btn btn-danger">Log Out</button>&nbsp;&nbsp;&nbsp;&nbsp;';
else:
    echo '&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" onclick="Log_In_User ()"  class="btn btn-info">Log In</button>&nbsp;&nbsp;&nbsp;&nbsp;';
endif 
?>
