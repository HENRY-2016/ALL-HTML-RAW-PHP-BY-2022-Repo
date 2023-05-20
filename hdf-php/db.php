
<?php

$db_path = 'data_base/hdf.db';
$db = new SQLite3($db_path);
if (!$db) {echo $db->lastErrorMsg();}
// else {echo "Opened Data Base Successfully\n";}


function CreateDataBaseTables ()
{
    global $db;
    // Tables definition
    // logos >> african villages >> african animals
    $boxes_table = "CREATE TABLE IF NOT EXISTS boxes (ID TEXT,HNAME TEXT,HDESCRIPTION TEXT)"; 
    $logos_table = "CREATE TABLE IF NOT EXISTS logos (ID TEXT,HNAME TEXT,HDESCRIPTION TEXT)"; 

    $maps_table= "CREATE TABLE IF NOT EXISTS maps (ID TEXT,HNAME TEXT,HDESCRIPTION TEXT)"; 
    $last_supper_table= "CREATE TABLE IF NOT EXISTS last_supper (ID TEXT,HNAME TEXT,HDESCRIPTION TEXT)"; 
    $statues_people_table= "CREATE TABLE IF NOT EXISTS statues_people (ID TEXT,HNAME TEXT,HDESCRIPTION TEXT)";
    $statues_animals_table= "CREATE TABLE IF NOT EXISTS statues_animals (ID TEXT,HNAME TEXT,HDESCRIPTION TEXT)";
    $tables_round_table= "CREATE TABLE IF NOT EXISTS tables_round (ID TEXT,HNAME TEXT,HDESCRIPTION TEXT)"; 
    $tables_square_table= "CREATE TABLE IF NOT EXISTS tables_square (ID TEXT,HNAME TEXT,HDESCRIPTION TEXT)"; 
    $tables_dainning_table= "CREATE TABLE IF NOT EXISTS tables_dainning (ID TEXT,HNAME TEXT,HDESCRIPTION TEXT)"; 
    $doors_plain_table ="CREATE TABLE IF NOT EXISTS doors_plain (ID TEXT,HNAME TEXT,HDESCRIPTION TEXT)";	
    $doors_design_table ="CREATE TABLE IF NOT EXISTS doors_design (ID TEXT,HNAME TEXT,HDESCRIPTION TEXT)";	
    $trofhies_table ="CREATE TABLE IF NOT EXISTS trofhies (ID TEXT,HNAME TEXT,HDESCRIPTION TEXT)";	




    
    $wall_hangings_table="CREATE TABLE IF NOT EXISTS wall_hangings (ID TEXT,HNAME TEXT,HDESCRIPTION TEXT)";
    $chairs_table="CREATE TABLE IF NOT EXISTS chairs (ID TEXT,HNAME TEXT,HDESCRIPTION TEXT)";
    
    $lamp_holders_table= "CREATE TABLE IF NOT EXISTS lamp_holders (ID TEXT,HNAME TEXT,HDESCRIPTION TEXT)";
    
    $walking_sticks_table= "CREATE TABLE IF NOT EXISTS walking_sticks (ID TEXT,HNAME TEXT,HDESCRIPTION TEXT)";
    $cups_table= "CREATE TABLE IF NOT EXISTS cups (ID TEXT,HNAME TEXT,HDESCRIPTION TEXT)";
    $ash_treys_table= "CREATE TABLE IF NOT EXISTS ash_treys (ID TEXT,HNAME TEXT,HDESCRIPTION TEXT)";

    // maps, statues_people, statues_animals, last_supper
    // tables_round, tables_square, tables_dainning
    // doors_plain, doors_design
    // trofhies
    $tables = array(
                        $boxes_table,
                        $logos_table, 

                        $maps_table, 
                        $last_supper_table, 
                        $statues_people_table,
                        $statues_animals_table,
                        $tables_round_table, 
                        $tables_square_table, 
                        $tables_dainning_table, 
                        $doors_plain_table,	
                        $doors_design_table,
                        $trofhies_table,	


                    
                        $wall_hangings_table,
                        $chairs_table,
                        $cups_table,
                        
                        $lamp_holders_table,
                        $ash_treys_table,
                        $walking_sticks_table
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
    $permissions1 = shell_exec('chmod -R +777 data_base');
    $permissions2 = shell_exec('chmod -R +777 data_base/hdf.db');
    echo "<pre>$permissions1</pre>\n\n"; echo "Permissions Given To data_base Dir\n\n";
    echo "<pre>$permissions2</pre>\n\n"; echo "Permissions Given To hdf.db\n\n";
}



/** 
 *          ==============
 *          WRITTING TO DB
 *          ==============
*/
$db_error = array();
function InsertInto_Boxes($id ,$name ,$description)
{
    // inserts into a table name
    // and returns an arrary of error key value
    global $db;
    global $db_error;
    $insert_cmd = "INSERT INTO boxes VALUES ('$id', '$name', '$description')";
    $insert_excution = $db->exec($insert_cmd);
    if (!$insert_excution) 
    {
        $db_error['message'] = "Data Base <br>Error<br>". $db->lastErrorMsg();
        echo json_encode($db_error);
        exit();
    }
    $db->close();
}
function InsertInto_Logos($id ,$name ,$description)
{
    // inserts into a table name
    // and returns an arrary of error key value
    global $db;
    global $db_error;
    $insert_cmd = "INSERT INTO logos VALUES ('$id', '$name', '$description')";
    $insert_excution = $db->exec($insert_cmd);
    if (!$insert_excution) 
    {
        $db_error['message'] = "Data Base <br>Error<br>". $db->lastErrorMsg();
        echo json_encode($db_error);
        exit();
    }
    $db->close();
}
function InsertInto_Maps($id ,$name ,$description)
{
    global $db;
    global $db_error;
    $insert_cmd = "INSERT INTO maps VALUES ('$id', '$name', '$description')";
    $insert_excution = $db->exec($insert_cmd);
    if (!$insert_excution) 
    {
        $db_error['message'] = "Data Base <br>Error<br>". $db->lastErrorMsg();
        echo json_encode($db_error);
        exit();
    }
    $db->close();
}

function InsertInto_Last_Supper($id ,$name ,$description)
{
    global $db;
    global $db_error;
    $insert_cmd = "INSERT INTO last_supper VALUES ('$id', '$name', '$description')";
    $insert_excution = $db->exec($insert_cmd);
    if (!$insert_excution) 
    {
        $db_error['message'] = "Data Base <br>Error<br>". $db->lastErrorMsg();
        echo json_encode($db_error);
        exit();
    }
    $db->close();
}

function InsertInto_Tables_Round($id ,$name ,$description)
{
    global $db;
    global $db_error;
    $insert_cmd = "INSERT INTO tables_round VALUES ('$id', '$name', '$description')";
    $insert_excution = $db->exec($insert_cmd);
    if (!$insert_excution) 
    {
        $db_error['message'] = "Data Base <br>Error<br>". $db->lastErrorMsg();
        echo json_encode($db_error);
        exit();
    }
    $db->close();
}
function InsertInto_Tables_Square($id ,$name ,$description)
{
    global $db;
    global $db_error;
    $insert_cmd = "INSERT INTO tables_square VALUES ('$id', '$name', '$description')";
    $insert_excution = $db->exec($insert_cmd);
    if (!$insert_excution) 
    {
        $db_error['message'] = "Data Base <br>Error<br>". $db->lastErrorMsg();
        echo json_encode($db_error);
        exit();
    }
    $db->close();
}
function InsertInto_Tables_Dainning($id ,$name ,$description)
{
    global $db;
    global $db_error;
    $insert_cmd = "INSERT INTO tables_dainning VALUES ('$id', '$name', '$description')";
    $insert_excution = $db->exec($insert_cmd);
    if (!$insert_excution) 
    {
        $db_error['message'] = "Data Base <br>Error<br>". $db->lastErrorMsg();
        echo json_encode($db_error);
        exit();
    }
    $db->close();
}


function InsertInto_WallHangings($id ,$name ,$description)
{
    global $db;
    global $db_error;
    $insert_cmd = "INSERT INTO wall_hangings VALUES ('$id', '$name', '$description')";
    $insert_excution = $db->exec($insert_cmd);
    if (!$insert_excution) 
    {
        $db_error['message'] = "Data Base <br>Error<br>". $db->lastErrorMsg();
        echo json_encode($db_error);
        exit();
    }
    $db->close();
}

function InsertInto_Chairs($id ,$name ,$description)
{
    global $db;
    global $db_error;
    $insert_cmd = "INSERT INTO chairs VALUES ('$id', '$name', '$description')";
    $insert_excution = $db->exec($insert_cmd);
    if (!$insert_excution) 
    {
        $db_error['message'] = "Data Base <br>Error<br>". $db->lastErrorMsg();
        echo json_encode($db_error);
        exit();
    }
    $db->close();
}

function InsertInto_Doors_Plain($id ,$name ,$description)
{
    global $db;
    global $db_error;
    $insert_cmd = "INSERT INTO doors_plain VALUES ('$id', '$name', '$description')";
    $insert_excution = $db->exec($insert_cmd);
    if (!$insert_excution) 
    {
        $db_error['message'] = "Data Base <br>Error<br>". $db->lastErrorMsg();
        echo json_encode($db_error);
        exit();
    }
    $db->close();
}
function InsertInto_Doors_Design($id ,$name ,$description)
{
    global $db;
    global $db_error;
    $insert_cmd = "INSERT INTO doors_design VALUES ('$id', '$name', '$description')";
    $insert_excution = $db->exec($insert_cmd);
    if (!$insert_excution) 
    {
        $db_error['message'] = "Data Base <br>Error<br>". $db->lastErrorMsg();
        echo json_encode($db_error);
        exit();
    }
    $db->close();
}
function InsertInto_Trofhies($id ,$name ,$description)
{
    global $db;
    global $db_error;
    $insert_cmd = "INSERT INTO trofhies VALUES ('$id', '$name', '$description')";
    $insert_excution = $db->exec($insert_cmd);
    if (!$insert_excution) 
    {
        $db_error['message'] = "Data Base <br>Error<br>". $db->lastErrorMsg();
        echo json_encode($db_error);
        exit();
    }
    $db->close();
}
function InsertInto_Statues_People($id ,$name ,$description)
{
    global $db;
    global $db_error;
    $insert_cmd = "INSERT INTO statues_people VALUES ('$id', '$name', '$description')";
    $insert_excution = $db->exec($insert_cmd);
    if (!$insert_excution) 
    {
        $db_error['message'] = "Data Base <br>Error<br>". $db->lastErrorMsg();
        echo json_encode($db_error);
        exit();
    }
    $db->close();
}
function InsertInto_Statues_Animals($id ,$name ,$description)
{
    global $db;
    global $db_error;
    $insert_cmd = "INSERT INTO statues_animals VALUES ('$id', '$name', '$description')";
    $insert_excution = $db->exec($insert_cmd);
    if (!$insert_excution) 
    {
        $db_error['message'] = "Data Base <br>Error<br>". $db->lastErrorMsg();
        echo json_encode($db_error);
        exit();
    }
    $db->close();
}
function InsertInto_LampHolders($id ,$name ,$description)
{
    global $db;
    global $db_error;
    $insert_cmd = "INSERT INTO lamp_holders VALUES ('$id', '$name', '$description')";
    $insert_excution = $db->exec($insert_cmd);
    if (!$insert_excution) 
    {
        $db_error['message'] = "Data Base <br>Error<br>". $db->lastErrorMsg();
        echo json_encode($db_error);
        exit();
    }
    $db->close();
}
function InsertInto_WalkingSticks($id ,$name ,$description)
{
    global $db;
    global $db_error;
    $insert_cmd = "INSERT INTO walking_sticks VALUES ('$id', '$name', '$description')";
    $insert_excution = $db->exec($insert_cmd);
    if (!$insert_excution) 
    {
        $db_error['message'] = "Data Base <br>Error<br>". $db->lastErrorMsg();
        echo json_encode($db_error);
        exit();
    }
    $db->close();
}
function InsertInto_Cups($id ,$name ,$description)
{
    global $db;
    global $db_error;
    $insert_cmd = "INSERT INTO cups VALUES ('$id', '$name', '$description')";
    $insert_excution = $db->exec($insert_cmd);
    if (!$insert_excution) 
    {
        $db_error['message'] = "Data Base <br>Error<br>". $db->lastErrorMsg();
        echo json_encode($db_error);
        exit();
    }
    $db->close();
}
function InsertInto_AshTreys($id ,$name ,$description)
{
    global $db;
    global $db_error;
    $insert_cmd = "INSERT INTO ash_treys VALUES ('$id', '$name', '$description')";
    $insert_excution = $db->exec($insert_cmd);
    if (!$insert_excution) 
    {
        $db_error['message'] = "Data Base <br>Error<br>". $db->lastErrorMsg();
        echo json_encode($db_error);
        exit();
    }
    $db->close();
}

// All Insert functions
// InsertInto_Boxes($id,$img_name ,$description);
// InsertInto_Logos($id,$img_name ,$description);
// InsertInto_Maps($id,$img_name,$description);
// InsertInto_last_supper($id,$img_name,$description);
// InsertInto_Tables($id ,$img_name ,$description);
// InsertInto_TablesAfricanVilages($id ,$img_name ,$description);
// InsertInto_TablesAfricanAnimals($id ,$img_name ,$description);
// InsertInto_WallHangings($id ,$img_name ,$description);
// InsertInto_WallHangingsAfricanVilages ($id ,$img_name ,$description);
// InsertInto_WallHangingsAfricanAnimals($id ,$img_name ,$description);
// InsertInto_Chairs($id ,$img_name ,$description);
// InsertInto_ChairsAfricanVilages ($id ,$img_name ,$description);
// InsertInto_ChairsAfricanAnimals($id ,$img_name ,$description);
// InsertInto_Doors($id ,$img_name ,$description);
// InsertInto_Statues_People($id ,$img_name ,$description);
// InsertInto_LampHolders($id ,$img_name ,$description);
// InsertInto_WalkingSticks($id ,$img_name ,$description);
// InsertInto_Cups($id ,$img_name ,$description);
// InsertInto_AshTreys($id ,  $img_name , $description);


/** 
 * @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
 * @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
 *              ================
 *              READING FROM DB
 *              ================
 * @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
 * @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
 *  
*/
function View_last_supper_Names ()
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM last_supper";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            $NAMES = $row['HNAME'];
            $results[] = $NAMES;
        }
    $json_results = json_encode($results);
    echo $json_results;
}
function View_African_Village_Names ()
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM maps";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            $NAMES = $row['HNAME'];
            $results[] = $NAMES;
        }
    $json_results = json_encode($results);
    echo $json_results;
}
function View_Ash_Trey_Names ()
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM ash_treys";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            $NAMES = $row['HNAME'];
            $results[] = $NAMES;
        }
    $json_results = json_encode($results);
    echo $json_results;
}

