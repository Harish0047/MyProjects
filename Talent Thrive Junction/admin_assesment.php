<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate and sanitize form data
    $title = htmlspecialchars(trim($_POST['title']));
    $link = htmlspecialchars(trim($_POST['link']));
    $imagePath = htmlspecialchars(trim($_POST['image_path']));
    $description = htmlspecialchars(trim($_POST['description']));

    // Validate additional conditions if needed

    // Append the new assessment to assessments.php
    $newAssessment = "
        <div class=\"assessment-item\">
            <a class=\"assessment-link\" href=\"$link\" target=\"_blank\">
                <img class=\"assessment-image\" src=\"$imagePath\" alt=\"$title\">
                $title
            </a>
            <p class=\"assessment-description\">$description</p>
        </div>
    ";

    // Append the new assessment to assessments.php
    file_put_contents('assessments.php', $newAssessment, FILE_APPEND | LOCK_EX);

    // Redirect to the admin dashboard or wherever needed
    header("Location: admin_dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Assessment - Admin</title>
    <link rel="stylesheet" href="style.css">
    <!-- Add any additional styles or scripts you may need -->
</head>
<body>

    <!-- Admin Dashboard Navigation Bar (Include this on all admin-related pages) -->
    <?php include 'admin_navbar.php'; ?>

    <!-- Add Assessment Form -->
    <div class="admin-form-container">
        <h2>Add New Assessment</h2>

        <form method="POST" action="">
            <label for="title">Assessment Title:</label>
            <input type="text" id="title" name="title" required>

            <label for="link">Assessment Link:</label>
            <input type="url" id="link" name="link" required>

            <label for="image_path">Image Path:</label>
            <input type="text" id="image_path" name="image_path" required>

            <label for="description">Assessment Description:</label>
            <textarea id="description" name="description" required></textarea>

            <button type="submit">Add Assessment</button>
        </form>
    </div>

    <!-- Footer -->
    <?php include 'footer.php'; ?>

</body>
</html>
