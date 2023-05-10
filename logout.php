
<?php
session_start();

// Unset all session variables
session_unset();

// Destroy the session
session_destroy();

// Redirect to the login page or any other desired page
header('Location: index.php');
exit();
?>