
<?php

include 'configfile.php';
$db_path = 'database/database.db';
$db = new SQLite3($db_path);
if (!$db) {echo $db->lastErrorMsg();}


function CreateDataBaseTables ()
{
    global $db;

    $staff_table = "CREATE TABLE IF NOT EXISTS staffs (ID TEXT PRIMARY KEY,FNAME TEXT,LNAME TEXT,FULL_NAME TEXT, GENDER TEXT,STAFF_ID TEXT,STAFF_ROLE TEXT,CONTACT TEXT,REG_DATE TEXT,UUSERNAME TEXT,UPASSWORD TEXT, PLACEHOLDER1 TEXT,PLACEHOLDER2 TEXT,PLACEHOLDER3 TEXT)"; 
    $admin_table = "CREATE TABLE IF NOT EXISTS admins (ID TEXT PRIMARY KEY,FNAME TEXT,LNAME TEXT,FULL_NAME TEXT, GENDER TEXT,UUSERNAME TEXT,UPASSWORD TEXT,REG_DATE TEXT,PLACEHOLDER1 TEXT,PLACEHOLDER2 TEXT,PLACEHOLDER3 TEXT)"; 
    $ridders_table = "CREATE TABLE IF NOT EXISTS ridders (ID TEXT PRIMARY KEY,FNAME TEXT,LNAME TEXT,FULL_NAME TEXT, GENDER TEXT,STAGE TEXT,NUMBER_PLATE TEXT,CONTACT TEXT,REG_DATE TEXT,RECORD_DATE TEXT, RECORD_MONTH TEXT,PLACEHOLDER1 TEXT,PLACEHOLDER2 TEXT,PLACEHOLDER3 TEXT)"; 
    $oil_report_table = "CREATE TABLE IF NOT EXISTS oil_report (ID TEXT PRIMARY KEY,RIDDER TEXT ,NUMBER_PLATE TEXT,STAGE_NAME TEXT,LTRS TEXT,FREQUENCY TEXT,AMOUNT TEXT,RECORD_DATE TEXT, RECORD_MONTH TEXT,PLACEHOLDER1 TEXT,PLACEHOLDER2 TEXT,PLACEHOLDER3 TEXT)"; 
    $fuel_report_table = "CREATE TABLE IF NOT EXISTS fuel_report (ID TEXT PRIMARY KEY,RIDDER TEXT ,NUMBER_PLATE TEXT,STAGE_NAME TEXT,LTRS TEXT,FREQUENCY TEXT,AMOUNT TEXT,RECORD_DATE TEXT, RECORD_MONTH TEXT,PLACEHOLDER1 TEXT,PLACEHOLDER2 TEXT,PLACEHOLDER3 TEXT)"; 
    $expenses_table = "CREATE TABLE IF NOT EXISTS expenses (ID TEXT PRIMARY KEY,STAFFNAME TEXT,STAFF_ID TEXT,RECEIVER TEXT,AMOUNT TEXT,EDATE TEXT, EDESCRIPTION TEXT,RECORD_DATE TEXT, RECORD_MONTH TEXT,PLACEHOLDER1 TEXT,PLACEHOLDER2 TEXT,PLACEHOLDER3 TEXT)"; 
    $fuel_table = "CREATE TABLE IF NOT EXISTS fuel (ID TEXT PRIMARY KEY,STAFFNAME TEXT,STAFF_ID TEXT,RIDDER TEXT, NUMBER_PLATE TEXT,FUEL_TYPE TEXT,LTRS TEXT,AMOUNT TEXT,DDATE TEXT,RECORD_DATE TEXT, RECORD_MONTH TEXT,PLACEHOLDER1 TEXT,PLACEHOLDER2 TEXT,PLACEHOLDER3 TEXT)"; 
    $oil_table = "CREATE TABLE IF NOT EXISTS oil (ID TEXT PRIMARY KEY,STAFFNAME TEXT,STAFF_ID TEXT,RIDDER TEXT, NUMBER_PLATE TEXT,LTRS TEXT,AMOUNT TEXT,DDATE TEXT,RECORD_DATE TEXT, RECORD_MONTH TEXT,PLACEHOLDER1 TEXT,PLACEHOLDER2 TEXT,PLACEHOLDER3 TEXT)"; 
    $fuel_payment_table = "CREATE TABLE IF NOT EXISTS fuel_payment (ID TEXT PRIMARY KEY,STAFFNAME TEXT,STAFF_ID TEXT,RIDDER TEXT, NUMBER_PLATE TEXT,AMOUNT TEXT,DDATE TEXT,RECORD_DATE TEXT, RECORD_MONTH TEXT,PLACEHOLDER1 TEXT,PLACEHOLDER2 TEXT,PLACEHOLDER3 TEXT)"; 
    $oil_payment_table = "CREATE TABLE IF NOT EXISTS oil_payment (ID TEXT PRIMARY KEY,STAFFNAME TEXT,STAFF_ID TEXT,RIDDER TEXT, NUMBER_PLATE TEXT,AMOUNT TEXT,DDATE TEXT,RECORD_DATE TEXT, RECORD_MONTH TEXT,PLACEHOLDER1 TEXT,PLACEHOLDER2 TEXT,PLACEHOLDER3 TEXT)"; 




    

    $tables = array(
                        $staff_table,$ridders_table,$expenses_table,
                        $fuel_table,$oil_table,$fuel_payment_table,$admin_table,
                        $oil_payment_table,$stage_table,$oil_report_table,$fuel_report_table
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


function AddAdmin($id,$fname,$lname,$full_name,$gender,$username,$password,$reg_date,$placeholder1,$placeholder2,$placeholder3)
{
    global $db;
    $insert_cmd = "INSERT INTO admins VALUES  ('$id','$fname','$lname','$full_name','$gender','$username','$password','$reg_date','$placeholder1','$placeholder2','$placeholder3')";
    $insert_excution = $db->exec($insert_cmd);
    if (!$insert_excution) 
    {
        $message = "Data Base <br>Error<br>". $db->lastErrorMsg();
        echo $message; exit();
    }
    $db->close();
}
// AddAdmin('0011','admin','admin','default','default','admin','admin','reg_date','placeholder1','placeholder2','placeholder3');
function AddStaff($id,$fname,$lname,$full_name,$gender,$staff_id,$staff_role,$contact,$reg_date,$uusername,$upassword,$placeholder1,$placeholder2,$placeholder3)
{
    global $db;
    $insert_cmd = "INSERT INTO staffs VALUES  ('$id','$fname','$lname','$full_name','$gender','$staff_id','$staff_role','$contact','$reg_date','$uusername','$upassword','$placeholder1','$placeholder2','$placeholder3')";
    $insert_excution = $db->exec($insert_cmd);
    if (!$insert_excution) 
    {
        $message = "Data Base <br>Error<br>". $db->lastErrorMsg();
        echo $message;
        exit();
    }
    $db->close();
}

function AddRidder($id,$fname,$lname,$full_name, $gender,$stage,$number_plate,$contact,$reg_date,$record_date,$record_month,$placeholder1,$placeholder2,$placeholder3)
{
    global $db;
    $insert_cmd = "INSERT INTO ridders VALUES  ('$id','$fname','$lname','$full_name', '$gender','$stage','$number_plate','$contact','$reg_date','$record_date','$record_month','$placeholder1','$placeholder2','$placeholder3')";
    $insert_excution = $db->exec($insert_cmd);
    if (!$insert_excution) 
    {
        $message = "Data Base <br>Error<br>". $db->lastErrorMsg();
        echo $message;
        exit();
    }
    $db->close();
}
function AddStage($id,$stage_name,$placeholder1,$placeholder2,$placeholder3)
{
    global $db;
    $insert_cmd = "INSERT INTO stages VALUES  ('$id','$stage_name','$placeholder1','$placeholder2','$placeholder3')";
    $insert_excution = $db->exec($insert_cmd);
    if (!$insert_excution) 
    {
        $message = "Stage Data Base <br>Error<br>". $db->lastErrorMsg();
        echo $message;
        exit();
    }
    $db->close();
}


function AddExpenses ($id,$staffname,$staff_id,$receiver,$amount,$edate,$edescription,$record_date,$record_month,$placeholder1,$placeholder2,$placeholder3)
{
    global $db;
    $insert_cmd = "INSERT INTO expenses VALUES  ('$id','$staffname','$staff_id','$receiver','$amount','$edate','$edescription','$record_date','$record_month','$placeholder1','$placeholder2','$placeholder3')";
    $insert_excution = $db->exec($insert_cmd);
    if (!$insert_excution) 
    {
        $message = "Data Base <br>Error<br>". $db->lastErrorMsg();
        echo $message;
        exit();
    }
    $db->close();
}

function CreateReportOilFuel ($table_name,$id,$ridder ,$number_plate,$stage_name,$ltrs,$frequency,$amount,$placeholder1,$placeholder2,$placeholder3)
{
    global $db;
    // creating report
    $select_cmd = "SELECT * FROM 'fuel_report' WHERE RIDDER = '$ridder'";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            $DATABASERIDDER = $row['RIDDER'];
            $DATABASLTRS = $row['LTRS'];
            $DATABASFREQUENCY = $row['FREQUENCY'];
            $DATABASAMOUNT= $row['AMOUNT'];
            
        }

        $DBRIDDER = $DATABASERIDDER;
    if ($DBRIDDER === $ridder)
    {
        $increment = '1';
        $updated_ltrs = (int)$DATABASLTRS + (int)$ltrs ;
        $updated_frequency = (int)$DATABASFREQUENCY + (int)$increment;
        $updated_amount = (int)$DATABASAMOUNT + (int)$amount ;
    
        $update_cmd = "UPDATE 'fuel_report' SET 
                        FREQUENCY = '$updated_frequency',AMOUNT ='$updated_amount',LTRS = '$updated_ltrs'
                        WHERE RIDDER = '$ridder' AND NUMBER_PLATE = '$number_plate'";
        $update_excution = $db->exec($update_cmd);
        if (!$update_excution) 
        {
            $message = "Report Data Base <br>Error<br>". $db->lastErrorMsg();
            echo $message;
            exit();
        }
    }
    else
    {
        $stage_name = $placeholder3;
        $insert_cmd = "INSERT INTO 'fuel_report' VALUES  ('$id','$ridder','$number_plate','$stage_name','$ltrs','$frequency','$amount','$placeholder1','$placeholder2','$placeholder3')";
        $insert_excution = $db->exec($insert_cmd);
        if (!$insert_excution) 
        {
            $message = "Report Data Base <br>Error<br>". $db->lastErrorMsg();
            echo $message;
            exit();
        }
    }
    $db->close();
}
// CreateReportOilFuel ('fuel_report','id3','ridder3','number_plate','stage_name','1','1','1000','placeholder1','placeholder2','placeholder3');

function AddFuel ($table_name,$id,$staffname,$staff_id,$ridder, $number_plate,$fuel_type,$ltrs,$amount,$ddate,$record_date,$record_month,$placeholder1,$placeholder2,$placeholder3)
{
    global $db,$TodaysDate,$DataBaseCurrentMonth;
    $insert_cmd = "INSERT INTO '$table_name' VALUES  ('$id','$staffname','$staff_id','$ridder', '$number_plate','$fuel_type','$ltrs','$amount','$ddate','$record_date','$record_month','$placeholder1','$placeholder2','$placeholder3')";
    $insert_excution = $db->exec($insert_cmd);
    if (!$insert_excution) 
    {
        $message = "Data Base <br>Error<br>". $db->lastErrorMsg();
        echo $message;
        exit();
    }


    // creating report
    $select_cmd = "SELECT * FROM 'fuel_report' WHERE RIDDER = '$ridder'";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            $DATABASERIDDER = $row['RIDDER'];
            $DATABASLTRS = $row['LTRS'];
            $DATABASFREQUENCY = $row['FREQUENCY'];
            $DATABASAMOUNT= $row['AMOUNT'];
            
        }

        $DBRIDDER = $DATABASERIDDER;
    if ($DBRIDDER === $ridder)
    {
        $increment = '1';
        $updated_ltrs = (int)$DATABASLTRS + (int)$ltrs ;
        $updated_frequency = (int)$DATABASFREQUENCY + (int)$increment;
        $updated_amount = (int)$DATABASAMOUNT + (int)$amount ;
    
        $update_cmd = "UPDATE 'fuel_report' SET 
                        FREQUENCY = '$updated_frequency',AMOUNT ='$updated_amount',LTRS = '$updated_ltrs'
                        WHERE RIDDER = '$ridder' AND NUMBER_PLATE = '$number_plate'";
        $update_excution = $db->exec($update_cmd);
        if (!$update_excution) 
        {
            $message = "Report Data Base <br>Error<br>". $db->lastErrorMsg();
            echo $message;
            exit();
        }
    }
    else
    {
        $stage_name = $placeholder3;
        $intialfrequency = 1;
        $insert_cmd = "INSERT INTO 'fuel_report' VALUES  ('$id','$ridder','$number_plate','$stage_name','$ltrs','$intialfrequency','$amount','$TodaysDate','$DataBaseCurrentMonth','$placeholder1','$placeholder2','$placeholder3')";
        $insert_excution = $db->exec($insert_cmd);
        if (!$insert_excution) 
        {
            $message = "Report Data Base <br>Error<br>". $db->lastErrorMsg();
            echo $message;
            exit();
        }
    }
    $db->close();
}

