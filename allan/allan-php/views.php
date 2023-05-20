<?php

include "db_modal.php";

function InsertIntoUsersEndpoint ($requesturl)
{ 
    $signup_response = array();
    $user_data = $_POST['data_array'];
    // echo $user_data;
    // $user_data = explode(', ', $data);
    // echo json_encode($user_data);
    

    // // customer details
    $username = $user_data[0]; 
    $contacts = $user_data[1]; 
    $upassword = $user_data[2]; 

    // $Id = date("dh-is");
    // $Date = date("d-m-Y");

    InsertInto_Users ($username,$contacts, $upassword);
    // $status is checked in js
    $status = "Success"; 
    $signup_response[] = array ( $status, $username,  $contacts);
    $response = json_encode($signup_response);
    echo $response;
}

function InsertIntoMessagesEndpoint ($requesturl)
{ 
    $signup_response = array();
    $user_data = $_POST['data_array'];
    // echo $user_data;
    // $user_data = explode(', ', $data);
    // echo json_encode($user_data);
    

    // // customer details
    $customername = trim($_POST['customername']); // $user_data[0]; 
    $contacts = trim($_POST['customercontacts']); // $user_data[1]; 
    $itemtype = trim($_POST['itemtype']); // $user_data[2]; 
    $message =  trim($_POST['message']); //$user_data[4];


    $date = date("m/d/y");
    $id = date("dh-is");
    $response = "Pending";

    InsertInto_Messages ($id, $customername, $contacts,$itemtype, $message, $date,$response);
    // $status is checked in js
    $status = "Success"; 
    // $signup_response[] = array ( $status, $username,  $contacts);
    // $response = json_encode($signup_response);
    echo $status;
}


function ReadUserMessageEndpoint ($requesturl)
{ 
    $signup_response = array();
    $user_data = $_POST['data_array'];
    // echo $user_data;
    // $user_data = explode(', ', $data);
    // echo json_encode($user_data);
    

    // // customer details
    $username = $user_data[0]; 
    $contact = $user_data[1];
    $itemname = $user_data[2]; 


    // echo $username . $contact . $itemname ;
    ReadUserMessage($username, $itemname);
}


function SigInUserEndpoint ($requesturl)
{ 
    $signup_response = array();
    $user_data = $_POST['data_array'];
    // echo $user_data;
    // $user_data = explode(', ', $data);
    // echo json_encode($user_data);
    

    // // customer details
    $username = $user_data[0]; 
    $upassword = $user_data[1]; 

    // $Id = date("dh-is");
    // $Date = date("d-m-Y");

    SignIn_User($username, $upassword);
}



?>