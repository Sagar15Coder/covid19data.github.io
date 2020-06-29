<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <?php include 'css/style.php'; ?>
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light p-3 nav_style">
  <a class="navbar-brand pl-5" href="#">CoronaVirus</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto pr-5">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="covid19info.php">Covid-19 Info</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="news.php">News & Updates</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact.php">Contact</a>
      </li>
     
    </ul>
    
  </div>
</nav>
<br><br>
<div class="container">
    <div class="row">
        <div class="col-lg-8 offset-lg-2 col-12">
        <form action="" method="POST">
        <div class="form-group">
            <label>Username</label>
            <input type="text" class="form-control" placeholder="Username" name="username" autocomplete="off" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" placeholder="Email address" name="email" autocomplete="off" required>
        </div>
        <div class="form-group">
            <label>Mobile</label>
            <input type="number" class="form-control" placeholder="Mobile number" name="mobile" autocomplete="off" required>
        </div>
        <div class="form-group">
            <label>Select Symptoms</label><br>
            <div class="custom-control custom-checkbox custom-control-inline text-capitalize">
            <input class="custom-control-input" type="checkbox" id="inlineCheckbox1" value="fever" name="covsym[]">
            <label class="custom-control-label" for="inlineCheckbox1">Fever</label>
            </div>
            <div class="custom-control custom-checkbox custom-control-inline text-capitalize">
            <input class="custom-control-input" type="checkbox" id="inlineCheckbox2" value="cough" name="covsym[]">
            <label class="custom-control-label" for="inlineCheckbox2">Cough</label>
            </div>
            <div class="custom-control custom-checkbox custom-control-inline text-capitalize">
            <input class="custom-control-input" type="checkbox" id="inlineCheckbox3" value="tiredness" name="covsym[]">
            <label class="custom-control-label" for="inlineCheckbox3">Tiredness</label>
            </div>
            <div class="custom-control custom-checkbox custom-control-inline text-capitalize">
            <input class="custom-control-input" type="checkbox" id="inlineCheckbox4" value="diffbr" name="covsym[]">
            <label class="custom-control-label" for="inlineCheckbox4">Difficulty in breathing</label>
            </div>
        </div>
        <div class="form-group">
            <label>Your Message</label>
            <textarea class="form-control" rows="3" name="message"></textarea>
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
        </div>
    </div>
</div>
</body>
</html>

<?php
include 'dbcovidsym.php';

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $symp = $_POST['covsym'];
    $message = $_POST['message'];

    $check = "";

    foreach($symp as $check1){
        $check .= $check1.",";
    }

    $insertquery = "insert into csymuser(username, email, mobile, symp, message) values ('$username', '$email', '$mobile', '$check', '$message')";

    $query = mysqli_query($con, $insertquery);
}


?>