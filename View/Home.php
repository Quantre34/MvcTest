<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home</title>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" ></script>
	<link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="Public/css/Home.css">
</head>
<body>


<section id="hero">
  <h1 style="color: red;opacity: 1;z-index: 999;">Recep Özmen</h1>
  <p>Backend developer</p>
  <?php 
	  if (empty($_SESSION['User'])) {
	  		echo '<a href="/register">Register or Login</a>';
	  }else {
	  		echo '<a href="/order">Sipariş ver</a>';
	  }
   ?>
  <a href="/list">List</a>    
</section>



</body>
</html>