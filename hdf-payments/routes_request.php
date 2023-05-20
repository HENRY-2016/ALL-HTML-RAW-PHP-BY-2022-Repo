
<?php
    include "db_crud.php";

    $request_url = $_SERVER['REQUEST_URI'];
    // echo $request_url;
    
    $booking_url = "/hdf-dir/payments/routes_request.php/PostCustomerBookingEndpoint";
    $booking_url_img = "/hdf-dir/payments/routes_request.php/PostCustomerBookingWithImageEndpoint";
    $payment_url = "/hdf-dir/payments/routes_request.php/PostCustomerPaymentEndpoint";

    // =====>> READ FROM
    $booking_status_url = "/hdf-dir/payments/routes_request.php/GetCustomersBookingStatusEndpoint";
    $booking_references_url = "/hdf-dir/payments/routes_request.php/GetCustomersBookingReferencesEndpoint";
    $booking_details_url = "/hdf-dir/payments/routes_request.php/GetCustomersBookingDetailsEndpoint";

    $payments_status_url = "/hdf-dir/payments/routes_request.php/GetCustomerPaymentsStatusEndpoint";
    $payments_references_url = "/hdf-dir/payments/routes_request.php/GetCustomerPaymentsReferencesEndpoint";
    $payments_details_url = "/hdf-dir/payments/routes_request.php/GetCustomerPaymentsDetailsEndpoint";



    if ($request_url === $booking_url){PostCustomerBookingEndpoint ($request_url);}
    elseif ($request_url === $payment_url){PostCustomerPaymentEndpoint ($request_url);}
    elseif ($request_url === $booking_url_img){PostCustomerBookingWithImageEndpoint ($request_url);}


    // =====>> READ FROM
    elseif ($request_url === $booking_status_url){GetCustomersBookingStatusEndpoint ($request_url);}
    elseif ($request_url === $booking_references_url){GetCustomersBookingReferencesEndpoint ($request_url);}
    elseif ($request_url === $booking_details_url){GetCustomersBookingDetailsEndpoint ($request_url);}
    elseif ($request_url === $payments_status_url){GetCustomerPaymentsStatusEndpoint ($request_url);}
    elseif ($request_url === $payments_references_url){GetCustomerPaymentsReferencesEndpoint ($request_url);}
    elseif ($request_url === $payments_details_url){GetCustomerPaymentsDetailsEndpoint ($request_url);}




    else {echo "Invalid url specified ...";}

?>