<?php
require 'config/constants.php';

session_start();
session_destroy();
header("Location: ".ROOT_URL);
exit();
?>