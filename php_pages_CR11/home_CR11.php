<?php
ob_start();
session_start();
require_once 'dbconnectNewCR11.php';

// if session is not set this will redirect to login page
if( !isset($_SESSION['user' ]) ) {
 header("Location: index_CR11.php");
 exit;
}
// select logged-in users details
$res=mysqli_query($conn, "SELECT * FROM users WHERE userId=".$_SESSION['user']);
$userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" author="Carina" content= "Adopt a pet">
	<meta name="viewport" content ="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../styles_CR11.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<title>Welcome - <?php echo $userRow['userName' ]; ?></title>
</head>

<body>

<header>
	
		<div class="header_hero">
			<div class="row">
				<div class="col-sm-12">
					<div id="Welcome_field"> Hi, <?php echo $userRow['userName' ]; ?></div> <div><a id="Signout_field" href="logout_CR11.php?logout">Sign Out</a></div>
				</div>
			</div>
			<div class="hero_text"> All our animals </div>
		</div>

	<nav class="navbar navbar-expand navbar-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" id="home" href="home_CR11.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          S&L and Seniors
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="seniors_CR11.php">Seniors</a>
          <a class="dropdown-item" href="general_CR11.php">Small and Large</a>
        </div>
      </li>
       <li class="nav-item">
        <a class="nav-link" style="color: green;" id="addresses" href="addresses_CR11.php"> Address list </a>
      </li>
    </ul>
  </div>

</nav>

	</header>

<main>


  <div class="container">

    <div class="card-deck">

      <div class="row" id="main_row">
      

    
  <?php

      $db = mysqli_connect("localhost","u187800db1","8ntjbpbytrh","u187800db1"); 
      $sql = "SELECT image, name, description, age, hobbies, city FROM animal
      INNER JOIN location on fk_location_id = location_id";
      $result = $db->query($sql);
      while ($row=mysqli_fetch_assoc($result)) {


      echo ' <div class="col-xs-8 col-sm-10 col-md-6 col-lg-6">
      <div id="img_div"><img src="data:longblob;base64,'.base64_encode( $row['image'] ).' "></div>
      <div class="card border-light">
      <div class="card-body card_body">
                  
            <h5 class="card-title">'; printf ("<b> %s </b>", $row["name"]); echo '</h5>

        <p class="card-text">'; printf ($row["description"]); echo '</p>
        <p class="card-text age">'; printf ("<span style='color: green;'>Age:</span> %s", $row["age"]); echo '</p>
        <p class="card-text hobbies">'; printf ("<span style='color: green;'> Hobbies:</span> %s", $row["hobbies"]); echo '</p>
        <p class="card-text location">'; printf ("<span style='color: green;'> Location:</span> %s", $row["city"]); echo '</p>
      </div>
         </div>
         </div>';
    
      }

    ?>

    </div> <!--------------  end of main_row -------------------------->
      </div> <!--------------  end of card-deck -------------------------->
     </div>   <!--------------  end of container -------------------------->

     
</main>

 <footer>

  <div id="footer_div1">
  </div>

  <div id="footer_div2">
    <div class="footer_logo">Adopt a pet</div>
  </div>

  </footer>




</body>
</html>
<?php ob_end_flush(); ?>