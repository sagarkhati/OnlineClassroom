<?php
if (!defined('MyConst')) {
    
}
session_start();
session_destroy();
header('location: index.php');
?>