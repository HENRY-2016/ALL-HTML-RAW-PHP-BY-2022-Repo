

<?php
include "adminuploads.php";

    $request_url = $_SERVER['REQUEST_URI'];

    $admin_items_upload = "/hdf-dir/hdf-php/routes_incoming.php/AdminAddItemEndPoint";
    $admin_edit_items = "/hdf-dir/hdf-php/routes_incoming.php/AdminUpdateItemEndPoint";
    $admin_delete_items = "/hdf-dir/hdf-php/routes_incoming.php/AdminDeleteItemEndPoint";

    // view ...........
    $admin_view_item_names = "/hdf-dir/hdf-php/routes_incoming.php/AdminViewItemNamesEndPoint";
    $admin_view_oldname_to_edit = "/hdf-dir/hdf-php/routes_incoming.php/AdminViewItemNameToUpdateEndPoint";

    if ($request_url === $admin_items_upload){AdminAddItemEndPoint ($request_url);}
    elseif ($request_url === $admin_edit_items ){AdminUpdateItemEndPoint ($request_url);}
    elseif ($request_url === $admin_delete_items){AdminDeleteItemEndPoint ($request_url);}

    // view ...........
    if ($request_url === $admin_view_item_names){AdminViewItemNamesEndPoint ($request_url);}
    elseif ($request_url === $admin_view_oldname_to_edit){AdminViewItemNameToUpdateEndPoint ($request_url);}
    
    // else {echo "Invalid Url Specified ...";}


?>