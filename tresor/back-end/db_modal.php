
<?php

$db_path = 'database/database.db';
$db = new SQLite3($db_path);
if (!$db) {echo $db->lastErrorMsg();}


function CreateDataBaseTables ()
{
    global $db;

    $instruments_table = "CREATE TABLE IF NOT EXISTS instruments (ID TEXT PRIMARY KEY,STAFF TEXT,INAME TEXT,ISUPLLIER TEXT,IQUANTITY TEXT,COST TEXT,IDETA TEXT)"; 
    $inames_table = "CREATE TABLE IF NOT EXISTS inames (ID TEXT PRIMARY KEY,INAME TEXT)"; 
    $event_table = "CREATE TABLE IF NOT EXISTS events (ID TEXT PRIMARY KEY,ENAME TEXT,STAFF TEXT,EPLACE TEXT,EDATE TEXT,EAMOUNT TEXT,EDETAILS TEXT)"; 
    $returns_table = "CREATE TABLE IF NOT EXISTS returnss (ID TEXT PRIMARY KEY,RFROM TEXT,RDATE TEXT,STAFF TEXT,EDETAILS TEXT)"; 
    $borrows_table = "CREATE TABLE IF NOT EXISTS borrows (ID TEXT PRIMARY KEY,BTO TEXT,BDATE TEXT,STAFF TEXT,BDETAILS TEXT)"; 
    $payments_table = "CREATE TABLE IF NOT EXISTS payments (ID TEXT PRIMARY KEY,STAFF TEXT,PNAME TEXT,PEVENT TEXT,PAMOUNT TEXT,PDETA TEXT)"; 
    $managers_table = "CREATE TABLE IF NOT EXISTS managers (ID TEXT PRIMARY KEY, USERNAME TEXT,CONTACTS TEXT, UPASSWORD TEXT)"; 


    $tables = array(
                        $instruments_table,$borrows_table,
                        $inames_table,
                        $managers_table, $returns_table,
                        $event_table,$payments_table
                    );

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

function SetDatabasePermissions ()
{ 
    $permissions1 = shell_exec('chmod -R +777 database');
    $permissions2 = shell_exec('chmod -R +777 database/database.db');
    echo "<pre>$permissions1</pre>\n\n"; echo "Permissions Given To database Dir\n\n";
    echo "<pre>$permissions2</pre>\n\n"; echo "Permissions Given To database.db\n\n";
}


function InsertInto_Managers($id,$username,$contacts, $upassword)
{
    global $db;
    $insert_cmd = "INSERT INTO managers VALUES ('$id','$username','$contacts', '$upassword')";
    $insert_excution = $db->exec($insert_cmd);
    if (!$insert_excution) 
    {
        echo $db->lastErrorMsg();
        exit();
    }
    $db->close();
}


// =================================================================================
// =================================================================================
// =================================================================================
//                  Writting to 
// =================================================================================
// =================================================================================
// =================================================================================

function InsertInto_Instruments($id,$instruments)
{
    global $db;
    global $db_error;
    $insert_cmd = "INSERT INTO instruments VALUES ('$id','$instruments')";
    $insert_excution = $db->exec($insert_cmd);
    if (!$insert_excution) 
    {
        $db_error['message'] = "Data Base <br>Error<br>". $db->lastErrorMsg();
        echo json_encode($db_error);
        exit();
    }
    
    $db->close();
}

function InsertInto_Events($id,$staff,$ename,$eplace,$edate,$eamount,$details)
{
    global $db;
    global $db_error;
    $insert_cmd = "INSERT INTO events VALUES ('$id','$staff','$ename','$eplace','$edate','$eamount','$details')";
    $insert_excution = $db->exec($insert_cmd);
    if (!$insert_excution) 
    {
        // $db_error['message'] = "Data Base <br>Error<br>". $db->lastErrorMsg();
        // echo json_encode($db_error);
        echo $db->lastErrorMsg();
        exit();
    }
    $db->close();
}

function InsertInto_Returns($id,$rfrom,$rdate,$staff,$edetails)
{
    global $db;
    $insert_cmd = "INSERT INTO returnss VALUES ('$id','$rfrom','$rdate','$staff','$edetails')";
    $insert_excution = $db->exec($insert_cmd);
    if (!$insert_excution) 
    {
        echo $db->lastErrorMsg();
        exit();
    }
    $db->close();
}

function InsertInto_Borrows($id,$bto,$bdate,$staff,$bdetails)
{
    global $db;
    global $db_error;
    $insert_cmd = "INSERT INTO borrows VALUES ('$id','$bto','$bdate','$staff','$bdetails')";
    $insert_excution = $db->exec($insert_cmd);
    if (!$insert_excution) 
    {
        echo $db->lastErrorMsg();
        exit();
    }
    $db->close();
}
function InsertInto_Payments($id, $staff,$pname,$pevent,$pamount,$pdeta)
{
    global $db;
    global $db_error;
    $insert_cmd = "INSERT INTO payments VALUES ('$id', '$staff','$pname','$pevent','$pamount','$pdeta')";
    $insert_excution = $db->exec($insert_cmd);
    if (!$insert_excution) 
    {
        echo $db->lastErrorMsg();
        exit();
    }
    $db->close();
}
function InsertInto_Staff_Instruments($id,$staff,$iname,$isupllier,$iquantity,$cost,$ideta)
{
    global $db;
    global $db_error;
    $insert_cmd = "INSERT INTO instruments VALUES ('$id','$staff','$iname','$isupllier','$iquantity','$cost','$ideta')";
    $insert_excution = $db->exec($insert_cmd);
    if (!$insert_excution) 
    {
        echo $db->lastErrorMsg();
        exit();
    }
    $db->close();
}


// =================================================================================
// =================================================================================
// =================================================================================
//                  Reading through
// =================================================================================
// =================================================================================
// =================================================================================
function GetStaffs ()
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM managers";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
    // $managers_table = "CREATE TABLE IF NOT EXISTS managers (USERNAME TEXT PRIMARY KEY,CONTACTS TEXT, UPASSWORD TEXT)"; 
            $ID = $row['ID'];
            $USERNAME = $row['USERNAME']; 
            $CONTACTS = $row['CONTACTS'];
            $UPASSWORD = $row['UPASSWORD'];


            // create an assoicative array(key:value) to results
            $results[] = array( 
                                'ID' => $ID, 
                                'USERNAME' => $USERNAME, 
                                'CONTACTS' => $CONTACTS,
                                'UPASSWORD' => $UPASSWORD,
                            );
        }

    $json_results = json_encode($results);
    echo $json_results;
}

