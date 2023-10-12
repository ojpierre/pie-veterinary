<?php
$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require __DIR__ . "/database.php"; // Ensure your database connection is properly established in this file
    
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    // Use prepared statements to avoid SQL injection
    $stmt = $mysqli->prepare("SELECT id, email, password_hash FROM user WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($user_id, $user_email, $hashed_password);
    
    if ($stmt->fetch() && password_verify($password, $hashed_password)) {
        session_start();
        session_regenerate_id();
        $_SESSION["user_id"] = $user_id;
        header("Location: index.php");
        exit;
    } else {
        $is_invalid = true;
    }
    $stmt->close();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
    <h1>Login</h1>
    
    <?php if ($is_invalid): ?>
        <em>Invalid login</em>
    <?php endif; ?>
    
    <form method="post">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required>
        
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>
        
        <button>Log in</button>
    </form>
</body>
</html>
