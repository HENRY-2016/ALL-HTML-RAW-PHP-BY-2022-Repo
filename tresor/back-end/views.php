<?php

include "db_modal.php";



function AdminCreateInstrumentEndPoint ($requesturl)
{ 

    $name = trim($_POST['name']);
    $id = date("dh-is");

    InsertInto_Instruments ($id,$name);
    $status = "Success  Instruments Created Well"; 
    echo $status;
}

function AdminCreateManagerEndPoint ($requesturl)
{ 
    $username = trim($_POST['username']);
    $contacts = trim($_POST['contacts']);
    $upassword = trim($_POST['upassword']);

    $id = date("dh-is");

    InsertInto_Managers ($id,$username,$contacts, $upassword);
    $status  = "Success  Staff  Created Well";
    echo $status;
}


function InsertIntoEventsEndpoint ($requesturl)
{ 
    $events_data = $_POST['data_array'];

    // // customer details
    $staff = $events_data[0]; 
    $ename = $events_data[1]; 
    $eplace = $events_data[2]; 
    $edate = $events_data[3]; 
    $eamount = $events_data[4];
    // remove all customer name, contact and email from array
    $instruments_info = array_splice($events_data,5);
    // create a string without a comma
    $instruments_details = strval(join(' ',$instruments_info)); // convert to a string first

    $id = date("dh-is");
    

    InsertInto_Events($id,$ename,$staff,$eplace,$edate,$eamount,$instruments_details);

    echo "<center>Success <br>Event <br> Recorded Well</center>";
}

function InsertIntoReturnsEndpoint ($requesturl)
{ 
    $returns_data = $_POST['data_array'];

    // // customer details
    $staff = $returns_data[0]; 
    $rfrom = $returns_data[1]; 
    $rdate = $returns_data[2]; 

    // remove all customer name, contact and email from array
    $instruments_info = array_splice($returns_data,3);
    // create a string without a comma
    $instruments_details = strval(join(' ',$instruments_info)); // convert to a string first
    $id = date("dh-is");
    

    InsertInto_Returns($id,$rfrom,$rdate,$staff,$instruments_details);
    echo "<center>Success <br>Returns <br> Recorded Well</center>";
}

function InsertIntoBorrowsEndpoint ($requesturl)
{ 
    $borrors_data = $_POST['data_array'];

    // // customer details
    $staff = $borrors_data[0]; 
    $bto = $borrors_data[1]; 
    $bdate = $borrors_data[2]; 

    // remove all customer name, contact and email from array
    $instruments_info = array_splice($borrors_data,3);
    // create a string without a comma
    $instruments_details = strval(join(' ',$instruments_info)); // convert to a string first

    $id = date("dh-is");
    InsertInto_Borrows($id,$bto,$bdate,$staff,$instruments_details);
    echo "<center>Success <br>Borrows <br> Recorded Well</center>";
}

function InsertIntoPaymentsEndpoint ($requesturl)
{ 
    $payments_data = $_POST['data_array'];

    // // customer details
    $staff = $payments_data[0]; 
    $pname = $payments_data[1]; 
    $pevent = $payments_data[2];
    $pamount = $payments_data[3];
    $pdeta = $payments_data[4]; 

    $id = date("dh-is");
    InsertInto_Payments($id, $staff,$pname,$pevent,$pamount,$pdeta);
    echo "<center>Success <br>Payments <br> Recorded Well</center>";
}


function InsertIntoInstrumentsEndpoint ($requesturl)
{ 
    $instruments_data = $_POST['data_array'];

    // // customer details
    $staff = $instruments_data[0]; 
    $iname = $instruments_data[1]; 
    $isupllier = $instruments_data[2];
    $iquantity = $instruments_data[3];
    $cost = $instruments_data[4];
    $ideta = $instruments_data[5]; 

    $id = date("dh-is");
    InsertInto_Staff_Instruments($id,$staff,$iname,$isupllier,$iquantity,$cost,$ideta);
    echo "<center>Success <br>Instruments <br> Recorded Well</center>";
}


function SigInUserEndpoint ($requesturl)
{ 
    $signup_response = array();
    $user_data = $_POST['data_array'];
    $username = $user_data[0]; 
    $upassword = $user_data[1]; 
    SignIn_User($username, $upassword);
}
function SigInAdminEndpoint ($requesturl)
{ 
    $signup_response = array();
    $user_data = $_POST['data_array'];
    $username = $user_data[0]; 
    $upassword = $user_data[1]; 
    SignIn_Admin($username, $upassword);
}

// deleting
function AdminDeleteUserEndPoint ()
{
    $id = trim($_POST['id']);
    AdminDelete_User ($id);
    echo "User Deleted Well";
}
function AdminDeleteEventsEndPoint ()
{
    $id = trim($_POST['id']);
    AdminDelete_Events ($id);
    echo "Events Deleted Well";
}

function AdminDeleteReturnsEndPoint ()
{
    $id = trim($_POST['id']);
    AdminDelete_Returns ($id);
    echo "Returns Deleted Well";
}

function AdminDeletePaymentsEndPoint ()
{
    $id = trim($_POST['id']);
    AdminDelete_Payments ($id);
    echo "Payments Deleted Well";
}

function AdminDeleteBorrowsEndPoint ()
{
    $id = trim($_POST['id']);
    AdminDelete_Borrows ($id);
    echo "Borrows Deleted Well";
}

function AdminDeleteInstrumentsEndPoint ()
{
    $id = trim($_POST['id']);
    AdminDelete_Instruments ($id);
    echo "Instruments Deleted Well";
}

function GetStaffsEndpoint ($requesturl){GetStaffs ();}
function GetEventsEndpoint ($requesturl){GetEvents ();}
function GetReturnsEndpoint ($requesturl){GetReturns ();};
function GetBorrowsEndpoint ($requesturl){GetBorrows ();};
function GetPaymentsEndpoint ($requesturl){GetPayments ();};
function GetInstrumentsEndpoint ($requesturl){GetInstruments ();};



?>