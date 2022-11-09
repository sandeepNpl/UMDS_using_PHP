
<?php
include('../config/constants.php');
//destroy the session 
session_destroy();
//redirecte to SITEURL
header('location:'.SITEURL);
?>