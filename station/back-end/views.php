<?php

include "modal.php";
include "configfile.php";



// =================================================================================
//                  Writting To db
// =================================================================================


function AddAdminEndpoint ($requesturl)
{ 
    global $DataBaseId ,$TodaysDate,$DataBasePlaceholder3;
    global $DataBasePlaceholder1,$DataBasePlaceholder2;

    // // customer details
    $fname = trim($_POST['fname']); 
    $lname = trim($_POST['lname']); 
    $gender = trim($_POST['gender']);
    $username = trim($_POST['username']); 
    $password = trim($_POST['password']);
    

    $id = $DataBaseId;
    $full_name = $fname." ".$lname;
    $reg_date = $TodaysDate;
    $placeholder1=$DataBasePlaceholder1;
    $placeholder2 = $DataBasePlaceholder2; 
    $placeholder3 = $DataBasePlaceholder3;

    AddAdmin($id,$fname,$lname,$full_name,$gender,$username,$password,$reg_date,$placeholder1,$placeholder2,$placeholder3);
    echo "Success <br>Admin <br> Has Been Added Well";
}

function AddStaffEndpoint ($requesturl)
{ 
    global $DataBaseId ,$TodaysDate,$DataBasePlaceholder3;
    global $DataBasePlaceholder1,$DataBasePlaceholder2;

    // // customer details
    $fname = trim($_POST['fname']); 
    $lname = trim($_POST['lname']); 
    $gender = trim($_POST['gender']);
    $staff_id = trim($_POST['emp_id']);
    $staff_role = trim($_POST['role']);
    $contact = trim($_POST['contact']);
    $reg_date = trim($_POST['reg_date']);
    $upassword = trim($_POST['password']);
    $uusername = trim($_POST['username']);


    $id = $DataBaseId;
    $staff_id = "E".date("dh-is");
    $full_name = $fname." ".$lname;
    $placeholder1= $DataBasePlaceholder1;
    $placeholder2 = $DataBasePlaceholder2; 
    $placeholder3 = $DataBasePlaceholder3;
    

    AddStaff($id,$fname,$lname,$full_name,$gender,$staff_id,$staff_role,$contact,$reg_date,$uusername,$upassword,$placeholder1,$placeholder2,$placeholder3);
    echo "Success <br>Staff <br> Has Been Added Well";
}

function AddRidderEndpoint ($requesturl)
{ 
    global $TodaysDate, $DataBaseCurrentMonth,$DataBaseId;
    global $DataBasePlaceholder1,$DataBasePlaceholder2,$DataBasePlaceholder3;
    // // customer details
    $fname = trim($_POST['fname']); 
    $lname = trim($_POST['lname']); 
    $gender = trim($_POST['gender']);
    $stage = trim($_POST['stage']);
    $number_plate = trim($_POST['number_plate']);
    $contact = trim($_POST['contact']);
    $reg_date = trim($_POST['reg_date']);

    $full_name = $fname ." ".$lname;
    $id = $DataBaseId;
    $placeholder1 = $DataBasePlaceholder1; 
    $placeholder2= $DataBasePlaceholder2; 
    $placeholder3 = $DataBasePlaceholder3;
    $record_date = $TodaysDate;
    $record_month = $DataBaseCurrentMonth;
    
    AddRidder($id,$fname,$lname,$full_name, $gender,$stage,$number_plate,$contact,$reg_date,$record_date,$record_month,$placeholder1,$placeholder2,$placeholder3);
    // AddStage($id,$stage,$placeholder1,$placeholder2,$placeholder3);
    echo "Success <br>Ridder <br> Has Been Added Well";
}

function AddExpensesEndpoint ($requesturl)
{ 
    global $DataBaseId,$TodaysDate,$DataBaseCurrentMonth;
    global $DataBaseTime,$DefaulterName,$DataBasePlaceholder3;

    // // customer details
    $staffname = "Null"; 
    $staff_id = trim($_POST['staffid']); 
    $receiver = trim($_POST['receiver']);
    $amount = trim($_POST['amount']);
    $edate = trim($_POST['reg_date']);
    $edescription = trim($_POST['description']);

    $id = $DataBaseId;
    $record_date = $TodaysDate; 
    $record_month = $DataBaseCurrentMonth;

    $placeholder1 = $DataBaseTime; 
    $placeholder2 = $DefaulterName;
    $placeholder3 = $DataBasePlaceholder3 ;
    
    AddExpenses($id,$staffname,$staff_id,$receiver,$amount,$edate,$edescription,$record_date,$record_month,$placeholder1,$placeholder2,$placeholder3);
    echo "Success <br>Expenses <br> Has Been Added Well";
}
function AddFuelEndpoint ($requesturl)
{ 
    global $DataBaseId,$TodaysDate,$DataBaseCurrentMonth;
    global $DataBaseTime,$DefaulterName,$FuelTableName;
    // // customer details
    $staffname = trim($_POST['staffname']); 
    // $staff_id = trim($_POST['staffid']); 
    $ridder = trim($_POST['ridder']);
    $number_plate = trim($_POST['number_plate']);
    $fuel_type = trim($_POST['fuel_type']);
    $ltrs = trim($_POST['ltrs']);
    $amount = trim($_POST['amount']);
    $stage = trim($_POST['stage']);
    // $ddate = trim($_POST['reg_date']);

    $id = $DataBaseId;
    $ddate = $TodaysDate;
    $staff_id = "null"; 
    $record_date = $TodaysDate; 
    $record_month = $DataBaseCurrentMonth;

    $placeholder1 = $DataBaseTime; 
    $placeholder2 = $DefaulterName;
    $placeholder3 = $stage;
    
    AddFuel($FuelTableName,$id,$staffname,$staff_id,$ridder, $number_plate,$fuel_type,$ltrs,$amount,$ddate,$record_date,$record_month,$placeholder1,$placeholder2,$placeholder3);
    echo "Success <br>Fuel <br> Has Been Added Well";
}

