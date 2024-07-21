<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $full_name = $_POST['full_name'] ?? '';
    $firm_name = $_POST['firm_name'] ?? '';
    $email = $_POST['email'] ?? '';
    $contact = $_POST['contact'] ?? '';
    $address = $_POST['address'] ?? '';
    $software_module = $_POST['software_module'] ?? '';

    // Basic validation
    $errors = [];
    if (empty($full_name)) {
        $errors[] = "Full Name is required.";
    }
    if (empty($firm_name)) {
        $errors[] = "Firm Name is required.";
    }
    if (empty($email)) {
        $errors[] = "Email is required.";
    }
    if (empty($contact)) {
        $errors[] = "Contact No. is required.";
    }
    if (empty($address)) {
        $errors[] = "Address is required.";
    }
    if (empty($software_module)) {
        $errors[] = "Software Module is required.";
    }

    if (empty($errors)) {
        // Prepare email
        $to = "owner@example.com"; // Replace with the website owner's email address
        $subject = "New Form Submission";
        $message = "
        Full Name: " . htmlspecialchars($full_name) . "\n
        Firm Name: " . htmlspecialchars($firm_name) . "\n
        Email: " . htmlspecialchars($email) . "\n
        Contact No.: " . htmlspecialchars($contact) . "\n
        Address: " . htmlspecialchars($address) . "\n
        Software Module: " . htmlspecialchars($software_module) . "\n
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
