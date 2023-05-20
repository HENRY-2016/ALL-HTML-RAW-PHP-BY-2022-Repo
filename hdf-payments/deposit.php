


<?php  

$id_reference = date("dh-is");
// echo int($id_reference);
// <!-- 0752758000 esther -->
function ProcessCustomerMobileMoneyPayment ($reason,$phone,$amount)
    {
        // Mobile money incoming 
            $url = 'https://www.easypay.co.ug/api/'; 
            global $id_reference;

            $payload = array( 
                'username' => '91781a86f65565a4', 
                'password' => 'c84bf6d6cdf67269', 
                'action' => 'mmdeposit', 
                'amount' => $amount, 
                'phone'=>$phone, 
                'currency'=>'UGX', 
                'reference'=>$id_reference, 
                'reason'=>$reason 

                // "username": "your client Id",
                // "password": "your secret",
                // "action":"mmdeposit",
                // "amount":500,
                // "currency":"UGX",
                // "phone":"mobile money phone number",
                // "reference":"1",
                // "reason":"Payment for book"

            ); 
            //open connection 
            $ch = curl_init(); 

            //set the url, number of POST vars, POST data 
            curl_setopt($ch,CURLOPT_URL, $url); 
            curl_setopt($ch,CURLOPT_POSTFIELDS, json_encode($payload)); 
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); 
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); 
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT ,15); 
            curl_setopt($ch, CURLOPT_TIMEOUT, 400); //timeout in seconds 
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
            //execute post 
            $result = curl_exec($ch); 

            //close connection 
            curl_close($ch); 
            // print_r(json_decode($result)); 

        //     [success] => 1
        //     [data] => Mobile Money Deposit. Phone: 256771977854 
        //      Amount: UGX 500 Charge: UGX 15 Amount Received: UGX 500 
        //      Date: 2021-10-10 12:04:00 
        //      TelecomID: 13848897543 TxID: 838022 
        //      Reason: Testing MM DEPOSIT


    }

function ProcessCustomerCardPayment ()
{
    
        // "username": "your client Id",
        // "password": "your secret",
        // "action":"cardpayment",
        // "auth":"suggestedAUTH above",

        // "name":"name on card",
         // "amount":"amount in usd',
        // "currency":"USD",
        // "cardno":"card number",
        // "month":"expiry month eg 01 for jan",
        // "year":"year of expiry",
        // "cvv":"security code back of card",
        // "email":"card holders email",
        // "country":"billing country",
        // "state":"state",
        // "zip":"zip code",
        // "city":"billing city",
        // "phone":"phone number",
        // "pin":"card pin",




        // "address":"billing address",
        // "reference":"your order reference",
        // "reason":"Reason eg book payment"

}

?> 