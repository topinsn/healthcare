<?php
    var_dump($_POST);
    if (isset($_POST['pay'])) {
        $email = $_POST['email'];
        $amount = $_POST['amount'];
        $phone_number = $_POST['phone'];
        $name = $_POST['name'];
        $secret_key = "FLWSECK_TEST-670a3122cb51b60332fbf6a98bfd6378-X"; //flutterwave secret key
        $trx_ref = "TRX_".rand(1,6).'DNT'.time(); //reference number
        $redirect_url = "http://localhost/project/payment_process.php"; 
        $title = "Donation";

//    prepare flutterwave request
        $request = [
            'tx_ref' => $trx_ref,
            'amount' => $amount,
            'currency' => 'NGN',
            'payment_options' => 'card, bank transfer, ussd',
            'redirect_url' => $redirect_url,
            'customer' => [
                'email' => $email,
                'name' =>  $name,
                'phone_number' => $phone_number
            ],
            'meta' => [
                'price' => $amount
            ],
            'customisations' =>[
                'title' => $title,
                'description' => 'Donation'
            ]
        ];

//time to call flutterwave endpoint
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.flutterwave.com/v3/payments',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($request),
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer $secret_key",
                "Content-Type: application/json"
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        $resp = json_decode($response);

//        echo '<pre>';
//        echo $response;
//        echo '</pre>';

        if ($resp->status == 'success'){
            //If request was successfully, redirect user to the payment link generated
            $link = $resp->data->link;
            header('Location: '.$link);
        }else{
            echo "We cannot process your payment";     // echo 'We can not process your payment';
        }
    }
?>

