```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applicants for Job ID</title>
    <style>
        /* Basic styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }
        h2 {
            color: #333;
            text-align: center;
            padding: 20px 0;
        }
        .applicant-list {
            list-style: none;
            padding: 0;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        .applicant-item {
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 10px;
            margin: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        .view-resume-button {
            display: block;
            margin-top: 10px;
            padding: 5px 10px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
            transition: background-color 0.3s ease;
        }
        .view-resume-button:hover {
            background-color: #0056b3;
        }
        .back-to-dashboard {
            display: block;
            margin-top: 20px;
            color: #007bff;
            text-decoration: none;
            text-align: center;
        }
        .back-to-dashboard:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <?php
session_start();

// Include your database configuration file and establish a connection
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['job_id'])) {
    $jobId = $_POST['job_id'];

    // Retrieve applicants for the selected job with student details
    $sqlApplicants = "
        SELECT applications.*, student_name AS student_name, student_roll, job_id AS job_id
        FROM applications
    ";
    $resultApplicants = $conn->query($sqlApplicants);

    if ($resultApplicants !== false) {
        // Check if there are any rows returned
        if ($resultApplicants->num_rows > 0) {
            // Display applicant information
            echo '<h2 class="company-dashboard">Applicants for Job ID: ' . $jobId . '</h2>';
            echo '<ul class="applicant-list company-dashboard">';
            while ($applicant = $resultApplicants->fetch_assoc()) {
                echo '<li class="applicant-item company-dashboard">';
                echo '<p>Name: ' . $applicant['student_name'] . '</p>';
                echo '<p>Roll No: ' . $applicant['student_roll'] . '</p>';
                echo '<p>Job ID: ' . $applicant['job_id'] . '</p>';
                
                // Provide a link to view the resume
                echo '<a href="view_resume.php?student_id=' . $applicant['student_id'] . '" class="view-resume-button company-dashboard">View Resume</a>';
                
                echo '</li>';
            }
            echo '</ul>';
        } else {
            echo '<p class="company-dashboard">No applicants for this job.</p>';
        }
    } else {
        // Handle the case where there's an error in the SQL query
        echo '<p class="company-dashboard">Error retrieving applicants. Please try again later.</p>';
        // Uncomment the line below for debugging purposes to display the MySQL error
        // echo '<p class="company-dashboard">Error: ' . $conn->error . '</p>';
    }

    // Add a link to go back to the company dashboard or any other relevant page
    echo '<a href="company_dashboard.php" class="back-to-dashboard company-dashboard">Back to Dashboard</a>';
} else {
    // Handle the case where the job_id is not set in the POST data
    header("Location: company_dashboard.php");
    exit();
}
    // Your PHP code here (as provided in the original message)
    // ...
    
    // Your PHP code here (as provided in the original message)
    // ...
    ?>
</body>
</html>