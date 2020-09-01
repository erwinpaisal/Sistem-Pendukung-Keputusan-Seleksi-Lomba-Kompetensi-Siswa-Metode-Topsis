<?php
error_reporting(0);
session_start();
require_once 'config/config.php';

session_destroy();
exit("<script>window.location='".$base_url."';</script>");

?>