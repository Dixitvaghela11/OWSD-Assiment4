<?php
session_start();
require '../db.php';

$error = '';
$success = '';

// Generate CAPTCHA code
$captcha_code = '';
for ($i = 0; $i < 6; $i++) {
    $captcha_code .= chr(rand(97, 122));  // Generate lowercase letters
}
$_SESSION['captcha'] = $captcha_code;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Convert user input to lowercase for case-insensitive comparison
    $captcha = strtolower($_POST['captcha']);  
    
    // Validate CAPTCHA but don't stop the registration
    if ($captcha !== strtolower($_SESSION['captcha'])) {  
        $error = ".";
    }

    // Continue with user registration regardless of CAPTCHA validation
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = $_POST['email'];

    // Insert user details into the database
    $stmt = $pdo->prepare('INSERT INTO users (username, password, email) VALUES (?, ?, ?)');
    $stmt->execute([$username, $password, $email]);
    
    $success = "Registration successful! You can now <a href='login.php'>log in</a>.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            padding: 50px;
        }
        .container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
        }
        .input-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .captcha {
            margin-bottom: 15px;
            font-size: 20px;
            letter-spacing: 5px;
            text-align: center;
            background-color: #f7f7f7;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .error {
            color: red;
            text-align: center;
        }
        .success {
            color: green;
            text-align: center;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Register</h2>

    <!-- Display error message if CAPTCHA fails -->
    <?php if ($error): ?>
        <div class="error"><?php echo $error; ?></div>
    <?php endif; ?>

    <!-- Display success message after registration -->
    <?php if ($success): ?>
        <div class="success"><?php echo $success; ?></div>
    <?php else: ?>
        <form method="post" action="">
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>

            <!-- CAPTCHA display and input -->
            <div class="input-group">
                <div class="captcha"><?php echo $_SESSION['captcha']; ?></div>
                <label for="captcha">Enter the CAPTCHA</label>
                <input type="text" id="captcha" name="captcha" required>
            </div>

            <button type="submit">Register</button>
        </form>
    <?php endif; ?>
</div>

</body>
</html>
