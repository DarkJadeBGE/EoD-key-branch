<?php
    $page_title = 'Insert Water Usage';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        require ('db_connect_dataretriever.php');

        $errors = array();

  	if (empty($_POST['idBuildings'])) {
            $errors[] = 'Invalid idBuildings';
        } else {
            $idBuildings = mysqli_real_escape_string($dbc, trim($_POST['idBuildings']));
        }

        if (empty($_POST['Used'])) {
            $errors[] = 'Invalid Amount Used';
        } else {
            $Used = mysqli_real_escape_string($dbc, trim($_POST['Used']));
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
            $insertWaterUsage = "INSERT INTO WaterUsage (idBuildings, Used, Units, Date/Time) 
            VALUES ('$idBuildings', '$Used', '$Units', 'Date/Time')";
            $WaterUsageInsertion = @mysqli_query($dbc, $insertWaterUsage);
            if ($WaterUsageInsertion) {
		}else{
                echo "Operation Failed" . $insertWaterUsage;
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