function AddOil ($id,$staffname,$staff_id,$ridder, $number_plate,$ltrs, $amount,$ddate,$record_date,$record_month,$placeholder1,$placeholder2,$placeholder3)
{
    global $db,$TodaysDate,$DataBaseCurrentMonth;
    $insert_cmd = "INSERT INTO oil VALUES  ('$id','$staffname','$staff_id','$ridder', '$number_plate','$ltrs','$amount','$ddate','$record_date','$record_month','$placeholder1','$placeholder2','$placeholder3')";
    $insert_excution = $db->exec($insert_cmd);
    if (!$insert_excution) 
    {
        $message = "Data Base <br>Error<br>". $db->lastErrorMsg();
        echo $message;
        exit();
    }

    // creating report
    $select_cmd = "SELECT * FROM 'oil_report' WHERE RIDDER = '$ridder'";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            $DATABASERIDDER = $row['RIDDER'];
            $DATABASLTRS = $row['LTRS'];
            $DATABASFREQUENCY = $row['FREQUENCY'];
            $DATABASAMOUNT= $row['AMOUNT'];
            
        }

        $DBRIDDER = $DATABASERIDDER;
    if ($DBRIDDER === $ridder)
    {
        $increment = '1';
        $updated_ltrs = (int)$DATABASLTRS + (int)$ltrs ;
        $updated_frequency = (int)$DATABASFREQUENCY + (int)$increment;
        $updated_amount = (int)$DATABASAMOUNT + (int)$amount ;
    
        $update_cmd = "UPDATE 'oil_report' SET 
                        FREQUENCY = '$updated_frequency',AMOUNT ='$updated_amount',LTRS = '$updated_ltrs'
                        WHERE RIDDER = '$ridder' AND NUMBER_PLATE = '$number_plate'";
        $update_excution = $db->exec($update_cmd);
        if (!$update_excution) 
        {
            $message = "Report Data Base <br>Error<br>". $db->lastErrorMsg();
            echo $message;
            exit();
        }
    }
    else
    {
        $stage_name = $placeholder3;
        $intialfrequency = 1;
        $insert_cmd = "INSERT INTO 'oil_report' VALUES  ('$id','$ridder','$number_plate','$stage_name','$ltrs','$intialfrequency','$amount','$TodaysDate','$DataBaseCurrentMonth','$placeholder1','$placeholder2','$placeholder3')";
        $insert_excution = $db->exec($insert_cmd);
        if (!$insert_excution) 
        {
            $message = "Report Data Base <br>Error<br>". $db->lastErrorMsg();
            echo $message;
            exit();
        }
    }
    $db->close();
}

function AddFuelPayment ($TableToUpdate,$update,$id,$staffname,$staff_id,$ridder, $number_plate,$amount,$ddate,$record_date,$record_month,$placeholder1,$placeholder2,$placeholder3)
{
    global $db;
    $insert_cmd = "INSERT INTO fuel_payment VALUES  ('$id','$staffname','$staff_id','$ridder', '$number_plate','$amount','$ddate','$record_date','$record_month','$placeholder1','$placeholder2','$placeholder3')";
    $insert_excution = $db->exec($insert_cmd);
    if (!$insert_excution) 
    {
        $message = "Data Base <br>Error<br>". $db->lastErrorMsg();
        echo $message;
        exit();
    }
    // update fuel table to cleared
    $update_cmd = "UPDATE '$TableToUpdate' SET PLACEHOLDER2 = '$update' WHERE NUMBER_PLATE = '$number_plate' AND PLACEHOLDER2 = 'Defaulter'";
    $update_excution = $db->exec($update_cmd);
    if (!$update_excution) 
    {
        $message = "Data Base <br>Error<br>". $db->lastErrorMsg();
        echo $message;
        exit();
    }
    $db->close();
}

function AddOilPayment ($TableToUpdate,$update,$id,$staffname,$staff_id,$ridder, $number_plate,$amount,$ddate,$record_date,$record_month,$placeholder1,$placeholder2,$placeholder3)
{
    global $db;
    $insert_cmd = "INSERT INTO oil_payment VALUES  ('$id','$staffname','$staff_id','$ridder', '$number_plate','$amount','$ddate','$record_date','$record_month','$placeholder1','$placeholder2','$placeholder3')";
    $insert_excution = $db->exec($insert_cmd);
    if (!$insert_excution) 
    {
        $message = "Data Base <br>Error<br>". $db->lastErrorMsg();
        echo $message;
        exit();
    }
    // update oil table to cleared
    $update_cmd = "UPDATE '$TableToUpdate' SET PLACEHOLDER2 = '$update' WHERE NUMBER_PLATE = '$number_plate' AND PLACEHOLDER2 = 'Defaulter'";
    $update_excution = $db->exec($update_cmd);
    if (!$update_excution) 
    {
        $message = "Data Base <br>Error<br>". $db->lastErrorMsg();
        echo $message;
        exit();
    }
    $db->close();
}

// =================================================================================
// =================================================================================
//                  Reading from
// =================================================================================
// =================================================================================

function ViewOilFuelAll ( $table_name)
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM '$table_name'";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
    
            $ID = $row['ID'];
            $STAFFNAME = $row['STAFFNAME']; 
            $STAFF_ID = $row['STAFF_ID'];
            $RIDDER = $row['RIDDER'];
            $NUMBER_PLATE = $row['NUMBER_PLATE'];
            $FUEL_TYPE = $row['FUEL_TYPE'];
            $LTRS = $row['LTRS'];
            $AMOUNT = $row['AMOUNT'];
            $DDATE = $row['DDATE'];
            $RECORD_DATE= $row['RECORD_DATE'];


            // create an assoicative array(key:value) to results
            $results[] = array( 
                                'ID' => $ID, 
                                'STAFFNAME' => $STAFFNAME, 
                                'STAFF_ID' => $STAFF_ID,
                                'RIDDER' => $RIDDER,
                                'NUMBER_PLATE' => $NUMBER_PLATE,
                                'FUEL_TYPE' => $FUEL_TYPE,
                                'LTRS' => $LTRS,
                                'AMOUNT' => $AMOUNT,
                                'DDATE' => $DDATE,
                                'RECORD_DATE' => $RECORD_DATE
                            );
        }
    $json_results = json_encode($results);
    echo $json_results;
}

// ViewOilFuelAll ('oil');

function ViewOilFuelToday ( $table_name,$data)
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM '$table_name' WHERE RECORD_DATE = '$data' ";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
    
            $ID = $row['ID'];
            $STAFFNAME = $row['STAFFNAME']; 
            $STAFF_ID = $row['STAFF_ID'];
            $RIDDER = $row['RIDDER'];
            $NUMBER_PLATE = $row['NUMBER_PLATE'];
            $FUEL_TYPE = $row['FUEL_TYPE'];
            $LTRS = $row['LTRS'];
            $AMOUNT = $row['AMOUNT'];
            $DDATE = $row['DDATE'];
            $RECORD_DATE= $row['RECORD_DATE'];


            // create an assoicative array(key:value) to results
            $results[] = array( 
                                'ID' => $ID, 
                                'STAFFNAME' => $STAFFNAME, 
                                'STAFF_ID' => $STAFF_ID,
                                'RIDDER' => $RIDDER,
                                'NUMBER_PLATE' => $NUMBER_PLATE,
                                'FUEL_TYPE' => $FUEL_TYPE,
                                'LTRS' => $LTRS,
                                'AMOUNT' => $AMOUNT,
                                'DDATE' => $DDATE,
                                'RECORD_DATE' => $RECORD_DATE
                            );
        }

    $json_results = json_encode($results);
    echo $json_results;
}

function ViewOilFuelThisWeek ($table_name,$old_date,$todays_date)
{
    global $db;
    $results = array();

    // compute for ridders
    $select_cmd = "SELECT * FROM '$table_name' WHERE  RECORD_DATE BETWEEN '$old_date' AND '$todays_date'";
    // $select_cmd = "SELECT * FROM  '$table_name' WHERE RECORD_DATE >= '2022-03-28' AND RECORD_DATE <= '2022-03-30'";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
    
            $ID = $row['ID'];
            $STAFFNAME = $row['STAFFNAME']; 
            $STAFF_ID = $row['STAFF_ID'];
            $RIDDER = $row['RIDDER'];
            $NUMBER_PLATE = $row['NUMBER_PLATE'];
            $FUEL_TYPE = $row['FUEL_TYPE'];
            $LTRS = $row['LTRS'];
            $AMOUNT = $row['AMOUNT'];
            $DDATE = $row['DDATE'];
            $RECORD_DATE= $row['RECORD_DATE'];


            // create an assoicative array(key:value) to results
            $results[] = array( 
                                'ID' => $ID, 
                                'STAFFNAME' => $STAFFNAME, 
                                'STAFF_ID' => $STAFF_ID,
                                'RIDDER' => $RIDDER,
                                'NUMBER_PLATE' => $NUMBER_PLATE,
                                'FUEL_TYPE' => $FUEL_TYPE,
                                'LTRS' => $LTRS,
                                'AMOUNT' => $AMOUNT,
                                'DDATE' => $DDATE,
                                'RECORD_DATE' => $RECORD_DATE
                            );
        }

    $json_results = json_encode($results);
    echo $json_results;
}

function ViewOilFuelThisMonth ($table_name,$month)
{
    global $db;
    $results = array();

    // compute for ridders
    $select_cmd = "SELECT * FROM '$table_name' WHERE  RECORD_MONTH = '$month'";
    // $select_cmd = "SELECT * FROM  '$table_name' WHERE RECORD_DATE >= '2022-03-28' AND RECORD_DATE <= '2022-03-30'";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
    
            $ID = $row['ID'];
            $STAFFNAME = $row['STAFFNAME']; 
            $STAFF_ID = $row['STAFF_ID'];
            $RIDDER = $row['RIDDER'];
            $NUMBER_PLATE = $row['NUMBER_PLATE'];
            $FUEL_TYPE = $row['FUEL_TYPE'];
            $LTRS = $row['LTRS'];
            $AMOUNT = $row['AMOUNT'];
            $DDATE = $row['DDATE'];
            $RECORD_DATE= $row['RECORD_DATE'];


            // create an assoicative array(key:value) to results
            $results[] = array( 
                                'ID' => $ID, 
                                'STAFFNAME' => $STAFFNAME, 
                                'STAFF_ID' => $STAFF_ID,
                                'RIDDER' => $RIDDER,
                                'NUMBER_PLATE' => $NUMBER_PLATE,
                                'FUEL_TYPE' => $FUEL_TYPE,
                                'LTRS' => $LTRS,
                                'AMOUNT' => $AMOUNT,
                                'DDATE' => $DDATE,
                                'RECORD_DATE' => $RECORD_DATE
                            );
        }

    $json_results = json_encode($results);
    echo $json_results;
}

