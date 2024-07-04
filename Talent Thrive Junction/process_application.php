<?php
session_start();

include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $companyId = $_POST["company_id"];
    $jobId = $_POST["job_id"];
    $studentId = $_SESSION['student_id'];
    $name = $_POST["name"];
    $rollno = $_POST["rollno"];
    $email = $_POST["email"];

    // Assuming you have a 'students' table and an 'applied_jobs' column
    $sqlUpdateAppliedJobs = "UPDATE students SET applied_jobs = JSON_ARRAY_APPEND(applied_jobs, '$', JSON_OBJECT('company_id', $companyId, 'job_id', '$jobId', 'name', '$name', 'rollno', '$rollno', 'email', '$email')) WHERE id = $studentId";
    
    if ($conn->query($sqlUpdateAppliedJobs) === TRUE) {
        // Redirect to jobs_applied.php after successful application
        header("Location: applied_job.php");
        exit();
    } else {
        echo "Error updating applied jobs: " . $conn->error;
    }
} else {
    // Redirect to student dashboard if accessed without form submission
    header("Location: student_dashboard.php");
    exit();
}

$conn->close();
?>
