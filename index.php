<?php
$insert = false;
if (isset($_POST['name'])) {
  $server = "localhost";
  $username = "root";
  $password = "";

  $con = mysqli_connect($server, $username, $password);

  if (!$con) {
    die("connection to this databse failed due to " . mysqli_connect_error());
  }
  // echo "Successful conncetion!";
  $name = $_POST['name'];
  $age = $_POST['age'];
  $gender = $_POST['gender'];
  $email = $_POST['email'];
  $number = $_POST['number'];
  $sql = "INSERT INTO `form`.`form` (`name`, `age`, `gender`, `email`, `number`, `date`) VALUES ('$name', '$age', '$gender', '$email', '$number', current_timestamp());
";

  if ($con->query($sql) == true) {
    // echo " successfully inserted!";
    $insert = true;
  } else {
    echo "Error : $sql <br> $con->error";
  }
  $con->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome to Travel Form!</title>
  <link rel="stylesheet" href="styles.css">
</head>

<body>
  <div class="container">
    <h3>Welcome to Travel Form</h3>
    <p class="p">enter your detail to confirm your participation in the trip</p>
    <?php
    if ($insert) {
      echo "
    <p class='onsubmitmsg'>Form Submited succesfully !</p>";
    }
    ?>

    <form action="index.php" method="post">
      <label for="name">Name:
        <input type="text" name="name" id="name" placeholder="Enter Your Name..."></label>
      <label for="age">Age:<input type="text" name="age" id="age" placeholder="Enter Age..."></label>
      <div class="radios">
        <label for="gender">Gender:</label>
        <input type="radio" name="gender" id="gender" value="male">Male
        <input type="radio" name="gender" id="gender" value="female">Female
        <input type="radio" name="gender" id="gender" value="other">Other
      </div>
      <label for="email">Email:
        <input type="email" name="email" id="email" placeholder="Enter a Valid Email.."></label>

      <label for="tel">Number:<input type="text" name="tel" id="tel" placeholder="Mobile Number.."></label>

      <button class="submitbtn">Submit</button>
      <button class="resetbtn">Reset</button>
    </form>
  </div>
</body>
<script src="index.js"></script>

</html>