function ViewOilFuelRange ($table_name,$from_date,$to_date)
{
    global $db;
    $results = array();

    // compute for ridders
    $select_cmd = "SELECT * FROM '$table_name' WHERE  RECORD_DATE BETWEEN '$from_date' AND '$to_date'";
    // $select_cmd = "SELECT * FROM  '$table_name' WHERE RECORD_DATE >= '2022-03-28' AND RECORD_DATE <= '2022-03-30'";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
    
            $ID = $row['ID'];
            $STAFFNAME = $row['STAFFNAME']; 
            $STAFF_ID = $row['STAFF_ID'];
            $RIDDER = $row['RIDDER'];
            $NUMBER_PLATE = $row['NUMBER_PLATE'];
            $FUEL_TYPE = $row['FUEL_TYPE'];
            $LTRS = $row['LTRS'];
            $AMOUNT = $row['AMOUNT'];
            $DDATE = $row['DDATE'];
            $RECORD_DATE= $row['RECORD_DATE'];


            // create an assoicative array(key:value) to results
            $results[] = array( 
                                'ID' => $ID, 
                                'STAFFNAME' => $STAFFNAME, 
                                'STAFF_ID' => $STAFF_ID,
                                'RIDDER' => $RIDDER,
                                'NUMBER_PLATE' => $NUMBER_PLATE,
                                'FUEL_TYPE' => $FUEL_TYPE,
                                'LTRS' => $LTRS,
                                'AMOUNT' => $AMOUNT,
                                'DDATE' => $DDATE,
                                'RECORD_DATE' => $RECORD_DATE
                            );
        }

    $json_results = json_encode($results);
    echo $json_results;
}

function ViewOilFuelByName ($table_name,$name)
{
    global $db;
    $results = array();

    // compute for ridders
    $select_cmd = "SELECT * FROM '$table_name' WHERE  RIDDER = '$name'";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
    
            $ID = $row['ID'];
            $STAFFNAME = $row['STAFFNAME']; 
            $STAFF_ID = $row['STAFF_ID'];
            $RIDDER = $row['RIDDER'];
            $NUMBER_PLATE = $row['NUMBER_PLATE'];
            $FUEL_TYPE = $row['FUEL_TYPE'];
            $LTRS = $row['LTRS'];
            $AMOUNT = $row['AMOUNT'];
            $DDATE = $row['DDATE'];
            $RECORD_DATE= $row['RECORD_DATE'];


            // create an assoicative array(key:value) to results
            $results[] = array( 
                                'ID' => $ID, 
                                'STAFFNAME' => $STAFFNAME, 
                                'STAFF_ID' => $STAFF_ID,
                                'RIDDER' => $RIDDER,
                                'NUMBER_PLATE' => $NUMBER_PLATE,
                                'FUEL_TYPE' => $FUEL_TYPE,
                                'LTRS' => $LTRS,
                                'AMOUNT' => $AMOUNT,
                                'DDATE' => $DDATE,
                                'RECORD_DATE' => $RECORD_DATE
                            );
        }

    $json_results = json_encode($results);
    echo $json_results;
}

// ====================================================================================
//
//      Oil And Fuel Payments  
//
// ====================================================================================

function ViewAllOilFuelPayments ($table_name)
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM '$table_name'";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            // $oil_payment_table = "CREATE TABLE IF NOT EXISTS oil_payment (ID TEXT PRIMARY KEY,STAFFNAME TEXT,STAFF_ID TEXT,RIDDER TEXT, NUMBER_PLATE TEXT,AMOUNT TEXT,DDATE TEXT,RECORD_DATE TEXT, RECORD_MONTH TEXT,PLACEHOLDER1 TEXT,PLACEHOLDER2 TEXT,PLACEHOLDER3 TEXT)"; 
    
            $ID = $row['ID'];
            $STAFFNAME = $row['STAFFNAME']; 
            $STAFF_ID = $row['STAFF_ID'];
            $RIDDER = $row['RIDDER'];
            $NUMBER_PLATE = $row['NUMBER_PLATE'];
            $AMOUNT = $row['AMOUNT'];
            $DDATE = $row['DDATE'];
            $RECORD_DATE= $row['RECORD_DATE'];


            // create an assoicative array(key:value) to results
            $results[] = array( 
                                'ID' => $ID, 
                                'STAFFNAME' => $STAFFNAME, 
                                'STAFF_ID' => $STAFF_ID,
                                'RIDDER' => $RIDDER,
                                'NUMBER_PLATE' => $NUMBER_PLATE,
                                'AMOUNT' => $AMOUNT,
                                'DDATE' => $DDATE,
                                'RECORD_DATE' => $RECORD_DATE
                            );
        }

    $json_results = json_encode($results);
    echo $json_results;
}

function ViewOilFuelPaymentsToday ($table_name,$date)
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM '$table_name' WHERE RECORD_DATE = '$date'";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            // $oil_payment_table = "CREATE TABLE IF NOT EXISTS oil_payment (ID TEXT PRIMARY KEY,STAFFNAME TEXT,STAFF_ID TEXT,RIDDER TEXT, NUMBER_PLATE TEXT,AMOUNT TEXT,DDATE TEXT,RECORD_DATE TEXT, RECORD_MONTH TEXT,PLACEHOLDER1 TEXT,PLACEHOLDER2 TEXT,PLACEHOLDER3 TEXT)"; 
    
            $ID = $row['ID'];
            $STAFFNAME = $row['STAFFNAME']; 
            $STAFF_ID = $row['STAFF_ID'];
            $RIDDER = $row['RIDDER'];
            $NUMBER_PLATE = $row['NUMBER_PLATE'];
            $AMOUNT = $row['AMOUNT'];
            $DDATE = $row['DDATE'];
            $RECORD_DATE= $row['RECORD_DATE'];


            // create an assoicative array(key:value) to results
            $results[] = array( 
                                'ID' => $ID, 
                                'STAFFNAME' => $STAFFNAME, 
                                'STAFF_ID' => $STAFF_ID,
                                'RIDDER' => $RIDDER,
                                'NUMBER_PLATE' => $NUMBER_PLATE,
                                'AMOUNT' => $AMOUNT,
                                'DDATE' => $DDATE,
                                'RECORD_DATE' => $RECORD_DATE
                            );
        }

    $json_results = json_encode($results);
    echo $json_results;
}

function ViewOilFuelPaymentsThisWeek ($table_name,$old_date,$todays_date)
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM '$table_name' WHERE  RECORD_DATE BETWEEN '$old_date' AND '$todays_date'";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            // $oil_payment_table = "CREATE TABLE IF NOT EXISTS oil_payment (ID TEXT PRIMARY KEY,STAFFNAME TEXT,STAFF_ID TEXT,RIDDER TEXT, NUMBER_PLATE TEXT,AMOUNT TEXT,DDATE TEXT,RECORD_DATE TEXT, RECORD_MONTH TEXT,PLACEHOLDER1 TEXT,PLACEHOLDER2 TEXT,PLACEHOLDER3 TEXT)"; 
    
            $ID = $row['ID'];
            $STAFFNAME = $row['STAFFNAME']; 
            $STAFF_ID = $row['STAFF_ID'];
            $RIDDER = $row['RIDDER'];
            $NUMBER_PLATE = $row['NUMBER_PLATE'];
            $AMOUNT = $row['AMOUNT'];
            $DDATE = $row['DDATE'];
            $RECORD_DATE= $row['RECORD_DATE'];


            // create an assoicative array(key:value) to results
            $results[] = array( 
                                'ID' => $ID, 
                                'STAFFNAME' => $STAFFNAME, 
                                'STAFF_ID' => $STAFF_ID,
                                'RIDDER' => $RIDDER,
                                'NUMBER_PLATE' => $NUMBER_PLATE,
                                'AMOUNT' => $AMOUNT,
                                'DDATE' => $DDATE,
                                'RECORD_DATE' => $RECORD_DATE
                            );
        }

    $json_results = json_encode($results);
    echo $json_results;
}

function ViewOilFuelPaymentsThisMonth ($table_name,$month)
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM '$table_name' WHERE  RECORD_MONTH = '$month'";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            // $oil_payment_table = "CREATE TABLE IF NOT EXISTS oil_payment (ID TEXT PRIMARY KEY,STAFFNAME TEXT,STAFF_ID TEXT,RIDDER TEXT, NUMBER_PLATE TEXT,AMOUNT TEXT,DDATE TEXT,RECORD_DATE TEXT, RECORD_MONTH TEXT,PLACEHOLDER1 TEXT,PLACEHOLDER2 TEXT,PLACEHOLDER3 TEXT)"; 
    
            $ID = $row['ID'];
            $STAFFNAME = $row['STAFFNAME']; 
            $STAFF_ID = $row['STAFF_ID'];
            $RIDDER = $row['RIDDER'];
            $NUMBER_PLATE = $row['NUMBER_PLATE'];
            $AMOUNT = $row['AMOUNT'];
            $DDATE = $row['DDATE'];
            $RECORD_DATE= $row['RECORD_DATE'];


            // create an assoicative array(key:value) to results
            $results[] = array( 
                                'ID' => $ID, 
                                'STAFFNAME' => $STAFFNAME, 
                                'STAFF_ID' => $STAFF_ID,
                                'RIDDER' => $RIDDER,
                                'NUMBER_PLATE' => $NUMBER_PLATE,
                                'AMOUNT' => $AMOUNT,
                                'DDATE' => $DDATE,
                                'RECORD_DATE' => $RECORD_DATE
                            );
        }

    $json_results = json_encode($results);
    echo $json_results;
}

function ViewOilFuelPaymentsRange ($table_name,$from_date,$to_date)
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM '$table_name' WHERE  RECORD_DATE BETWEEN '$from_date' AND '$to_date'";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            // $oil_payment_table = "CREATE TABLE IF NOT EXISTS oil_payment (ID TEXT PRIMARY KEY,STAFFNAME TEXT,STAFF_ID TEXT,RIDDER TEXT, NUMBER_PLATE TEXT,AMOUNT TEXT,DDATE TEXT,RECORD_DATE TEXT, RECORD_MONTH TEXT,PLACEHOLDER1 TEXT,PLACEHOLDER2 TEXT,PLACEHOLDER3 TEXT)"; 
    
            $ID = $row['ID'];
            $STAFFNAME = $row['STAFFNAME']; 
            $STAFF_ID = $row['STAFF_ID'];
            $RIDDER = $row['RIDDER'];
            $NUMBER_PLATE = $row['NUMBER_PLATE'];
            $AMOUNT = $row['AMOUNT'];
            $DDATE = $row['DDATE'];
            $RECORD_DATE= $row['RECORD_DATE'];


            // create an assoicative array(key:value) to results
            $results[] = array( 
                                'ID' => $ID, 
                                'STAFFNAME' => $STAFFNAME, 
                                'STAFF_ID' => $STAFF_ID,
                                'RIDDER' => $RIDDER,
                                'NUMBER_PLATE' => $NUMBER_PLATE,
                                'AMOUNT' => $AMOUNT,
                                'DDATE' => $DDATE,
                                'RECORD_DATE' => $RECORD_DATE
                            );
        }

    $json_results = json_encode($results);
    echo $json_results;
}

function ViewOilFuelPaymentsByName ($table_name,$name)
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM '$table_name' WHERE  RIDDER = '$name'";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            // $oil_payment_table = "CREATE TABLE IF NOT EXISTS oil_payment (ID TEXT PRIMARY KEY,STAFFNAME TEXT,STAFF_ID TEXT,RIDDER TEXT, NUMBER_PLATE TEXT,AMOUNT TEXT,DDATE TEXT,RECORD_DATE TEXT, RECORD_MONTH TEXT,PLACEHOLDER1 TEXT,PLACEHOLDER2 TEXT,PLACEHOLDER3 TEXT)"; 
    
            $ID = $row['ID'];
            $STAFFNAME = $row['STAFFNAME']; 
            $STAFF_ID = $row['STAFF_ID'];
            $RIDDER = $row['RIDDER'];
            $NUMBER_PLATE = $row['NUMBER_PLATE'];
            $AMOUNT = $row['AMOUNT'];
            $DDATE = $row['DDATE'];
            $RECORD_DATE= $row['RECORD_DATE'];

            // create an assoicative array(key:value) to results
            $results[] = array( 
                                'ID' => $ID, 
                                'STAFFNAME' => $STAFFNAME, 
                                'STAFF_ID' => $STAFF_ID,
                                'RIDDER' => $RIDDER,
                                'NUMBER_PLATE' => $NUMBER_PLATE,
                                'AMOUNT' => $AMOUNT,
                                'DDATE' => $DDATE,
                                'RECORD_DATE' => $RECORD_DATE
                            );
        }

    $json_results = json_encode($results);
    echo $json_results;
}

