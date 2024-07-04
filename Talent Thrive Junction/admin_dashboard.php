

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <!-- Add any additional styles or scripts you may need -->
</head>
<body>

    <!-- Navigation Bar -->
    <nav class="navbar">
        <ul>
            <li><a href="#">Dashboard</a></li>
            <li><a href="admin_assesment.php">Assessments</a></li>
            <li><a href="admin_games.php">Games</a></li>
            <li><a href="admin_students.php">Students</a></li>
            <li><a href="admin_companies.php">Companies</a></li>
            <li><a href="admin_logout.php">Logout</a></li>
        </ul>
    </nav>

    <!-- Admin Dashboard Content -->
    <div class="admin-dashboard-container">
        <h1>Welcome, Admin!</h1>

        <!-- Add Assessment Form -->
        <form method="POST" action="">
            <h2>Add Assessment</h2>
            <!-- Include form fields for adding assessments -->
            <!-- ... -->
            <button type="submit" name="add_assessment">Add Assessment</button>
        </form>

        <!-- Add Game Form -->
        <form method="POST" action="">
            <h2>Add Game</h2>
            <!-- Include form fields for adding games -->
            <!-- ... -->
            <button type="submit" name="add_game">Add Game</button>
        </form>

        <!-- Edit Student Details Form -->
        <form method="POST" action="">
            <h2>Edit Student Details</h2>
            <!-- Include form fields for editing student details -->
            <!-- ... -->
            <button type="submit" name="edit_student">Save Changes</button>
        </form>

        <!-- Edit Company Details Form -->
        <form method="POST" action="">
            <h2>Edit Company Details</h2>
            <!-- Include form fields for editing company details -->
            <!-- ... -->
            <button type="submit" name="edit_company">Save Changes</button>
        </form>

        <!-- Display Existing Assessments, Games, Student Details, and Company Details -->
        <!-- ...

    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2023 Placement Cell</p>
    </footer>

</body>
</html>
