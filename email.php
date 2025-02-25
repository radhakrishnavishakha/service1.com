<?php
// Start the session to store login status
session_start();

// Database connection
$server = "localhost";
$username1 = "root";
$password = "";
$dbname = "business-service";

// Create the connection
$conn = mysqli_connect($server, $username1, $password, $dbname);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form is submitted
if (isset($_POST['submit'])) {
    $email=$POST['submit'];
    $rand=rand(00000,99999);
    // Sanitize user inputs to prevent SQL injection
    $query = "SELECT * FROM signup-b";
    $query2= mysqli_query($conn, $query);
    $select_rows = mysqli_fetch_assoc($query2);
    $select_email = $select_rows['username'];
    if ($select_email = $email)
    {
        $to=$email;
        $subject= "Verification Code";
        $body= "Hi An This is your verfication code: $rand";
        $header ="From:technicalanisha@gmail.com"; 
        if (mail($to, $subject, $body, $header))
        {
            $_SESSION['otp'] = $rand;
            header('location:otp.php');
        }
    else{ echo "OTP Sending Fail"; }
}
else{
    echo "Please Enter Valid Mail ID";
}

}


// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="logsign.css">
</head>

<body style="background-color: #fff;">
    <div class="container">
        <div class="left-section">
            <h1>Sign in to</h1>
            <h2>BUSINESS SERVICE<br> SYSTEM</h2>
            <p>if you don't have an account, <br> you can <a href="signup.html">Register here!</a></p>
        </div>

        <div class="image-section">
            <img src="image1.jpeg" alt="Character Illustration">
        </div>

        <div class="right-section">
            <!-- Corrected form -->
            <form action="email.php" method="post" id="loginForm">
                <h2>Forget Password?</h2>
                <input type="email" id="email" name="email" placeholder="Enter email">
                <button class="btn" type="submit" id="submit" name="submit">Reset Password</button>
                
            </form>
        </div>
    </div>

    <script>
        

        const loginButton = document.getElementById('submit');
        const email1 = document.getElementById('email');
        
        loginButton.addEventListener('click', function (event) {
            const emailid = email1.value;
            

            // Basic validations
            if (emailid === '') {
                alert('Username cannot be empty.');
                event.preventDefault(); // Prevent form submission
                return;
            }

           
            }
        
    </script>

</body>

</html>
