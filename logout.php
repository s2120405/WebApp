<!--Destroys session when logged out--->
<?php
include 'config/config1.php';
session_destroy();
header("location: index.php");