

<?php 
    // https://mogahenze.com/hdf-dir/payments/ipn.php ipn
    // https://mogahenze.com/hdf-dir/hdf-php/authenticateclient.php website
    include "db.php";
    $post = file_get_contents('php://input'); 
    // write to file ... 
    $file = fopen("easypay.txt","w") or die("Unable to open file!");;
    fwrite($file, $post);
    fclose($file);

    $data = json_decode($post); 
    $reference=$data->reference; //This is your order id, mark this as paid<br ?--> 
    $phone=$data->phone; //phone number that deposited 
    $reason=$data->reason; //reason you stated 
    $transactionId=$data->transactionId; //Easypay transction Id 
    $amount=$data->amount; //amount deposited 
    $Date = date("d-m-Y");
    //With the above details you can update your system and mark order as paid on your side 
        // user defined
    // $telecomId=$data->telecomId;
    // $currency=$data->currencyCode;
    // $date = $data->Date;

    //     [success] => 1
    //     [data] => Mobile Money Deposit. Phone: 256771977854 
    //      Amount: UGX 500 Charge: UGX 15 Amount Received: UGX 500 
    //      Date: 2021-10-10 12:04:00 
    //      TelecomID: 13848897543 TxID: 838022 
    //      Reason: Testing MM DEPOSIT

    //    [success] => 1
    //    [data] => Mobile Money Deposit. Phone: 256771977854 Amount: UGX 1,000 Charge: UGX 30 Amount Received: UGX 1,000 Date: 2021-10-10 12:15:50 TelecomID: 13848991839 TxID: 838034 Reason: Testing MM DEPOSIT

    // 10025954|256771977854|kamoga henry|838176_13850857355|500|||
    RegisterCustomerPaymentsDetails ($reference,$phone,$reason, $transactionId,$amount,"$telecomId", "$currency",$Date)

?> 