function GetEvents ()
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM events";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {

    // $event_table = "CREATE TABLE IF NOT EXISTS events (ID TEXT PRIMARY KEY,ENAME TEXT,EPLACE TEXT,EDATE TEXT,EAMOUNT TEXT,EDETAILS TEXT)"; 
            $ID = $row['ID'];
            $STAFF = $row['STAFF']; 
            $ENAME = $row['ENAME']; 
            $EPLACE = $row['EPLACE'];
            $EDATE = $row['EDATE'];
            $EAMOUNT = $row['EAMOUNT'];
            $EDETAILS = $row['EDETAILS'];


            // create an assoicative array(key:value) to results
            $results[] = array( 
                                'ID' => $ID,
                                'ESTAFF' => $STAFF, 
                                'ENAME' => $ENAME, 
                                'EPLACE' => $EPLACE,
                                'EDATE' => $EDATE,
                                'EAMOUNT' => $EAMOUNT,
                                'EDETAILS' => $EDETAILS,
                            );
        }

    $json_results = json_encode($results);
    echo $json_results;
}

function GetReturns ()
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM returnss";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {

    // $returns_table = "CREATE TABLE IF NOT EXISTS returnss (ID TEXT PRIMARY KEY,RFROM TEXT,RDATE TEXT,STAFF TEXT,EDETAILS TEXT)"; 

            $ID = $row['ID'];
            $STAFF = $row['STAFF']; 
            $RFROM = $row['RFROM']; 
            $RDATE = $row['RDATE'];
            $EDETAILS = $row['EDETAILS'];

            // create an assoicative array(key:value) to results
            $results[] = array( 
                                'ID' => $ID, 
                                'STAFF' => $STAFF, 
                                'RFROM' => $RFROM, 
                                'RDATE' => $RDATE,
                                'EDETAILS' => $EDETAILS,
                            );
        }

    $json_results = json_encode($results);
    echo $json_results;
}

function GetBorrows ()
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM borrows";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            // $borrows_table = "CREATE TABLE IF NOT EXISTS borrows (ID TEXT PRIMARY KEY,BTO TEXT,BDATE TEXT,STAFF TEXT,BDETAILS TEXT)"; 

            $ID = $row['ID'];
            $STAFF = $row['STAFF']; 
            $BTO = $row['BTO']; 
            $BDATE = $row['BDATE'];
            $BDETAILS = $row['BDETAILS'];

            // create an assoicative array(key:value) to results
            $results[] = array( 
                                'ID' => $ID, 
                                'STAFF' => $STAFF, 
                                'RFROM' => $BTO, 
                                'RDATE' => $BDATE,
                                'EDETAILS' => $BDETAILS,
                            );
        }

    $json_results = json_encode($results);
    echo $json_results;
}

