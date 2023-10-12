<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include your database connection code here
    include("db_connection.php"); // You need to create this file

    // Get user input from the registration form
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // SQL query to insert user data into the database
    $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";

    // Prepare and execute the query using prepared statements
    if ($stmt = $mysqli->prepare($sql)) {
        // Bind parameters
        $stmt->bind_param("sss", $username, $email, $hashed_password);

        // Execute the statement
        if ($stmt->execute()) {
            // Registration successful, you can redirect the user to a success page
            header("Location: registration_success.php");
            exit();
        } else {
            // Registration failed
            echo "Registration failed. Please try again later.";
        }

        // Close the statement
        $stmt->close();
    } else {
        // Error in preparing the statement
        echo "Database error. Please try again later.";
    }

    // Close the database connection
    $mysqli->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <!-- Include your CSS here -->
</head>
<body>
    <h1>Registration</h1>
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br>
        
        <label for="email">Email:</label>
        <input type="email" name="email" required><br>
        
        <label for="password">Password:</label>
        <input type="password" name="password" required><br>
        
        <button type="submit">Register</button>
    </form>
    <!-- Include your JavaScript here -->
</body>
</html>
