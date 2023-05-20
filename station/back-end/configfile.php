<?php
$Base_Url = 'http://127.0.0.1'; 



// front-end dir
$front_end ='/station/front-end/';
$back_end ='/station/back-end/';




$AppLogIn = $Base_Url.$back_end.'index.php';
$Dashboard = $Base_Url.$front_end.'dashboard.php'; // Entery Point ..... 


// ====================================================================
//
//              Data Base Variables 
//
// ====================================================================


// d - Represents the day of the month (01 to 31)
// m - Represents a month (01 to 12)
// Y - Represents a year (in four digits)

$OilTableName = "oil";
$FuelTableName = "fuel";
$RiddersTableName = "ridders";
$StaffsTableName = "staffs";
$AdminTableName = "admins";
$OilPaymentTableName = "oil_payment";
$FuelPaymentTableName = "fuel_payment";
$OilReportTableName = "oil_report";
$FuelReportTableName = "fuel_report";
$ExpensesTableName = "expenses";
$DefaulterName = "Defaulter"; // also used in modal update function
$DefaulterCleared = "Cleared";
$TodaysDate = date('Y-m-d');
$SevenDaysBackDate = date('Y-m-d', strtotime('-6 days'));


$DataBaseId = date("dh-is");
// $DataBaseTime = date('Y-m-d');
$DataBaseCurrentMonth = date('m');
$DataBaseTime = date('H:i:s');

$DataBasePlaceholder1 = "placeholder1";
$DataBasePlaceholder2 = "placeholder2";
$DataBasePlaceholder3 = "placeholder3";

$AdminLogInUserType = "Admin";
$UserLogInUserType = "Staff";


?>