function GetPayments ()
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM payments";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            // $payments_table = "CREATE TABLE IF NOT EXISTS payments (ID TEXT PRIMARY KEY,STAFF TEXT,PNAME TEXT,PEVENT TEXT,PAMOUNT TEXT,PDETA TEXT)"; 

            $ID = $row['ID'];
            $STAFF = $row['STAFF']; 
            $PNAME = $row['PNAME']; 
            $PEVENT = $row['PEVENT'];
            $PAMOUNT = $row['PAMOUNT'];
            $PDETA = $row['PDETA'];

            // create an assoicative array(key:value) to results
            $results[] = array( 
                                'ID' => $ID, 
                                'STAFF' => $STAFF, 
                                'PNAME' => $PNAME, 
                                'PEVENT' => $PEVENT,
                                'PAMOUNT' => $PAMOUNT,
                                'PDETA' => $PDETA,
                            );
        }

    $json_results = json_encode($results);
    echo $json_results;
}

function GetInstruments ()
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM instruments";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {

            $ID = $row['ID'];
            $STAFF = $row['STAFF']; 
            $INAME = $row['INAME']; 
            $ISUPLLIER = $row['ISUPLLIER'];
            $IQUANTITY  = $row['IQUANTITY '];
            $COST  = $row['COST '];
            $IDETA = $row['IDETA'];


            // create an assoicative array(key:value) to results
            $results[] = array( 
                                'ID' => $ID, 
                                'STAFF' => $STAFF, 
                                'INAME' => $INAME, 
                                'ISUPLLIER' => $ISUPLLIER,
                                'PAMOUNT' => $IQUANTITY,
                                'COST'  => $COST,
                                'IDETA' => $IDETA,
                            );
        }
    $json_results = json_encode($results);
    echo $json_results;
}



function SignIn_User($username, $upassword)
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM managers WHERE USERNAME = '$username' AND UPASSWORD = '$upassword' ";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            $status = "Success";
            $USERNAME = $row['USERNAME']; 
            $CONTACTS = $row['CONTACTS'];
            $TYPE = 'Staff';
            $results[] = array($status, $USERNAME,$CONTACTS,$TYPE);
        }

    $json_results = json_encode($results);
    echo $json_results;
}

function SignIn_Admin($username, $upassword)
{
    $AdminUserName = "Admin";
    $AdminPassword = "Admin@2022";
    $results = array();

    if ( $username == $AdminUserName && $upassword == $AdminPassword)
    {
        $status = "AdminSuccess";
        $USERNAME = $AdminUserName; 
        $results[] = array($status, $USERNAME);

        $json_results = json_encode($results);
        echo $json_results;
    }
    else {echo json_encode($results);}
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
function AdminDelete_User ($id)
{
    global $db;
    $delete_cmd = "DELETE FROM managers WHERE ID = '$id'";
    $delete_excution = $db->exec($delete_cmd);
    if (!$delete_excution) 
    {
        echo $db->lastErrorMsg();
        exit();
    }
}

function AdminDelete_Events ($id)
{
    global $db;
    $delete_cmd = "DELETE FROM events WHERE ID = '$id'";
    $delete_excution = $db->exec($delete_cmd);
    if (!$delete_excution) 
    {
        echo $db->lastErrorMsg();
        exit();
    }
}

function AdminDelete_Returns ($id)
{
    global $db;
    $delete_cmd = "DELETE FROM returnss WHERE ID = '$id'";
    $delete_excution = $db->exec($delete_cmd);
    if (!$delete_excution) 
    {
        echo $db->lastErrorMsg();
        exit();
    }
}
function AdminDelete_Borrows ($id)
{
    global $db;
    $delete_cmd = "DELETE FROM borrows WHERE ID = '$id'";
    $delete_excution = $db->exec($delete_cmd);
    if (!$delete_excution) 
    {
        echo $db->lastErrorMsg();
        exit();
    }
}
function AdminDelete_Payments ($id)
{
    global $db;
    $delete_cmd = "DELETE FROM payments WHERE ID = '$id'";
    $delete_excution = $db->exec($delete_cmd);
    if (!$delete_excution) 
    {
        echo $db->lastErrorMsg();
        exit();
    }
}
function AdminDelete_Instruments ($id)
{
    global $db;
    $delete_cmd = "DELETE FROM instruments WHERE ID = '$id'";
    $delete_excution = $db->exec($delete_cmd);
    if (!$delete_excution) 
    {
        echo $db->lastErrorMsg();
        exit();
    }
}




// Create Tables
// CreateDataBaseTables ();
// SetDatabasePermissions ();

?>