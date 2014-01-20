<?php
require_once(dirname(__FILE__)."/application_top.php");
if(!empty($_POST['submit']))
    include_once(INC.'process.php');
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
<title><?php echo $ini['app']['name'] . ' v' . $ini['app']['version']?></title>
<meta name="description" content="<?php echo $ini['app']['description']?>">
<link href="css/bootstrap-combined.min.css" rel="stylesheet">
<style>
    .container {max-width: 900px;}
    .header{background-color: #FFFFFF;background-image: linear-gradient(#D9FADD, #D9FADD 25%, #FFFFFF);border-top: 3px solid #11BF28;padding: 30px 0;text-align: center;}
    .footer{padding: 30px 0;text-align: center;font-size:0.8em;}
    .btn-group{padding-bottom:10px;}
    .thumbnail{padding-left:10px;}
    .noline,.noline:hover{text-decoration: none;}
    input[type="text"].error, input[type="password"].error, input[type="number"].error, input[type="email"].error{border:1px solid #B94A48;background-color:#FAC6C5}
</style>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</head>
<body>
    <div class="header">
        <!-- customize your installer heading from here -->
        <img/>
        <h5><a href="/"><?php echo $ini['app']['name']?></a><?php if(!empty($ini['app']['license'])) echo ' is '.$ini['app']['license']?></h5>
        <!-- customize your installer heading end -->
    </div>
    <div class="container">
