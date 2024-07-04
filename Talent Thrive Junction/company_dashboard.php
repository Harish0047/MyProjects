
<html>
<link rel="stylesheet" href="styl.css">
<?php
session_start();

include 'config.php';

// Check if the company ID is set in the session
if (isset($_SESSION['company_id'])) {
    $companyId = $_SESSION['company_id'];

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_job'])) {
        // Handle job deletion
        $jobIdToDelete = $_POST['delete_job'];

        // Retrieve existing job posts
        $sqlCompany = "SELECT * FROM companies WHERE id = $companyId";
        $resultCompany = $conn->query($sqlCompany);

        if ($resultCompany->num_rows > 0) {
            $companyData = $resultCompany->fetch_assoc();
            $jobPosts = json_decode($companyData['jobposts'], true);

            // Check if the job ID to delete exists
            if (isset($jobPosts[$jobIdToDelete])) {
                // Delete the job post
                unset($jobPosts[$jobIdToDelete]);

                // Update the companies table with the updated job posts
                $updatedJobPosts = json_encode($jobPosts);
                $sqlUpdate = "UPDATE companies SET jobposts = '$updatedJobPosts' WHERE id = $companyId";
                $conn->query($sqlUpdate);
            }
        }
    }

    // Retrieve company details
    $sqlCompany = "SELECT * FROM companies WHERE id = $companyId";
    $resultCompany = $conn->query($sqlCompany);

    if ($resultCompany->num_rows > 0) {
        $companyData = $resultCompany->fetch_assoc();
        $jobPosts = json_decode($companyData['jobposts'], true);

        echo '<div class="container company-dashboard">';
        echo '<header class="company-dashboard">';
        echo '<h1 class="company-dashboard">Welcome, ' . $companyData['name'] . '!</h1>';
        echo '<p class="company-dashboard">Number of Jobs Posted: ' . count($jobPosts) . '</p>';
        echo '</header>';
        echo '<main class="company-dashboard">';

        // Display job posts
        echo '<h2 class="company-dashboard">Your Job Posts</h2>';
        echo '<ul class="job-posts company-dashboard">';
        foreach ($jobPosts as $jobId => $job) {
            echo '<li class="job-post company-dashboard">';
            echo '<strong class="job-post-title company-dashboard">' . $job['title'] . '</strong>';
            echo '<p class="job-post-description company-dashboard">' . $job['description'] . '</p>';
            echo '<p class="job-post-location company-dashboard">Location: ' . $job['location'] . '</p>';
            echo '<p class="job-post-requirements company-dashboard">Requirements: ' . $job['requirements'] . '</p>';
            echo '<p class="job-post-salary company-dashboard">Salary: ' . $job['salary'] . '</p>';
            echo '<p class="job-post-expiry company-dashboard">Expiry Date: ' . $job['expiry_date'] . '</p>';
            echo '<p class="job-post-applicants company-dashboard">Applicants: ' . $job['applicants'] . '</p>';
            
            // View Applicants button
            echo '<form class="delete-job-form company-dashboard" method="POST" action="view_applicants.php">';
            echo '<input type="hidden" name="job_id" value="' . $jobId . '">';
            echo '<button type="submit" class="delete-job-button company-dashboard">View Applicants</button>';
            echo '</form>';

            // Delete Job button
            echo '<form class="delete-job-form company-dashboard" method="POST">';
            echo '<input type="hidden" name="delete_job" value="' . $jobId . '">';
            echo '<button type="submit" class="delete-job-button company-dashboard">Delete Job</button>';
            echo '</form>';
            
            echo '</li>';
        }
        echo '</ul>';

        echo '<h2 class="company-dashboard">Post a New Job</h2>';
        echo '<form class="company-dashboard" action="post_job.php" method="POST">';
         echo '<label class="company-dashboard" for="title">Job Title:</label>';
        echo '<input class="company-dashboard" type="text" id="title" name="title" required>';

        echo '<label class="company-dashboard" for="description">Job Description:</label>';
        echo '<textarea class="company-dashboard" id="description" name="description" required></textarea>';

        echo '<label class="company-dashboard" for="location">Location:</label>';
        echo '<input class="company-dashboard" type="text" id="location" name="location" required>';

        echo '<label class="company-dashboard" for="requirements">Requirements:</label>';
        echo '<textarea class="company-dashboard" id="requirements" name="requirements" required></textarea>';

        echo '<label class="company-dashboard" for="salary">Salary:</label>';
        echo '<input class="company-dashboard" type="text" id="salary" name="salary" required>';

        echo '<label class="company-dashboard" for="expiry_date">Expiry Date:</label>';
        echo '<input class="company-dashboard" type="date" id="expiry_date" name="expiry_date" required>';

        echo '<button class="mail-btn" type="submit">Post Job </button>';


        echo '</form>';

        // Logout button
        echo '<form class="logout-form company-dashboard" action="company_login.php" method="POST">';
        echo '<button type="submit" class="logout-button company-dashboard">Logout</button>';
        echo '</form>';

        echo '</main>';
        echo '<footer class="company-dashboard">';
        echo '<p class="company-dashboard">&copy; 2023 Placement Cell</p>';
        echo '</footer>';
        echo '</div>';
    } else {
        // Redirect to login page if company ID is not valid
        header("Location: company_login.php");
        exit();
    }
} else {
    // Redirect to login page if company ID is not set in the session
    header

("Location: company_login.php");
exit();
}

?>
<script>
$(".mail-btn").on("click touchstart", function () {
    $(this).addClass("fly");
    that = this
    setTimeout(function() {
        $(that).removeClass("fly");
    }, 5400)
});
</script>
</html>