function AddOilEndpoint ($requesturl)
{ 
    global $DataBaseTime,$DataBaseId,$DataBasePlaceholder3,$OilTableName;
    global $DataBaseCurrentMonth,$TodaysDate,$DefaulterName;
    // // customer details
    $staffname = trim($_POST['staffname']); 
    // $staff_id = trim($_POST['staffid']); 
    $ridder = trim($_POST['ridder']);
    $number_plate = trim($_POST['number_plate']);
    $ltrs = trim($_POST['ltrs']);
    $stage = trim($_POST['stage']);
    $amount = trim($_POST['amount']);
    // $ddate = trim($_POST['reg_date']);

    $id = $DataBaseId;
    $ddate = $TodaysDate;
    $staff_id = "null"; 
    $record_date = $TodaysDate; 
    $record_month = $DataBaseCurrentMonth;

    $placeholder1 = $DataBaseTime;
    $placeholder2 = $DefaulterName;
    $placeholder3 = $stage;

    AddOil($id,$staffname,$staff_id,$ridder, $number_plate,$ltrs, $amount,$ddate,$record_date,$record_month,$placeholder1,$placeholder2,$placeholder3);
    echo "Success <br>Oil <br> Has Been Added Well";
}

function AddFuelPaymentEndpoint ($requesturl)
{ 
    global $DataBaseId, $DefaulterName,$FuelTableName;
    global $DataBaseCurrentMonth,$TodaysDate,$DefaulterCleared;
    $staffname = trim($_POST['staffname']); 
    // $staff_id = trim($_POST['staffid']); 
    $ridder = trim($_POST['ridder']);
    $number_plate = trim($_POST['number_plate']);
    $amount = trim($_POST['amount']);
    // $ddate = trim($_POST['reg_date']);
    $stage = trim($_POST['stage']);


    $id = $DataBaseId;
    $time = date('H:i:s');
    $ddate = $TodaysDate;
    $staff_id = "null";
    $record_date = $TodaysDate; 
    $record_month = $DataBaseCurrentMonth;

    $placeholder1 = $time;
    $placeholder2 = $DefaulterName;
    $placeholder3 = $stage;
    $update = $DefaulterCleared;
    AddFuelPayment($FuelTableName,$update,$id,$staffname,$staff_id,$ridder, $number_plate,$amount,$ddate,$record_date,$record_month,$placeholder1,$placeholder2,$placeholder3);
    echo "Success <br>Fuel Payment <br> Has Been Added Well";
}

function AddOilPaymentEndpoint ($requesturl)
{ 
    global $DefaulterName, $OilTableName,$TodaysDate;
    global $DefaulterCleared,$DataBasePlaceholder2;
    global $DataBaseCurrentMonth, $DataBaseTime,$DataBaseId,$DataBasePlaceholder3;
    $staffname = trim($_POST['staffname']); 
    // $staff_id = trim($_POST['staffid']); 
    $ridder = trim($_POST['ridder']);
    $number_plate = trim($_POST['number_plate']);
    $staff_id = "null";
    $record_date = $TodaysDate; 
    $amount = trim($_POST['amount']);
    $ddate = $TodaysDate; //trim($_POST['reg_date']);
    $stage = trim($_POST['stage']);

    $id = $DataBaseId;
    $record_date = $TodaysDate; 
    $record_month = $DataBaseCurrentMonth;

    $placeholder1 = $DataBaseTime;
    $placeholder2 = $DataBasePlaceholder2;
    $placeholder3 = $stage;
    $update = $DefaulterCleared;
    
    AddOilPayment($OilTableName,$update, $id,$staffname,$staff_id,$ridder, $number_plate,$amount,$ddate,$record_date,$record_month,$placeholder1,$placeholder2,$placeholder3);
    echo "Success <br>Oil Payment Row <br> Has Been Added Well";
}

