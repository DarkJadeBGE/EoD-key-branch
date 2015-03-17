<?php
    $page_title = 'Insert Gas Consumption';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        require ('db_connect_dataretriever.php');

        $errors = array();

  	if (empty($_POST['idBuildings'])) {
            $errors[] = 'Invalid idBuildings';
        } else {
            $idBuildings = mysqli_real_escape_string($dbc, trim($_POST['idBuildings']));
        }

        if (empty($_POST['Consumed'])) {
            $errors[] = 'Invalid Amount Consumed';
        } else {
            $Consumed = mysqli_real_escape_string($dbc, trim($_POST['Consumed']));
        }

        if (empty($_POST['Units'])) {
            $errors[] = 'Invalid Units';
        } else {
            $Units = mysqli_real_escape_string($dbc, trim($_POST['Units']));
        }

        if (empty($_POST['Date/Time'])) {
            $errors[] = 'Invalid Date/Time';
        } else {
            $Date/Time = mysqli_real_escape_string($dbc, trim($_POST['Date/Time']));
        }

       
        if (empty($errors)) {
            $insertGasConsumption = "INSERT INTO GasConsumption (idBuildings, Consumed, Units, Date/Time) 
            VALUES ('$idBuildings', '$Usage', '$Units', 'Date/Time')";
            $GasConsumptionInsertion = @mysqli_query($dbc, $insertGasConsumption);
            if ($GasConsumptionInsertion) {
		}else{
                echo "Operation Failed" . $insertGasConsumption;
            }

            # Close database connection.
            mysqli_close($dbc);
            exit();
        }
        else {
            echo '<h1>Error!</h1><p id="err_msg">The following error(s) occurred:<br>';
            foreach ($errors as $msg) {
                echo " - $msg<br>";
            }
            echo 'Please try again.</p>';
            # Close database connection.
            mysqli_close($dbc);
        }
    }
?>