<?php
require 'vendor/autoload.php';
use net\authorize\api\contract\v1 as AnetAPI;
use net\authorize\api\controller as AnetController;

// ***************************************************************************
// ***************************************************************************
// grab our payment data first
$amountSt = $_POST['amount'];
$amount = intval(str_replace(",","",$amountSt));
$name = $_POST['name'];
$street = $_POST['street'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];
$card = $_POST['card'];
$card_exp_month = $_POST['card_exp_month'];
$card_exp_year = $_POST['card_exp_year'];
$ex_date = $card_exp_year.'-'.$card_exp_month;
$cvv = $_POST['cvv'];
$email = $_POST['email'];
// ***************************************************************************
// ***************************************************************************

define("AUTHORIZENET_LOG_FILE","phplog");

// Common setup for API credentials

  include('../invoice/db_connect.php');
  // id= 7Ucr2AUj5k
  // key = 69Qcf7E4Q4PQc76m 
  // for testing purposes.

  $stmt = $conn ->query('SELECT * FROM authorize_credentials');
  $creds = $stmt -> fetchALL(PDO::FETCH_ASSOC);

  $holder = $creds[0];
  $encrypted_ID = $holder['transaction_ID'];
  $encrypted_KEY = $holder['transaction_key'];
  
  //decryption

  // Non-NULL Initialization Vector for decryption
  $decryption_iv = '1234567891011121';
                
  // Store the decryption key
  $decryption_key = "rentalPOS";

  // Store the cipher method
  $ciphering = "AES-128-CTR";
                
  // Use OpenSSl Encryption method
  $iv_length = openssl_cipher_iv_length($ciphering);
  $options = 0;
  
  // Use openssl_decrypt() function to decrypt the data
  $decrypted_ID = openssl_decrypt ($encrypted_ID, $ciphering, 
          $decryption_key, $options, $decryption_iv);

  $decrypted_KEY = openssl_decrypt ($encrypted_KEY, $ciphering, 
          $decryption_key, $options, $decryption_iv);

  
  // Display the decrypted string
  echo "Decrypted ID: " . $decrypted_ID . "\n";
  echo "Decrypted KEY: " . $decrypted_KEY . "\n";


  $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
  $merchantAuthentication->setName($decrypted_ID);
  $merchantAuthentication->setTransactionKey($decrypted_KEY);
  $refId = 'ref' . time();
 
  // ***************************************************************************
  // ***************************************************************************
  // Create the payment data for a credit card
    $creditCard = new AnetAPI\CreditCardType();
    $creditCard->setCardNumber($card);
    $creditCard->setExpirationDate($ex_date);
    $creditCard->setCardCode("127");  // add in
    $paymentOne = new AnetAPI\PaymentType();
    $paymentOne->setCreditCard($creditCard);

    // Set the customer's identifying information
        $customerData = new AnetAPI\CustomerDataType();
        $customerData->setType("individual");
        $customerData->setEmail($email);
        // Order info
      $order = new AnetAPI\OrderType();
      $order->setInvoiceNumber("698712");
      $order->setDescription("Test Product");

    		// Set the customer's Bill To address add this section in
    	 $customerAddress = new AnetAPI\CustomerAddressType();
    	 $customerAddress->setFirstName($name);
    	 $customerAddress->setAddress($street);
    	 $customerAddress->setCity($city);
    	 $customerAddress->setState($state);
    	 $customerAddress->setZip($zip);
    	 $customerAddress->setCountry("USA");
    // end of customer billing insfo code

  // Create a transaction
    $transactionRequestType = new AnetAPI\TransactionRequestType();
    $transactionRequestType->setTransactionType("authCaptureTransaction");
    $transactionRequestType->setAmount($amount);
    $transactionRequestType->setOrder($order); // add in
    $transactionRequestType->setCustomer($customerData); // add in
  	$transactionRequestType->setBillTo($customerAddress); // add in
    $transactionRequestType->setPayment($paymentOne);
    $request = new AnetAPI\CreateTransactionRequest();
    $request->setMerchantAuthentication($merchantAuthentication);
    $request->setRefId($refId);
    $request->setTransactionRequest($transactionRequestType);
    $controller = new AnetController\CreateTransactionController($request);
    $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::SANDBOX);
    // ***************************************************************************
    // ***************************************************************************

if ($response != null)
{
  $tresponse = $response->getTransactionResponse();
  if (($tresponse != null) && ($tresponse->getResponseCode()=="1"))
  {
    header("Location: ./?m=1");
    die();
  }
  else
  {
    header("Location: ./?m=2");
      die();
  }
}
else
{
  header("Location: ./?m=2");
    die();
}
?>
