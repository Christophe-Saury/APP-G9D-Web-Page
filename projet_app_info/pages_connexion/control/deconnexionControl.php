<?php
session_start();
session_destroy();
header('location: ../control/connexionControl.php');
exit;
?>