function View_Maps_Names ()
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM maps";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            $NAMES = $row['HNAME'];
            $results[] = $NAMES;
        }
    $json_results = json_encode($results);
    echo $json_results;
}
function View_Boxes_Names ()
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM boxes";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            $NAMES = $row['HNAME'];
            $results[] = $NAMES;
        }
    $json_results = json_encode($results);
    echo $json_results;
}
function View_Chairs_Names ()
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM chairs";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            $NAMES = $row['HNAME'];
            $results[] = $NAMES;
        }
    $json_results = json_encode($results);
    echo $json_results;
}
function View_Cups_Names ()
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM cups";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            $NAMES = $row['HNAME'];
            $results[] = $NAMES;
        }
    $json_results = json_encode($results);
    echo $json_results;
}
function View_Doors_Plain_Names ()
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM doors_plain";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            $NAMES = $row['HNAME'];
            $results[] = $NAMES;
        }
    $json_results = json_encode($results);
    echo $json_results;
}
function View_Doors_Design_Names ()
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM doors_design";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            $NAMES = $row['HNAME'];
            $results[] = $NAMES;
        }
    $json_results = json_encode($results);
    echo $json_results;
}
function View_Trofhies_Names ()
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM trofhies";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            $NAMES = $row['HNAME'];
            $results[] = $NAMES;
        }
    $json_results = json_encode($results);
    echo $json_results;
}
function View_Lamp_Holders_Names ()
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM lamp_holders";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            $NAMES = $row['HNAME'];
            $results[] = $NAMES;
        }
    $json_results = json_encode($results);
    echo $json_results;
}
function View_Logos_Names ()
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM logos";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            $NAMES = $row['HNAME'];
            $results[] = $NAMES;
        }
    $json_results = json_encode($results);
    echo $json_results;
}
function View_Statue_People_Names ()
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM statues_people";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            $NAMES = $row['HNAME'];
            $results[] = $NAMES;
        }
    $json_results = json_encode($results);
    echo $json_results;
}
function View_Statue_Animals_Names ()
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM statues_Animals";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            $NAMES = $row['HNAME'];
            $results[] = $NAMES;
        }
    $json_results = json_encode($results);
    echo $json_results;
}

