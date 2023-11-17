<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    for ($i = 1; $i <= $_POST['num_adresses']; $i++) {
        $street = $_POST["street_$i"];
        $street_nb = $_POST["street_nb_$i"];
        $type = $_POST["type_$i"];
        $city = $_POST["city_$i"];
        $zipcode = $_POST["zipcode_$i"];

        
    }

    header("Location: verification.php");
    exit();
} else {
    header("Location: adresse.php");
    exit();
}
?>
