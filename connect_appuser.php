<?php

$databaseConnection = mysqli_connect('192.254.184.33', 'adriano_appuser', 'qw!@3456QWER', 'adriano_EoDdb')
        OR die( mysqli_connect_error());

mysqli_set_charset($databaseConnection, 'utf8');

?>