function View_Tables_Round_Names ()
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM tables_round";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            $NAMES = $row['HNAME'];
            $results[] = $NAMES;
        }
    $json_results = json_encode($results);
    echo $json_results;
}
function View_Tables_Square_Names ()
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM tables_square";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            $NAMES = $row['HNAME'];
            $results[] = $NAMES;
        }
    $json_results = json_encode($results);
    echo $json_results;
}

function View_Tables_Dainning_Names ()
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM tables_dainning";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            $NAMES = $row['HNAME'];
            $results[] = $NAMES;
        }
    $json_results = json_encode($results);
    echo $json_results;
}
function View_Walking_Sticks_Names ()
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM walking_sticks";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            $NAMES = $row['HNAME'];
            $results[] = $NAMES;
        }
    $json_results = json_encode($results);
    echo $json_results;
}

function View_Wall_Hanging_Names ()
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM wall_hangings";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            $NAMES = $row['HNAME'];
            $results[] = $NAMES;
        }
    $json_results = json_encode($results);
    echo $json_results;
}




function AdminViewItemNames_BoxesLogos ()
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM logos";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            $ID = $row['ID'];
            $HNAME = $row['HNAME']; 
            $results[] = array( $ID, $HNAME);
        }
    $json_results = json_encode($results);
    echo $json_results;
}

function AdminViewItemNames_BoxesAfricanVilages ()
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM maps";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            $ID = $row['ID'];
            $HNAME = $row['HNAME']; 
            $results[] = array( $ID, $HNAME);
        }
    $json_results = json_encode($results);
    echo $json_results;
}
function AdminViewItemNames_BoxesAfricanAnimals ()
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM last_supper";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            $ID = $row['ID'];
            $HNAME = $row['HNAME']; 
            $results[] = array( $ID, $HNAME);
        }
    $json_results = json_encode($results);
    echo $json_results;
}