// =================================================================================
//                  Updating  db
// =================================================================================

function UpdateStaffPasswordEndpoint ($requesturl)
{ 
    global $StaffsTableName;
    // // customer details
    $oldpassword = trim($_POST['oldpassword']); 
    $newpassword = trim($_POST['newpassword']); 
    $username = trim($_POST['username']);

    UpdatePassword ($StaffsTableName,$newpassword,$username,$oldpassword);
    echo "Success <br>Password <br> Has Been Updated Well";
}
function UpdateAdminPasswordEndpoint ($requesturl)
{ 
    global $AdminTableName;
    // // customer details
    $oldpassword = trim($_POST['oldpassword']); 
    $newpassword = trim($_POST['newpassword']); 
    $username = trim($_POST['username']);

    UpdatePassword ($AdminTableName,$newpassword,$username,$oldpassword);
    echo "Success <br>Password <br> Has Been Updated Well";
}
function UpdateOilEndpoint ($requesturl)
{ 
    global $OilTableName;
    // // customer details
    $staffname = trim($_POST['staffname']); 
    $staff_id = trim($_POST['staffid']); 
    $ridder = trim($_POST['ridder']);
    $number_plate = trim($_POST['number_plate']);
    $ltrs = trim($_POST['ltrs']);
    $stage = trim($_POST['stage']);
    $amount = trim($_POST['amount']);
    $id = trim($_POST['id']);
    $fuel_type = "Null";


    UpdateOilFuel ($OilTableName,$id,$staffname,$staff_id,$ridder, $number_plate,$fuel_type,$ltrs,$amount,$ddate,$stage);
    echo "Success <br>Oil <br> Has Been Updated Well";
}

function UpdateFuelEndpoint ($requesturl)
{ 
    global $FuelTableName;
    // // customer details
    $staffname = trim($_POST['staffname']); 
    $staff_id = trim($_POST['staffid']); 
    $ridder = trim($_POST['ridder']);
    $number_plate = trim($_POST['number_plate']);
    $ltrs = trim($_POST['ltrs']);
    $stage = trim($_POST['stage']);
    $amount = trim($_POST['amount']);
    $id = trim($_POST['id']);
    $fuel_type = "Null";


    UpdateOilFuel ($FuelTableName,$id,$staffname,$staff_id,$ridder, $number_plate,$fuel_type,$ltrs,$amount,$ddate,$stage);
    echo "Success <br>Oil <br> Has Been Updated Well";
}

function UpdateOilPaymentEndpoint ($requesturl)
{ 
    global $OilPaymentTableName;
    // // customer details
    $staffname = trim($_POST['staffname']); 
    $staff_id = trim($_POST['staffid']); 
    $ridder = trim($_POST['ridder']);
    $number_plate = trim($_POST['number_plate']);
    $stage = trim($_POST['stage']);
    $ddate = trim($_POST['reg_date']);
    $amount = trim($_POST['amount']);
    $id = trim($_POST['id']);
    $fuel_type = "Null";


    UpdateOilFuelPayments ($OilPaymentTableName,$id,$staffname,$staff_id,$ridder, $number_plate,$amount,$ddate,$stage);
    echo "Success <br>Oil  Payments <br> Has Been Updated Well";
}

function UpdateFuelPaymentEndpoint ($requesturl)
{ 
    global $FuelPaymentTableName;
    // // customer details
    $staffname = trim($_POST['staffname']); 
    $staff_id = trim($_POST['staffid']); 
    $ridder = trim($_POST['ridder']);
    $number_plate = trim($_POST['number_plate']);
    $stage = trim($_POST['stage']);
    $ddate = trim($_POST['reg_date']);
    $amount = trim($_POST['amount']);
    $id = trim($_POST['id']);
    $fuel_type = "Null";


    UpdateOilFuelPayments ($FuelPaymentTableName,$id,$staffname,$staff_id,$ridder, $number_plate,$amount,$ddate,$stage);
    echo "Success <br>Fuel  Payments <br> Has Been Updated Well";
}

function UpdateExpensesEndpoint ($requesturl)
{ 
    global $ExpensesTableName;
    // // customer details
    $staffname = trim($_POST['receiver']); 
    $staff_id = trim($_POST['staffid']); 
    $amount = trim($_POST['amount']);
    $edate = trim($_POST['reg_date']);
    $edescription = trim($_POST['description']);
    $receiver = trim($_POST['receiver']);
    $id = trim($_POST['id']);


    UpdateExpenses ($ExpensesTableName,$id,$staffname,$staff_id,$receiver,$amount,$edate,$edescription);
    echo "Success <br>Expenses Row <br> Has Been Updated Well";
}

