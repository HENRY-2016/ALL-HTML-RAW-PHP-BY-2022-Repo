
<?php

$db_path = 'database/database.db';
$db = new SQLite3($db_path);
if (!$db) {echo $db->lastErrorMsg();}
// else {echo "Opened Data Base Successfully\n";}


function CreateDataBaseTables ()
{
    global $db;

    $messages_table = "CREATE TABLE IF NOT EXISTS messages (ID TEXT PRIMARY KEY,CUSTOMERNAME TEXT, CONTACTS TEXT,ITEMTYPE TEXT, MESSAGES TEXT, DATEE TEXT,RESPONSE TEXT)"; 
    $users_table = "CREATE TABLE IF NOT EXISTS users (USERNAME TEXT PRIMARY KEY,CONTACTS TEXT, UPASSWORD TEXT)"; 

    $tables = array(
                        $messages_table,
                        $users_table, 
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


function InsertInto_Users($username,$contacts, $upassword)
{
    global $db;
    $insert_cmd = "INSERT INTO users VALUES ('$username','$contacts', '$upassword')";
    $insert_excution = $db->exec($insert_cmd);
    if (!$insert_excution) 
    {
        echo $db->lastErrorMsg();
    }
    $db->close();
}

function SignIn_User($username, $upassword)
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM users WHERE USERNAME = '$username' AND UPASSWORD = '$upassword' ";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            $status = "Success";
            $USERNAME = $row['USERNAME']; 
            $CONTACTS = $row['CONTACTS'];

            $results[] = array($status, $USERNAME,$CONTACTS);
        }

    $json_results = json_encode($results);
    echo $json_results;
}

// SignIn_User('man1s', '2022');



function InsertInto_Messages($id, $customername, $contacts, $itemtype, $messages, $datee,$response)
{
    global $db;
    global $db_error;
    $insert_cmd = "INSERT INTO messages VALUES ('$id', '$customername', '$contacts','$itemtype', '$messages', '$datee','$response')";
    $insert_excution = $db->exec($insert_cmd);
    if (!$insert_excution) 
    {
        $db_error['message'] = "Data Base <br>Error<br>". $db->lastErrorMsg();
        echo json_encode($db_error);
        exit();
    }
    $db->close();
}



function ReadUserMessage($username, $itemname)
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM messages WHERE CUSTOMERNAME = '$username' AND ITEMTYPE = '$itemname' ";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            // $USERNAME = $row['CUSTOMERNAME']; 
            $MESSAGES = $row['MESSAGES'];
            $DATEE  = $row['DATEE'];
            $RESPONSE = $row['RESPONSE'];

            // create alist of lists
            $results[] = array($MESSAGES,$DATEE,$RESPONSE);
        }

    $json_results = json_encode($results);
    echo $json_results;
}











// Create Tables
// CreateDataBaseTables ();
// SetDatabasePermissions ();



?>