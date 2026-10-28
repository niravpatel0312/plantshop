<?php
session_start();
?>

<html>
<head>
    <title>Plant shop</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light"style="background-color:#76ff03">
  <a class="navbar-brand" href="#">Plant shop</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="about.php">About </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="plants.php">Plant </a>
      </li>

      <?php
      if(isset($_SESSION["cartid"]))
      {
        ?>
         <li class="nav-item active">
        <a class="nav-link" href="view_cart.php">view cart </a>
      </li>
        <?php
      }
      ?>
      <?php
      if(isset($_SESSION["custid"]))
      {
        ?>
          <li class="nav-item active">
        <a class="nav-link" href="cust_view_orders.php">View orders </a>
      </li>
        <?php
      }else{
      ?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
          Registration
        </a>
        
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="supplier_regis.php">SUPPLIER REGISTRATION</a>
          <a class="dropdown-item" href="customer_regis.php">CUSTOMER REGISTRATIONS</a>
         
        </div>
      </li>

      
      <li class="nav-item active">
        <a class="nav-link" href="login.php">login </a>
      </li>
      <?php 
      }
      ?>
      <li class="nav-item active">
        <a class="nav-link" href="contact.php">contact </a>
      </li>
      <?php
    if(isset($_SESSION["custid"]))
    {
      ?>
      <li class="nav-item active">
        <a class="nav-link" href="logout.php">logout </a>
      </li>
      <?php
    }
      ?>
     
    </ul>
    
  </div>
</nav>

       