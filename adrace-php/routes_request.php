
<?php
    include "db_crud.php";

    $request_url = $_SERVER['REQUEST_URI'];
    // echo $request_url;
    
    $booking_url = "/adrace-dir/adrace-php/routes_request.php/PostCustomerBookingEndpoint";
    $booking_status_url = "/adrace-dir/adrace-php/routes_request.php/GetCustomersBookingStatusEndpoint";
    $booking_references_url = "/adrace-dir/adrace-php/routes_request.php/GetCustomersBookingReferencesEndpoint";
    $booking_details_url = "/adrace-dir/adrace-php/routes_request.php/GetCustomersBookingDetailsEndpoint";
    $update_booking_details_url = "/adrace-dir/adrace-php/routes_request.php/PostUpdateCustomerBookingDetailsEndpoint";
    $vistors_details_url = "/adrace-dir/adrace-php/routes_request.php/GetVistorsBookingDetailsEndpoint";
    $vistors_status_url = "/adrace-dir/adrace-php/routes_request.php/GetVistorsStatusDetailsEndpoint";
    $vistors_references_url = "/adrace-dir/adrace-php/routes_request.php/GetVistorsReferencesEndpoint";
    $message_url = "/adrace-dir/adrace-php/routes_request.php/PostCustomerMessageEndpoint";

    $message_status_url = "/adrace-dir/adrace-php/routes_request.php/GetCustomerMessageStatusEndpoint";
    $new_message_references_url = "/adrace-dir/adrace-php/routes_request.php/GetNewMassegesReferencesStatusEndpoint";
    $new_message_details_url = "/adrace-dir/adrace-php/routes_request.php/GetNewMessageDetailsEndpoint";
    $update_feedback_url = "/adrace-dir/adrace-php/routes_request.php/PostUpdateMessagesTableEndpoint";
    $feedback_status_url = "/adrace-dir/adrace-php/routes_request.php/GetFeedbackStatusDetailsEndpoint";
    $feedback_references_url = "/adrace-dir/adrace-php/routes_request.php/GetFeedBackReferencesEndpoint";
    $feedback_details_url = "/adrace-dir/adrace-php/routes_request.php/GetFeedBackDetailsEndpoint";


    if ($request_url === $booking_url){PostCustomerBookingEndpoint ($request_url);}
    elseif($request_url === $message_url){PostCustomerMessageEndpoint ($request_url);}
    elseif($request_url === $booking_status_url){GetCustomersBookingStatusEndpoint ($request_url);}
    elseif($request_url === $message_status_url){GetCustomerMessageStatusEndpoint ($request_url);}
    elseif($request_url === $booking_references_url){GetCustomersBookingReferencesEndpoint ($request_url);}
    elseif($request_url === $vistors_references_url){GetVistorsReferencesEndpoint ($request_url);}
    elseif($request_url === $new_message_references_url){GetNewMassegesReferencesStatusEndpoint ($request_url);}
    elseif($request_url === $booking_details_url){GetCustomersBookingDetailsEndpoint ($request_url);}
    elseif($request_url === $new_message_details_url){GetNewMessageDetailsEndpoint ($request_url);}
    elseif($request_url === $update_booking_details_url){PostUpdateCustomerBookingDetailsEndpoint ($request_url);}
    elseif($request_url === $update_feedback_url){PostUpdateMessagesTableEndpoint ($request_url);}
    elseif($request_url === $vistors_details_url){GetVistorsBookingDetailsEndpoint ($request_url);}
    elseif($request_url === $vistors_status_url){GetVistorsStatusDetailsEndpoint ($request_url);}
    elseif($request_url === $feedback_status_url){GetFeedbackStatusDetailsEndpoint ($request_url);}
    elseif($request_url === $feedback_references_url){GetFeedBackReferencesEndpoint ($request_url);}
    elseif($request_url === $feedback_details_url){GetFeedBackDetailsEndpoint ($request_url);}

    else {echo "Invalid url specified ...";}

?>