

<?php
    include "views.php";
    $request_url = $_SERVER['REQUEST_URI'];

    $signup = "";


    // staff 
    $add_expenses = "/station/back-end/controller.php/AddExpensesEndpoint";
    $add_fuel = "/station/back-end/controller.php/AddFuelEndpoint";
    $add_oil = "/station/back-end/controller.php/AddOilEndpoint";
    $add_fuel_payment = "/station/back-end/controller.php/AddFuelPaymentEndpoint";
    $add_oil_payment = "/station/back-end/controller.php/AddOilPaymentEndpoint";

    // view oil
    $view_oil_all = "/station/back-end/controller.php/ViewAllOilEndpoint";
    $view_oil_today = "/station/back-end/controller.php/ViewTodayOilEndpoint";
    $view_oil_this_week = "/station/back-end/controller.php/ViewThisWeekOilEndpoint";
    $view_oil_this_month = "/station/back-end/controller.php/ViewThisMonthOilEndpoint";
    $view_oil_range = "/station/back-end/controller.php/ViewRangeOilEndpoint";
    $view_oil_by_name = "/station/back-end/controller.php/ViewByNameOilEndpoint";

    // view fuel
    $view_fuel_all = "/station/back-end/controller.php/ViewAllFuelEndpoint";
    $view_fuel_today = "/station/back-end/controller.php/ViewTodayFuelEndpoint";
    $view_fuel_this_week = "/station/back-end/controller.php/ViewThisWeekFuelEndpoint";
    $view_fuel_this_month = "/station/back-end/controller.php/ViewThisMonthFuelEndpoint";
    $view_fuel_range = "/station/back-end/controller.php/ViewRangeFuelEndpoint";
    $view_fuel_by_name = "/station/back-end/controller.php/ViewByNameFuelEndpoint";

    // view oil payments
    $view_oil_all_payments = "/station/back-end/controller.php/ViewAllOilPaymentsEndpoint";
    $view_oil_today_payments = "/station/back-end/controller.php/ViewTodayOilPaymentsEndpoint";
    $view_oil_this_week_payments = "/station/back-end/controller.php/ViewThisWeekOilPaymentsEndpoint";
    $view_oil_this_month_payments = "/station/back-end/controller.php/ViewThisMonthOilPaymentsEndpoint";
    $view_oil_range_payments = "/station/back-end/controller.php/ViewRangeOilPaymentsEndpoint";
    $view_oil_by_name_payments = "/station/back-end/controller.php/ViewByNameOilPaymentsEndpoint";

    // view fuel payments
    $view_fuel_all_payments = "/station/back-end/controller.php/ViewAllFuelPaymentsEndpoint";
    $view_fuel_today_payments = "/station/back-end/controller.php/ViewTodayFuelPaymentsEndpoint";
    $view_fuel_this_week_payments = "/station/back-end/controller.php/ViewThisWeekFuelPaymentsEndpoint";
    $view_fuel_this_month_payments = "/station/back-end/controller.php/ViewThisMonthFuelPaymentsEndpoint";
    $view_fuel_range_payments = "/station/back-end/controller.php/ViewRangeFuelPaymentsEndpoint";
    $view_fuel_by_name_payments = "/station/back-end/controller.php/ViewByNameFuelPaymentsEndpoint";

    // view expenses
    $view_expenses_all = "/station/back-end/controller.php/ViewAllExpensesEndpoint";
    $view_expenses_today = "/station/back-end/controller.php/ViewTodayExpensesEndpoint";
    $view_expenses_this_week = "/station/back-end/controller.php/ViewThisWeekExpensesEndpoint";
    $view_expenses_this_month = "/station/back-end/controller.php/ViewThisMonthExpensesEndpoint";
    $view_expenses_range = "/station/back-end/controller.php/ViewRangeExpensesEndpoint";
    $view_expenses_by_name = "/station/back-end/controller.php/ViewByNameExpensesEndpoint";


    $view_fuel = "/station/back-end/controller.php/ViewAllFuelEndpoint";
    $view_fuel_payment = "/station/back-end/controller.php/ViewFuelPaymentEndpoint";
    $view_admin_all = "/station/back-end/controller.php/ViewAllAdminEndpoint";
    $view_oil_defaulters = "/station/back-end/controller.php/ViewOilDefaultersEndpoint";
    $view_fuel_defaulters = "/station/back-end/controller.php/ViewFuelDefaultersEndpoint";

    // staffs
    $view_staffs_all = "/station/back-end/controller.php/ViewAllStaffsEndpoint";
    $view_staffs_by_name = "/station/back-end/controller.php/ViewStaffsByNameEndpoint";

    // ridders
    $view_ridders = "/station/back-end/controller.php/ViewRiddersEndpoint";
    $view_ridders_today = "/station/back-end/controller.php/ViewRiddersTodayEndpoint";
    $view_ridders_this_week = "/station/back-end/controller.php/ViewRiddersThisWeekEndpoint";
    $view_ridders_this_month = "/station/back-end/controller.php/ViewRiddersThisMonthEndpoint";
    $view_ridders_range = "/station/back-end/controller.php/ViewRiddersRangeEndpoint";
    $view_ridders_by_name = "/station/back-end/controller.php/ViewRiddersByNameEndpoint";


    // report oil
    $view_report_oil_all = "/station/back-end/controller.php/ViewAllOilReportEndpoint";
    $view_report_oil_today = "/station/back-end/controller.php/ViewTodaysOilReportEndpoint";
    $view_report_oil_range = "/station/back-end/controller.php/ViewRangeOilReportEndpoint";
    $view_report_oil_this_week = "/station/back-end/controller.php/ViewThisWeekOilReportEndpoint";
    $view_report_oil_this_month = "/station/back-end/controller.php/ViewThisMonthOilReportEndpoint";
    $view_report_oil_ridder = "/station/back-end/controller.php/ViewByRidderOilReportEndpoint";
    $view_report_oil_stage_name = "/station/back-end/controller.php/ViewStageNameOilReportEndpoint";


    // report fuel
    $view_report_fuel_all = "/station/back-end/controller.php/ViewAllFuelReportEndpoint";
    $view_report_fuel_today = "/station/back-end/controller.php/ViewTodaysFuelReportEndpoint";
    $view_report_fuel_range = "/station/back-end/controller.php/ViewRangeFuelReportEndpoint";
    $view_report_fuel_this_week = "/station/back-end/controller.php/ViewThisWeekFuelReportEndpoint";
    $view_report_fuel_this_month = "/station/back-end/controller.php/ViewThisMonthFuelReportEndpoint";
    $view_report_fuel_ridder = "/station/back-end/controller.php/ViewByRidderFuelReportEndpoint";
    $view_report_fuel_stage_name = "/station/back-end/controller.php/ViewStageNameFuelReportEndpoint";

    // Balancing
    $view_balancing_all = "/station/back-end/controller.php/ViewAllBalancingEndpoint";
    $view_balancing_today = "/station/back-end/controller.php/ViewTodaysBalancingEndpoint";
    $view_balancing_this_week = "/station/back-end/controller.php/ViewThisWeekBalancingEndpoint";
    $view_balancing_this_month = "/station/back-end/controller.php/ViewThisMonthBalancingEndpoint";
    $view_balancing_range = "/station/back-end/controller.php/ViewRangeBalancingEndpoint";



    // names ...
    $view_ridders_names = "/station/back-end/controller.php/ViewRiddersNamesDataEndpoint";
    $view_ridders_stage = "/station/back-end/controller.php/ViewRiddersStageDataEndpoint";
    $view_ridders_numberplate = "/station/back-end/controller.php/ViewRiddersNumberPlateDataEndpoint";
    $view_staffs_names = "/station/back-end/controller.php/ViewStaffsNamesDataEndpoint";
    $view_staffs_id = "/station/back-end/controller.php/ViewStaffsIdDataEndpoint";
    $view_ridders_stage_with_name = "/station/back-end/controller.php/ViewRiddersStageWithNameDataEndpoint";
    $view_ridders_numberplate_with_name = "/station/back-end/controller.php/ViewRiddersNumberPlateWithNameDataEndpoint";

    // with hide
    $view_oil_ridders_with_hide = "/station/back-end/controller.php/ViewOilRiddersNamesWithHideDataEndpoint";
    $view_fuel_ridders_with_hide = "/station/back-end/controller.php/ViewFuelRiddersNamesWithHideDataEndpoint";

    // Admin
    $admin_create_admin = "/station/back-end/controller.php/AddAdminEndpoint";
    $admin_create_staff = "/station/back-end/controller.php/AddStaffEndpoint";
    $admin_create_ridder = "/station/back-end/controller.php/AddRidderEndpoint";

    // delete
    $admin_delete_oil = "/station/back-end/controller.php/DeleteOilEndpoint";
    $admin_delete_fuel = "/station/back-end/controller.php/DeleteFuelEndpoint";
    $admin_delete_oil_payment = "/station/back-end/controller.php/DeleteOilPaymentEndpoint";
    $admin_delete_fuel_payment = "/station/back-end/controller.php/DeleteFuelPaymentEndpoint";
    $admin_delete_expenses = "/station/back-end/controller.php/DeleteExpensesEndpoint";
    $admin_delete_admin = "/station/back-end/controller.php/DeleteAdminEndpoint";
    $admin_delete_staff = "/station/back-end/controller.php/DeleteStaffEndpoint";
    $admin_delete_ridder = "/station/back-end/controller.php/DeleteRidderEndpoint";

    // Edit
    $admin_edit_oil = "/station/back-end/controller.php/EditOilEndpoint";
    $admin_edit_fuel = "/station/back-end/controller.php/EditFuelEndpoint";
    $admin_edit_oil_payment = "/station/back-end/controller.php/EditOilPaymentEndpoint";
    $admin_edit_fuel_payment = "/station/back-end/controller.php/EditFuelPaymentEndpoint";
    $admin_edit_expenses = "/station/back-end/controller.php/EditExpensesEndpoint";
    $admin_edit_staff = "/station/back-end/controller.php/EditStaffsEndpoint";
    $admin_edit_ridder = "/station/back-end/controller.php/EditRiddersEndpoint";

     // Update
    $update_password = "/station/back-end/controller.php/UpdateStaffPasswordEndpoint";
    $admin_update_password = "/station/back-end/controller.php/UpdateAdminPasswordEndpoint";
    $admin_update_oil = "/station/back-end/controller.php/UpdateOilEndpoint";
    $admin_update_fuel = "/station/back-end/controller.php/UpdateFuelEndpoint";
    $admin_update_oil_payment = "/station/back-end/controller.php/UpdateOilPaymentEndpoint";
    $admin_update_fuel_payment = "/station/back-end/controller.php/UpdateFuelPaymentEndpoint";
    $admin_update_expenses = "/station/back-end/controller.php/UpdateExpensesEndpoint";
    $admin_update_staff = "/station/back-end/controller.php/UpdateStaffsEndpoint";
    $admin_update_ridder = "/station/back-end/controller.php/UpdateRiddersEndpoint";


    // counting dashboard
    $total_staffs = "/station/back-end/controller.php/TotalNumbersOfStaffsEndpoint";
    $total_ridders = "/station/back-end/controller.php/TotalNumbersOfRiddersEndpoint";
    // $total_stages = "/station/back-end/controller.php/TotalNumbersOfStagesEndpoint";
    $total_todays_oil_sales = "/station/back-end/controller.php/TodaysOilSalesEndpoint";
    $total_todays_fuel_sales = "/station/back-end/controller.php/TodaysFuelSalesEndpoint";
    $total_todays_expenses_sales = "/station/back-end/controller.php/TodaysExpensesEndpoint";
    $total_fuel_defaulters = "/station/back-end/controller.php/TotalFuelDefaultersEndpoint";
    $total_oil_defaulters = "/station/back-end/controller.php/TotalOilDefaultersEndpoint";
    $total_oil_payments = "/station/back-end/controller.php/TotalOilPaymentsEndpoint";
    $total_fuel_payments = "/station/back-end/controller.php/TotalFuelPaymentsEndpoint";
    $total_stages = "/station/back-end/controller.php/TotalStagesEndpoint";
    $total_todays_fuel_ltrs = "/station/back-end/controller.php/TodaysFuelLtrsEndpoint";
    $total_todays_oil_ltrs = "/station/back-end/controller.php/TodaysOilLtrsEndpoint";


    // log in
    if ($request_url === $signup){InsertIntoUsersEndpoint ($request_url);}
    // elseif ($request_url === $staff_login){SigInUserEndpoint ($request_url);}
    // elseif ($request_url === $admin_login){SigInAdminEndpoint ($request_url);}


    // admin
    elseif ($request_url === $admin_create_admin){AddAdminEndpoint($request_url);}
    elseif ($request_url === $admin_create_staff){AddStaffEndpoint($request_url);}
    elseif ($request_url === $admin_create_ridder){AddRidderEndpoint($request_url);}
    // delete
    elseif ($request_url === $admin_delete_oil){DeleteOilEndpoint($request_url);}
    elseif ($request_url === $admin_delete_fuel){DeleteFuelEndpoint($request_url);}
    elseif ($request_url === $admin_delete_oil_payment){DeleteOilPaymentEndpoint($request_url);}
    elseif ($request_url === $admin_delete_fuel_payment){DeleteFuelPaymentEndpoint($request_url);}
    elseif ($request_url === $admin_delete_expenses){DeleteExpensesEndpoint($request_url);}
    elseif ($request_url === $admin_delete_admin){DeleteAdminEndpoint($request_url);}
    elseif ($request_url === $admin_delete_staff){DeleteStaffEndpoint($request_url);}
    elseif ($request_url === $admin_delete_ridder){DeleteRidderEndpoint($request_url);}

    // Edit
    elseif ($request_url === $admin_edit_oil){EditOilEndpoint($request_url);}
    elseif ($request_url === $admin_edit_fuel){EditFuelEndpoint($request_url);}
    elseif ($request_url === $admin_edit_oil_payment){EditOilPaymentEndpoint($request_url);}
    elseif ($request_url === $admin_edit_fuel_payment){EditFuelPaymentEndpoint($request_url);}
    elseif ($request_url === $admin_edit_expenses){EditExpensesEndpoint($request_url);}
    elseif ($request_url === $admin_edit_staff){EditStaffsEndpoint($request_url);}
    elseif ($request_url === $admin_edit_ridder){EditRiddersEndpoint($request_url);}

    // Update 
    elseif ($request_url === $update_password){UpdateStaffPasswordEndpoint($request_url);}
    elseif ($request_url === $admin_update_password){UpdateAdminPasswordEndpoint($request_url);}
    elseif ($request_url === $admin_update_oil){UpdateOilEndpoint($request_url);}
    elseif ($request_url === $admin_update_fuel){UpdateFuelEndpoint($request_url);}
    elseif ($request_url === $admin_update_oil_payment){UpdateOilPaymentEndpoint($request_url);}
    elseif ($request_url === $admin_update_fuel_payment){UpdateFuelPaymentEndpoint($request_url);}
    elseif ($request_url === $admin_update_expenses){UpdateExpensesEndpoint($request_url);}
    elseif ($request_url === $admin_update_staff){UpdateStaffsEndpoint($request_url);}
    elseif ($request_url === $admin_update_ridder){UpdateRiddersEndpoint($request_url);}



    // staffs
    elseif ($request_url === $add_expenses){AddExpensesEndpoint ($request_url);}
    elseif ($request_url === $add_fuel){AddFuelEndpoint ($request_url);}
    elseif ($request_url === $add_oil){AddOilEndpoint ($request_url);}
    elseif ($request_url === $add_fuel_payment){AddFuelPaymentEndpoint ($request_url);}
    elseif ($request_url === $add_oil_payment){AddOilPaymentEndpoint ($request_url);}

    // view oil 
    elseif ($request_url === $view_oil_all){ViewAllOilEndpoint ($request_url);}
    elseif ($request_url === $view_oil_today){ViewTodayOilEndpoint ($request_url);}
    elseif ($request_url === $view_oil_this_week){ViewThisWeekOilEndpoint ($request_url);}
    elseif ($request_url === $view_oil_this_month){ViewThisMonthOilEndpoint ($request_url);}
    elseif ($request_url === $view_oil_range){ViewRangeOilEndpoint ($request_url);}
    elseif ($request_url === $view_oil_by_name){ViewByNameOilEndpoint ($request_url);}
    // view fuel
    elseif ($request_url === $view_fuel_all){ViewAllFuelEndpoint ($request_url);}
    elseif ($request_url === $view_fuel_today){ViewTodayFuelEndpoint ($request_url);}
    elseif ($request_url === $view_fuel_this_week){ViewThisWeekFuelEndpoint ($request_url);}
    elseif ($request_url === $view_fuel_this_month){ViewThisMonthFuelEndpoint ($request_url);}
    elseif ($request_url === $view_fuel_range){ViewRangeFuelEndpoint ($request_url);}
    elseif ($request_url === $view_fuel_by_name){ViewByNameFuelEndpoint ($request_url);}

    // view oil payments
    elseif ($request_url === $view_oil_all_payments){ViewAllOilPaymentsEndpoint ($request_url);}
    elseif ($request_url === $view_oil_today_payments){ViewTodayOilPaymentsEndpoint ($request_url);}
    elseif ($request_url === $view_oil_this_week_payments){ViewThisWeekOilPaymentsEndpoint ($request_url);}
    elseif ($request_url === $view_oil_this_month_payments){ViewThisMonthOilPaymentsEndpoint ($request_url);}
    elseif ($request_url === $view_oil_range_payments){ViewRangeOilPaymentsEndpoint ($request_url);}
    elseif ($request_url === $view_oil_by_name_payments){ViewByNameOilPaymentsEndpoint ($request_url);}

    // view Fuel
    elseif ($request_url === $view_fuel_all_payments){ViewAllFuelPaymentsEndpoint ($request_url);}
    elseif ($request_url === $view_fuel_today_payments){ViewTodayFuelPaymentsEndpoint ($request_url);}
    elseif ($request_url === $view_fuel_this_week_payments){ViewThisWeekFuelPaymentsEndpoint ($request_url);}
    elseif ($request_url === $view_fuel_this_month_payments){ViewThisMonthFuelPaymentsEndpoint ($request_url);}
    elseif ($request_url === $view_fuel_range_payments){ViewRangeFuelPaymentsEndpoint ($request_url);}
    elseif ($request_url === $view_fuel_by_name_payments){ViewByNameFuelPaymentsEndpoint ($request_url);}

    // view Expenses 
    elseif ($request_url === $view_expenses_all){ViewAllExpensesEndpoint ($request_url);}
    elseif ($request_url === $view_expenses_today){ViewTodayExpensesEndpoint ($request_url);}
    elseif ($request_url === $view_expenses_this_week){ViewThisWeekExpensesEndpoint ($request_url);}
    elseif ($request_url === $view_expenses_this_month){ViewThisMonthExpensesEndpoint ($request_url);}
    elseif ($request_url === $view_expenses_range){ViewRangeExpensesEndpoint ($request_url);}
    elseif ($request_url === $view_expenses_by_name){ViewByNameExpensesEndpoint ($request_url);}

    // elseif ($request_url === $view_oil_payment){ViewOilPaymentEndpoint ($request_url);}
    elseif ($request_url === $view_admin_all){ViewAllAdminEndpoint ($request_url);}
    elseif ($request_url === $view_oil_defaulters ){ViewOilDefaultersEndpoint ($request_url);}
    elseif ($request_url === $view_fuel_defaulters ){ViewFuelDefaultersEndpoint ($request_url);}

    // staffs
    elseif ($request_url === $view_staffs_all){ViewAllStaffsEndpoint ($request_url);}
    elseif ($request_url === $view_staffs_by_name){ViewStaffsByNameEndpoint ($request_url);}

    // ridders
    elseif ($request_url === $view_ridders){ViewRiddersEndpoint ($request_url);}
    elseif ($request_url === $view_ridders_today){ViewRiddersTodayEndpoint ($request_url);}
    elseif ($request_url === $view_ridders_this_week){ViewRiddersThisWeekEndpoint ($request_url);}
    elseif ($request_url === $view_ridders_this_month){ViewRiddersThisMonthEndpoint ($request_url);}
    elseif ($request_url === $view_ridders_range){ViewRiddersRangeEndpoint ($request_url);}
    elseif ($request_url === $view_ridders_by_name){ViewRiddersByNameEndpoint ($request_url);}



    // report oil
    elseif ($request_url === $view_report_oil_all){ViewAllOilReportEndpoint($request_url);}
    elseif ($request_url === $view_report_oil_today){ViewTodaysOilReportEndpoint($request_url);}
    elseif ($request_url === $view_report_oil_range){ViewRangeOilReportEndpoint ($request_url);}
    elseif ($request_url === $view_report_oil_this_week){ViewThisWeekOilReportEndpoint ($request_url);}
    elseif ($request_url === $view_report_oil_this_month){ViewThisMonthOilReportEndpoint ($request_url);}
    elseif ($request_url === $view_report_oil_ridder){ViewByRidderOilReportEndpoint ($request_url);}
    elseif ($request_url === $view_report_oil_stage_name ){ViewStageNameOilReportEndpoint ($request_url);}

    // report fuel
    elseif ($request_url === $view_report_fuel_all){ViewAllFuelReportEndpoint($request_url);}
    elseif ($request_url === $view_report_fuel_today){ViewTodaysFuelReportEndpoint($request_url);}
    elseif ($request_url === $view_report_fuel_range){ViewRangeFuelReportEndpoint ($request_url);}
    elseif ($request_url === $view_report_fuel_this_week){ViewThisWeekFuelReportEndpoint ($request_url);}
    elseif ($request_url === $view_report_fuel_this_month){ViewThisMonthFuelReportEndpoint ($request_url);}
    elseif ($request_url === $view_report_fuel_ridder){ViewByRidderFuelReportEndpoint ($request_url);}
    elseif ($request_url === $view_report_fuel_stage_name ){ViewStageNameFuelReportEndpoint ($request_url);}

    // Balancing

    elseif ($request_url === $view_balancing_all){ViewAllBalancingEndpoint($request_url);}
    elseif ($request_url === $view_balancing_today){ViewTodaysBalancingEndpoint($request_url);}
    elseif ($request_url === $view_balancing_this_week){ViewThisWeekBalancingEndpoint($request_url);}
    elseif ($request_url === $view_balancing_this_month){ViewThisMonthBalancingEndpoint($request_url);}
    elseif ($request_url === $view_balancing_range){ViewRangeBalancingEndpoint($request_url);}




    // names  
    elseif ($request_url === $view_ridders_names ){ViewRiddersNamesDataEndpoint ($request_url);}
    elseif ($request_url === $view_ridders_stage){ViewRiddersStageDataEndpoint ($request_url);}
    elseif ($request_url === $view_ridders_numberplate ){ViewRiddersNumberPlateDataEndpoint ($request_url);}
    elseif ($request_url === $view_staffs_names ){ViewStaffsNamesDataEndpoint ($request_url);}
    elseif ($request_url === $view_staffs_id ){ViewStaffsIdDataEndpoint ($request_url);}
    elseif ($request_url === $view_ridders_stage_with_name){ViewRiddersStageWithNameDataEndpoint ($request_url);}
    elseif ($request_url === $view_ridders_numberplate_with_name ){ViewRiddersNumberPlateWithNameDataEndpoint ($request_url);}
    

    // with hide
    elseif ($request_url === $view_oil_ridders_with_hide){ViewOilRiddersNamesWithHideDataEndpoint ($request_url);}
    elseif ($request_url === $view_fuel_ridders_with_hide){ViewFuelRiddersNamesWithHideDataEndpoint ($request_url);}


    


    // counting dashboard
    elseif ($request_url === $total_staffs){TotalNumbersOfStaffsEndpoint ($request_url);}
    elseif ($request_url === $total_ridders){TotalNumbersOfRiddersEndpoint ($request_url);}
    elseif ($request_url === $total_todays_oil_sales ) {TodaysOilSalesEndpoint($request_url);}
    elseif ($request_url === $total_todays_fuel_sales ) {TodaysFuelSalesEndpoint($request_url);}
    elseif ($request_url === $total_todays_expenses_sales ) {TodaysExpensesEndpoint($request_url);}
    elseif ($request_url === $total_fuel_defaulters) {TotalFuelDefaultersEndpoint($request_url);}
    elseif ($request_url === $total_oil_defaulters) {TotalOilDefaultersEndpoint($request_url);}
    elseif ($request_url === $total_oil_payments ) {TotalOilPaymentsEndpoint($request_url);}
    elseif ($request_url === $total_fuel_payments ) {TotalFuelPaymentsEndpoint($request_url);}
    elseif ($request_url === $total_stages) {TotalStagesEndpoint($request_url);}
    elseif ($request_url === $total_todays_fuel_ltrs ) {TodaysFuelLtrsEndpoint($request_url);}
    elseif ($request_url === $total_todays_oil_ltrs ) {TodaysOilLtrsEndpoint($request_url);}



    else {echo "Undefined Url Sent On Server...";}


?>