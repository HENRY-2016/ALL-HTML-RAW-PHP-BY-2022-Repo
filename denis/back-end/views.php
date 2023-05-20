<?php

include "db_modal.php";



function InsertIntoOrdersEndpoint ($requesturl)
{ 
    $orders_data = $_POST['data_array'];

    $sname = $orders_data[0]; 
    $sday = $orders_data[1]; 
    $sservice = $orders_data[2]; 
    $id = date("dh-is");
    
    InsertInto_Orders($id,$sname,$sday,$sservice);
    echo "<center>Success <br>Your Order Was <br> Received</center>";
}

function InsertIntoRegisterEndpoint ($requesturl)
{
    $register_data = $_POST['data_array'];

    $fname = $register_data[0]; 
    $sname = $register_data[1]; 
    $class = $register_data[2]; 
    $username = $register_data[3];
    $spassword = $register_data[4]; 
    $id = date("dh-is");
    
    InsertInto_students($id,$fname,$sname,$class,$username,$spassword);
    echo "<center>Success <br>Your Account Has <br>Been<br> Registered Well <br><br> Log In Now</center>";
    
}

function SigInUserEndpoint ($requesturl)
{ 
    $signup_response = array();
    $user_data = $_POST['data_array'];
    $username = $user_data[0]; 
    $upassword = $user_data[1]; 
    SignIn_User($username);
}
function SigInAdminEndpoint ($requesturl)
{ 
    $signup_response = array();
    $user_data = $_POST['data_array'];
    $username = $user_data[0]; 
    $upassword = $user_data[1]; 
    SignIn_Admin($username, $upassword);
}

function GetOrdersEndpoint ($requesturl)
{
    $name = trim($_POST['name']);
    GetOrders ($name);
}

// deleting
function AdminDeleteOrdersEndPoint ()
{
    $id = trim($_POST['id']);
    AdminDelete_Orders ($id);
    echo "Order Deleted Well";
}
function AdminDeleteStudentsEndPoint ()
{
    $id = trim($_POST['id']);
    AdminDelete_Students ($id);
    echo "Student Deleted Well";
}

function GetAdminOrdersEndpoint ($requesturl){GetAdminOrders ();};
function GetAdminStudentsEndpoint ($requesturl){GetAdminStudents ();};



?>