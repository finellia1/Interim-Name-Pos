<?php
include('../invoice/db_connect.php');
// id= 7Ucr2AUj5k
// key = 69Qcf7E4Q4PQc76m 
// for testing purposes.

$stmt = $conn ->query('SELECT * FROM authorize_credentials');
$creds = $stmt -> fetchALL(PDO::FETCH_COLUMN);

echo "lmao";
    if(isset($_POST['submit'])){ //submits id and key to the database if button is pressed.

        //check if any value is empty before submitting
        if(empty($_POST['id']) or empty($_POST['key'])){
            echo "Please fill both fields before submitting ";
        }
        else{
            //htmlspecialchars used to prevent html injections.
            $id = htmlspecialchars($_POST['id']);
            $key = htmlspecialchars($_POST['key']);
            $idcheck = htmlspecialchars($_POST['idconfirm']);
            $keycheck = htmlspecialchars($_POST['keyconfirm']);

<<<<<<< Updated upstream
=======
            echo $id;
            echo $key;

            //error handling
            if($id != $idcheck && $key != $keycheck){

                $error = 'The ID and Key entries do not match. Try entering them again';
                $_SESSION['error'] = $error;
                header("Location: credentialsPage.php");
                exit;
    
            }elseif($id == $idcheck && $key != $keycheck){
    
                $error = 'The Key entries do not match. Try entering them again';
                $_SESSION['error'] = $error;
                header("Location: credentialsPage.php");
                exit;
    
            }elseif($id != $idcheck && $key == $keycheck){
    
                $error = 'The ID entries do not match. Try entering them again';
                $_SESSION['error'] = $error;
                header("Location: credentialsPage.php");
                exit;
    
            }

>>>>>>> Stashed changes
            if($id == $idcheck && $key == $keycheck){

                //first we encrypt the data.
                
                // Store a string into the variable which
                // need to be Encrypted
                $ID_to_be_encrypted = $id;
                $KEY_to_be_encrypted = $key;
                
                // Display the original string(for testing)
                echo "Original ID: " . $ID_to_be_encrypted . "\n"; 
                echo "Original Key: " . $KEY_to_be_encrypted ."\n";
                
                // Store the cipher method
                $ciphering = "AES-128-CTR";
                
                // Use OpenSSl Encryption method
                $iv_length = openssl_cipher_iv_length($ciphering);
                $options = 0;
                
                // Non-NULL Initialization Vector for encryption
                $encryption_iv = '1234567891011121';
                
                // Store the encryption key
                $encryption_key = "rentalPOS";
                
                // Use openssl_encrypt() function to encrypt the data
                $encrypted_KEY = openssl_encrypt($KEY_to_be_encrypted, $ciphering,
                            $encryption_key, $options, $encryption_iv);

                $encrypted_ID = openssl_encrypt($ID_to_be_encrypted, $ciphering,
                            $encryption_key, $options, $encryption_iv);
                                
                // Display the encrypted string(for testing)
                echo "Encrypted ID: " . $encrypted_ID . "\n";
                echo "Encrypted Key: " . $encrypted_KEY . "\n";
                
                
                

                $insert = 'INSERT INTO authorize_credentials (authorize_credentials_ID,transaction_key, transaction_ID) VALUES (?,?,?)';
                $stmt = $conn -> prepare($insert);
                $stmt->execute([1,$encrypted_ID, $encrypted_KEY]);

                //header("Location: index.php");

            }else{
                echo "Make sure your inputs match please";
            }

              

        }
    }




?>