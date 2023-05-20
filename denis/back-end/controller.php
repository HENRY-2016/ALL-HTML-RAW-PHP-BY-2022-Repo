


<?php
    include "views.php";

    $request_url = $_SERVER['REQUEST_URI'];


    $menu_post = "/denis/back-end/controller.php/InsertIntoOrdersEndpoint";
    $register_post = "/denis/back-end/controller.php/InsertIntoRegisterEndpoint";



    $view_student_orders = "/denis/back-end/controller.php/GetOrdersEndpoint";
    $view_admin_orders = "/denis/back-end/controller.php/GetAdminOrdersEndpoint";
    $view_admin_students = "/denis/back-end/controller.php/GetAdminStudentsEndpoint";

    $staff_login= "/denis/back-end/controller.php/SigInUserEndpoint";
    $admin_login= "/denis/back-end/controller.php/SigInAdminEndpoint";
    $admin_delete_order = "/denis/back-end/controller.php/AdminDeleteOrdersEndPoint";
    $admin_delete_student = "/denis/back-end/controller.php/AdminDeleteStudentsEndPoint";




    /**
     *          ======================================================
     *                          USER READ FROM DB
     *          =====================================================
     */
    
    if ($request_url === $signup){InsertIntoUsersEndpoint ($request_url);}
    elseif ($request_url === $staff_login){SigInUserEndpoint ($request_url);}
    elseif ($request_url === $admin_login){SigInAdminEndpoint ($request_url);}
    elseif ($request_url === $menu_post){InsertIntoOrdersEndpoint ($request_url);}
    elseif ($request_url === $register_post){InsertIntoRegisterEndpoint ($request_url);}


    // view ...........
    elseif ($request_url === $view_student_orders){GetOrdersEndpoint ($request_url);}
    elseif ($request_url === $view_admin_orders){GetAdminOrdersEndpoint ($request_url);}
    elseif ($request_url === $view_admin_students){GetAdminStudentsEndpoint ($request_url);}


    // delete
    elseif ($request_url === $admin_delete_order){AdminDeleteOrdersEndPoint ($request_url);}
    elseif ($request_url === $admin_delete_student){AdminDeleteStudentsEndPoint ($request_url);}
    

    else {echo "Undefined Url Sent On Server...";}


?>