function UpdateStaffsEndpoint ($requesturl)
{ 
    global $StaffsTableName;
    // // customer details
    $fname = trim($_POST['fname']); 
    $lname = trim($_POST['lname']); 
    $gender = trim($_POST['gender']);
    $staff_id = trim($_POST['emp_id']);
    $staff_role = trim($_POST['role']);
    $contact = trim($_POST['contact']);
    $reg_date = trim($_POST['reg_date']);
    $password = trim($_POST['password']);

    $full_name = trim($_POST['fulname']);
    $id = trim($_POST['id']);


    UpdateStaffs ($StaffsTableName,$id,$fname,$lname,$full_name,$gender,$staff_id,$staff_role,$contact,$reg_date,$password);
    echo "Success <br>Staff Row <br> Has Been Updated Well";
}
function UpdateRiddersEndpoint ($requesturl)
{ 
    global $RiddersTableName;
    // // customer details
    $fname = trim($_POST['fname']); 
    $lname = trim($_POST['lname']); 
    $gender = trim($_POST['gender']);
    $stage = trim($_POST['stage']);
    $number_plate = trim($_POST['number_plate']);
    $contact = trim($_POST['contact']);
    $reg_date = trim($_POST['reg_date']);
    $full_name = trim($_POST['fulname']);
    $id = trim($_POST['id']);



    UpdateRidders ($RiddersTableName,$id,$fname,$lname,$full_name,$gender,$number_plate,$contact,$stage,$reg_date);
    echo "Success <br>Ridders Row <br> Has Been Updated Well";
}
// =================================================================================
//                  Reading From db
// =================================================================================
// Oil 
function ViewAllOilEndpoint ($requesturl){ global $OilTableName; ViewOilFuelAll ($OilTableName);}
function ViewTodayOilEndpoint ($requesturl){ global $OilTableName,$TodaysDate ; ViewOilFuelToday ($OilTableName,$TodaysDate);}
function ViewThisWeekOilEndpoint ($requesturl){ global $OilTableName,$TodaysDate,$SevenDaysBackDate ; ViewOilFuelThisWeek ($OilTableName,$SevenDaysBackDate,$TodaysDate);}
function ViewThisMonthOilEndpoint ($requesturl){ global $OilTableName,$DataBaseCurrentMonth ; ViewOilFuelThisMonth ($OilTableName,$DataBaseCurrentMonth);}
function ViewRangeOilEndpoint ($requesturl){global $OilTableName;$fromdate = trim($_POST['from_date']);$todate = trim($_POST['to_date']);ViewOilFuelRange ($OilTableName,$fromdate,$todate);}
function ViewByNameOilEndpoint ($requesturl){ global $OilTableName;$name = trim($_POST['name']); ViewOilFuelByName ($OilTableName,$name);}

// Fuel 
function ViewAllFuelEndpoint ($requesturl){ global $FuelTableName; ViewOilFuelAll ($FuelTableName);}
function ViewTodayFuelEndpoint ($requesturl){ global $FuelTableName,$TodaysDate ; ViewOilFuelToday ($FuelTableName,$TodaysDate);}
function ViewThisWeekFuelEndpoint ($requesturl){ global $FuelTableName,$TodaysDate,$SevenDaysBackDate ; ViewOilFuelThisWeek ($FuelTableName,$SevenDaysBackDate,$TodaysDate);}
function ViewThisMonthFuelEndpoint ($requesturl){ global $FuelTableName,$DataBaseCurrentMonth ; ViewOilFuelThisMonth ($FuelTableName,$DataBaseCurrentMonth);}
function ViewRangeFuelEndpoint ($requesturl){global $FuelTableName;$fromdate = trim($_POST['from_date']);$todate = trim($_POST['to_date']);ViewOilFuelRange ($FuelTableName,$fromdate,$todate);}
function ViewByNameFuelEndpoint ($requesturl){ global $FuelTableName;$name = trim($_POST['name']); ViewOilFuelByName ($FuelTableName,$name);}

// Oil payments 
function ViewAllOilPaymentsEndpoint ($requesturl){global $OilPaymentTableName; ViewAllOilFuelPayments ($OilPaymentTableName);};
function ViewTodayOilPaymentsEndpoint ($requesturl){ global $OilPaymentTableName,$TodaysDate ; ViewOilFuelPaymentsToday ($OilPaymentTableName,$TodaysDate);}
function ViewThisWeekOilPaymentsEndpoint ($requesturl){ global $OilPaymentTableName,$TodaysDate,$SevenDaysBackDate ; ViewOilFuelPaymentsThisWeek ($OilPaymentTableName,$SevenDaysBackDate,$TodaysDate);}
function ViewThisMonthOilPaymentsEndpoint ($requesturl){ global $OilPaymentTableName,$DataBaseCurrentMonth ; ViewOilFuelPaymentsThisMonth ($OilPaymentTableName,$DataBaseCurrentMonth);}
function ViewRangeOilPaymentsEndpoint ($requesturl){global $OilPaymentTableName;$fromdate = trim($_POST['from_date']);$todate = trim($_POST['to_date']);ViewOilFuelPaymentsRange ($OilPaymentTableName,$fromdate,$todate);}
function ViewByNameOilPaymentsEndpoint ($requesturl){ global $OilPaymentTableName;$name = trim($_POST['name']); ViewOilFuelPaymentsByName ($OilPaymentTableName,$name);}

