<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Register</title>
</head>
<body>
      <div class="container">
        <div class="box form-box">

        <?php 
         
         include("config.php");
         if(isset($_POST['submit'])){
            $First_name = $_POST['First_name'];
            $Last_name = $_POST['Last_name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $password = md5($password);
            $type = '3';
            $avatar = null;
            $date_created = date('Y-m-d');

         //verifying the unique email

         $verify_query = mysqli_query($conn, "SELECT Email FROM users WHERE Email='$email'");
         if ($verify_query === false) {
         echo "<div class='message'>
              <p>This email is used, Try another One Please!</p>
          </div> <br>";
         echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
         } else {
         mysqli_query($conn, "INSERT INTO users(firstname, lastname, email, password, type, avatar, date_created) VALUES ('$First_name', '$Last_name', '$email', '$password', '$type', '$avatar', '$date_created')") or die("Error Occurred");
         echo "<div class='message'>
            <p><b>Registration successfully!<b></p>
          </div> <br>";
         echo "<a href='index.php'><button class='btn'>Login Now</button>";
         }

         }else{
         
        ?>

            <header>Sign Up</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="First name">First name</label>
                    <input type="text" name="First_name" id="First_name" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="Last name">Last name</label>
                    <input type="text" name="Last_name" id="Last_name" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>
                <div class="field input">
                <label for="" class="control-label">User Role</label>
							<select name="type" id="type" class="custom-select custom-select-sm">
								<option value="3" <?php echo isset($type) && $type == 3 ? 'selected' : '' ?>>Employee</option>
								<option value="2" <?php echo isset($type) && $type == 2 ? 'selected' : '' ?>>Project Manager</option>
							</select>
                </div>
                <!--<div class="field input">
                <label for="" class="control-label">Avatar</label>
							<div class="custom-file">
		                      <input type="file" class="custom-file-input" id="customFile" name="img" onchange="displayImg(this,$(this))">
		                      <label class="custom-file-label" for="customFile">Choose file</label>
		                    </div>
						</div>-->
                <div class="field">
                    
                    <input type="submit" class="btn" name="submit" value="Register" required>
                </div>
                <div class="links">
                    Already a member? <a href="index.php">Sign In</a>
                </div>
            </form>
        </div>
        <?php } ?>
      </div>
</body>
</html>