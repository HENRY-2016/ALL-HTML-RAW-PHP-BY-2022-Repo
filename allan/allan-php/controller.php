


<?php
    include "views.php";
    include "adminuploads.php";

    $request_url = $_SERVER['REQUEST_URI'];


    $msg_post = "/allan-dir/allan-php/controller.php/InsertIntoMessagesEndpoint";
    $msg_get = "/allan-dir/allan-php/controller.php/ReadUserMessageEndpoint";
    $signup= "/allan-dir/allan-php/controller.php/InsertIntoUsersEndpoint";
    $signin= "/allan-dir/allan-php/controller.php/SigInUserEndpoint";

    // Admin
    $admin_items_upload = "/allan-dir/allan-php/controller.php/AdminAddItemEndPoint";
    $admin_view_items = "/allan-dir/allan-php/controller.php/AdminViewItemEndPoint";
    $admin_update_items = "/allan-dir/allan-php/controller.php/AdminUpdateItemEndPoint";
    $admin_delete_items = "/allan-dir/allan-php/controller.php/AdminDeleteItemEndPoint";


    /**
     *          ======================================================
     *                          USER READ FROM DB
     *          =====================================================
     */
    
    if ($request_url === $signup){InsertIntoUsersEndpoint ($request_url);}
    elseif ($request_url === $msg_post){InsertIntoMessagesEndpoint ($request_url);}
    elseif ($request_url === $msg_get){ReadUserMessageEndpoint ($request_url);}
    elseif ($request_url === $signin){SigInUserEndpoint ($request_url);}

    
    // view ...........
    // elseif ($request_url === $admin_view_item_names){AdminViewItemNamesEndPoint ($request_url);}
    // elseif ($request_url === $admin_view_oldname_to_edit){AdminViewItemNameToUpdateEndPoint ($request_url);}

    // admin
    elseif ($request_url === $admin_items_upload){AdminAddItemEndPoint ($request_url);}
    elseif ($request_url === $admin_view_items ){AdminViewItemEndPoint ($request_url);}
    elseif ($request_url === $admin_update_items ){AdminUpdateItemEndPoint ($request_url);}
    elseif ($request_url === $admin_delete_items){AdminDeleteItemEndPoint ($request_url);}

    


    else {echo "Undefined Url Sent On Server...";}
    echo "Undefined Url Sent On Server...";
?>