// Fuel payments 
function ViewAllFuelPaymentsEndpoint ($requesturl){global $FuelPaymentTableName; ViewAllOilFuelPayments ($FuelPaymentTableName);};
function ViewTodayFuelPaymentsEndpoint ($requesturl){ global $FuelPaymentTableName,$TodaysDate ; ViewOilFuelPaymentsToday ($FuelPaymentTableName,$TodaysDate);}
function ViewThisWeekFuelPaymentsEndpoint ($requesturl){ global $FuelPaymentTableName,$TodaysDate,$SevenDaysBackDate ; ViewOilFuelPaymentsThisWeek ($FuelPaymentTableName,$SevenDaysBackDate,$TodaysDate);}
function ViewThisMonthFuelPaymentsEndpoint ($requesturl){ global $FuelPaymentTableName,$DataBaseCurrentMonth ; ViewOilFuelPaymentsThisMonth ($FuelPaymentTableName,$DataBaseCurrentMonth);}
function ViewRangeFuelPaymentsEndpoint ($requesturl){global $FuelPaymentTableName;$fromdate = trim($_POST['from_date']);$todate = trim($_POST['to_date']);ViewOilFuelPaymentsRange ($FuelPaymentTableName,$fromdate,$todate);}
function ViewByNameFuelPaymentsEndpoint ($requesturl){ global $FuelPaymentTableName;$name = trim($_POST['name']); ViewOilFuelPaymentsByName ($FuelPaymentTableName,$name);}

// Expenses 
function ViewAllExpensesEndpoint ($requesturl){global $ExpensesTableName; ViewExpensesAll($ExpensesTableName);};
function ViewTodayExpensesEndpoint ($requesturl){ global $ExpensesTableName,$TodaysDate ; ViewExpensesToday ($ExpensesTableName,$TodaysDate);}
function ViewThisWeekExpensesEndpoint ($requesturl){ global $ExpensesTableName,$TodaysDate,$SevenDaysBackDate ; ViewExpensesThisWeek ($ExpensesTableName,$SevenDaysBackDate,$TodaysDate);}
function ViewThisMonthExpensesEndpoint ($requesturl){ global $ExpensesTableName,$DataBaseCurrentMonth ; ViewExpensesThisMonth ($ExpensesTableName,$DataBaseCurrentMonth);}
function ViewRangeExpensesEndpoint ($requesturl){global $ExpensesTableName;$fromdate = trim($_POST['from_date']);$todate = trim($_POST['to_date']);ViewExpensesRange ($ExpensesTableName,$fromdate,$todate);}
function ViewByNameExpensesEndpoint ($requesturl){ global $ExpensesTableName;$name = trim($_POST['name']); ViewExpensesByName ($ExpensesTableName,$name);}

// function ViewAllFuelEndpoint ($requesturl){global $FuelTableName; ViewOilFuelAll ($FuelTableName);}
function ViewExpensesEndpoint ($requesturl){ViewExpense ();}
// function ViewFuelPaymentEndpoint ($requesturl){ViewFuelPayment  ();};
function ViewAllAdminEndpoint ($requesturl){global $AdminTableName; ViewAllAdmin ($AdminTableName);};
function ViewByNameStaffsEndpoint ($requesturl){ global $StaffsTableName ;$name = trim($_POST['name']); ViewStaffsByName ($StaffsTableName,$name);}

function ViewOilDefaultersEndpoint ($requesturl){global $OilTableName,$DefaulterName ; ViewDefaulters ($OilTableName,$DefaulterName);};
function ViewFuelDefaultersEndpoint ($requesturl){ global $FuelTableName, $DefaulterName; ViewDefaulters ($FuelTableName,$DefaulterName);};
// staffs
function ViewAllStaffsEndpoint ($requesturl){global $StaffsTableName; ViewAllStaffs ($StaffsTableName);};
function ViewStaffsByNameEndpoint ($requesturl){global $StaffsTableName ; $name = trim($_POST['name']); ViewStaffsByName ($StaffsTableName, $name);};

