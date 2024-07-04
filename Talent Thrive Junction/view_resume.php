<!-- view_resume.php -->

<?php
session_start();

// Include your database configuration file and establish a connection

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['student_id'])) {
    $studentId = $_GET['student_id'];

    // Retrieve the resume for the selected student
    $sqlResume = "SELECT name, resume FROM students WHERE id = $studentId";
    $resultResume = $conn->query($sqlResume);

    if ($resultResume !== false && $resultResume->num_rows > 0) {
        $studentData = $resultResume->fetch_assoc();

        // Display student information
        echo '<h2>Student Name: ' . $studentData['name'] . '</h2>';
        
        // Display the resume
        echo '<p>Resume: <a href="' . $studentData['resume'] . '" target="_blank">View Resume</a></p>';
    } else {
        echo '<p>No resume available for this student.</p>';
    }

    // Add a link to go back to the applicants page or any other relevant page
    echo '<a href="view_applicants.php" class="back-to-applicants">Back to Applicants</a>';
} else {
    // Handle the case where the student_id is not set in the GET data
    header("Location: view_applicants.php");
    exit();
}
?>
