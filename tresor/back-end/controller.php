


<?php
    include "views.php";

    $request_url = $_SERVER['REQUEST_URI'];


    $events_post = "/tresor-dir/back-end/controller.php/InsertIntoEventsEndpoint";
    $returns_post = "/tresor-dir/back-end/controller.php/InsertIntoReturnsEndpoint";
    $borrows_post = "/tresor-dir/back-end/controller.php/InsertIntoBorrowsEndpoint";
    $payments_post = "/tresor-dir/back-end/controller.php/InsertIntoPaymentsEndpoint";
    $instruments_post = "/tresor-dir/back-end/controller.php/InsertIntoInstrumentsEndpoint";



    $view_events = "/tresor-dir/back-end/controller.php/GetEventsEndpoint";
    $view_returns = "/tresor-dir/back-end/controller.php/GetReturnsEndpoint";
    $view_borrows = "/tresor-dir/back-end/controller.php/GetBorrowsEndpoint";
    $view_payments = "/tresor-dir/back-end/controller.php/GetPaymentsEndpoint";
    $view_instruments = "/tresor-dir/back-end/controller.php/GetInstrumentsEndpoint";

    $staff_login= "/tresor-dir/back-end/controller.php/SigInUserEndpoint";
    $admin_login= "/tresor-dir/back-end/controller.php/SigInAdminEndpoint";


    // Admin
    $create_instrument = "/tresor-dir/back-end/controller.php/AdminCreateInstrumentEndPoint";
    $create_admin =  "/tresor-dir/back-end/controller.php/AdminCreateAdminEndPoint";
    $create_manager = "/tresor-dir/back-end/controller.php/AdminCreateManagerEndPoint";

    $admin_view_staffs = "/tresor-dir/back-end/controller.php/GetStaffsEndpoint";
    $admin_delete_user = "/tresor-dir/back-end/controller.php/AdminDeleteUserEndPoint";
    $admin_delete_events = "/tresor-dir/back-end/controller.php/AdminDeleteEventsEndPoint";
    $admin_delete_returns = "/tresor-dir/back-end/controller.php/AdminDeleteReturnsEndPoint";
    $admin_delete_payments = "/tresor-dir/back-end/controller.php/AdminDeletePaymentsEndPoint";
    $admin_delete_borrows = "/tresor-dir/back-end/controller.php/AdminDeleteBorrowsEndPoint";
    $admin_delete_instruments = "/tresor-dir/back-end/controller.php/AdminDeleteInstrumentsEndPoint";



    /**
     *          ======================================================
     *                          USER READ FROM DB
     *          =====================================================
     */
    
    if ($request_url === $signup){InsertIntoUsersEndpoint ($request_url);}
    elseif ($request_url === $staff_login){SigInUserEndpoint ($request_url);}
    elseif ($request_url === $admin_login){SigInAdminEndpoint ($request_url);}
    elseif ($request_url === $events_post){InsertIntoEventsEndpoint ($request_url);}
    elseif ($request_url === $returns_post){InsertIntoReturnsEndpoint ($request_url);}
    elseif ($request_url === $borrows_post){InsertIntoBorrowsEndpoint ($request_url);}
    elseif ($request_url === $payments_post){InsertIntoPaymentsEndpoint ($request_url);}
    elseif ($request_url === $instruments_post){InsertIntoInstrumentsEndpoint ($request_url);}


    // view ...........
    elseif ($request_url === $admin_view_staffs){GetStaffsEndpoint ($request_url);}
    elseif ($request_url === $view_events){GetEventsEndpoint ($request_url);}
    elseif ($request_url === $view_returns){GetReturnsEndpoint ($request_url);}
    elseif ($request_url === $view_borrows ){GetBorrowsEndpoint ($request_url);}
    elseif ($request_url === $view_payments ){GetPaymentsEndpoint ($request_url);}
    elseif ($request_url === $view_instruments ){GetInstrumentsEndpoint ($request_url);}



    // admin
    elseif ($request_url === $create_instrument){AdminCreateInstrumentEndPoint ($request_url);}
    elseif ($request_url === $create_admin ){AdminCreateAdminEndPoint ($request_url);}
    elseif ($request_url === $create_manager ){AdminCreateManagerEndPoint ($request_url);}

    // delete
    elseif ($request_url === $admin_delete_user){AdminDeleteUserEndPoint ($request_url);}
    
    elseif ($request_url === $admin_delete_events){AdminDeleteEventsEndPoint ($request_url);}
    elseif ($request_url === $admin_delete_returns){AdminDeleteReturnsEndPoint ($request_url);}
    elseif ($request_url === $admin_delete_payments){AdminDeletePaymentsEndPoint ($request_url);}
    elseif ($request_url === $admin_delete_borrows){AdminDeleteBorrowsEndPoint ($request_url);}
    elseif ($request_url === $admin_delete_instruments){AdminDeleteInstrumentsEndPoint ($request_url);}





    else {echo "Undefined Url Sent On Server...";}


?>