// ======================================================================================
//
//  View Expenses
//
// ======================================================================================

function ViewExpensesAll ( $table_name)
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM '$table_name'";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            
            $ID = $row['ID'];
            $STAFFNAME = $row['STAFFNAME'];
            $STAFF_ID  = $row['STAFF_ID'];
            $RECEIVER = $row['RECEIVER'];
            $AMOUNT  = $row['AMOUNT'];
            $EDESCRIPTION = $row['EDESCRIPTION'];
            $EDATE = $row['EDATE']; 
            $REG_DATE = $row['RECORD_DATE'];

            // create an assoicative array(key:value) to results
            $results[] = array( 
                                'ID' => $ID, 
                                'STAFFNAME' => $STAFFNAME,
                                'STAFF_ID' => $STAFF_ID,
                                'RECEIVER' => $RECEIVER,
                                'AMOUNT'  => $AMOUNT,
                                'EDESCRIPTION' => $EDESCRIPTION,
                                'EDATE' => $EDATE,
                                'REG_DATE' => $REG_DATE,
                            );
        }
    $json_results = json_encode($results);
    echo $json_results;
}

function ViewExpensesToday ( $table_name,$data)
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM '$table_name' WHERE RECORD_DATE = '$data' ";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
    
            
            $ID = $row['ID'];
            $STAFFNAME = $row['STAFFNAME'];
            $STAFF_ID  = $row['STAFF_ID'];
            $RECEIVER = $row['RECEIVER'];
            $AMOUNT  = $row['AMOUNT'];
            $EDESCRIPTION = $row['EDESCRIPTION'];
            $EDATE = $row['EDATE']; 
            $REG_DATE = $row['RECORD_DATE'];


            // create an assoicative array(key:value) to results
            $results[] = array( 
                                'ID' => $ID, 
                                'STAFFNAME' => $STAFFNAME,
                                'STAFF_ID' => $STAFF_ID,
                                'RECEIVER' => $RECEIVER,
                                'AMOUNT'  => $AMOUNT,
                                'EDESCRIPTION' => $EDESCRIPTION,
                                'EDATE' => $EDATE,
                                'REG_DATE' => $REG_DATE,
                            );
        }

    $json_results = json_encode($results);
    echo $json_results;
}

function ViewExpensesThisWeek ($table_name,$old_date,$todays_date)
{
    global $db;
    $results = array();

    // compute for ridders
    $select_cmd = "SELECT * FROM '$table_name' WHERE  RECORD_DATE BETWEEN '$old_date' AND '$todays_date'";
    // $select_cmd = "SELECT * FROM  '$table_name' WHERE RECORD_DATE >= '2022-03-28' AND RECORD_DATE <= '2022-03-30'";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            
            $ID = $row['ID'];
            $STAFFNAME = $row['STAFFNAME'];
            $STAFF_ID  = $row['STAFF_ID'];
            $RECEIVER = $row['RECEIVER'];
            $AMOUNT  = $row['AMOUNT'];
            $EDESCRIPTION = $row['EDESCRIPTION'];
            $EDATE = $row['EDATE']; 
            $REG_DATE = $row['RECORD_DATE'];


            // create an assoicative array(key:value) to results
            $results[] = array( 
                                'ID' => $ID, 
                                'STAFFNAME' => $STAFFNAME,
                                'STAFF_ID' => $STAFF_ID,
                                'RECEIVER' => $RECEIVER,
                                'AMOUNT'  => $AMOUNT,
                                'EDESCRIPTION' => $EDESCRIPTION,
                                'EDATE' => $EDATE,
                                'REG_DATE' => $REG_DATE,
                            );
        }

    $json_results = json_encode($results);
    echo $json_results;
}

function ViewExpensesThisMonth ($table_name,$month)
{
    global $db;
    $results = array();

    // compute for ridders
    $select_cmd = "SELECT * FROM '$table_name' WHERE  RECORD_MONTH = '$month'";
    // $select_cmd = "SELECT * FROM  '$table_name' WHERE RECORD_DATE >= '2022-03-28' AND RECORD_DATE <= '2022-03-30'";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            $ID = $row['ID'];
            $STAFFNAME = $row['STAFFNAME'];
            $STAFF_ID  = $row['STAFF_ID'];
            $RECEIVER = $row['RECEIVER'];
            $AMOUNT  = $row['AMOUNT'];
            $EDESCRIPTION = $row['EDESCRIPTION'];
            $EDATE = $row['EDATE']; 
            $REG_DATE = $row['RECORD_DATE'];

            // create an assoicative array(key:value) to results
            $results[] = array( 
                                'ID' => $ID, 
                                'STAFFNAME' => $STAFFNAME,
                                'STAFF_ID' => $STAFF_ID,
                                'RECEIVER' => $RECEIVER,
                                'AMOUNT'  => $AMOUNT,
                                'EDESCRIPTION' => $EDESCRIPTION,
                                'EDATE' => $EDATE,
                                'REG_DATE' => $REG_DATE,
                            );
        }

    $json_results = json_encode($results);
    echo $json_results;
}

function ViewExpensesRange ($table_name,$from_date,$to_date)
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM '$table_name' WHERE  RECORD_DATE BETWEEN '$from_date' AND '$to_date'";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
    
            $ID = $row['ID'];
            $STAFFNAME = $row['STAFFNAME'];
            $STAFF_ID  = $row['STAFF_ID'];
            $RECEIVER = $row['RECEIVER'];
            $AMOUNT  = $row['AMOUNT'];
            $EDESCRIPTION = $row['EDESCRIPTION'];
            $EDATE = $row['EDATE']; 
            $REG_DATE = $row['RECORD_DATE'];


            // create an assoicative array(key:value) to results
            $results[] = array( 
                                'ID' => $ID, 
                                'STAFFNAME' => $STAFFNAME,
                                'STAFF_ID' => $STAFF_ID,
                                'RECEIVER' => $RECEIVER,
                                'AMOUNT'  => $AMOUNT,
                                'EDESCRIPTION' => $EDESCRIPTION,
                                'EDATE' => $EDATE,
                                'REG_DATE' => $REG_DATE,
                            );
        }

    $json_results = json_encode($results);
    echo $json_results;
}

function ViewExpensesByName ($table_name,$name)
{
    global $db;
    $results = array();

    // compute for ridders
    $select_cmd = "SELECT * FROM '$table_name' WHERE  RIDDER = '$name'";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            
            $ID = $row['ID'];
            $STAFFNAME = $row['STAFFNAME'];
            $STAFF_ID  = $row['STAFF_ID'];
            $RECEIVER = $row['RECEIVER'];
            $AMOUNT  = $row['AMOUNT'];
            $EDESCRIPTION = $row['EDESCRIPTION'];
            $EDATE = $row['EDATE']; 
            $REG_DATE = $row['RECORD_DATE'];


            // create an assoicative array(key:value) to results
            $results[] = array( 
                                'ID' => $ID, 
                                'STAFFNAME' => $STAFFNAME,
                                'STAFF_ID' => $STAFF_ID,
                                'RECEIVER' => $RECEIVER,
                                'AMOUNT'  => $AMOUNT,
                                'EDESCRIPTION' => $EDESCRIPTION,
                                'EDATE' => $EDATE,
                                'REG_DATE' => $REG_DATE,
                            );
        }

    $json_results = json_encode($results);
    echo $json_results;
}

function ViewRidders ()
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM ridders";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
        // $ridders_table = "CREATE TABLE IF NOT EXISTS ridders (ID TEXT PRIMARY KEY,FNAME TEXT,LNAME TEXT,FULL_NAME TEXT, GENDER TEXT,RIDDER_ID TEXT,NUMBER_PLATE TEXT,CONTACT TEXT,REG_DATE TEXT)"; 
            $ID = $row['ID'];
            $FNAME = $row['FNAME']; 
            $LNAME = $row['LNAME']; 
            $FULL_NAME = $row['FULL_NAME'];
            $GENDER = $row['GENDER'];
            $STAGE  = $row['STAGE'];
            $NUMBER_PLATE  = $row['NUMBER_PLATE'];
            $CONTACT = $row['CONTACT'];
            $REG_DATE = $row['REG_DATE'];


            // create an assoicative array(key:value) to results
            $results[] = array( 
                                'ID' => $ID, 
                                'FNAME' => $FNAME, 
                                'LNAME' => $LNAME, 
                                'FULL_NAME' => $FULL_NAME,
                                'STAGE' => $STAGE,
                                'GENDER' => $GENDER,
                                'NUMBER_PLATE'  => $NUMBER_PLATE,
                                'CONTACT' => $CONTACT,
                                'REG_DATE' => $REG_DATE,
                            );
        }
    $json_results = json_encode($results);
    echo $json_results;
}

function ViewRiddersToday ($table_name,$date)
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM '$table_name' WHERE RECORD_DATE = '$date'";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
        // $ridders_table = "CREATE TABLE IF NOT EXISTS ridders (ID TEXT PRIMARY KEY,FNAME TEXT,LNAME TEXT,FULL_NAME TEXT, GENDER TEXT,RIDDER_ID TEXT,NUMBER_PLATE TEXT,CONTACT TEXT,REG_DATE TEXT)"; 
            $ID = $row['ID'];
            $FNAME = $row['FNAME']; 
            $LNAME = $row['LNAME']; 
            $FULL_NAME = $row['FULL_NAME'];
            $GENDER = $row['GENDER'];
            $STAGE  = $row['STAGE'];
            $NUMBER_PLATE  = $row['NUMBER_PLATE'];
            $CONTACT = $row['CONTACT'];
            $REG_DATE = $row['REG_DATE'];


            // create an assoicative array(key:value) to results
            $results[] = array( 
                                'ID' => $ID, 
                                'FNAME' => $FNAME, 
                                'LNAME' => $LNAME, 
                                'FULL_NAME' => $FULL_NAME,
                                'STAGE' => $STAGE,
                                'GENDER' => $GENDER,
                                'NUMBER_PLATE'  => $NUMBER_PLATE,
                                'CONTACT' => $CONTACT,
                                'REG_DATE' => $REG_DATE,
                            );
        }
    $json_results = json_encode($results);
    echo $json_results;
}

function ViewRiddersThisWeek ($table_name,$old_date,$todays_date)
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM '$table_name' WHERE  RECORD_DATE BETWEEN '$old_date' AND '$todays_date'";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
        // $ridders_table = "CREATE TABLE IF NOT EXISTS ridders (ID TEXT PRIMARY KEY,FNAME TEXT,LNAME TEXT,FULL_NAME TEXT, GENDER TEXT,RIDDER_ID TEXT,NUMBER_PLATE TEXT,CONTACT TEXT,REG_DATE TEXT)"; 
            $ID = $row['ID'];
            $FNAME = $row['FNAME']; 
            $LNAME = $row['LNAME']; 
            $FULL_NAME = $row['FULL_NAME'];
            $GENDER = $row['GENDER'];
            $STAGE  = $row['STAGE'];
            $NUMBER_PLATE  = $row['NUMBER_PLATE'];
            $CONTACT = $row['CONTACT'];
            $REG_DATE = $row['REG_DATE'];


            // create an assoicative array(key:value) to results
            $results[] = array( 
                                'ID' => $ID, 
                                'FNAME' => $FNAME, 
                                'LNAME' => $LNAME, 
                                'FULL_NAME' => $FULL_NAME,
                                'STAGE' => $STAGE,
                                'GENDER' => $GENDER,
                                'NUMBER_PLATE'  => $NUMBER_PLATE,
                                'CONTACT' => $CONTACT,
                                'REG_DATE' => $REG_DATE,
                            );
        }
    $json_results = json_encode($results);
    echo $json_results;
}