// ridders 
function ViewRiddersEndpoint ($requesturl){ViewRidders ();};
function ViewRiddersTodayEndpoint ($requesturl){ global $RiddersTableName ,$TodaysDate; ViewRiddersToday ($RiddersTableName,$TodaysDate);};
function ViewRiddersThisWeekEndpoint ($requesturl){global $RiddersTableName,$TodaysDate,$SevenDaysBackDate; ViewRiddersThisWeek ($RiddersTableName,$TodaysDate,$SevenDaysBackDate);};
function ViewRiddersThisMonthEndpoint ($requesturl){global $RiddersTableName,$DataBaseCurrentMonth; ViewRiddersThisMonth ($RiddersTableName,$DataBaseCurrentMonth);};
function ViewRiddersRangeEndpoint ($requesturl){global $RiddersTableName;$from_date = trim($_POST['from_date']); $to_date= trim($_POST['to_date']); ViewRiddersRange ($RiddersTableName ,$from_date,$to_date);};
function ViewRiddersByNameEndpoint ($requesturl){global $RiddersTableName ; $ridder = trim($_POST['name']); ViewRiddersByName ($RiddersTableName, $ridder);};

// oil reports
function ViewAllOilReportEndpoint ($requesturl){ global $OilReportTableName,$TodaysDate; ViewAllOilFuelReport ($OilReportTableName,$TodaysDate);};
function ViewTodaysOilReportEndpoint ($requesturl){ global $OilReportTableName,$TodaysDate; ViewTodaysOilFuelReport ($OilReportTableName,$TodaysDate);};
function ViewRangeOilReportEndpoint ($requesturl){ global $OilReportTableName;$from_date = trim($_POST['from_date']); $to_date= trim($_POST['to_date']); ViewOilFuelRangeReport($OilReportTableName,$from_date,$to_date);};
function ViewThisWeekOilReportEndpoint (){ global $OilReportTableName,$TodaysDate,$SevenDaysBackDate; ViewThisWeekOilFuelReport ($OilReportTableName,$SevenDaysBackDate,$TodaysDate);};
function ViewThisMonthOilReportEndpoint ($requesturl){ global $OilReportTableName,$DataBaseCurrentMonth; ViewThisMonthOilFuelReport ($OilReportTableName,$DataBaseCurrentMonth);};
function ViewByRidderOilReportEndpoint ($requesturl){ global $OilReportTableName; $ridder = trim($_POST['name']); ViewByRidderOilFuelReport ($OilReportTableName, $ridder);};
function ViewStageNameOilReportEndpoint ($requesturl){ global $OilReportTableName;$from_date = trim($_POST['from_date']); $stage= trim($_POST['stage']); ViewOilFuelStageNameReport ($OilReportTableName,$stage);};

// fuel reports
function ViewAllFuelReportEndpoint ($requesturl){ global $FuelReportTableName,$TodaysDate; ViewAllOilFuelReport ($FuelReportTableName,$TodaysDate);};
function ViewTodaysFuelReportEndpoint ($requesturl){ global $FuelReportTableName,$TodaysDate; ViewTodaysOilFuelReport ($FuelReportTableName,$TodaysDate);};
function ViewRangeFuelReportEndpoint ($requesturl){ global $FuelReportTableName;$from_date = trim($_POST['from_date']); $to_date= trim($_POST['to_date']); ViewOilFuelRangeReport($FuelReportTableName,$from_date,$to_date);};
function ViewThisWeekFuelReportEndpoint (){ global $FuelReportTableName,$TodaysDate,$SevenDaysBackDate; ViewThisWeekOilFuelReport ($FuelReportTableName,$SevenDaysBackDate,$TodaysDate);};
function ViewThisMonthFuelReportEndpoint ($requesturl){ global $FuelReportTableName,$DataBaseCurrentMonth; ViewThisMonthOilFuelReport ($FuelReportTableName,$DataBaseCurrentMonth);};
function ViewByRidderFuelReportEndpoint ($requesturl){ global $FuelReportTableName; $ridder = trim($_POST['name']); ViewByRidderOilFuelReport ($FuelReportTableName, $ridder);};
function ViewStageNameFuelReportEndpoint ($requesturl){ global $FuelReportTableName;$from_date = trim($_POST['from_date']); $stage= trim($_POST['stage']); ViewOilFuelStageNameReport ($FuelReportTableName,$stage);};

// Balancing
function ViewAllBalancingEndpoint ($requesturl){ global$TodaysDate; AllBalancing ();};
function ViewTodaysBalancingEndpoint ($requesturl){ global$TodaysDate; TodaysBalancing ($TodaysDate);};
function ViewThisWeekBalancingEndpoint (){ global $TodaysDate,$SevenDaysBackDate; ViewThisWeekBalancing ($SevenDaysBackDate,$TodaysDate);};
function ViewThisMonthBalancingEndpoint ($requesturl){ global $DataBaseCurrentMonth; ViewThisMonthBalancing ($DataBaseCurrentMonth);};
function ViewRangeBalancingEndpoint ($requesturl){ $from_date = trim($_POST['from_date']); $to_date= trim($_POST['to_date']); ViewRangeBalancing($from_date,$to_date);};


