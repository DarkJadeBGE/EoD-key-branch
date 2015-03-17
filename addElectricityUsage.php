<?php
    $page_title = 'Insert Electricity Usage';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        require ('db_connect_dataretriever.php');

        $errors = array();

  	if (empty($_POST['idBuildings'])) {
            $errors[] = 'Invalid idBuildings';
        } else {
            $idBuildings = mysqli_real_escape_string($dbc, trim($_POST['idBuildings']));
        }

        if (empty($_POST['Usage'])) {
            $errors[] = 'Invalid Amount Usage';
        } else {
            $Usage = mysqli_real_escape_string($dbc, trim($_POST['Usage']));
        }

        if (empty($_POST['Units'])) {
            $errors[] = 'Invalid Units';
        } else {
            $Units = mysqli_real_escape_string($dbc, trim($_POST['PubTitle']));
        }

        if (empty($_POST['Date/Time'])) {
            $errors[] = 'Invalid Date/Time';
        } else {
            $Date/Time = mysqli_real_escape_string($dbc, trim($_POST['Date/Time']));
        }

       
        if (empty($errors)) {
            $insertElectricityUsage = "INSERT INTO ElectricityUsage (idBuildings, Usage, Units, Date/Time) 
            VALUES ('$idBuildings', '$Usage', '$Units', 'Date/Time')";
            $ElectricityUsageInsertion = @mysqli_query($dbc, $insertElectricityUsage);
            if ($ElectricityUsageInsertion) {
		}else{
                echo "Operation Failed" . $insertElectricityUsage;
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