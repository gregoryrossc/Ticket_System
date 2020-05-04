<?php session_start()?> <!-- starts the session -->
<!DOCTYPE html>

<html lang="en">
<head>
  <title>Digital Web Services</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/webapp.css">
  <script src="js/getjson.js"></script>
   

    <title>
       Digital Services Web App
    </title>
</head>

<body>

<?php
    if (isset($_SESSION["users_name"])) { //if session is set displays the users user name
            ?>
            <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>                        
          </button>
          <a class="navbar-brand" href="#">Logo</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li class="active">
            <br>
            <?php 
              if(isset($_SESSION['users_name'])) //if session is set displays current user name in greeting message
              {
                  $users_name = $_SESSION['users_name']; 
                  echo "<div id='greeting' data-name='$users_name'>&nbsp;&nbsp;Hello there, $users_name</div>"; 
              }
            ?>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
          </ul>
        </div>
      </div>
    </nav>

      <br>

      <div class="div1">
      <h2>Create Ticket</h2>

      <div id="container">
          <br>
          <br>

            <label>Order Type</label>
                           <select id="ordertype" onchange="getComboA(this)">
                           <option value="">Select Service Type</option>
                           <option value="Web Design " id="web">Website Design</option>
                           <option value="Graphic Design " id="graphic">Graphic Design</option>
                           <option value="SEO Service " id="seo">SEO Service</option>
                           </select>
            <br>
            <br>
            <label>Order Message</label>
            <input type="text" name="ordermessage" id="ordermessage" required>
            <label>Budget</label>
            <input type="number" name="budget" id="budget" required>
            <input type="button" id="submit" value="Add">

            </div>   

              <div class="container theme-showcase" role="main">
              <div class="page-header">
                <h1>Your Tickets</h1>
              </div>
              <table class="table table-striped table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Order ID</th>
                    <th>Order Type</th>
                    <th>Description</th>
                    <th>Budget</th>
                    <th>Edit</th>
                  </tr>
                </thead>
                <tbody id="allitems">
                </tbody>
              </table>
            </div>
</div>

<div class="div2">
  
  <h2>Edit Ticket</h2>
      <div id="container">
          <br>
          <br>
            <label>Order Type</label>
                           <select id="ordertype2" onchange="getComboA(this)">
                           <option value="">Select Service Type</option>
                           <option value="Web Design " id="web">Website Design</option>
                           <option value="Graphic Design " id="graphic">Graphic Design</option>
                           <option value="SEO Service " id="seo">SEO Service</option>
                           </select>
            <br>
            <br>
            <label>Order Message</label>
            <input type="text" name="ordermessage" id="ordermessage2" required>
            <label>Budget</label>
            <input type="number" name="budget" id="budget2" required>
            <input type="button" id="submit2" value="Save">

            </div> 
            </div>

    <?php //denies entry if session is not set
} else {
    ?>
        <h1>Login Error! Access denied.</h1>
        <a href="http://localhost/main">Try again.</a>
    <?php
}
?>


</body>

</html>