// function AdminViewItemNames_TablesLogos ()
// {
//     global $db;
//     $results = array();
//     $select_cmd = "SELECT * FROM tables";
//     $query_cmd = $db->query($select_cmd);
//     while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
//         {
//             $ID = $row['ID'];
//             $HNAME = $row['HNAME']; 
//             $results[] = array( $ID, $HNAME);
//         }
//     $json_results = json_encode($results);
//     echo $json_results;
// }
// function AdminViewItemNames_TablesAfricanVilages ()
// {
//     global $db;
//     $results = array();
//     $select_cmd = "SELECT * FROM tables_maps";
//     $query_cmd = $db->query($select_cmd);
//     while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
//         {
//             $ID = $row['ID'];
//             $HNAME = $row['HNAME']; 
//             $results[] = array( $ID, $HNAME);
//         }
//     $json_results = json_encode($results);
//     echo $json_results;
// }
// function AdminViewItemNames_ ()
// {
//     global $db;
//     $results = array();
//     $select_cmd = "SELECT * FROM tables_last_supper";
//     $query_cmd = $db->query($select_cmd);
//     while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
//         {
//             $ID = $row['ID'];
//             $HNAME = $row['HNAME']; 
//             $results[] = array( $ID, $HNAME);
//         }
//     $json_results = json_encode($results);
//     echo $json_results;
// }
function AdminViewItemNames_WallHangingsLogos ()
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM wall_hangings";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            $ID = $row['ID'];
            $HNAME = $row['HNAME']; 
            $results[] = array( $ID, $HNAME);
        }
    $json_results = json_encode($results);
    echo $json_results;
}
function AdminViewItemNames_WallHangingsAfricanVilages ()
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM wall_hangings_maps";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            $ID = $row['ID'];
            $HNAME = $row['HNAME']; 
            $results[] = array( $ID, $HNAME);
        }
    $json_results = json_encode($results);
    echo $json_results;
}
function AdminViewItemNames_WallHangingsAfricanAnimals ()
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM wall_hangings_last_supper";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            $ID = $row['ID'];
            $HNAME = $row['HNAME']; 
            $results[] = array( $ID, $HNAME);
        }
    $json_results = json_encode($results);
    echo $json_results;
}
function AdminViewItemNames_ChairsLogos ()
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM chairs";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            $ID = $row['ID'];
            $HNAME = $row['HNAME']; 
            $results[] = array( $ID, $HNAME);
        }
    $json_results = json_encode($results);
    echo $json_results;
}
function AdminViewItemNames_ChairsAfricanVilages ()
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM chairs_maps";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            $ID = $row['ID'];
            $HNAME = $row['HNAME']; 
            $results[] = array( $ID, $HNAME);
        }
    $json_results = json_encode($results);
    echo $json_results;
}
function AdminViewItemNames_ChairsAfricanAnimals ()
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM chairs_last_supper";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            $ID = $row['ID'];
            $HNAME = $row['HNAME']; 
            $results[] = array( $ID, $HNAME);
        }
    $json_results = json_encode($results);
    echo $json_results;
}
function AdminViewItemNames_Doors ()
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM doors";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            $ID = $row['ID'];
            $HNAME = $row['HNAME']; 
            $results[] = array( $ID, $HNAME);
        }
    $json_results = json_encode($results);
    echo $json_results;
}

function AdminViewItemNames_LampHolders ()
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM lamp_holders";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            $ID = $row['ID'];
            $HNAME = $row['HNAME']; 
            $results[] = array( $ID, $HNAME);
        }
    $json_results = json_encode($results);
    echo $json_results;
}
function AdminViewItemNames_WalkingSticks ()
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM walking_sticks";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            $ID = $row['ID'];
            $HNAME = $row['HNAME']; 
            $results[] = array( $ID, $HNAME);
        }
    $json_results = json_encode($results);
    echo $json_results;
}
function AdminViewItemNames_Cups ()
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM cups";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            $ID = $row['ID'];
            $HNAME = $row['HNAME']; 
            $results[] = array( $ID, $HNAME);
        }
    $json_results = json_encode($results);
    echo $json_results;
}
function AdminViewItemNames_AshTreys ()
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM ash_treys";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            $ID = $row['ID'];
            $HNAME = $row['HNAME']; 
            $results[] = array( $ID, $HNAME);
        }
    $json_results = json_encode($results);
    echo $json_results;
}

///////////////////////////////////////
// AdminViewItemNames_BoxesLogos ();
// AdminViewItemNames_BoxesAfricanVilages ();
// AdminViewItemNames_BoxesAfricanAnimals ();

// AdminViewItemNames_TablesLogos ();
// AdminViewItemNames_TablesAfricanVilages ();
// AdminViewItemNames_TablesAfricanAnimals ();

// AdminViewItemNames_WallHangingsLogos ();
// AdminViewItemNames_WallHangingsAfricanVilages ();
// AdminViewItemNames_WallHangingsAfricanAnimals ();

// AdminViewItemNames_ChairsLogos ();
// AdminViewItemNames_ChairsAfricanVilages ();
// AdminViewItemNames_ChairsAfricanAnimals ();

// AdminViewItemNames_Doors ();
// AdminViewItemNames_Statues ();
// AdminViewItemNames_LampHolders ();
// AdminViewItemNames_WalkingSticks ();
// AdminViewItemNames_Cups ();
// AdminViewItemNames_AshTreys ();






// function AdminViewItemNameToUpdate($id) 
// {
//     global $db;
//     $results = array();
//     $select_cmd = "SELECT * FROM logos WHERE ID = '$id'";
//     $query_cmd = $db->query($select_cmd);
//     while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
//         {
//             $HNAME = $row['HNAME']; 
//             $results[] = array( $HNAME);
//         }
//     $json_results = json_encode($results);
//     echo $json_results;
    
// }



function AdminViewItemNameToUpdate_BoxesLogos ($id)
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM logos WHERE ID = '$id'";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            $HNAME = $row['HNAME']; 
            $results[] = array( $HNAME);
        }
    $json_results = json_encode($results);
    echo $json_results;
}

