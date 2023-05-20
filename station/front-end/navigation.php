
<ul class="sidebar-nav nav-pills nav-stacked" id="menu">
      <li>
         <div id="logo-div">
               <img class="logo-img" src="../static/imgs/logo.png" />
            </div>
      </li>
      <li class="main-navi-links">
         <a href="../dashboard.php"><img src="../static/imgs/dashboard.png" class="my-fas-img">Dashboard</a>
      </li>
   
      <li >
      <a href="#"><img src="../static/imgs/oil.png" class="my-fas-img"> Oil &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class='fa fa-angle-down pointing-arrows'></i></a>
      <ul class="nav-pills nav-stacked nav-drop-down-list-links">
         <li><a href="/station/front-end/oil/view.php"><img src="../static/imgs/circle.png" class="my-list-fas-img">View</a></li>
         <?php 
            if(isset($_SESSION['Admin_User_Type'])) :
               echo '<li><a href="/station/front-end/oil/edit.php"><img src="../static/imgs/circle.png" class="my-list-fas-img"> Edit </a></li>';
            else:
               echo "";
            endif 
         ?>
         <li><a href="/station/front-end/oil/record_taken.php"><img src="../static/imgs/circle.png" class="my-list-fas-img"> Record Taken</a></li>
         <li><a href="/station/front-end/oil/record_payment.php"><img src="../static/imgs/circle.png" class="my-list-fas-img"> Record Payment</a></li>
      </ul>
   </li>
   <li >
      <a href="#"><img src="../static/imgs/fuel.png" class="my-fas-img"> Fuel &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class='fa fa-angle-down pointing-arrows'></i></a>
      <ul class="nav-pills nav-stacked nav-drop-down-list-links">
      <li><a href="/station/front-end/fuel/view.php"><img src="../static/imgs/circle.png" class="my-list-fas-img"> View</a></li>
      <?php 
         if(isset($_SESSION['Admin_User_Type'])) :
            echo '<li><a href="/station/front-end/fuel/edit.php"><img src="../static/imgs/circle.png" class="my-list-fas-img"> Edit </a></li>';
         else:
            echo "";
         endif 
      ?>
      <li><a href="/station/front-end/fuel/record_fuel.php"><img src="../static/imgs/circle.png" class="my-list-fas-img"> Record Taken</a></li>
      <li><a href="/station/front-end/fuel/record_payment.php"><img src="../static/imgs/circle.png" class="my-list-fas-img"> Record Payment</a></li>
      </ul>
   </li>
   <li >
      <a href="#"><img src="../static/imgs/rider.png" class="my-fas-img">Riders&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; <i class='fa fa-angle-down pointing-arrows'></i></a>
      <ul class="nav-pills nav-stacked nav-drop-down-list-links">
         <li><a href="/station/front-end/riders/add.php"><img src="../static/imgs/circle.png" class="my-list-fas-img"> Add Riders</a></li>
         <?php 
         if(isset($_SESSION['Admin_User_Type'])) :
            echo '<li><a href="/station/front-end/riders/edit.php"><img src="../static/imgs/circle.png" class="my-list-fas-img"> Edit Riders </a></li>';
         else:
            echo "";
         endif 
         ?>
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
      <?php 
         if(isset($_SESSION['Admin_User_Type'])) :
            echo '<li><a href="/station/front-end/expenses/edit.php"><img src="../static/imgs/circle.png" class="my-list-fas-img"> Edit Expense </a></li>';
         else:
            echo "";
         endif 
         ?>
         <li><a href="/station/front-end/expenses/list.php"><img src="../static/imgs/circle.png" class="my-list-fas-img"> List Expenses</a></li>
      </ul>
   </li>
   <li>
      <a href="#"><img src="../static/imgs/staff.png" class="my-fas-img">Staffs&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class='fa fa-angle-down pointing-arrows'></i></a>
      <ul class="nav-pills nav-stacked nav-drop-down-list-links">
      <li><a href="/station/front-end/staffs/add.php"><img src="../static/imgs/circle.png" class="my-list-fas-img"> Add Staff</a></li>
      <li><a href="/station/front-end/staffs/list.php"><img src="../static/imgs/circle.png" class="my-list-fas-img"> List Staff </a></li>
      <?php 
         if(isset($_SESSION['Admin_User_Type'])) :
            echo '<li><a href="/station/front-end/staffs/edit.php"><img src="../static/imgs/circle.png" class="my-list-fas-img"> Edit Staff </a></li>';
            echo '<li><a href="/station/front-end/staffs/adminadd.php"><img src="../static/imgs/circle.png" class="my-list-fas-img"> Admin Add</a></li>';
            echo '<li><a href="/station/front-end/staffs/adminview.php"><img src="../static/imgs/circle.png" class="my-list-fas-img">Admin View  </a></li>';
         else:
            echo "";
         endif 
         ?>
      </ul>
   </li>
   <li>
      <a href="#"><img src="../static/imgs/report.png" class="my-fas-img">Reports&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class='fa fa-angle-down pointing-arrows'></i></a>
      <ul class="nav-pills nav-stacked nav-drop-down-list-links">
      <li><a href="/station/front-end/reports/oil.php"><img src="../static/imgs/circle.png" class="my-list-fas-img"> Oil </a></li>
      <li><a href="/station/front-end/reports/fuel.php"><img src="../static/imgs/circle.png" class="my-list-fas-img"> Fuel </a></li>
      <li><a href="/station/front-end/reports/balances.php"><img src="../static/imgs/circle.png" class="my-list-fas-img"> Balances </a></li>
      </ul>
   </li>

   <li>
      <a href="#"><img src="../static/imgs/settings.png" class="my-fas-img">Settings&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; <i class='fa fa-angle-down pointing-arrows'></i></a>
      <ul class="nav-pills nav-stacked nav-drop-down-list-links">
         
         <?php 
         if(isset($_SESSION['Admin_User_Type'])) :
            echo '<li><a href="/station/front-end/accounts/admin.php""><img src="../static/imgs/circle.png" class="my-list-fas-img">Account</a></li>';
         else:
            echo '<li><a href="/station/front-end/accounts/account.php"><img src="../static/imgs/circle.png" class="my-list-fas-img">Account</a></li>';
         endif 
         ?>
      </ul>
   </li>

</ul>