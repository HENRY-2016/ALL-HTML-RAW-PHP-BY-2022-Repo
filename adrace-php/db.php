
<?php

$db_path = 'data_base/adrace.db';
$db = new SQLite3($db_path);
if (!$db) {echo $db->lastErrorMsg();}
// else {echo "Opened Data Base Successfully\n";}

function CreateDataBaseTables ()
{
    global $db;

    $booking_table = "CREATE TABLE IF NOT EXISTS booking (ID TEXT PRIMARY KEY,CUSTOMER_NAME TEXT, CUSTOMER_CONTACT TEXT,CUSTOMER_EMAIL TEXT,CUSTOMER_DETAILS TEXT, BOOKING_DATE TEXT, BOOKING_STATUS TEXT)";
    // $message_table = "CREATE TABLE IF NOT EXISTS messages (ID TEXT PRIMARY KEY,CUSTOMER_NAME TEXT, CUSTOMER_CONTACT TEXT,MESSAGE_DETAILS TEXT, MESSAGE_DATE TEXT, MESSAGE_STATUS TEXT)";
    $message_table = "ALTER TABLE messages ADD FEEDBACK TEXT";// Add a new column

    $tables = array($message_table, $booking_table);

    foreach ($tables as $table_name)
    {
        $table_name_length = strlen('$table_name');
        $created_table = substr($table_name, 26,$table_name_length);
        $create_table_cmd = $db->exec($table_name);
        if (!$create_table_cmd) {echo $db->lastErrorMsg();}
        else {echo $created_table."...Created Very Well\n";echo"";}
    }
    $db->close();

}

/** 
 *          ==============
 *          WRITTING TO DB
 *          ==============
*/

function RegisterCustomerBookingDetails ($id,$customer_name, $customer_contact,$customer_email,$customer_booking_details, $booking_date,$booking_status)
{

    global $db;
    $insert_cmd = "INSERT INTO booking VALUES ('$id','$customer_name','$customer_contact','$customer_email','$customer_booking_details','$booking_date','$booking_status')";
    $insert_excution = $db->exec($insert_cmd);
    // if (!$insert_excution) {echo $db->lastErrorMsg();}
    // else {echo "Success";}
    $db->close();
}

function RegisterCustomerMessage ($id,$customer_name, $customer_contact,$message_details, $message_date, $message_status,$feedback)
{
    global $db;
    $insert_cmd = "INSERT INTO messages VALUES ('$id','$customer_name', '$customer_contact','$message_details', '$message_date', '$message_status','$feedback')";
    $insert_excution = $db->exec($insert_cmd);
    // if (!$insert_excution) {echo $db->lastErrorMsg();}
    // else {echo "Success";}
    $db->close();
}



/** 
 * @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
 * @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
 *              ================
 *              DELETING FROM DB
 *              ================
 * @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
 * @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
 *  
*/
function AdminDeleteUserName ()
{
    
    global $db;
    // $id = 'Kafumbe Francise'; //m5
    // $id = 2;
    // $delete_cmd = "DELETE FROM pledges WHERE ITEM = '$id'";
    $delete_cmd = "DELETE FROM users WHERE rowid = '$id'";
    echo $delete_cmd;
    $delete_excution = $db->exec($delete_cmd);
    echo $delete_excution;
    if (!$delete_excution) {echo $db->lastErrorMsg();}
    else {echo "Success";}
    $db->close();
}


/*
    =====================
    READING RFOM DATABASE
    =====================
*/
function GetCustomersBookingStatus ()
{
    global $db;
    $results = array();
    $status = 'Pending';
    $select_cmd = "SELECT * FROM booking WHERE BOOKING_STATUS = '$status'";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            // ID ,CUSTOMER_NAME,BOOKING_DATE
            $CUSTOMER_NAME = $row['CUSTOMER_NAME']; 
            $BOOKING_DATE = $row['BOOKING_DATE'];
            $ID = $row['ID'];
            $results[] = array($CUSTOMER_NAME, $BOOKING_DATE, $ID);
        }
    $json_results = json_encode($results);
    echo $json_results;
}

function GetCustomerMessageStatus ()
{
    global $db;
    $results = array();
    $status = 'Pending';
    $select_cmd = "SELECT * FROM messages WHERE MESSAGE_STATUS = '$status'";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            // ID ,CUSTOMER_NAME,MESSAGE_DATE
            $CUSTOMER_NAME = $row['CUSTOMER_NAME']; 
            $MESSAGE_DATE = $row['MESSAGE_DATE'];
            $ID = $row['ID'];
            $results[] = array($CUSTOMER_NAME, $MESSAGE_DATE, $ID);
        }
    $json_results = json_encode($results);
    echo $json_results;
}