function AdminViewItemNameToUpdate_BoxesAfricanVilages ($id)
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM maps WHERE ID = '$id'";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            $HNAME = $row['HNAME']; 
            $results[] = array( $HNAME);
        }
    $json_results = json_encode($results);
    echo $json_results;
}
function AdminViewItemNameToUpdate_BoxesAfricanAnimals ($id)
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM last_supper WHERE ID = '$id'";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            $HNAME = $row['HNAME']; 
            $results[] = array( $HNAME);
        }
    $json_results = json_encode($results);
    echo $json_results;
}
function AdminViewItemNameToUpdate_TablesLogos ($id)
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM tables WHERE ID = '$id'";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            $HNAME = $row['HNAME']; 
            $results[] = array( $HNAME);
        }
    $json_results = json_encode($results);
    echo $json_results;
}
function AdminViewItemNameToUpdate_TablesAfricanVilages ($id)
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM tables_maps WHERE ID = '$id'";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            $HNAME = $row['HNAME']; 
            $results[] = array( $HNAME);
        }
    $json_results = json_encode($results);
    echo $json_results;
}
function AdminViewItemNameToUpdate_TablesAfricanAnimals ($id)
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM tables_last_supper WHERE ID = '$id'";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            $HNAME = $row['HNAME']; 
            $results[] = array( $HNAME);
        }
    $json_results = json_encode($results);
    echo $json_results;
}
function AdminViewItemNameToUpdate_WallHangingsLogos ($id)
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM wall_hangings WHERE ID = '$id'";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            $HNAME = $row['HNAME']; 
            $results[] = array( $HNAME);
        }
    $json_results = json_encode($results);
    echo $json_results;
}
function AdminViewItemNameToUpdate_WallHangingsAfricanVilages ($id)
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM wall_hangings_maps WHERE ID = '$id'";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            $HNAME = $row['HNAME']; 
            $results[] = array( $HNAME);
        }
    $json_results = json_encode($results);
    echo $json_results;
}
function AdminViewItemNameToUpdate_WallHangingsAfricanAnimals ($id)
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM wall_hangings_last_supper WHERE ID = '$id'";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            $HNAME = $row['HNAME']; 
            $results[] = array( $HNAME);
        }
    $json_results = json_encode($results);
    echo $json_results;
}
function AdminViewItemNameToUpdate_ChairsLogos ($id)
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM chairs WHERE ID = '$id'";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            $HNAME = $row['HNAME']; 
            $results[] = array( $HNAME);
        }
    $json_results = json_encode($results);
    echo $json_results;
}
function AdminViewItemNameToUpdate_ChairsAfricanVilages ($id)
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM chairs_maps WHERE ID = '$id'";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            $HNAME = $row['HNAME']; 
            $results[] = array( $HNAME);
        }
    $json_results = json_encode($results);
    echo $json_results;
}
function AdminViewItemNameToUpdate_ChairsAfricanAnimals ($id)
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM chairs_last_supper WHERE ID = '$id'";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            $HNAME = $row['HNAME']; 
            $results[] = array( $HNAME);
        }
    $json_results = json_encode($results);
    echo $json_results;
}
function AdminViewItemNameToUpdate_Doors ($id)
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM doors WHERE ID = '$id'";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            $HNAME = $row['HNAME']; 
            $results[] = array( $HNAME);
        }
    $json_results = json_encode($results);
    echo $json_results;
}
function AdminViewItemNameToUpdate_Statues ($id)
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM statues_animals WHERE ID = '$id'";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            $HNAME = $row['HNAME']; 
            $results[] = array( $HNAME);
        }
    $json_results = json_encode($results);
    echo $json_results;
}
function AdminViewItemNameToUpdate_LampHolders ($id)
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM lamp_holders WHERE ID = '$id'";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            $HNAME = $row['HNAME']; 
            $results[] = array( $HNAME);
        }
    $json_results = json_encode($results);
    echo $json_results;
}
function AdminViewItemNameToUpdate_WalkingSticks ($id)
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM walking_sticks WHERE ID = '$id'";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            $HNAME = $row['HNAME']; 
            $results[] = array( $HNAME);
        }
    $json_results = json_encode($results);
    echo $json_results;
}
function AdminViewItemNameToUpdate_Cups ($id)
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM cups WHERE ID = '$id'";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            $HNAME = $row['HNAME']; 
            $results[] = array( $HNAME);
        }
    $json_results = json_encode($results);
    echo $json_results;
}
function AdminViewItemNameToUpdate_AshTreys ($id)
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM ash_treys WHERE ID = '$id'";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            $HNAME = $row['HNAME']; 
            $results[] = array( $HNAME);
        }
    $json_results = json_encode($results);
    echo $json_results;
}


///////////////////////////////////////
// AdminViewItemNameToUpdate_BoxesLogos ($id);
// AdminViewItemNameToUpdate_BoxesAfricanVilages ($id);
// AdminViewItemNameToUpdate_BoxesAfricanAnimals ($id);

// AdminViewItemNameToUpdate_TablesLogos ($id);
// AdminViewItemNameToUpdate_TablesAfricanVilages ($id);
// AdminViewItemNameToUpdate_TablesAfricanAnimals ($id);

// AdminViewItemNameToUpdate_WallHangingsLogos ($id);
// AdminViewItemNameToUpdate_WallHangingsAfricanVilages ($id);
// AdminViewItemNameToUpdate_WallHangingsAfricanAnimals ($id);

// AdminViewItemNameToUpdate_ChairsLogos ($id);
// AdminViewItemNameToUpdate_ChairsAfricanVilages ($id);
// AdminViewItemNameToUpdate_ChairsAfricanAnimals ($id);

// AdminViewItemNameToUpdate_Doors ($id);
// AdminViewItemNameToUpdate_Statues ($id);
// AdminViewItemNameToUpdate_LampHolders ($id);
// AdminViewItemNameToUpdate_WalkingSticks ($id);
// AdminViewItemNameToUpdate_Cups ($id);
// AdminViewItemNameToUpdate_AshTreys ($id);