function ViewRiddersThisMonth ($table_name,$month)
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM '$table_name' WHERE  RECORD_MONTH = '$month'";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
        // $ridders_table = "CREATE TABLE IF NOT EXISTS ridders (ID TEXT PRIMARY KEY,FNAME TEXT,LNAME TEXT,FULL_NAME TEXT, GENDER TEXT,RIDDER_ID TEXT,NUMBER_PLATE TEXT,CONTACT TEXT,REG_DATE TEXT)"; 
            $ID = $row['ID'];
            $FNAME = $row['FNAME']; 
            $LNAME = $row['LNAME']; 
            $FULL_NAME = $row['FULL_NAME'];
            $GENDER = $row['GENDER'];
            $STAGE  = $row['STAGE'];
            $NUMBER_PLATE  = $row['NUMBER_PLATE'];
            $CONTACT = $row['CONTACT'];
            $REG_DATE = $row['REG_DATE'];


            // create an assoicative array(key:value) to results
            $results[] = array( 
                                'ID' => $ID, 
                                'FNAME' => $FNAME, 
                                'LNAME' => $LNAME, 
                                'FULL_NAME' => $FULL_NAME,
                                'STAGE' => $STAGE,
                                'GENDER' => $GENDER,
                                'NUMBER_PLATE'  => $NUMBER_PLATE,
                                'CONTACT' => $CONTACT,
                                'REG_DATE' => $REG_DATE,
                            );
        }
    $json_results = json_encode($results);
    echo $json_results;
}
function ViewRiddersRange ($table_name,$from_date,$to_date)
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM '$table_name' WHERE  RECORD_DATE BETWEEN '$from_date' AND '$to_date'";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
        // $ridders_table = "CREATE TABLE IF NOT EXISTS ridders (ID TEXT PRIMARY KEY,FNAME TEXT,LNAME TEXT,FULL_NAME TEXT, GENDER TEXT,RIDDER_ID TEXT,NUMBER_PLATE TEXT,CONTACT TEXT,REG_DATE TEXT)"; 
            $ID = $row['ID'];
            $FNAME = $row['FNAME']; 
            $LNAME = $row['LNAME']; 
            $FULL_NAME = $row['FULL_NAME'];
            $GENDER = $row['GENDER'];
            $STAGE  = $row['STAGE'];
            $NUMBER_PLATE  = $row['NUMBER_PLATE'];
            $CONTACT = $row['CONTACT'];
            $REG_DATE = $row['REG_DATE'];


            // create an assoicative array(key:value) to results
            $results[] = array( 
                                'ID' => $ID, 
                                'FNAME' => $FNAME, 
                                'LNAME' => $LNAME, 
                                'FULL_NAME' => $FULL_NAME,
                                'STAGE' => $STAGE,
                                'GENDER' => $GENDER,
                                'NUMBER_PLATE'  => $NUMBER_PLATE,
                                'CONTACT' => $CONTACT,
                                'REG_DATE' => $REG_DATE,
                            );
        }
    $json_results = json_encode($results);
    echo $json_results;
}
function ViewRiddersByName ($table_name,$name)
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM '$table_name' WHERE  FULL_NAME = '$name'";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
        // $ridders_table = "CREATE TABLE IF NOT EXISTS ridders (ID TEXT PRIMARY KEY,FNAME TEXT,LNAME TEXT,FULL_NAME TEXT, GENDER TEXT,RIDDER_ID TEXT,NUMBER_PLATE TEXT,CONTACT TEXT,REG_DATE TEXT)"; 
            $ID = $row['ID'];
            $FNAME = $row['FNAME']; 
            $LNAME = $row['LNAME']; 
            $FULL_NAME = $row['FULL_NAME'];
            $GENDER = $row['GENDER'];
            $STAGE  = $row['STAGE'];
            $NUMBER_PLATE  = $row['NUMBER_PLATE'];
            $CONTACT = $row['CONTACT'];
            $REG_DATE = $row['REG_DATE'];


            // create an assoicative array(key:value) to results
            $results[] = array( 
                                'ID' => $ID, 
                                'FNAME' => $FNAME, 
                                'LNAME' => $LNAME, 
                                'FULL_NAME' => $FULL_NAME,
                                'STAGE' => $STAGE,
                                'GENDER' => $GENDER,
                                'NUMBER_PLATE'  => $NUMBER_PLATE,
                                'CONTACT' => $CONTACT,
                                'REG_DATE' => $REG_DATE,
                            );
        }
    $json_results = json_encode($results);
    echo $json_results;
}

function ViewAllAdmin ($table_name)
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM '$table_name'";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            $ID = $row['ID'];
            $FNAME = $row['FNAME'];
            $LNAME = $row['LNAME']; 
            $GENDER = $row['GENDER'];
            $FULLNAME = $row['FULL_NAME']; 
            $USERNAME = $row['UUSERNAME']; 
            $REG_DATE = $row['REG_DATE'];


            // create an assoicative array(key:value) to results
            $results[] = array( 
                                'ID' => $ID, 
                                'USERNAME' => $USERNAME, 
                                'FULLNAME' => $FULLNAME, 
                                'REG_DATE' => $REG_DATE,
                                'FNAME' => $FNAME,
                                'LNAME' => $LNAME,
                                'GENDER' => $GENDER,

                            );
        }
    $json_results = json_encode($results);
    echo $json_results;
}

function ViewAllStaffs ($table_name)
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM '$table_name'";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            // $staff_table = "CREATE TABLE IF NOT EXISTS staffs (ID TEXT PRIMARY KEY,FNAME TEXT,LNAME TEXT,FULL_NAME TEXT,GENDER TEXT,STAFF_ID TEXT,STAFF_ROLE TEXT,CONTACT TEXT,REG_DATE TEXT)"; 
            $ID = $row['ID'];
            $FNAME = $row['FNAME']; 
            $LNAME = $row['LNAME']; 
            $FULL_NAME = $row['FULL_NAME'];
            $GENDER = $row['GENDER'];
            $STAFF_ID  = $row['STAFF_ID'];
            $STAFF_ROLE  = $row['STAFF_ROLE'];
            $CONTACT = $row['CONTACT'];
            $REG_DATE = $row['REG_DATE'];
            $PASSWORD = $row['PLACEHOLDER1'];


            // create an assoicative array(key:value) to results
            $results[] = array( 
                                'ID' => $ID, 
                                'FNAME' => $FNAME, 
                                'LNAME' => $LNAME, 
                                'FULL_NAME' => $FULL_NAME,
                                'GENDER' => $GENDER,
                                'STAFF_ID'  => $STAFF_ID,
                                'STAFF_ROLE'  => $STAFF_ROLE,
                                'CONTACT' => $CONTACT,
                                'REG_DATE' => $REG_DATE,
                                'PASSWORD' => $PASSWORD,
                            );
        }
    $json_results = json_encode($results);
    echo $json_results;
}

function ViewStaffsByName ($table_name,$name)
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM '$table_name' WHERE FULL_NAME = '$name'";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            // $staff_table = "CREATE TABLE IF NOT EXISTS staffs (ID TEXT PRIMARY KEY,FNAME TEXT,LNAME TEXT,FULL_NAME TEXT,GENDER TEXT,STAFF_ID TEXT,STAFF_ROLE TEXT,CONTACT TEXT,REG_DATE TEXT)"; 
            $ID = $row['ID'];
            $FNAME = $row['FNAME']; 
            $LNAME = $row['LNAME']; 
            $FULL_NAME = $row['FULL_NAME'];
            $GENDER = $row['GENDER'];
            $STAFF_ID  = $row['STAFF_ID'];
            $STAFF_ROLE  = $row['STAFF_ROLE'];
            $CONTACT = $row['CONTACT'];
            $REG_DATE = $row['REG_DATE'];
            $PASSWORD = $row['PLACEHOLDER1'];



            // create an assoicative array(key:value) to results
            $results[] = array( 
                                'ID' => $ID, 
                                'FNAME' => $FNAME, 
                                'LNAME' => $LNAME, 
                                'FULL_NAME' => $FULL_NAME,
                                'GENDER' => $GENDER,
                                'STAFF_ID'  => $STAFF_ID,
                                'STAFF_ROLE'  => $STAFF_ROLE,
                                'CONTACT' => $CONTACT,
                                'REG_DATE' => $REG_DATE,
                                'PASSWORD' => $PASSWORD, 
                            );
        }
    $json_results = json_encode($results);
    echo $json_results;
}


function ViewDefaulters ($table_name,$defaulter_key)
{
    global $db;
    // echo $table_name.$defaulter_key;
    $results = array();
    $select_cmd = "SELECT * FROM '$table_name' WHERE PLACEHOLDER2 ='$defaulter_key'";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
        // $oil_table = "CREATE TABLE IF NOT EXISTS oil (ID TEXT PRIMARY KEY,STAFFNAME TEXT,STAFF_ID TEXT,RIDDER TEXT, NUMBER_PLATE TEXT,LTRS TEXT,AMOUNT TEXT,DDATE TEXT,RECORD_DATE TEXT, RECORD_MONTH TEXT,PLACEHOLDER1 TEXT,PLACEHOLDER2 TEXT,PLACEHOLDER3 TEXT)"; 

            $STAFFNAME = $row['STAFFNAME'];
            $RIDDER = $row['RIDDER'];
            $NUMBER_PLATE = $row['NUMBER_PLATE'];
            $LTRS = $row['LTRS'];
            $AMOUNT  = $row['AMOUNT'];
            $DDATE = $row['DDATE']; 
            $RECORD_DATE = $row['RECORD_DATE'];


            // create an assoicative array(key:value) to results
            $results[] = array( 
                                'STAFFNAME' => $STAFFNAME,
                                'RIDDER' => $RIDDER,
                                'NUMBER_PLATE' => $NUMBER_PLATE,
                                'LTRS' => $LTRS,
                                'AMOUNT'  => $AMOUNT,
                                'DDATE' => $DDATE,
                                'RECORD_DATE' => $RECORD_DATE,
                                // 'REG_DATE' => $REG_DATE,
                            );
        }
    $json_results = json_encode($results);
    echo $json_results;
}

// =================================================================================
//                   Reports From Database
// =================================================================================
function ViewAllOilFuelReport ($table_name,$today)
{

    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM '$table_name'";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            // $fuel_report_table = "CREATE TABLE IF NOT EXISTS fuel_report (ID TEXT PRIMARY KEY,RIDDER TEXT ,NUMBER_PLATE TEXT,STAGE_NAME TEXT,LTRS TEXT,FREQUENCY TEXT,AMOUNT TEXT,RECORD_DATE TEXT, RECORD_MONTH TEXT,PLACEHOLDER1 TEXT,PLACEHOLDER2 TEXT,PLACEHOLDER3 TEXT)"; 

            $RIDDER = $row['RIDDER'];
            $NUMBER_PLATE = $row['NUMBER_PLATE'];
            $STAGENAME = $row['STAGE_NAME'];
            $LTRS = $row['LTRS'];
            $FREQUENCY = $row['FREQUENCY'];
            $AMOUNT  = $row['AMOUNT'];

            // create an assoicative array(key:value) to results
            $results[] = array( 
                                'STAGENAME' => $STAGENAME,
                                'RIDDER' => $RIDDER,
                                'NUMBER_PLATE' => $NUMBER_PLATE,
                                'LTRS' => $LTRS,
                                'AMOUNT'  => $AMOUNT,
                                'FREQUENCY' => $FREQUENCY,
                            );
        }
    $json_results = json_encode($results);
    echo $json_results;    
}

function ViewTodaysOilFuelReport ($table_name,$today)
{

    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM '$table_name' WHERE RECORD_DATE ='$today'";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            // $fuel_report_table = "CREATE TABLE IF NOT EXISTS fuel_report (ID TEXT PRIMARY KEY,RIDDER TEXT ,NUMBER_PLATE TEXT,STAGE_NAME TEXT,LTRS TEXT,FREQUENCY TEXT,AMOUNT TEXT,RECORD_DATE TEXT, RECORD_MONTH TEXT,PLACEHOLDER1 TEXT,PLACEHOLDER2 TEXT,PLACEHOLDER3 TEXT)"; 

            $RIDDER = $row['RIDDER'];
            $NUMBER_PLATE = $row['NUMBER_PLATE'];
            $STAGENAME = $row['STAGE_NAME'];
            $LTRS = $row['LTRS'];
            $FREQUENCY = $row['FREQUENCY'];
            $AMOUNT  = $row['AMOUNT'];

            // create an assoicative array(key:value) to results
            $results[] = array( 
                                'STAGENAME' => $STAGENAME,
                                'RIDDER' => $RIDDER,
                                'NUMBER_PLATE' => $NUMBER_PLATE,
                                'LTRS' => $LTRS,
                                'AMOUNT'  => $AMOUNT,
                                'FREQUENCY' => $FREQUENCY,
                            );
        }
    $json_results = json_encode($results);
    echo $json_results;    
}