// =================================================================================
//                  Deleting From db
// =================================================================================

function DeleteOilEndpoint ()
{
    global $OilTableName;
    $id = trim($_POST['id']);
    DeleteFromDataBase ($OilTableName,$id);
    echo '<br><br>
            <center> 
                <div style="padding-top: 20px;font-size: 18px;color: blue;">
                Success <br>Oil Row <br> Has Been Deleted Well<br><br>
                <button onclick="history.back()" style="background-color: #3c8dbc;
                color: white;padding: 14px 20px;margin: 8px 0;
                border: none;cursor: pointer;width: 30%;">Ok</button>
                </div>
            </center>';
}
function DeleteOilPaymentEndpoint ()
{
    global $OilPaymentTableName;
    $id = trim($_POST['id']);
    DeleteFromDataBase ($OilPaymentTableName,$id);
    echo '<br><br>
            <center> 
                <div style="padding-top: 20px;font-size: 18px;color: blue;">
                Success <br>Oil Payment Row <br> Has Been Deleted Well<br><br>
                <button onclick="history.back()" style="background-color: #3c8dbc;
                color: white;padding: 14px 20px;margin: 8px 0;
                border: none;cursor: pointer;width: 30%;">Ok</button>
                </div>
            </center>';
}
function DeleteFuelEndpoint ()
{
    global $FuelTableName;
    $id = trim($_POST['id']);
    DeleteFromDataBase ($FuelTableName,$id);
    echo '<br><br>
            <center> 
                <div style="padding-top: 20px;font-size: 18px;color: blue;">
                Success <br>Fuel Row <br> Has Been Deleted Well<br><br>
                <button onclick="history.back()" style="background-color: #3c8dbc;
                color: white;padding: 14px 20px;margin: 8px 0;
                border: none;cursor: pointer;width: 30%;">Ok</button>
                </div>
            </center>';
}
function DeleteFuelPaymentEndpoint ()
{
    global $FuelPaymentTableName;
    $id = trim($_POST['id']);
    DeleteFromDataBase ($FuelPaymentTableName,$id);
    echo '<br><br>
            <center> 
                <div style="padding-top: 20px;font-size: 18px;color: blue;">
                Success <br>Fuel  Payment Row <br> Has Been Deleted Well<br><br>
                <button onclick="history.back()" style="background-color: #3c8dbc;
                color: white;padding: 14px 20px;margin: 8px 0;
                border: none;cursor: pointer;width: 30%;">Ok</button>
                </div>
            </center>';
}

function DeleteExpensesEndpoint ()
{
    global $ExpensesTableName;
    $id = trim($_POST['id']);
    DeleteFromDataBase ($ExpensesTableName,$id);
    echo '<br><br>
            <center> 
                <div style="padding-top: 20px;font-size: 18px;color: blue;">
                Success <br>Expenses Row <br> Has Been Deleted Well<br><br>
                <button onclick="history.back()" style="background-color: #3c8dbc;
                color: white;padding: 14px 20px;margin: 8px 0;
                border: none;cursor: pointer;width: 30%;">Ok</button>
                </div>
            </center>';
}
function DeleteAdminEndpoint ()
{
    global $AdminTableName;
    $id = trim($_POST['id']);
    DeleteFromDataBase ($AdminTableName,$id);
    echo '<br><br>
            <center> 
                <div style="padding-top: 20px;font-size: 18px;color: blue;">
                Success <br>Admin Row <br> Has Been Deleted Well<br><br>
                <button onclick="history.back()" style="background-color: #3c8dbc;
                color: white;padding: 14px 20px;margin: 8px 0;
                border: none;cursor: pointer;width: 30%;">Ok</button>
                </div>
            </center>';
}
function DeleteStaffEndpoint ()
{
    global $StaffsTableName;
    $id = trim($_POST['id']);
    DeleteFromDataBase ($StaffsTableName,$id);
    echo '<br><br>
            <center> 
                <div style="padding-top: 20px;font-size: 18px;color: blue;">
                Success <br>Staff Row <br> Has Been Deleted Well<br><br>
                <button onclick="history.back()" style="background-color: #3c8dbc;
                color: white;padding: 14px 20px;margin: 8px 0;
                border: none;cursor: pointer;width: 30%;">Ok</button>
                </div>
            </center>';
}
function DeleteRidderEndpoint ()
{
    global $RiddersTableName;
    $id = trim($_POST['id']);
    DeleteFromDataBase ($RiddersTableName,$id);
    echo '<br><br>
            <center> 
                <div style="padding-top: 20px;font-size: 18px;color: blue;">
                Success <br>Ridder Row <br> Has Been Deleted Well<br><br>
                <button onclick="history.back()" style="background-color: #3c8dbc;
                color: white;padding: 14px 20px;margin: 8px 0;
                border: none;cursor: pointer;width: 30%;">Ok</button>
                </div>
            </center>';
}

