
<?php

// sqlite> hdf.db
// sqlite> .tables
// sqlite> select * from payments_details;

$db_path = 'data_base/hdf.db';
$db = new SQLite3($db_path);
if (!$db) {echo $db->lastErrorMsg();}
// else {echo "Opened Data Base Successfully\n";}

function CreateDataBaseTables ()
{
    global $db;

    $orders_table = "CREATE TABLE IF NOT EXISTS orders (ID TEXT PRIMARY KEY,C_Name TEXT, C_Phone TEXT,C_Location TEXT,C_Method TEXT, C_Date TEXT, C_Details TEXT,C_Total TEXT,Order_Status TEXT)";
    $payments_table = "CREATE TABLE IF NOT EXISTS payments (ID TEXT PRIMARY KEY,C_Name TEXT, C_Phone, C_Order TEXT, C_Amount TEXT,C_Date TEXT,C_Deposit TEXT,C_Balance TEXT)";
    $ipn_details_table = "CREATE TABLE IF NOT EXISTS payments_details (Reference TEXT ,Phone TEXT ,Reason TEXT ,TransactionId TEXT ,Amount TEXT ,TelecomId TEXT,Currency TEXT, DateID TEXT)";
    // $message_table = "CREATE TABLE IF NOT EXISTS messages (ID TEXT PRIMARY KEY,CUSTOMER_NAME TEXT, CUSTOMER_CONTACT TEXT,MESSAGE_DETAILS TEXT, MESSAGE_DATE TEXT, MESSAGE_STATUS TEXT)";
    //$message_table = "ALTER TABLE messages ADD FEEDBACK TEXT";// Add a new column

    $tables = array($payments_table,$orders_table,$ipn_details_table);

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
function RegisterCustomerBookingDetails ($Id, $Name, $Phone ,$Location, $Method, $Date, $Details, $Total, $Status)
{
    global $db;
    $insert_cmd = "INSERT INTO orders VALUES ('$Id', '$Name', '$Phone' ,'$Location', '$Method', '$Date', '$Details','$Total', '$Status')";
    $insert_excution = $db->exec($insert_cmd);
    // if (!$insert_excution) {echo $db->lastErrorMsg();}
    // else {echo "Success";}
    $db->close();
}

function RegisterCustomerPaymentsDetails ($Reference,$Phone,$Reason, $TransactionId,$Amount,$TelecomId, $Currency,$DateID)
{

    global $db;
    $insert_cmd = "INSERT INTO payments_details VALUES ('$Reference','$Phone','$Reason', '$TransactionId','$Amount','$TelecomId', '$Currency','$DateID')";
    $insert_excution = $db->exec($insert_cmd);
    // if (!$insert_excution) {echo $db->lastErrorMsg();}
    // else {echo "Success";}
    $db->close();
}
function RegisterCustomerOrderPayment ($Id,$Name, $Phone, $Order, $Amount,$Date,$Deposit,$Balance)
{

    global $db;
    $insert_cmd = "INSERT INTO payments VALUES ('$Id','$Name', '$Phone', '$Order', '$Amount','$Date','$Deposit','$Balance')";
    $insert_excution = $db->exec($insert_cmd);
    // if (!$insert_excution) {echo $db->lastErrorMsg();}
    // else {echo "Success";}
    $db->close();
}
// RegisterCustomerOrderPayment ('$Id','$Name', '$Phone', '$Order', '$Amount','$Date','$Deposit','$Balance');



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
    $select_cmd = "SELECT * FROM orders WHERE Order_Status = '$status'";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            $CUSTOMER_NAME = $row['C_Name']; 
            $BOOKING_DATE = $row['C_Date'];
            $ID = $row['ID'];
            $results[] = array($CUSTOMER_NAME, $BOOKING_DATE, $ID);
        }
    $json_results = json_encode($results);
    echo $json_results;
}

function GetCustomersReferencesStatus ()
{
    global $db;
    $results = array();
    $status = 'Pending';
    $select_cmd = "SELECT * FROM orders WHERE Order_Status = '$status'";
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
    $select_cmd = "SELECT * FROM orders WHERE ID ='$id'";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            $ID = $row['ID'];
            $CUSTOMER_NAME = $row['C_Name'];
            $CUSTOMER_CONTACT = $row['C_Phone'];
            $CUSTOMER_LOCATION =$row['C_Location'];
            $BOOKING_METHOD = $row['C_Method'];
            $CUSTOMER_DATE = $row['C_Date'];
            $CUSTOMER_DETAILS = $row['C_Details'];
            $results[] = array($ID,$CUSTOMER_NAME,$CUSTOMER_CONTACT,$CUSTOMER_LOCATION,$BOOKING_METHOD,$CUSTOMER_DATE,$CUSTOMER_DETAILS);
        }
    $json_results = json_encode($results);
    echo $json_results;
}

//--------------------------------------------------------
function GetCustomerPaymentsStatus ()
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM payments";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            $CUSTOMER_NAME = $row['C_Name']; 
            $BOOKING_DATE = $row['C_Date'];
            $ID = $row['ID'];
            $results[] = array($CUSTOMER_NAME, $BOOKING_DATE, $ID);
        }
    $json_results = json_encode($results);
    echo $json_results;
}
function GetCustomerPaymentsReferences ()
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM payments";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            $ID = $row['ID'];
            $results[] = $ID;
        }
    $json_results = json_encode($results);
    echo $json_results;
}

function GetCustomerPaymentsDetails ($id)
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM payments WHERE ID ='$id'";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            $ID = $row['ID'];
            $CUSTOMER_NAME = $row['C_Name'];
            $CUSTOMER_CONTACT = $row['C_Phone'];
            $CUSTOMER_ORDER =$row['C_Order'];
            $CUSTOMER_AMOUNT = $row['C_Amount'];
            $CUSTOMER_DEPOSIT = $row['C_Deposit'];
            $CUSTOMER_BALANCE = $row['C_Balance'];
            $results[] = array($ID,$CUSTOMER_NAME,$CUSTOMER_CONTACT,$CUSTOMER_ORDER,$CUSTOMER_AMOUNT,$CUSTOMER_DEPOSIT,$CUSTOMER_BALANCE);
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