function ViewThisWeekOilFuelReport ($table_name,$old_date,$todays_date)
{

    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM '$table_name' WHERE  RECORD_DATE BETWEEN '$old_date' AND '$todays_date'";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            // $fuel_report_table = "CREATE TABLE IF NOT EXISTS fuel_report (ID TEXT PRIMARY KEY,RIDDER TEXT ,NUMBER_PLATE TEXT,STAGE_NAME TEXT,LTRS TEXT,FREQUENCY TEXT,AMOUNT TEXT,RECORD_DATE TEXT, RECORD_MONTH TEXT,PLACEHOLDER1 TEXT,PLACEHOLDER2 TEXT,PLACEHOLDER3 TEXT)"; 

            $RIDDER = $row['RIDDER'];
            $NUMBER_PLATE = $row['NUMBER_PLATE'];
            $STAGENAME = $row['STAGE_NAME'];
            $LTRS = $row['LTRS'];
            $FREQUENCY = $row['FREQUENCY'];
            $AMOUNT  = $row['AMOUNT'];

            // create an assoicative array(key:value) to results
            $results[] = array( 
                                'STAGENAME' => $STAGENAME,
                                'RIDDER' => $RIDDER,
                                'NUMBER_PLATE' => $NUMBER_PLATE,
                                'LTRS' => $LTRS,
                                'AMOUNT'  => $AMOUNT,
                                'FREQUENCY' => $FREQUENCY,
                            );
        }
    $json_results = json_encode($results);
    echo $json_results;    
}

function ViewThisMonthOilFuelReport ($table_name,$month)
{

    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM '$table_name' WHERE  RECORD_MONTH = '$month'";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            // $fuel_report_table = "CREATE TABLE IF NOT EXISTS fuel_report (ID TEXT PRIMARY KEY,RIDDER TEXT ,NUMBER_PLATE TEXT,STAGE_NAME TEXT,LTRS TEXT,FREQUENCY TEXT,AMOUNT TEXT,RECORD_DATE TEXT, RECORD_MONTH TEXT,PLACEHOLDER1 TEXT,PLACEHOLDER2 TEXT,PLACEHOLDER3 TEXT)"; 

            $RIDDER = $row['RIDDER'];
            $NUMBER_PLATE = $row['NUMBER_PLATE'];
            $STAGENAME = $row['STAGE_NAME'];
            $LTRS = $row['LTRS'];
            $FREQUENCY = $row['FREQUENCY'];
            $AMOUNT  = $row['AMOUNT'];

            // create an assoicative array(key:value) to results
            $results[] = array( 
                                'STAGENAME' => $STAGENAME,
                                'RIDDER' => $RIDDER,
                                'NUMBER_PLATE' => $NUMBER_PLATE,
                                'LTRS' => $LTRS,
                                'AMOUNT'  => $AMOUNT,
                                'FREQUENCY' => $FREQUENCY,
                            );
        }
    $json_results = json_encode($results);
    echo $json_results;    
}

function ViewOilFuelRangeReport ($table_name,$from_date,$to_date)
{

    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM '$table_name' WHERE  RECORD_DATE BETWEEN '$from_date' AND '$to_date'";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            // $fuel_report_table = "CREATE TABLE IF NOT EXISTS fuel_report (ID TEXT PRIMARY KEY,RIDDER TEXT ,NUMBER_PLATE TEXT,STAGE_NAME TEXT,LTRS TEXT,FREQUENCY TEXT,AMOUNT TEXT,RECORD_DATE TEXT, RECORD_MONTH TEXT,PLACEHOLDER1 TEXT,PLACEHOLDER2 TEXT,PLACEHOLDER3 TEXT)"; 

            $RIDDER = $row['RIDDER'];
            $NUMBER_PLATE = $row['NUMBER_PLATE'];
            $STAGENAME = $row['STAGE_NAME'];
            $LTRS = $row['LTRS'];
            $FREQUENCY = $row['FREQUENCY'];
            $AMOUNT  = $row['AMOUNT'];

            // create an assoicative array(key:value) to results
            $results[] = array( 
                                'STAGENAME' => $STAGENAME,
                                'RIDDER' => $RIDDER,
                                'NUMBER_PLATE' => $NUMBER_PLATE,
                                'LTRS' => $LTRS,
                                'AMOUNT'  => $AMOUNT,
                                'FREQUENCY' => $FREQUENCY,
                            );
        }
    $json_results = json_encode($results);
    echo $json_results;    
}

function ViewByRidderOilFuelReport ($table_name,$ridder)
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM '$table_name' WHERE  RIDDER = '$ridder'";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            // $fuel_report_table = "CREATE TABLE IF NOT EXISTS fuel_report (ID TEXT PRIMARY KEY,RIDDER TEXT ,NUMBER_PLATE TEXT,STAGE_NAME TEXT,LTRS TEXT,FREQUENCY TEXT,AMOUNT TEXT,RECORD_DATE TEXT, RECORD_MONTH TEXT,PLACEHOLDER1 TEXT,PLACEHOLDER2 TEXT,PLACEHOLDER3 TEXT)"; 

            $RIDDER = $row['RIDDER'];
            $NUMBER_PLATE = $row['NUMBER_PLATE'];
            $STAGENAME = $row['STAGE_NAME'];
            $LTRS = $row['LTRS'];
            $FREQUENCY = $row['FREQUENCY'];
            $AMOUNT  = $row['AMOUNT'];

            // create an assoicative array(key:value) to results
            $results[] = array( 
                                'STAGENAME' => $STAGENAME,
                                'RIDDER' => $RIDDER,
                                'NUMBER_PLATE' => $NUMBER_PLATE,
                                'LTRS' => $LTRS,
                                'AMOUNT'  => $AMOUNT,
                                'FREQUENCY' => $FREQUENCY,
                            );
        }
    $json_results = json_encode($results);
    echo $json_results;    
}


function ViewOilFuelStageNameReport ($table_name,$stage_name)
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM '$table_name' WHERE  STAGE_NAME= '$stage_name'";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            // $fuel_report_table = "CREATE TABLE IF NOT EXISTS fuel_report (ID TEXT PRIMARY KEY,RIDDER TEXT ,NUMBER_PLATE TEXT,STAGE_NAME TEXT,LTRS TEXT,FREQUENCY TEXT,AMOUNT TEXT,RECORD_DATE TEXT, RECORD_MONTH TEXT,PLACEHOLDER1 TEXT,PLACEHOLDER2 TEXT,PLACEHOLDER3 TEXT)"; 

            $RIDDER = $row['RIDDER'];
            $NUMBER_PLATE = $row['NUMBER_PLATE'];
            $STAGENAME = $row['STAGE_NAME'];
            $LTRS = $row['LTRS'];
            $FREQUENCY = $row['FREQUENCY'];
            $AMOUNT  = $row['AMOUNT'];

            // create an assoicative array(key:value) to results
            $results[] = array( 
                                'STAGENAME' => $STAGENAME,
                                'RIDDER' => $RIDDER,
                                'NUMBER_PLATE' => $NUMBER_PLATE,
                                'LTRS' => $LTRS,
                                'AMOUNT'  => $AMOUNT,
                                'FREQUENCY' => $FREQUENCY,
                            );
        }
    $json_results = json_encode($results);
    echo $json_results;    
}


// names
function ViewNamesData ($table_names)
{
    global $db;
    $results = array();
    $select_cmd = "SELECT FULL_NAME FROM '$table_names'";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {$FULL_NAME = $row['FULL_NAME'];$results[] = $FULL_NAME;}
    $json_results = json_encode($results);
    echo $json_results;
}
function ViewStaffsIdData ($table_names)
{
    global $db;
    $results = array();
    $select_cmd = "SELECT STAFF_ID FROM '$table_names'";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {$STAFF_ID = $row['STAFF_ID'];$results[] = $STAFF_ID;}
    $json_results = json_encode($results);
    echo $json_results;
}
// names
function ViewStageData ($table_names)
{
    global $db;
    $results = array();
    $select_cmd = "SELECT STAGE FROM '$table_names'";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {$STAGE = $row['STAGE'];$results[] = $STAGE;}
    $json_results = json_encode($results);
    echo $json_results;
}
function ViewNumberPlateData ($table_names)
{
    global $db;
    $results = array();
    $select_cmd = "SELECT NUMBER_PLATE FROM '$table_names'";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {$NUMBER_PLATE = $row['NUMBER_PLATE'];$results[]  = $NUMBER_PLATE;}
    $json_results = json_encode($results);
    echo $json_results;
}
function ViewStageWithNameData ($table_names)
{
    global $db;
    $results = array();
    $singleArray = [];
    $select_cmd = "SELECT * FROM '$table_names'";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            $STAGE = $row['STAGE'];
            $NAME = $row['FULL_NAME'];
            $item = $NAME.'"'.':'.'"'.$NUMBER_PLATE;
            array_push($results,$item);
        }
    $json_results = json_encode($results);
    echo $json_results;
    // foreach ($results as $childArray)
    // {
    //     foreach ($childArray as $key => $value)
    //     {
    //         foreach ($childArray as $value)
    //         {
    //             $singleArray[] = $key.'"'.":".'"'.$value;
    //         } 
    //     }
    // }
    // echo json_encode($singleArray);
}
function ViewNumberPlateWithNameData ($table_names)
{
    global $db;
    $results = array();
    $singleArray = [];
    $select_cmd = "SELECT * FROM '$table_names'";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            $NAME = $row['FULL_NAME'];
            $NUMBER_PLATE = $row['NUMBER_PLATE'];
            // $item = $NAME.':'.$NUMBER_PLATE;
            $item = '"'.$NAME.'"'.':'.'"'.$NUMBER_PLATE.'"';
            array_push($results,$item);
            // $results[]  = array ($NAME => $NUMBER_PLATE);

        }
    $json_results = json_encode($results);

    $implode =  implode(",",$results);
    $explode =  explode(" ,",$implode);
    // echo json_encode($implode);
    echo json_encode($explode);
    // echo $json_results;

    // foreach ($results as $childArray)
    // {
    //     foreach ($childArray as $key => $value)
    //     {
    //         foreach ($childArray as $value)
    //         {
    //             // $singleArray[] = $key.'"'.":".'"'.$value;
    //             $singleArray[] = array($key=>$value);
    //         } 
    //     }
    // }
    // echo json_encode($singleArray);

}
// ViewNumberPlateWithNameData ('ridders');
function ViewOilFuelRiddersWithHide ($table_names1, $table_names2)
{

    global $DefaulterName, $db;
    $riddersnames = array();
    $defualterriddersnames = array();

    $select_cmd_1 = "SELECT FULL_NAME FROM '$table_names1'";
    $query_cmd_1 = $db->query($select_cmd_1);
    while ($row = $query_cmd_1->fetchArray(SQLITE3_ASSOC))
        {$FULL_NAME = $row['FULL_NAME'];$riddersnames[] = $FULL_NAME;}


    $select_cmd_2 = "SELECT RIDDER FROM '$table_names2' WHERE PLACEHOLDER2= '$DefaulterName'";
    $query_cmd_2 = $db->query($select_cmd_2);
    while ($row = $query_cmd_2->fetchArray(SQLITE3_ASSOC))
        {$FULL_NAME = $row['RIDDER'];$defualterriddersnames[] = $FULL_NAME;}
    

    $json_results_1 = json_encode($riddersnames);
    $json_results_2 = json_encode($defualterriddersnames);

        // echo $json_results_1;
        // echo "0000000000000000";
        // echo $json_results_2;
    $sortednames = array_diff($riddersnames,$defualterriddersnames);
    // return arrrary without keys
    echo json_encode(array_values($sortednames));
}


/** 
 * @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
 *              ================
 *              EDITING FROM DB
 *              ================
 * @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
 *  
*/

