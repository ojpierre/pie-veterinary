session_start();

// Check if the login failed three times
if (isset($_SESSION['login_attempts']) && $_SESSION['login_attempts'] >= 3) {
    echo "Login failed three times. Please try again in 10 minutes.";
    // You can implement a timer here to lock the user out for 10 minutes.
    exit();
}

// Check user credentials here
if (/* Your login check logic */) {
    // Successful login
    // Reset login attempts
    $_SESSION['login_attempts'] = 0;
} else {
    // Failed login attempt
    if (isset($_SESSION['login_attempts'])) {
        $_SESSION['login_attempts']++;
    } else {
        $_SESSION['login_attempts'] = 1;
    }
    echo "Invalid username or password. Attempt {$_SESSION['login_attempts']} of 3.";
}
