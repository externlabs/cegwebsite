<?php
class Registertraining extends CI_controller
{
    public function __construct()
    {
        parent::__construct();
    }
   
   
     public function makepayment(){
        $website_data = $this->db->get('websetting')->result_array();

        foreach($website_data as $webData){
            $merchantID = $webData['merchant_id'];
            $merchantKey = $webData['merchant_key'];
            $paymentURL = $webData['payment_url'];
        }

        $customerId = $this->input->post('customer_id');
        $courseId = $this->input->post('course_id');
        $formamount = $this->input->post('form_amount');
        $courseAmount = $this->input->post('course_amount');
        $customerType = $this->input->post('customer_type');
        $finalAmount = $formamount + $courseAmount;

        $orderNo = $customerType.''.rand(10,100000);

        $operationMode = "DOM";
        $merchantCountry = "IN";
        $merchantCurrency = "INR";
        $amount = $finalAmount;
        $otherDetails = "NA";
        $SuccessUrl = base_url().'registertraining/success';
        $failUrl = base_url().'registertraining/fail';
        $aggregatorId = 'SBIEPAY';
        $merchantCustomerId = $customerId;
        $payMode = "NB";
        $accessMedium = "ONLINE";
        $transactionSource = "ONLINE";
        $merchantOrderNo = $orderNo;

        $_SESSION['amount'] = $finalAmount;
        $_SESSION['customer_id'] = $customerId;
        $_SESSION['customer_type'] = $customerType;
        $_SESSION['course_id'] = $courseId;
        $_SESSION['order_id'] = $merchantOrderNo;

        $requestParameter  = "$merchantID|$operationMode|$merchantCountry|$merchantCurrency|$amount|$otherDetails|$SuccessUrl|$failUrl|$aggregatorId|$merchantOrderNo|$merchantCustomerId|$payMode|$accessMedium|$transactionSource";

        echo '<b>Requestparameter:-</b> '.$requestParameter.'<br/><br/>';
        $EncryptTrans = $this->encrypt($requestParameter,$merchantKey);
        echo '<b>Encrypted EncryptTrans:-</b>'.$EncryptTrans.'<br/><br/>';

        echo '<form name="ecomStatus" method="post" action="'.$paymentURL.'">
                <input type="text" name="EncryptTrans" value="'.$EncryptTrans.'">
                <input type="text" name="merchIdVal" value ="'.$merchantID.'"/>
                <input type="submit" name="submit" value="Submit">
            </form>';
    
    }
    
    
     
    public  function encrypt($data,  $key){
        $algo='aes-128-cbc';
     
        $iv=substr($key, 0, 16);
        echo $iv;
        $cipherText = openssl_encrypt(
            $data,
               $algo,
               $key,
               OPENSSL_RAW_DATA,
               $iv
           );
        $cipherText = base64_encode($cipherText);
        return $cipherText;
    }


    public function decrypt($cipherText,  $key){
        $algo='aes-128-cbc';

        $iv=substr($key, 0, 16);
                echo $iv;
        $cipherText = base64_decode($cipherText);
                    
                    $plaintext = openssl_decrypt(
                    $cipherText,
                    $algo,
                    $key,
                    OPENSSL_RAW_DATA,
                    $iv
                );
        return $plaintext;   

    }


    public function paymentresponse(){

        
    }

    public function success(){

        $data = array(
            'user_id' => $_SESSION['customer_id'],
            'user_type' => $_SESSION['customer_type'],
            'amount' => $_SESSION['amount'],
            'transaction_id' => $_SESSION['order_id'],
            'course_id' =>  $_SESSION['course_id'],
            'status' => 'Success'
        );

        print_r($data);
        die;

        $creaTransaction = $this->db->insert('transactions', $data);

        if($creaTransaction){
            echo "done";
        }else{
            echo "error";
        }
    }

    public function fail(){
        print_r("fail");
    }
    
}
