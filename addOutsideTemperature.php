<?php
    $page_title = 'Insert Outside Temperature';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        require ('db_connect_dataretriever.php');

        $errors = array();

  	if (empty($_POST['idBuildings'])) {
            $errors[] = 'Invalid idBuildings';
        } else {
            $idBuildings = mysqli_real_escape_string($dbc, trim($_POST['idBuildings']));
        }

        if (empty($_POST['Degrees'])) {
            $errors[] = 'Invalid Degrees';
        } else {
            $Degrees = mysqli_real_escape_string($dbc, trim($_POST['Degrees']));
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
            $insertOutsideTemperature = "INSERT INTO OutsideTemperature (idBuildings, Degrees, Units, Date/Time) 
            VALUES ('$idBuildings', '$Degrees', '$Units', 'Date/Time')";
            $OutsideTemperatureInsertion = @mysqli_query($dbc, $insertOutsideTemperature);
            if ($OutsideTemperatureInsertion) {
		}else{
                echo "Operation Failed" . $insertOutsideTemperature;
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