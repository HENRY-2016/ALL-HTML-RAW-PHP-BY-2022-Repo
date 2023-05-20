
<?php
    include "db.php";
    include "deposit.php";

$FILE_UPLOADS = "/data_base/fileuploads";
/**
 *          ======================================================
 *                          USER WRITE TO DB
 *          =====================================================
*/


function PostCustomerBookingEndpoint ($requesturl)
{ 
    $customer_data = $_POST['customer_order'];
    // echo $customer_data;
    // $customer_data = explode(', ', $data);
    // echo json_encode($customer_data);
    

    // // customer details
    $Name = $customer_data[0]; 
    $Phone = $customer_data[1]; 
    $Location = $customer_data[2]; 
    $Method = $customer_data[3]; 
    $Details = $customer_data[6];
    $Total = $customer_data[7];

    $Id = date("dh-is");
    $Date = date("d-m-Y");
    // echo $Total;
    $Status = "Pending";

    // echo $name . $phone . $location . $method;
    // RegisterCustomerBookingDetails ($Id, $Name, $Phone ,$Location, $Method, $Date, $Details,$Total, $Status);
    echo $Name;
}

function PostCustomerPaymentEndpoint ($requesturl)
{ 
    $customer_data = $_POST['data_array'];
    // // customer details
    $reason = $customer_data[0]; 
    $phone = $customer_data[1]; 
    $amount = $customer_data[2]; 
    ProcessCustomerMobileMoneyPayment ($reason,$phone,$amount);
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


function PostCustomerBookingWithImageEndpoint ()
{
    
    global $FILE_UPLOADS; 
    $response = array();

    $customer_name = $_POST["customer_name"];
    $customer_contact = $_POST["customer_contact"]; 
    $customer_location = $_POST["customer_location"]; 
    $customer_method = $_POST["customer_method"]; 
    $type_input = $_POST["type_input"]; 
    $img = $_FILES["file"];
    $img_name = "demo";
    
    // if (empty($customer_name)||empty($img_name)||empty($description)||empty($img)||empty($password))
    // {$response['message'] = "Sorry, <br>All <br> Fields Required";}
    // else
    // {
        // if ($password != $adminpin)
        // {$uploadStatus = 0;$response['message'] = "Sorry, <br> $password <br> Invalid Admin Password,<br>Try Again";}
        // else
        // {
            // Upload file 
                // determine the dir to upload a file
                //array_search — Searches the array for a given value and returns the first corresponding key if successful
            //<<<6/7/2021>>> $target_dir = array_search($itemtype,$file_upload_dir_array);
            $target_dir = $FILE_UPLOADS;
            if(!empty($_FILES["file"]))
            { 
                $uploadStatus = 1;
                
                // $target_file = $target_dir."/".$img_name; // rename the file add / be4 name
                $target_file = $target_dir; // rename the file add / be4 name
                // $file_type=$_FILES['file']['type']; // defining file type


                // check if it already in db
                if (file_exists($target_file)) 
                {$uploadStatus = 0; $response['message'] = "Sorry,<br> $img_name <br> File Already Exists.";}
                else
                {
                    $id = date("dh-is");
                    // $upload_date = date("d/m/Y");
                    // insert function call

                    // InsertInto_Boxes($id,$img_name ,$description);
                    // Upload file to the folder
                    if(move_uploaded_file($_FILES["file"]["tmp_name"],$target_file))
                    {$response['message'] = "$img_name <br>$description<br> Data Submitted Successfully!";}
                    else 
                    {$response['message'] = " Error On Uploading A file ".$_FILES["file"]["error"];}
                }
            }
            else{$uploadStatus = 0;$response['message'] = 'Sorry, <br>Type ,Name<br>Description,Picture <br> All Inputs Are Required.';} 
    //     }
    // }
    // Return response
    echo json_encode($response);
}



/**
 *          ======================================================
 *                          USER READ FROM DB
 *          =====================================================
*/

function GetUserDonationStatusEndpoint ($requesturl) {GetUserDonationStatus ();}

// function GetCustomersBookingDetailsEndpoint () {$id = $_POST['id'];GetCustomersBookingDetails  ($id);} 
// function GetCustomersBookingReferencesEndpoint () {GetCustomersReferencesStatus ();} 
// // -----------------------
// function GetCustomerPaymentsDetailsEndpoint () {$id = $_POST['id'];GetCustomerPaymentsDetails  ($id);} 
// function GetCustomerPaymentsStatusEndpoint ($requesturl) {GetCustomerPaymentsStatus ();}
// function GetCustomerPaymentsReferencesEndpoint () {GetCustomerPaymentsReferences ();}



?>