function EditOilFuel ($table_name,$id)
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM '$table_name' WHERE ID ='$id'";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
    
            $ID = $row['ID'];
            $STAFFNAME = $row['STAFFNAME']; 
            $STAFF_ID = $row['STAFF_ID'];
            $RIDDER = $row['RIDDER'];
            $NUMBER_PLATE = $row['NUMBER_PLATE'];
            $FUEL_TYPE = $row['FUEL_TYPE'];
            $LTRS = $row['LTRS'];
            $AMOUNT = $row['AMOUNT'];
            $DDATE = $row['DDATE'];
            $RECORD_DATE= $row['RECORD_DATE'];
            $STAGE = $row['PLACEHOLDER3'];
            


            // create an assoicative array(key:value) to results
            $results[] = array( 
                                'ID' => $ID, 
                                'STAFFNAME' => $STAFFNAME, 
                                'STAFF_ID' => $STAFF_ID,
                                'RIDDER' => $RIDDER,
                                'NUMBER_PLATE' => $NUMBER_PLATE,
                                'FUEL_TYPE' => $FUEL_TYPE,
                                'LTRS' => $LTRS,
                                'AMOUNT' => $AMOUNT,
                                'DDATE' => $DDATE,
                                'RECORD_DATE' => $RECORD_DATE,
                                'STAGE' => $STAGE
                            );
        }
    $json_results = json_encode($results);
    echo $json_results;
}

function EditOilFuelPayments ($table_name,$id)
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM '$table_name' WHERE ID ='$id'";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
    
            $ID = $row['ID'];
            $STAFFNAME = $row['STAFFNAME']; 
            $STAFF_ID = $row['STAFF_ID'];
            $RIDDER = $row['RIDDER'];
            $NUMBER_PLATE = $row['NUMBER_PLATE'];
            $FUEL_TYPE = $row['FUEL_TYPE'];
            $LTRS = $row['LTRS'];
            $AMOUNT = $row['AMOUNT'];
            $DDATE = $row['DDATE'];
            $RECORD_DATE= $row['RECORD_DATE'];
            $STAGE = $row['PLACEHOLDER3'];
            


            // create an assoicative array(key:value) to results
            $results[] = array( 
                                'ID' => $ID, 
                                'STAFFNAME' => $STAFFNAME, 
                                'STAFF_ID' => $STAFF_ID,
                                'RIDDER' => $RIDDER,
                                'NUMBER_PLATE' => $NUMBER_PLATE,
                                'FUEL_TYPE' => $FUEL_TYPE,
                                'LTRS' => $LTRS,
                                'AMOUNT' => $AMOUNT,
                                'DDATE' => $DDATE,
                                'RECORD_DATE' => $RECORD_DATE,
                                'STAGE' => $STAGE
                            );
        }
    $json_results = json_encode($results);
    echo $json_results;
}

function EditExpenses ($table_name,$id)
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM '$table_name' WHERE ID ='$id'";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            $ID = $row['ID'];
            $STAFFNAME = $row['STAFFNAME'];
            $STAFF_ID  = $row['STAFF_ID'];
            $RECEIVER = $row['RECEIVER'];
            $AMOUNT  = $row['AMOUNT'];
            $EDESCRIPTION = $row['EDESCRIPTION'];
            $EDATE = $row['EDATE']; 
            $REG_DATE = $row['RECORD_DATE'];

            // create an assoicative array(key:value) to results
            $results[] = array( 
                                'ID' => $ID, 
                                'STAFFNAME' => $STAFFNAME,
                                'STAFF_ID' => $STAFF_ID,
                                'RECEIVER' => $RECEIVER,
                                'AMOUNT'  => $AMOUNT,
                                'EDESCRIPTION' => $EDESCRIPTION,
                                'EDATE' => $EDATE,
                                'REG_DATE' => $REG_DATE,
                            );
        }
    $json_results = json_encode($results);
    echo $json_results;
}

function EditStaffs ($table_name,$id)
{
    global $db;
    // $results = array();
    $select_cmd = "SELECT * FROM '$table_name' WHERE ID='$id'";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            $ID = $row['ID'];
            $FNAME = $row['FNAME']; 
            $LNAME = $row['LNAME']; 
            $FULL_NAME = $row['FULL_NAME'];
            $GENDER = $row['GENDER'];
            $STAFF_ID  = $row['STAFF_ID'];
            $STAFF_ROLE  = $row['STAFF_ROLE'];
            $CONTACT = $row['CONTACT'];
            $REG_DATE = $row['REG_DATE'];
            $PASSWORD = $row['UPASSWORD'];
            $UUSERNAME = $row['UUSERNAME'];

            // create an assoicative array(key:value) to results
            $results[] = array( 
                                'ID' => $ID, 
                                'FNAME' => $FNAME, 
                                'LNAME' => $LNAME, 
                                'FULL_NAME' => $FULL_NAME,
                                'GENDER' => $GENDER,
                                'STAFF_ID'  => $STAFF_ID,
                                'STAFF_ROLE'  => $STAFF_ROLE,
                                'CONTACT' => $CONTACT,
                                'REG_DATE' => $REG_DATE,
                                'PASSWORD' => $PASSWORD,
                                'USERNAME' => $UUSERNAME,
                            );
        }
    $json_results = json_encode($results);
    echo $json_results;
}

function EditRidders ($table_name,$id)
{
    global $db;
    // $results = array();
    $select_cmd = "SELECT * FROM '$table_name' WHERE ID='$id'";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            $ID = $row['ID'];
            $FNAME = $row['FNAME']; 
            $LNAME = $row['LNAME']; 
            $FULL_NAME = $row['FULL_NAME'];
            $GENDER = $row['GENDER'];
            $STAGE  = $row['STAGE'];
            $NUMBER_PLATE  = $row['NUMBER_PLATE'];
            $CONTACT = $row['CONTACT'];
            $REG_DATE = $row['REG_DATE'];


            // create an assoicative array(key:value) to results
            $results[] = array( 
                                'ID' => $ID, 
                                'FNAME' => $FNAME, 
                                'LNAME' => $LNAME, 
                                'FULL_NAME' => $FULL_NAME,
                                'STAGE' => $STAGE,
                                'GENDER' => $GENDER,
                                'STAFF_ID'  => $STAFF_ID,
                                'NUMBER_PLATE'  => $NUMBER_PLATE,
                                'CONTACT' => $CONTACT,
                                'REG_DATE' => $REG_DATE,
                            );
        }
    $json_results = json_encode($results);
    echo $json_results;
}
/** 
 * @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
 *              ================
 *              UPDATING  DB
 *              ================
 * @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
 *  
*/
function UpdatePassword ($table_name,$new_password,$username,$old_password)
{
    global $db;
    $update_cmd = "UPDATE '$table_name' SET 
                    UPASSWORD = '$new_password'
                    WHERE UUSERNAME = '$username' AND UPASSWORD = '$old_password'";

    $update_excution = $db->exec($update_cmd);
    if (!$update_excution) 
    {
        $message = "Update Data Base <br>Error<br>". $db->lastErrorMsg();
        echo $message;
        exit();
    }
    $db->close();
}
// UpdatePassword ('staffs','20','kk','2022');
function UpdateOilFuel ($table_name,$id,$staffname,$staff_id,$ridder, $number_plate,$fuel_type,$ltrs,$amount,$ddate,$stage)
{
    global $db;
    $update_cmd = "UPDATE '$table_name' SET 
                        STAFFNAME = '$staffname',STAFF_ID ='$staff_id',
                        RIDDER = '$ridder', PLACEHOLDER3 = '$stage',
                        NUMBER_PLATE = '$number_plate',LTRS ='$ltrs',AMOUNT =$amount,DDATE='$ddate'
                    WHERE ID = '$id'";
    $update_excution = $db->exec($update_cmd);
    if (!$update_excution) 
    {
        $message = "Update Data Base <br>Error<br>". $db->lastErrorMsg();
        echo $message;
        exit();
    }
    $db->close();
}

function UpdateOilFuelPayments ($table_name,$id,$staffname,$staff_id,$ridder, $number_plate,$amount,$ddate,$stage)
{
    global $db;
    $update_cmd = "UPDATE '$table_name' SET 
                        STAFFNAME = '$staffname',STAFF_ID ='$staff_id',
                        RIDDER = '$ridder', PLACEHOLDER3 = '$stage',
                        NUMBER_PLATE = '$number_plate',AMOUNT =$amount,DDATE='$ddate'
                    WHERE ID = '$id'";
    $update_excution = $db->exec($update_cmd);
    if (!$update_excution) 
    {
        $message = "Update Data Base <br>Error<br>". $db->lastErrorMsg();
        echo $message;
        exit();
    }
    $db->close();
}
function UpdateExpenses ($table_name,$id,$staffname,$staff_id,$receiver,$amount,$edate,$edescription)
{
    global $db;
    $update_cmd = "UPDATE '$table_name' SET 
                        STAFFNAME = '$staffname',STAFF_ID ='$staff_id',
                        RECEIVER = '$receiver',AMOUNT =$amount,EDATE='$edate'
                    WHERE ID = '$id'";
    $update_excution = $db->exec($update_cmd);
    if (!$update_excution) 
    {
        $message = "Update Data Base <br>Error<br>". $db->lastErrorMsg();
        echo $message;
        exit();
    }
    $db->close();
}

function UpdateStaffs ($table_name,$id,$fname,$lname,$full_name,$gender,$staff_id,$staff_role,$contact,$reg_date,$password)
{
    global $db;
    $update_cmd = "UPDATE '$table_name' SET 
                        LNAME='$fname', LNAME='$lname' ,FULL_NAME='$full_name',GENDER='$gender',
                        STAFF_ID='$staff_id',STAFF_ROLE= '$staff_role',CONTACT='$contact',
                        REG_DATE = '$reg_date',  PLACEHOLDER1 = '$password'
                    WHERE ID = '$id'";
    $update_excution = $db->exec($update_cmd);
    if (!$update_excution) 
    {
        $message = "Update Data Base <br>Error<br>". $db->lastErrorMsg();
        echo $message;
        exit();
    }
    $db->close();
}
function UpdateRidders ($table_name,$id,$fname,$lname,$full_name,$gender,$number_plate,$contact,$stage,$reg_date)
{
    global $db;
    $update_cmd = "UPDATE '$table_name' SET 
                        LNAME='$fname', LNAME='$lname' ,FULL_NAME='$full_name',GENDER='$gender',
                        STAGE='$stage',NUMBER_PLATE= '$number_plate',CONTACT='$contact',REG_DATE = '$reg_date'
                    WHERE ID = '$id'";
    $update_excution = $db->exec($update_cmd);
    if (!$update_excution) 
    {
        $message = "Update Data Base <br>Error<br>". $db->lastErrorMsg();
        echo $message;
        exit();
    }
    $db->close();
}


/** 
 * @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
 *              ================
 *              DELETING FROM DB
 *              ================
 * @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
 *  
*/
function DeleteFromDataBase ($table_name, $id)
{
    global $db;
    $delete_cmd = "DELETE FROM '$table_name' WHERE ID = '$id'";
    $delete_excution = $db->exec($delete_cmd);
    if (!$delete_excution) 
    {
        $message = "Data Base <br>Error<br>". $db->lastErrorMsg();
        echo $message;
        exit();
    }
}

// =================================================================================
// =================================================================================
//                  Balancing  from DB
// =================================================================================
// =================================================================================

function AllBalancing ()
{
    global $db;
    $results = array();
    $oilresults = array();
    $fuelresults = array();
    $expensesresults = array();

    $oiltotal = 0;
    $fueltotal = 0;
    $expensestotal = 0;

    $oil_cmd = "SELECT * FROM oil";
    $oil_query = $db->query($oil_cmd);
    while ($row = $oil_query ->fetchArray(SQLITE3_ASSOC))
        {$AMOUNT = $row['AMOUNT'];$oilresults[] = $AMOUNT;}

    foreach($oilresults as $amount)
        {$formatamount = str_replace(',','',$amount); $oiltotal += $formatamount;}
        $oil_total = number_format($oiltotal);
        
    $fuel_cmd = "SELECT * FROM fuel";
    $fuel_query = $db->query($fuel_cmd);
    while ($row = $fuel_query ->fetchArray(SQLITE3_ASSOC))
        {$AMOUNT = $row['AMOUNT'];$fuelresults[] = $AMOUNT;}

    foreach($fuelresults as $amount)
        {$formatamount = str_replace(',','',$amount); $fueltotal += $formatamount;}
        $fuel_total = number_format($fueltotal);
    
    $expenses_cmd = "SELECT * FROM expenses";
    $expenses_query = $db->query($expenses_cmd);
    while ($row = $expenses_query ->fetchArray(SQLITE3_ASSOC))
        {$AMOUNT = $row['AMOUNT'];$expensesresults[] = $AMOUNT;}

    foreach($expensesresults as $amount)
        {$formatamount = str_replace(',','',$amount); $expensestotal += $formatamount;}
        $expeneses_total = number_format($expensestotal);
    
        $results[]= array('oil'=> $oil_total,'fuel'=> $fuel_total,'expenses'=>$expeneses_total);
        $json_results = json_encode($results);
    echo $json_results;
    
}

