<?php
session_start();

$valid_username = "group11";
$valid_password = "123"; 

if (isset($_SESSION['username'])) {
    header("Location: website.php");  
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);  
    $password = trim($_POST['password']);

    if ($username === $valid_username && $password === $valid_password) {
        $_SESSION['username'] = $username; // Store username in session
        setcookie("Username", $username, time() + (86400 * 30), "/"); // Set cookie for username
        header("Location: website.php"); // Redirect to team profile
        exit(); // Terminate script after redirection
    } else {
        $error_message = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background-color: #fff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        h2 {
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            width: 100%;
            background-color: #007bff;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
        }

        button:hover {
            background-color: #0056b3;
        }

        #message {
            margin-top: 20px;
            text-align: center;
            color: red;
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h2>Login</h2>
        <form id="loginForm" action="" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Login</button>
            <div id="message"><?php echo isset($error_message) ? $error_message : ''; ?></div>
        </form>
    </div>

    <script>
        document.getElementById("loginForm").addEventListener("submit", function(event) {
            let username = document.getElementById("username").value;
            let password = document.getElementById("password").value;

            if (username === "" || password === "") {
                event.preventDefault(); 
                document.getElementById("message").textContent = "Please fill in all fields.";
            }
        });
    </script>

</body>
</html>