function GetVistorsStatusDetails ()
{
    global $db;
    $results = array();
    $status = 'Finished';
    $select_cmd = "SELECT * FROM booking WHERE BOOKING_STATUS = '$status'";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            // ID ,CUSTOMER_NAME,BOOKING_DATE
            $CUSTOMER_NAME = $row['CUSTOMER_NAME']; 
            $BOOKING_DATE = $row['BOOKING_DATE'];
            $ID = $row['ID'];
            $results[] = array($CUSTOMER_NAME, $BOOKING_DATE, $ID);
        }
    $json_results = json_encode($results);
    echo $json_results;
}
function GetFeedbackStatusDetails ()
{
    global $db;
    $results = array();
    $status = 'Finished';
    $select_cmd = "SELECT * FROM messages WHERE MESSAGE_STATUS = '$status'";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            // ID ,CUSTOMER_NAME,BOOKING_DATE
            $CUSTOMER_NAME = $row['CUSTOMER_NAME']; 
            $MESSAGE_DATE = $row['MESSAGE_DATE'];
            $ID = $row['ID'];
            $results[] = array($CUSTOMER_NAME, $MESSAGE_DATE, $ID);
        }
    $json_results = json_encode($results);
    echo $json_results;
}
function GetCustomersReferencesStatus ()
{
    global $db;
    $results = array();
    $status = 'Pending';
    $select_cmd = "SELECT * FROM booking WHERE BOOKING_STATUS = '$status'";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            $ID = $row['ID'];
            $results[] = $ID;
        }
    $json_results = json_encode($results);
    echo $json_results;
}
function GetNewMassegesReferencesStatus ()
{
    global $db;
    $results = array();
    $status = 'Pending';
    $select_cmd = "SELECT * FROM messages WHERE MESSAGE_STATUS = '$status'";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            $ID = $row['ID'];
            $results[] = $ID;
        }
    $json_results = json_encode($results);
    echo $json_results;
}
function GetFeedBackReferences ()
{
    global $db;
    $results = array();
    $status = 'Finished';
    $select_cmd = "SELECT * FROM messages WHERE MESSAGE_STATUS = '$status'";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            $ID = $row['ID'];
            $results[] = $ID;
        }
    $json_results = json_encode($results);
    echo $json_results;
}
function GetVistorsReferencesStatus ()
{
    global $db;
    $results = array();
    $status = 'Finished';
    $select_cmd = "SELECT * FROM booking WHERE BOOKING_STATUS = '$status'";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            $ID = $row['ID'];
            $results[] = $ID;
        }
    $json_results = json_encode($results);
    echo $json_results;
}


function GetCustomersBookingDetails ($id)
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM booking WHERE ID = '$id'";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            $ID = $row['ID'];
            $CUSTOMER_NAME = $row['CUSTOMER_NAME'];
            $CUSTOMER_CONTACT = $row['CUSTOMER_CONTACT'];
            $CUSTOMER_EMAIL =$row['CUSTOMER_EMAIL'];
            $BOOKING_DATE = $row['BOOKING_DATE'];
            $CUSTOMER_DETAILS = $row['CUSTOMER_DETAILS'];
            $results[] = array($ID,$CUSTOMER_NAME,$CUSTOMER_CONTACT,$CUSTOMER_EMAIL,$BOOKING_DATE,$CUSTOMER_DETAILS);
        }
    $json_results = json_encode($results);
    echo $json_results;
}
function GetNewMessageDetails ($id)
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM messages WHERE ID = '$id'";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            $ID = $row['ID'];
            $CUSTOMER_NAME = $row['CUSTOMER_NAME'];
            $CUSTOMER_CONTACT = $row['CUSTOMER_CONTACT'];
            $MESSAGE_DATE = $row['MESSAGE_DATE'];
            $MESSAGE_DETAILS = $row['MESSAGE_DETAILS'];
            $results[] = array($ID,$CUSTOMER_NAME,$CUSTOMER_CONTACT,$MESSAGE_DATE,$MESSAGE_DETAILS);
        }
    $json_results = json_encode($results);
    echo $json_results;
}
function GetFeedBackDetails ($id)
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM messages WHERE ID = '$id'";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            $ID = $row['ID'];
            $CUSTOMER_NAME = $row['CUSTOMER_NAME'];
            $CUSTOMER_CONTACT = $row['CUSTOMER_CONTACT'];
            $MESSAGE_DATE = $row['MESSAGE_DATE'];
            $FEEDBACK = $row['FEEDBACK'];
            $results[] = array($ID,$CUSTOMER_NAME,$CUSTOMER_CONTACT,$MESSAGE_DATE,$FEEDBACK);
        }
    $json_results = json_encode($results);
    echo $json_results;
}
function GetVistorsBookingDetails ($id)
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM booking WHERE ID = '$id'";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            $ID = $row['ID'];
            $CUSTOMER_NAME = $row['CUSTOMER_NAME'];
            $CUSTOMER_CONTACT = $row['CUSTOMER_CONTACT'];
            $CUSTOMER_EMAIL =$row['CUSTOMER_EMAIL'];
            $BOOKING_DATE = $row['BOOKING_DATE'];
            $CUSTOMER_DETAILS = $row['CUSTOMER_DETAILS'];
            $results[] = array($ID,$CUSTOMER_NAME,$CUSTOMER_CONTACT,$CUSTOMER_EMAIL,$BOOKING_DATE,$CUSTOMER_DETAILS);
        }
    $json_results = json_encode($results);
    echo $json_results;
}

/*
    =====================
    UPDATING DATABASE
    =====================
*/

function UpdateCustomerBookingDetails ($id)
{
    global $db;
    $status = 'Finished';
    $update_cmd = "UPDATE booking SET BOOKING_STATUS = '$status' WHERE ID = '$id'";
    $update_excution = $db->exec($update_cmd);
    if (!$update_excution) {echo $db->lastErrorMsg();}
    else {echo "Success";}
    $db->close();
}
function UpdateMessagesTable ($id,$feedback)
{
    global $db;
    $status = 'Finished';
    $update_cmd = "UPDATE messages SET MESSAGE_STATUS = '$status', FEEDBACK = '$feedback' WHERE ID = '$id'";
    $update_excution = $db->exec($update_cmd);
    // if (!$update_excution) {echo $db->lastErrorMsg();}
    // else {echo "Success";}
    $db->close();
}

    // CreateDataBaseTables ();

?>