/** 
 * @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
 * @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
 *              ================
 *              UPDATING FROM DB
 *              ================
 * @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
 * @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
 *  
*/
function AdminUpdateItem_BoxesLogos ($oldname,$newname)
{
    global $db;
    global $db_error;
    $update_cmd = "UPDATE logos SET HNAME = '$newname' WHERE HNAME= '$oldname'";
    $update_query_cmd = $db->query($update_cmd);
    if (!$update_query_cmd) 
    {
        $db_error['message'] = "Data Base <br>Error<br>". $db->lastErrorMsg();
        echo json_encode($db_error);
        exit();
    }
}
function AdminUpdateItem_BoxesAfricanVilages ($oldname,$newname)
{
    global $db;
    global $db_error;
    $update_cmd = "UPDATE maps SET HNAME = '$newname' WHERE HNAME= '$oldname'";
    $update_query_cmd = $db->query($update_cmd);
    if (!$update_query_cmd) 
    {
        $db_error['message'] = "Data Base <br>Error<br>". $db->lastErrorMsg();
        echo json_encode($db_error);
        exit();
    }
}
function AdminUpdateItem_BoxesAfricanAnimals ($oldname,$newname)
{
    global $db;
    global $db_error;
    $update_cmd = "UPDATE last_supper SET HNAME = '$newname' WHERE HNAME= '$oldname'";
    $update_query_cmd = $db->query($update_cmd);
    if (!$update_query_cmd) 
    {
        $db_error['message'] = "Data Base <br>Error<br>". $db->lastErrorMsg();
        echo json_encode($db_error);
        exit();
    }
}
function AdminUpdateItem_TablesLogos ($oldname,$newname)
{
    global $db;
    global $db_error;
    $update_cmd = "UPDATE tables SET HNAME = '$newname' WHERE HNAME= '$oldname'";
    $update_query_cmd = $db->query($update_cmd);
    if (!$update_query_cmd) 
    {
        $db_error['message'] = "Data Base <br>Error<br>". $db->lastErrorMsg();
        echo json_encode($db_error);
        exit();
    }
}
function AdminUpdateItem_TablesAfricanVilages ($oldname,$newname)
{
    global $db;
    global $db_error;
    $update_cmd = "UPDATE tables_maps SET HNAME = '$newname' WHERE HNAME= '$oldname'";
    $update_query_cmd = $db->query($update_cmd);
    if (!$update_query_cmd) 
    {
        $db_error['message'] = "Data Base <br>Error<br>". $db->lastErrorMsg();
        echo json_encode($db_error);
        exit();
    }
}
function AdminUpdateItem_TablesAfricanAnimals ($oldname,$newname)
{
    global $db;
    global $db_error;
    $update_cmd = "UPDATE tables_last_supper SET HNAME = '$newname' WHERE HNAME= '$oldname'";
    $update_query_cmd = $db->query($update_cmd);
    if (!$update_query_cmd) 
    {
        $db_error['message'] = "Data Base <br>Error<br>". $db->lastErrorMsg();
        echo json_encode($db_error);
        exit();
    }
}
function AdminUpdateItem_WallHangingsLogos ($oldname,$newname)
{
    global $db;
    global $db_error;
    $update_cmd = "UPDATE wall_hangings SET HNAME = '$newname' WHERE HNAME= '$oldname'";
    $update_query_cmd = $db->query($update_cmd);
    if (!$update_query_cmd) 
    {
        $db_error['message'] = "Data Base <br>Error<br>". $db->lastErrorMsg();
        echo json_encode($db_error);
        exit();
    }
}
function AdminUpdateItem_WallHangingsAfricanVilages ($oldname,$newname)
{
    global $db;
    global $db_error;
    $update_cmd = "UPDATE wall_hangings_maps SET HNAME = '$newname' WHERE HNAME= '$oldname'";
    $update_query_cmd = $db->query($update_cmd);
    if (!$update_query_cmd) 
    {
        $db_error['message'] = "Data Base <br>Error<br>". $db->lastErrorMsg();
        echo json_encode($db_error);
        exit();
    }
}
function AdminUpdateItem_WallHangingsAfricanAnimals ($oldname,$newname)
{
    global $db;
    global $db_error;
    $update_cmd = "UPDATE wall_hangings_last_supper SET HNAME = '$newname' WHERE HNAME= '$oldname'";
    $update_query_cmd = $db->query($update_cmd);
    if (!$update_query_cmd) 
    {
        $db_error['message'] = "Data Base <br>Error<br>". $db->lastErrorMsg();
        echo json_encode($db_error);
        exit();
    }
}
function AdminUpdateItem_ChairsLogos ($oldname,$newname)
{
    global $db;
    global $db_error;
    $update_cmd = "UPDATE chairs SET HNAME = '$newname' WHERE HNAME= '$oldname'";
    $update_query_cmd = $db->query($update_cmd);
    if (!$update_query_cmd) 
    {
        $db_error['message'] = "Data Base <br>Error<br>". $db->lastErrorMsg();
        echo json_encode($db_error);
        exit();
    }
}
function AdminUpdateItem_ChairsAfricanVilages ($oldname,$newname)
{
    global $db;
    global $db_error;
    $update_cmd = "UPDATE chairs_maps SET HNAME = '$newname' WHERE HNAME= '$oldname'";
    $update_query_cmd = $db->query($update_cmd);
    if (!$update_query_cmd) 
    {
        $db_error['message'] = "Data Base <br>Error<br>". $db->lastErrorMsg();
        echo json_encode($db_error);
        exit();
    }
}
function AdminUpdateItem_ChairsAfricanAnimals ($oldname,$newname)
{
    global $db;
    global $db_error;
    $update_cmd = "UPDATE chairs_last_supper SET HNAME = '$newname' WHERE HNAME= '$oldname'";
    $update_query_cmd = $db->query($update_cmd);
    if (!$update_query_cmd) 
    {
        $db_error['message'] = "Data Base <br>Error<br>". $db->lastErrorMsg();
        echo json_encode($db_error);
        exit();
    }
}
function AdminUpdateItem_Doors ($oldname,$newname)
{
    global $db;
    global $db_error;
    $update_cmd = "UPDATE doors SET HNAME = '$newname' WHERE HNAME= '$oldname'";
    $update_query_cmd = $db->query($update_cmd);
    if (!$update_query_cmd) 
    {
        $db_error['message'] = "Data Base <br>Error<br>". $db->lastErrorMsg();
        echo json_encode($db_error);
        exit();
    }
}
function AdminUpdateItem_Statues ($oldname,$newname)
{
    global $db;
    global $db_error;
    $update_cmd = "UPDATE statues_people SET HNAME = '$newname' WHERE HNAME= '$oldname'";
    $update_query_cmd = $db->query($update_cmd);
    if (!$update_query_cmd) 
    {
        $db_error['message'] = "Data Base <br>Error<br>". $db->lastErrorMsg();
        echo json_encode($db_error);
        exit();
    }
}
function AdminUpdateItem_Statues_Animals ($oldname,$newname)
{
    global $db;
    global $db_error;
    $update_cmd = "UPDATE statues_animals SET HNAME = '$newname' WHERE HNAME= '$oldname'";
    $update_query_cmd = $db->query($update_cmd);
    if (!$update_query_cmd) 
    {
        $db_error['message'] = "Data Base <br>Error<br>". $db->lastErrorMsg();
        echo json_encode($db_error);
        exit();
    }
}
function AdminUpdateItem_LampHolders ($oldname,$newname)
{
    global $db;
    global $db_error;
    $update_cmd = "UPDATE lamp_holders SET HNAME = '$newname' WHERE HNAME= '$oldname'";
    $update_query_cmd = $db->query($update_cmd);
    if (!$update_query_cmd) 
    {
        $db_error['message'] = "Data Base <br>Error<br>". $db->lastErrorMsg();
        echo json_encode($db_error);
        exit();
    }
}
function AdminUpdateItem_WalkingSticks ($oldname,$newname)
{
    global $db;
    global $db_error;
    $update_cmd = "UPDATE walking_sticks SET HNAME = '$newname' WHERE HNAME= '$oldname'";
    $update_query_cmd = $db->query($update_cmd);
    if (!$update_query_cmd) 
    {
        $db_error['message'] = "Data Base <br>Error<br>". $db->lastErrorMsg();
        echo json_encode($db_error);
        exit();
    }
}
function AdminUpdateItem_Cups ($oldname,$newname)
{
    global $db;
    global $db_error;
    $update_cmd = "UPDATE cups SET HNAME = '$newname' WHERE HNAME= '$oldname'";
    $update_query_cmd = $db->query($update_cmd);
    if (!$update_query_cmd) 
    {
        $db_error['message'] = "Data Base <br>Error<br>". $db->lastErrorMsg();
        echo json_encode($db_error);
        exit();
    }
}
function AdminUpdateItem_AshTreys ($oldname,$newname)
{
    global $db;
    global $db_error;
    $update_cmd = "UPDATE ash_treys SET HNAME = '$newname' WHERE HNAME= '$oldname'";
    $update_query_cmd = $db->query($update_cmd);
    if (!$update_query_cmd) 
    {
        $db_error['message'] = "Data Base <br>Error<br>". $db->lastErrorMsg();
        echo json_encode($db_error);
        exit();
    }
}

