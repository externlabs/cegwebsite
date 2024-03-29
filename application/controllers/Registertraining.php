<?php
class Registertraining extends CI_controller
{
    public function __construct()
    {
        parent::__construct();
    }
   
   
     public function makepayment(){

        $courseid =$this->input->post('course_id');
        $userType = $this->input->post('customer_type');
        $userid = $this->input->post('customer_id');


        $getTransactionData = $this->db->where('user_type', $userType)->where('user_id', $userid)->where('course_id', $courseid)->where('status', 'Success')->get('transactions')->result_array();
        
        if(count($getTransactionData)>0){
            $this->session->set_flashdata('payment_error', 'You Have Already Applied For this Course!');
            redirect(base_url(). 'alltraining');
        }



        $website_data = $this->db->get('websetting')->result_array();

        foreach($website_data as $webData){
            $merchantID = $webData['merchant_id'];
            $merchantKey = $webData['merchant_key'];
            $paymentURL = $webData['payment_url'];
        }

        $getCourseData = $this->db->where('course_id', $this->input->post('course_id'))->get('course')->result_array(); 

        foreach($getCourseData as $course){
            $formAmounts = $course['form_amount'];
            $courseAmounts = $course['course_amount'];
            $course_type = $course['course_type'];
        }

        $customerId = $this->input->post('customer_id');
        $courseId = $this->input->post('course_id');
        $customerType = $this->input->post('customer_type');


        $orderNo = $customerType.''.rand(1000,10000000);

        $operationMode = "DOM";
        $merchantCountry = "IN";
        $merchantCurrency = "INR";
        $otherDetails = "NA";
        $SuccessUrl = base_url().'registertraining/success';
        $failUrl = base_url().'registertraining/fail';
        $aggregatorId = 'SBIEPAY';
        $merchantCustomerId = $customerId;
        $payMode = "NB";
        $accessMedium = "ONLINE";
        $transactionSource = "ONLINE";
        $merchantOrderNo = $orderNo;



        if($course_type == "free"){
            $finalAmount = 0;
            $_SESSION['amount'] = $finalAmount;
            $_SESSION['customer_id'] = $customerId;
            $_SESSION['customer_type'] = $customerType;
            $_SESSION['course_id'] = $courseId;
            $_SESSION['order_id'] = $merchantOrderNo;

            $this->success();

        }else{
            $finalAmount = $courseAmounts + $formAmounts;
            $_SESSION['amount'] = $finalAmount;
            $_SESSION['customer_id'] = $customerId;
            $_SESSION['customer_type'] = $customerType;
            $_SESSION['course_id'] = $courseId;
            $_SESSION['order_id'] = $merchantOrderNo;
        }

        $requestParameter  = "$merchantID|$operationMode|$merchantCountry|$merchantCurrency|$finalAmount|$otherDetails|$SuccessUrl|$failUrl|$aggregatorId|$merchantOrderNo|$merchantCustomerId|$payMode|$accessMedium|$transactionSource";

        // echo '<b>Requestparameter:-</b> '.$requestParameter.'<br/><br/>';
        $EncryptTrans = $this->encrypt($requestParameter,$merchantKey);
        // echo '<b>Encrypted EncryptTrans:-</b>'.$EncryptTrans.'<br/><br/>';

        $paymentData['payment_data'] = array(
            'payement_url' => $paymentURL,
            'merchante_id' =>$merchantID,
            'EncryptTrans' => $EncryptTrans
        );

        $this->load->view('paymentgetway', $paymentData);
    
    }
    
    
     
    public  function encrypt($data,  $key){
        $algo='aes-128-cbc';
     
        $iv=substr($key, 0, 16);
        // echo $iv;
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
                // echo $iv;
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

        if(!isset($_SESSION['customer_id']) || !isset($_SESSION['customer_type']) || !isset($_SESSION['amount']) || !isset($_SESSION['order_id']) || !isset($_SESSION['course_id'])){
            $this->session->set_flashdata('payment_error', 'Something Wend Wrong Please Try Again Later!');
            redirect(base_url(). 'alltraining');
        }


        $creaTransaction = $this->db->insert('transactions', $data);

        if($creaTransaction){
            $this->session->set_flashdata('success', 'Applied Successfully For Training');
            redirect(base_url() . 'user/trainingapplication');
        }else{
            $this->session->set_flashdata('error', 'Error in Submission!');
            redirect(base_url() . 'user/trainingapplication');
        }
    }

    public function fail(){

        unset($_SESSION['customer_id']);
        unset($_SESSION['customer_type']);
        unset($_SESSION['amount']);
        unset($_SESSION['order_id']);
        unset($_SESSION['course_id']);

        $this->session->set_flashdata('error', 'Pyament Has Been Failed please try again later!');
        redirect(base_url() . 'user/trainingapplication');
    }
    
}
