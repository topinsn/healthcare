<?php

//here, I capture the response from the flutterwave payment platform
    if (isset($_GET['status'])){
//        check payment status
        if ($_GET['status'] == 'cancelled'){
            header('Location: donate.php');
        }elseif($_GET['status'] == 'successful'){

//        verify the transaction if and when it is confirmed successful
//            start by creating needed variables
            $tx_id = $_GET['tx_ref'];
            $secret_key = "FLWSECK_TEST-670a3122cb51b60332fbf6a98bfd6378-X"; //flutterwave secret key
//            end of needed variables
            $txid = $_GET['transaction_id'];

            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.flutterwave.com/v3/transactions/{$txid}/verify",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                    "Content-Type: application/json",
                    "Authorization: Bearer $secret_key"
                ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);

            $resp = json_decode($response);

            // echo "<pre>";
            // echo $response;
            // echo "</pre>";

           // print_r($response);

            if($resp->status == 'success'){
                if($resp->data->charged_amount >= $resp->data->meta->price){

                    //now that it confirms that all is correct, I will add the information gotten into the database
                    //since the server has been inititated above, i will include the class and call the function created 
                    include_once "csl.php";
                    $donate_insert = new Country;
                    //check if insertion is successful
                    if($donate_insert == false){
                        $error = "<div style='color:red'>Error inserting details</div>";
                        echo $error;
                    }else{
                    //then, go ahead and confirm successful transaction
                    var_dump($_GET);
                    

                    //call the function
                    // $donate_insert->insertDonation($name, $phone_number, $email, $amount, $transaction_id, $tx_ref);

                    echo "Donation completed successfully. Thank you!";
                    header("Location: payment_success.php");
                    }
                    exit;
                    
                }else{
                    echo "Fraud Detected!!!";
                }
            }else{
                echo "Donation cannot be processed successfully";
            }
        }

    }
?>
