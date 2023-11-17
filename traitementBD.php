<?php
session_start();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    $db_host = 'localhost';
    $db_user = 'root';
    $db_password = '';
    $db_name = 'ecom1_tp2';

    $conn = new mysqli($db_host, $db_user, $db_password, $db_name);

   
    if ($conn->connect_error) {
        die("La connexion échoué : " . $conn->connect_error);
    }

   
    $num_addresses = isset($_SESSION['num_addresses']) ? (int)$_SESSION['num_addresses'] : 0;


    for ($i = 1; $i <= $num_addresses; $i++) {
        $street = $_POST['street_' . $i];
        $street_nb = $_POST['street_nb_' . $i];
        $city = $_POST['streetCity_' . $i];
        $zipcode = $_POST['streetZipcode_' . $i];

        
        $stmt = $conn->prepare("INSERT INTO addresses (street, street_nb, city, zipcode) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sisi", $street, $street_nb, $city, $zipcode);
        $stmt->execute();

       
        if ($stmt->affected_rows === -1) {
            echo "Erreur  : " . $stmt->error;
        }
        
        $stmt->close();
    }
 
    $conn->close();

    
    header('Location: confirmation.php');
    exit;
} else {
   
    header('Location: address-form.php');
    exit;
}
?>