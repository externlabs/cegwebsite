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

        $operationMode = "DOM";
        $merchantCountry = "IN";
        $merchantCurrency = "INR";
        $amount = "100";
        $otherDetails = "NA";
        $SuccessUrl = base_url().'registertraining/success';
        $failUrl = base_url().'registertraining/fail';
        $aggregatorId = 'SBIEPAY';
        $merchantCustomerId = "4";
        $payMode = "NB";
        $accessMedium = "ONLINE";
        $transactionSource = "ONLINE";
        $merchantOrderNo = "14Testorder";

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
        echo "hiii";
    }

    public function success(){
        print_r("success");
    }

    public function fail(){
        print_r("fail");
    }
    
}