// All update functions
// AdminUpdateItem_BoxesLogos ($oldname,$newname);
// AdminUpdateItem_BoxesAfricanVilages ($oldname,$newname);
// AdminUpdateItem_BoxesAfricanAnimals ($oldname,$newname);

// AdminUpdateItem_TablesLogos ($oldname,$newname);
// AdminUpdateItem_TablesAfricanVilages ($oldname,$newname);
// AdminUpdateItem_TablesAfricanAnimals ($oldname,$newname);

// AdminUpdateItem_WallHangingsLogos ($oldname,$newname);
// AdminUpdateItem_WallHangingsAfricanVilages ($oldname,$newname);
// AdminUpdateItem_WallHangingsAfricanAnimals ($oldname,$newname);

// AdminUpdateItem_ChairsLogos ($oldname,$newname);
// AdminUpdateItem_ChairsAfricanVilages ($oldname,$newname);
// AdminUpdateItem_ChairsAfricanAnimals ($oldname,$newname);

// AdminUpdateItem_Doors ($oldname,$newname);
// AdminUpdateItem_Statues ($oldname,$newname);
// AdminUpdateItem_LampHolders ($oldname,$newname);
// AdminUpdateItem_WalkingSticks ($oldname,$newname);
// AdminUpdateItem_Cups ($oldname,$newname);
// AdminUpdateItem_AshTreys ($oldname,$newname);

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
function AdminDeleteItem_BoxesLogos ($name)
{
    global $db;
    $delete_cmd = "DELETE FROM logos WHERE HNAME = '$name'";
    $delete_excution = $db->exec($delete_cmd);
    if (!$delete_excution) 
    {
        $db_error['message'] = "Data Base <br>Error<br>". $db->lastErrorMsg();
        echo json_encode($db_error);
        exit();
    }
}

