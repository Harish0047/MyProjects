<?php
session_start();

include 'config.php';

// Check if the company ID is set in the session
if (isset($_SESSION['company_id'])) {
    $companyId = $_SESSION['company_id'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $title = $_POST["title"];
        $description = $_POST["description"];
        $location = $_POST["location"];
        $requirements = $_POST["requirements"];
        $salary = $_POST["salary"];
        $expiryDate = $_POST["expiry_date"];

        // Retrieve existing job posts
        $sqlCompany = "SELECT * FROM companies WHERE id = $companyId";
        $resultCompany = $conn->query($sqlCompany);

        if ($resultCompany->num_rows > 0) {
            $companyData = $resultCompany->fetch_assoc();

            // Decode existing job posts
            $jobPosts = json_decode($companyData['jobposts'], true);

            // Add the new job post
            $newJobId = uniqid(); // Generate a unique ID for the new job post
            $jobPosts[$newJobId] = [
                'title' => $title,
                'description' => $description,
                'location' => $location,
                'requirements' => $requirements,
                'salary' => $salary,
                'expiry_date' => $expiryDate,
                'applicants' => 0 // Initialize the number of applicants to 0
            ];

            // Update the companies table with the new job posts
            $updatedJobPosts = json_encode($jobPosts);
            $sqlUpdate = "UPDATE companies SET jobposts = '$updatedJobPosts' WHERE id = $companyId";
            $conn->query($sqlUpdate);

            // Redirect back to the company dashboard
            header("Location: company_dashboard.php");
            exit();
        }
    }
}

// Redirect to login page if company ID is not set in the session
header("Location: company_login.php");
exit();

$conn->close();
?>