// =================================================================================
//                  Editing  db
// =================================================================================

function EditOilEndpoint () {global $OilTableName;$id = trim($_POST['id']); EditOilFuel ($OilTableName,$id);}
function EditFuelEndpoint () {global $FuelTableName;$id = trim($_POST['id']); EditOilFuel ($FuelTableName,$id);}
function EditOilPaymentEndpoint () {global $OilPaymentTableName;$id = trim($_POST['id']); EditOilFuelPayments ($OilPaymentTableName,$id);}
function EditFuelPaymentEndpoint () {global $FuelPaymentTableName;$id = trim($_POST['id']); EditOilFuelPayments ($FuelPaymentTableName,$id);}
function EditExpensesEndpoint () {global $ExpensesTableName;$id = trim($_POST['id']); EditExpenses ($ExpensesTableName,$id);}
function EditStaffsEndpoint () {global $StaffsTableName;$id = trim($_POST['id']); EditStaffs ($StaffsTableName,$id);}
function EditRiddersEndpoint () {global $RiddersTableName;$id = trim($_POST['id']); EditRidders ($RiddersTableName,$id);}



// =================================================================================
//                  Counting dashboard
// =================================================================================

function TotalNumbersOfStaffsEndpoint () {TotalNumbersOfStaffs ();}
function TotalNumbersOfRiddersEndpoint () {TotalNumbersOfRidders ();}
function TotalNumbersOfStagesEndpoint () {TotalNumbersOfStages ();}
function TodaysOilSalesEndpoint () { global $OilTableName,$TodaysDate; TodaysSales ($OilTableName,$TodaysDate);}
function TodaysFuelSalesEndpoint () { global $FuelTableName,$TodaysDate; TodaysSales ($FuelTableName,$TodaysDate);}
function TodaysExpensesEndpoint() { global $ExpensesTableName, $TodaysDate; TodaysSales ($ExpensesTableName,$TodaysDate);}
function TotalOilDefaultersEndpoint() { global $OilTableName, $DefaulterName; TotalDefaulters ($OilTableName,$DefaulterName);}
function TotalFuelDefaultersEndpoint() { global $FuelTableName, $DefaulterName; TotalDefaulters ($FuelTableName,$DefaulterName);}
function TotalFuelPaymentsEndpoint() { global $FuelPaymentTableName, $TodaysDate; TodaysSales ($FuelPaymentTableName,$TodaysDate);}
function TotalOilPaymentsEndpoint() { global $OilPaymentTableName, $TodaysDate; TodaysSales ($OilPaymentTableName,$TodaysDate);}
function TotalStagesEndpoint (){global $RiddersTableName; TotalStages($RiddersTableName);}
function TodaysFuelLtrsEndpoint () { global $FuelTableName,$TodaysDate; TodaysLiters ($FuelTableName,$TodaysDate);}
function TodaysOilLtrsEndpoint () { global $OilTableName,$TodaysDate; TodaysLiters ($OilTableName,$TodaysDate);}

// TodaysOilLtrsEndpoint ();

// =================================================================================
//                  Names ...
// =================================================================================

function ViewRiddersNamesDataEndpoint (){global $RiddersTableName; ViewNamesData ($RiddersTableName);}
function ViewRiddersStageDataEndpoint (){global $RiddersTableName; ViewStageData ($RiddersTableName);}
function ViewRiddersNumberPlateDataEndpoint (){global $RiddersTableName; ViewNumberPlateData($RiddersTableName);}
function ViewStaffsNamesDataEndpoint (){global $StaffsTableName; ViewNamesData ($StaffsTableName);}
function ViewStaffsIdDataEndpoint (){global $StaffsTableName; ViewStaffsIdData ($StaffsTableName);}
function ViewRiddersStageWithNameDataEndpoint (){global $RiddersTableName; ViewStageWithNameData ($RiddersTableName);}
function ViewRiddersNumberPlateWithNameDataEndpoint (){global $RiddersTableName; ViewNumberPlateWithNameData($RiddersTableName);}


// With Hide
function ViewOilRiddersNamesWithHideDataEndpoint (){global $RiddersTableName, $OilTableName; ViewOilFuelRiddersWithHide ($RiddersTableName,$OilTableName);}
function ViewFuelRiddersNamesWithHideDataEndpoint (){global $RiddersTableName, $FuelTableName; ViewOilFuelRiddersWithHide ($RiddersTableName,$FuelTableName);}

?>