function AdminDeleteItem_BoxesAfricanVilages ($name)
{
    global $db;
    $delete_cmd = "DELETE FROM maps WHERE HNAME = '$name'";
    $delete_excution = $db->exec($delete_cmd);
    if (!$delete_excution) 
    {
        $db_error['message'] = "Data Base <br>Error<br>". $db->lastErrorMsg();
        echo json_encode($db_error);
        exit();
    }
}
function AdminDeleteItem_BoxesAfricanAnimals ($name)
{
    global $db;
    $delete_cmd = "DELETE FROM last_supper WHERE HNAME = '$name'";
    $delete_excution = $db->exec($delete_cmd);
    if (!$delete_excution) 
    {
        $db_error['message'] = "Data Base <br>Error<br>". $db->lastErrorMsg();
        echo json_encode($db_error);
        exit();
    }
}
function AdminDeleteItem_TablesLogos ($name)
{
    global $db;
    $delete_cmd = "DELETE FROM tables WHERE HNAME = '$name'";
    $delete_excution = $db->exec($delete_cmd);
    if (!$delete_excution) 
    {
        $db_error['message'] = "Data Base <br>Error<br>". $db->lastErrorMsg();
        echo json_encode($db_error);
        exit();
    }
}
function AdminDeleteItem_TablesAfricanVilages ($name)
{
    global $db;
    $delete_cmd = "DELETE FROM tables_maps WHERE HNAME = '$name'";
    $delete_excution = $db->exec($delete_cmd);
    if (!$delete_excution) 
    {
        $db_error['message'] = "Data Base <br>Error<br>". $db->lastErrorMsg();
        echo json_encode($db_error);
        exit();
    }
}
function AdminDeleteItem_TablesAfricanAnimals ($name)
{
    global $db;
    $delete_cmd = "DELETE FROM tables_last_supper WHERE HNAME = '$name'";
    $delete_excution = $db->exec($delete_cmd);
    if (!$delete_excution) 
    {
        $db_error['message'] = "Data Base <br>Error<br>". $db->lastErrorMsg();
        echo json_encode($db_error);
        exit();
    }
}
function AdminDeleteItem_WallHangingsLogos ($name)
{
    global $db;
    $delete_cmd = "DELETE FROM wall_hangings WHERE HNAME = '$name'";
    $delete_excution = $db->exec($delete_cmd);
    if (!$delete_excution) 
    {
        $db_error['message'] = "Data Base <br>Error<br>". $db->lastErrorMsg();
        echo json_encode($db_error);
        exit();
    }
}
function AdminDeleteItem_WallHangingsAfricanVilages ($name)
{
    global $db;
    $delete_cmd = "DELETE FROM wall_hangings_maps WHERE HNAME = '$name'";
    $delete_excution = $db->exec($delete_cmd);
    if (!$delete_excution) 
    {
        $db_error['message'] = "Data Base <br>Error<br>". $db->lastErrorMsg();
        echo json_encode($db_error);
        exit();
    }
}
function AdminDeleteItem_WallHangingsAfricanAnimals ($name)
{
    global $db;
    $delete_cmd = "DELETE FROM wall_hangings_last_supper WHERE HNAME = '$name'";
    $delete_excution = $db->exec($delete_cmd);
    if (!$delete_excution) 
    {
        $db_error['message'] = "Data Base <br>Error<br>". $db->lastErrorMsg();
        echo json_encode($db_error);
        exit();
    }
}
function AdminDeleteItem_ChairsLogos ($name)
{
    global $db;
    $delete_cmd = "DELETE FROM chairs WHERE HNAME = '$name'";
    $delete_excution = $db->exec($delete_cmd);
    if (!$delete_excution) 
    {
        $db_error['message'] = "Data Base <br>Error<br>". $db->lastErrorMsg();
        echo json_encode($db_error);
        exit();
    }
}
function AdminDeleteItem_ChairsAfricanVilages ($name)
{
    global $db;
    $delete_cmd = "DELETE FROM chairs_maps WHERE HNAME = '$name'";
    $delete_excution = $db->exec($delete_cmd);
    if (!$delete_excution) 
    {
        $db_error['message'] = "Data Base <br>Error<br>". $db->lastErrorMsg();
        echo json_encode($db_error);
        exit();
    }
}
function AdminDeleteItem_ChairsAfricanAnimals ($name)
{
    global $db;
    $delete_cmd = "DELETE FROM chairs_last_supper WHERE HNAME = '$name'";
    $delete_excution = $db->exec($delete_cmd);
    if (!$delete_excution) 
    {
        $db_error['message'] = "Data Base <br>Error<br>". $db->lastErrorMsg();
        echo json_encode($db_error);
        exit();
    }
}
function AdminDeleteItem_Doors ($name)
{
    global $db;
    $delete_cmd = "DELETE FROM doors WHERE HNAME = '$name'";
    $delete_excution = $db->exec($delete_cmd);
    if (!$delete_excution) 
    {
        $db_error['message'] = "Data Base <br>Error<br>". $db->lastErrorMsg();
        echo json_encode($db_error);
        exit();
    }
}
function AdminDeleteItem_Statues ($name)
{
    global $db;
    $delete_cmd = "DELETE FROM statues_people WHERE HNAME = '$name'";
    $delete_excution = $db->exec($delete_cmd);
    if (!$delete_excution) 
    {
        $db_error['message'] = "Data Base <br>Error<br>". $db->lastErrorMsg();
        echo json_encode($db_error);
        exit();
    }
}
function AdminDeleteItem_LampHolders ($name)
{
    global $db;
    $delete_cmd = "DELETE FROM lamp_holders WHERE HNAME = '$name'";
    $delete_excution = $db->exec($delete_cmd);
    if (!$delete_excution) 
    {
        $db_error['message'] = "Data Base <br>Error<br>". $db->lastErrorMsg();
        echo json_encode($db_error);
        exit();
    }
}
function AdminDeleteItem_WalkingSticks ($name)
{
    global $db;
    $delete_cmd = "DELETE FROM walking_sticks WHERE HNAME = '$name'";
    $delete_excution = $db->exec($delete_cmd);
    if (!$delete_excution) 
    {
        $db_error['message'] = "Data Base <br>Error<br>". $db->lastErrorMsg();
        echo json_encode($db_error);
        exit();
    }
}
function AdminDeleteItem_Cups ($name)
{
    global $db;
    $delete_cmd = "DELETE FROM cups WHERE HNAME = '$name'";
    $delete_excution = $db->exec($delete_cmd);
    if (!$delete_excution) 
    {
        $db_error['message'] = "Data Base <br>Error<br>". $db->lastErrorMsg();
        echo json_encode($db_error);
        exit();
    }
}
function AdminDeleteItem_AshTreys ($name)
{
    global $db;
    $delete_cmd = "DELETE FROM ash_treys WHERE HNAME = '$name'";
    $delete_excution = $db->exec($delete_cmd);
    if (!$delete_excution) 
    {
        $db_error['message'] = "Data Base <br>Error<br>". $db->lastErrorMsg();
        echo json_encode($db_error);
        exit();
    }
}

// All Insert functions
// AdminDeleteItem_BoxesLogos ($name);
// AdminDeleteItem_BoxesAfricanVilages ($name);
// AdminDeleteItem_BoxesAfricanAnimals ($name);

// AdminDeleteItem_TablesLogos ($name);
// AdminDeleteItem_TablesAfricanVilages ($name);
// AdminDeleteItem_TablesAfricanAnimals ($name);

// AdminDeleteItem_WallHangingsLogos ($name);
// AdminDeleteItem_WallHangingsAfricanVilages ($name);
// AdminDeleteItem_WallHangingsAfricanAnimals ($name);

// AdminDeleteItem_ChairsLogos ($name);
// AdminDeleteItem_ChairsAfricanVilages ($name);
// AdminDeleteItem_ChairsAfricanAnimals ($name);

// AdminDeleteItem_Doors ($name);
// AdminDeleteItem_Statues ($name);
// AdminDeleteItem_LampHolders ($name);
// AdminDeleteItem_WalkingSticks ($name);
// AdminDeleteItem_Cups ($name);
// AdminDeleteItem_AshTreys ($name);



// CreateDataBaseTables ();
// SetDatabasePermissions ();

?>