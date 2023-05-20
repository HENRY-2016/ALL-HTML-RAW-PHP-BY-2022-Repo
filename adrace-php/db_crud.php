
<?php
    include "db.php";

/**
 *          ======================================================
 *                          USER WRITE TO DB
 *          =====================================================
*/

function PostCustomerBookingEndpoint ($requesturl)
{ 
    $customer_data = $_POST['data_array'];

    // $customer_data = explode(', ', $data);
    // echo json_encode($customer_data);
    

    // // customer details
    $date = $customer_data[0]; 
    $customer_fname = $customer_data[1]; 
    $customer_lname = $customer_data[2]; 
    $customer_fullname = $customer_fname .' '. $customer_lname;
    $customer_contact = $customer_data[3];
    $customer_email = $customer_data[4];
    // remove all customer name, contact and email from array
    $customer_booking_info = array_splice($customer_data,5);
    // create a string without a comma
    $customer_booking_details = strval(join(' ',$customer_booking_info)); // convert to a string first

    $booking_date = str_replace('\/','/',$date); // from "2\/8\/2021" to "2/8/2021"
    $id = date("dh-is");
    $booking_status = 'Pending';

    RegisterCustomerBookingDetails ($id,$customer_fullname, $customer_contact,$customer_email,$customer_booking_details, $booking_date,$booking_status);
    //Send_Email_To_Adrace_Admin ($customer_fullname,$customer_contact,$customer_email,$customer_booking_details);
    echo $customer_fullname;
}

function PostUpdateCustomerBookingDetailsEndpoint () {$id = $_POST['id'];UpdateCustomerBookingDetails  ($id);}
function PostUpdateMessagesTableEndpoint () 
{
    $id = $_POST['id'];
    $customer_data = $_POST['data_array'];
    // echo json_encode($customer_data);

    $id = $customer_data[0];
    $customer_name = $customer_data[1];
    $customer_email = $customer_data[2];
    $feedback = $customer_data[3];

    UpdateMessagesTable  ($id,$feedback); // updates  status and feedback
    echo "Updated Well";
    // echo "Name<br>".$customer_name;
    // echo "<br>Email<br>".$customer_email;
}



function PostCustomerMessageEndpoint ($requesturl) 
{
    $customer_data = $_POST['data_array'];
    // echo json_encode($customer_data);

    $customer_name = $customer_data[0];
    $customer_contact = $customer_data[1];
    $customer_message = $customer_data[2];
    
    $message_date= date("d/m/Y");
    $id = date("dh-is");
    $message_status = 'Pending';
    $feedback = 'No Response';

    RegisterCustomerMessage ($id,$customer_name, $customer_contact,$customer_message, $message_date, $message_status,$feedback);
    echo $customer_name;


}




/**
 *          ======================================================
 *                          USER READ FROM DB
 *          =====================================================
*/

function GetCustomersBookingDetailsEndpoint () {$id = $_POST['id'];GetCustomersBookingDetails  ($id);} 
function GetNewMessageDetailsEndpoint () {$id = $_POST['id'];GetNewMessageDetails  ($id);} 
function GetFeedBackDetailsEndpoint () {$id = $_POST['id'];GetFeedBackDetails ($id);} 
function GetVistorsBookingDetailsEndpoint () {$id = $_POST['id'];GetVistorsBookingDetails  ($id);}

function GetCustomersBookingStatusEndpoint ($requesturl) {GetCustomersBookingStatus ();}
function GetCustomerMessageStatusEndpoint ($requesturl) {GetCustomerMessageStatus ();}
function GetVistorsStatusDetailsEndpoint ($requesturl) {GetVistorsStatusDetails ();}
function GetFeedbackStatusDetailsEndpoint ($requesturl) {GetFeedbackStatusDetails ();}
function GetCustomersBookingReferencesEndpoint () {GetCustomersReferencesStatus ();} 
function GetNewMassegesReferencesStatusEndpoint () {GetNewMassegesReferencesStatus ();} 
function GetFeedBackReferencesEndpoint () {GetFeedBackReferences ();} 
function GetVistorsReferencesEndpoint () {GetVistorsReferencesStatus ();} 


?>