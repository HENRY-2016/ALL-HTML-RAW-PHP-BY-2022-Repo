
<?php

$db_path = 'database/database.db';
$db = new SQLite3($db_path);
if (!$db) {echo $db->lastErrorMsg();}


function CreateDataBaseTables ()
{
    global $db;

    $students_table = "CREATE TABLE IF NOT EXISTS students (ID TEXT PRIMARY KEY,FNAME TEXT,LNAME TEXT,SCLASS TEXT,USERNAME TEXT,SPASSWORD TEXT)"; 
    $orders_table = "CREATE TABLE IF NOT EXISTS orders (ID TEXT PRIMARY KEY,SNAME TEXT,SDAY TEXT,SSERVICE TEXT)"; 

    $tables = array(
                        $students_table,
                        $orders_table,
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




// =================================================================================
// =================================================================================
// =================================================================================
//                  Writting to 
// =================================================================================
// =================================================================================
// =================================================================================

function InsertInto_students($id,$fname,$sname,$class,$susername,$spassword)
{
    global $db;
    global $db_error;
    $insert_cmd = "INSERT INTO students VALUES ('$id','$fname','$sname','$class','$susername','$spassword')";
    $insert_excution = $db->exec($insert_cmd);
    if (!$insert_excution) 
    {
        echo $db->lastErrorMsg();
        exit();
    }
    $db->close();
}

function InsertInto_Orders($id,$sname,$sday,$sservice)
{
    global $db;
    global $db_error;
    $insert_cmd = "INSERT INTO orders VALUES ('$id','$sname','$sday','$sservice')";
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
function GetAdminOrders ()
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM orders";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            $ID = $row['ID'];
            $SNAME = $row['SNAME']; 
            $SDAY = $row['SDAY'];
            $SSERVICE = $row['SSERVICE'];


            // create an assoicative array(key:value) to results
            $results[] = array( 
                                'ID' => $ID,
                                'SNAME' => $SNAME, 
                                'SDAY' => $SDAY,
                                'SSERVICE' => $SSERVICE,
                            );
        }

    $json_results = json_encode($results);
    echo $json_results;
}

function GetAdminStudents ()
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM students";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
    // $students_table = "CREATE TABLE IF NOT EXISTS students (ID TEXT PRIMARY KEY,FNAME TEXT,LNAME TEXT,SCLASS TEXT,USERNAME TEXT,SPASSWORD TEXT)"; 

            $ID = $row['ID'];
            $FNAME = $row['FNAME']; 
            $LNAME = $row['LNAME']; 
            $SCLASS = $row['SCLASS'];
            $USERNAME = $row['USERNAME'];
            $SPASSWORD = $row['SPASSWORD'];


            // create an assoicative array(key:value) to results
            $results[] = array( 
                                'ID' => $ID,
                                'FNAME' => $FNAME,
                                'LNAME' => $LNAME,
                                'SCLASS' => $SCLASS,
                                'USERNAME' => $USERNAME,
                                'SPASSWORD' => $SPASSWORD, 
                            );
        }

    $json_results = json_encode($results);
    echo $json_results;
}
function GetOrders ($name)
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM orders WHERE SNAME == '$name'";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            // $orders_table = "CREATE TABLE IF NOT EXISTS orders (ID TEXT PRIMARY KEY,SNAME TEXT,SDAY TEXT,SSERVICE TEXT)"; 

            $ID = $row['ID'];
            $SNAME = $row['SNAME']; 
            $SDAY = $row['SDAY'];
            $SSERVICE = $row['SSERVICE'];


            // create an assoicative array(key:value) to results
            $results[] = array( 
                                'ID' => $ID,
                                'SNAME' => $SNAME, 
                                'SDAY' => $SDAY,
                                'SSERVICE' => $SSERVICE,
                            );
        }

    $json_results = json_encode($results);
    echo $json_results;
}



function SignIn_User($username)
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM students WHERE USERNAME = '$username'";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
    // $students_table = "CREATE TABLE IF NOT EXISTS students (ID TEXT PRIMARY KEY,FNAME TEXT,LNAME TEXT,SCLASS TEXT,USERNAME TEXT,SPASSWORD TEXT)"; 

            $status = "Success";
            $USERNAME = $row['USERNAME']; 
            $FNAME = $row['FNAME'];
            $LNAME = $row['LNAME'];
            $student_name = $FNAME ." ". $LNAME;
            $results[] = array($status, $USERNAME,$student_name);
        }

    $json_results = json_encode($results);
    echo $json_results;
}



function SignIn_Admin($username, $upassword)
{
    $AdminUserName = "Admin";
    $AdminPassword = "2022";
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
function AdminDelete_Orders ($id)
{
    global $db;
    $delete_cmd = "DELETE FROM orders WHERE ID = '$id'";
    $delete_excution = $db->exec($delete_cmd);
    if (!$delete_excution) 
    {
        echo $db->lastErrorMsg();
        exit();
    }
}
function AdminDelete_Students ($id)
{
    global $db;
    $delete_cmd = "DELETE FROM students WHERE ID = '$id'";
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