function TodaysBalancing ($date)
{
    global $db;
    $results = array();
    $oilresults = array();
    $fuelresults = array();
    $expensesresults = array();

    $oiltotal = 0;
    $fueltotal = 0;
    $expensestotal = 0;

    $oil_cmd = "SELECT AMOUNT FROM oil WHERE RECORD_DATE ='$date'";
    $oil_query = $db->query($oil_cmd);
    while ($row = $oil_query ->fetchArray(SQLITE3_ASSOC))
        {$AMOUNT = $row['AMOUNT'];$oilresults[] = $AMOUNT;}

    foreach($oilresults as $amount)
        {$formatamount = str_replace(',','',$amount); $oiltotal += $formatamount;}
        $oil_total = number_format($oiltotal);
        
    $fuel_cmd = "SELECT AMOUNT FROM fuel WHERE RECORD_DATE ='$date'";
    $fuel_query = $db->query($fuel_cmd);
    while ($row = $fuel_query ->fetchArray(SQLITE3_ASSOC))
        {$AMOUNT = $row['AMOUNT'];$fuelresults[] = $AMOUNT;}

    foreach($fuelresults as $amount)
        {$formatamount = str_replace(',','',$amount); $fueltotal += $formatamount;}
        $fuel_total = number_format($fueltotal);
    
    $expenses_cmd = "SELECT AMOUNT FROM expenses WHERE RECORD_DATE ='$date'";
    $expenses_query = $db->query($expenses_cmd);
    while ($row = $expenses_query ->fetchArray(SQLITE3_ASSOC))
        {$AMOUNT = $row['AMOUNT'];$expensesresults[] = $AMOUNT;}

    foreach($expensesresults as $amount)
        {$formatamount = str_replace(',','',$amount); $expensestotal += $formatamount;}
        $expeneses_total = number_format($expensestotal);
    
        $results[]= array('oil'=> $oil_total,'fuel'=> $fuel_total,'expenses'=>$expeneses_total);
        $json_results = json_encode($results);
    echo $json_results;

}


function ViewThisWeekBalancing ($old_date,$todays_date)
{
    global $db;
    $results = array();
    $oilresults = array();
    $fuelresults = array();
    $expensesresults = array();

    $oiltotal = 0;
    $fueltotal = 0;
    $expensestotal = 0;

    $oil_cmd = "SELECT * FROM oil WHERE  RECORD_DATE BETWEEN '$old_date' AND '$todays_date'";
    $oil_query = $db->query($oil_cmd);
    while ($row = $oil_query ->fetchArray(SQLITE3_ASSOC))
        {$AMOUNT = $row['AMOUNT'];$oilresults[] = $AMOUNT;}

    foreach($oilresults as $amount)
        {$formatamount = str_replace(',','',$amount); $oiltotal += $formatamount;}
        $oil_total = number_format($oiltotal);
        
    $fuel_cmd = "SELECT * FROM fuel WHERE  RECORD_DATE BETWEEN '$old_date' AND '$todays_date'";
    $fuel_query = $db->query($fuel_cmd);
    while ($row = $fuel_query ->fetchArray(SQLITE3_ASSOC))
        {$AMOUNT = $row['AMOUNT'];$fuelresults[] = $AMOUNT;}

    foreach($fuelresults as $amount)
        {$formatamount = str_replace(',','',$amount); $fueltotal += $formatamount;}
        $fuel_total = number_format($fueltotal);
    
    $expenses_cmd = "SELECT * FROM expenses WHERE  RECORD_DATE BETWEEN '$old_date' AND '$todays_date'";
    $expenses_query = $db->query($expenses_cmd);
    while ($row = $expenses_query ->fetchArray(SQLITE3_ASSOC))
        {$AMOUNT = $row['AMOUNT'];$expensesresults[] = $AMOUNT;}

    foreach($expensesresults as $amount)
        {$formatamount = str_replace(',','',$amount); $expensestotal += $formatamount;}
        $expeneses_total = number_format($expensestotal);
    
        $results[]= array('oil'=> $oil_total,'fuel'=> $fuel_total,'expenses'=>$expeneses_total);
        $json_results = json_encode($results);
    echo $json_results;

}

function ViewThisMonthBalancing ($month)
{
    global $db;
    $results = array();
    $oilresults = array();
    $fuelresults = array();
    $expensesresults = array();

    $oiltotal = 0;
    $fueltotal = 0;
    $expensestotal = 0;

    $oil_cmd = "SELECT * FROM oil WHERE  RECORD_MONTH = '$month'";
    $oil_query = $db->query($oil_cmd);
    while ($row = $oil_query ->fetchArray(SQLITE3_ASSOC))
        {$AMOUNT = $row['AMOUNT'];$oilresults[] = $AMOUNT;}

    foreach($oilresults as $amount)
        {$formatamount = str_replace(',','',$amount); $oiltotal += $formatamount;}
        $oil_total = number_format($oiltotal);
        
    $fuel_cmd = "SELECT * FROM fuel WHERE  RECORD_MONTH = '$month'";
    $fuel_query = $db->query($fuel_cmd);
    while ($row = $fuel_query ->fetchArray(SQLITE3_ASSOC))
        {$AMOUNT = $row['AMOUNT'];$fuelresults[] = $AMOUNT;}

    foreach($fuelresults as $amount)
        {$formatamount = str_replace(',','',$amount); $fueltotal += $formatamount;}
        $fuel_total = number_format($fueltotal);
    
    $expenses_cmd = "SELECT * FROM expenses WHERE  RECORD_MONTH = '$month'";
    $expenses_query = $db->query($expenses_cmd);
    while ($row = $expenses_query ->fetchArray(SQLITE3_ASSOC))
        {$AMOUNT = $row['AMOUNT'];$expensesresults[] = $AMOUNT;}

    foreach($expensesresults as $amount)
        {$formatamount = str_replace(',','',$amount); $expensestotal += $formatamount;}
        $expeneses_total = number_format($expensestotal);
    
        $results[]= array('oil'=> $oil_total,'fuel'=> $fuel_total,'expenses'=>$expeneses_total);
        $json_results = json_encode($results);
    echo $json_results;

}

function ViewRangeBalancing ($from_date,$to_date)
{
    global $db;
    $results = array();
    $oilresults = array();
    $fuelresults = array();
    $expensesresults = array();

    $oiltotal = 0;
    $fueltotal = 0;
    $expensestotal = 0;

    $oil_cmd = "SELECT * FROM oil WHERE  RECORD_DATE BETWEEN '$from_date' AND '$to_date'";
    $oil_query = $db->query($oil_cmd);
    while ($row = $oil_query ->fetchArray(SQLITE3_ASSOC))
        {$AMOUNT = $row['AMOUNT'];$oilresults[] = $AMOUNT;}

    foreach($oilresults as $amount)
        {$formatamount = str_replace(',','',$amount); $oiltotal += $formatamount;}
        $oil_total = number_format($oiltotal);
        
    $fuel_cmd = "SELECT * FROM fuel WHERE  RECORD_DATE BETWEEN '$from_date' AND '$to_date'";
    $fuel_query = $db->query($fuel_cmd);
    while ($row = $fuel_query ->fetchArray(SQLITE3_ASSOC))
        {$AMOUNT = $row['AMOUNT'];$fuelresults[] = $AMOUNT;}

    foreach($fuelresults as $amount)
        {$formatamount = str_replace(',','',$amount); $fueltotal += $formatamount;}
        $fuel_total = number_format($fueltotal);
    
    $expenses_cmd = "SELECT * FROM expenses WHERE  RECORD_DATE BETWEEN '$from_date' AND '$to_date'";
    $expenses_query = $db->query($expenses_cmd);
    while ($row = $expenses_query ->fetchArray(SQLITE3_ASSOC))
        {$AMOUNT = $row['AMOUNT'];$expensesresults[] = $AMOUNT;}

    foreach($expensesresults as $amount)
        {$formatamount = str_replace(',','',$amount); $expensestotal += $formatamount;}
        $expeneses_total = number_format($expensestotal);
    
        $results[]= array('oil'=> $oil_total,'fuel'=> $fuel_total,'expenses'=>$expeneses_total);
        $json_results = json_encode($results);
    echo $json_results;

}

// =================================================================================
// =================================================================================
//                  Counting from
// =================================================================================
// =================================================================================

function TotalNumbersOfStaffs ()
{
    global $db;
    // $results = $db->query('SELECT COUNT(*) FROM (SELECT `id`,* FROM `table` ORDER BY `id` ASC);');
    $results = $db->query('SELECT COUNT(*) FROM staffs;');
    while ($row = $results->fetchArray()) {echo json_encode($row["COUNT(*)"]);}
}
function TotalNumbersOfStages ()
{
    global $db;
    $results = $db->query('SELECT COUNT(*) FROM stages;');
    while ($row = $results->fetchArray()) {echo json_encode($row["COUNT(*)"]);}
}
function TotalNumbersOfRidders ()
{
    global $db;
    $results = $db->query('SELECT COUNT(*) FROM ridders;');
    while ($row = $results->fetchArray()) {echo json_encode($row["COUNT(*)"]);}
}

function TodaysSales($table_name,$date)
{
    global $db;
    $results = array();
    $total = 0;

    $oil_cmd = "SELECT AMOUNT FROM '$table_name' WHERE RECORD_DATE ='$date'";
    $oil_query = $db->query($oil_cmd);
    while ($row = $oil_query ->fetchArray(SQLITE3_ASSOC))
        {$AMOUNT = $row['AMOUNT'];$results[] = $AMOUNT;}

    foreach($results as $amount)
        {$formatamount = str_replace(',','',$amount); $total += $formatamount;}
        $formated_total = number_format($total);
        
        // echo $formated_total;
        echo json_encode($formated_total);
}

function TodaysLiters($table_name,$date)
{
    global $db;
    $total = 0;

    $ltrs_cmd = "SELECT LTRS FROM '$table_name' WHERE RECORD_DATE ='$date'";
    $ltrs_query = $db->query($ltrs_cmd);
    while ($row = $ltrs_query ->fetchArray(SQLITE3_ASSOC))
        {$LTRS = $row['LTRS'];$results[] = $LTRS;}

    foreach($results as $ltrs)
        {$formatltrs = str_replace(',','',$ltrs); $total += $formatltrs;}
        $formated_total = number_format($total);
        
        // echo $formated_total;
        echo json_encode($formated_total);
}

function TotalDefaulters ( $table_name, $name)
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM '$table_name' WHERE PLACEHOLDER2 = '$name'";
    $select_query = $db->query($select_cmd);
    while ($row = $select_query ->fetchArray(SQLITE3_ASSOC))
        {$PLACEHOLDER2 = $row['PLACEHOLDER2'];$results[] = $PLACEHOLDER2;}
        echo  json_encode(sizeof($results));
}

function TotalStages ($table_name)
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM '$table_name'";
    $select_query = $db->query($select_cmd);
    while ($row = $select_query ->fetchArray(SQLITE3_ASSOC))
        {
            $STAGE = $row['STAGE'];
            $results[] = $STAGE;
        }
    $removeduplicate = array_unique($results);
    echo  json_encode(sizeof($removeduplicate));
}
// function SignIn_User($username, $upassword)
// {
//     global $db;
//     $results = array();
//     $select_cmd = "SELECT * FROM managers WHERE USERNAME = '$username' AND UPASSWORD = '$upassword' ";
//     $query_cmd = $db->query($select_cmd);
//     while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
//         {
//             $status = "Success";
//             $USERNAME = $row['USERNAME']; 
//             $CONTACTS = $row['CONTACTS'];
//             $TYPE = 'Staff';
//             $results[] = array($status, $USERNAME,$CONTACTS,$TYPE);
//         }

//     $json_results = json_encode($results);
//     echo $json_results;
// }





// Create Tables
// CreateDataBaseTables ();
// SetDatabasePermissions ();

?>