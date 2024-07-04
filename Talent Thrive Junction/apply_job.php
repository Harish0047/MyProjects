
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
   
    <style>
        .student-dashboard {
            width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f2f2f2;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .student-dashboard form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .student-dashboard label {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .student-dashboard input[type="text"],
        .student-dashboard input[type="email"] {
            padding: 5px;
            border-radius: 5px;
            border: none;
            background-color: #f2f2f2;
            font-size: 16px;
            width: 100%;
            box-sizing: border-box;
            transition: background-color 0.3s;
        }

        .student-dashboard input[type="text"]:focus,
        .student-dashboard input[type="email"]:focus {
            background-color: #e6e6e6;
        }

        .student-dashboard input[type="submit"] {
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .student-dashboard input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<?php

session_start();
include 'config.php';

if (isset($_SESSION['student_id']) && isset($_GET['company_id']) && isset($_GET['job_id'])) {
    $studentId = $_SESSION['student_id'];
    $companyId = $_GET['company_id'];
    $jobId = $_GET['job_id'];

    // Check if the student has already applied for this job
    $sqlCheckApplication = "SELECT id FROM students WHERE id = $studentId AND applied_jobs LIKE '%$jobId%'";
    $resultCheckApplication = $conn->query($sqlCheckApplication);

    if ($resultCheckApplication->num_rows > 0) {
        // Student has already applied for this job
        echo 'You have already applied for this job.';
    } else {
        // Continue processing the form submission
        if (isset($_POST['submit_application'])) {
            // Process the form submission
            $name = $_POST['name'];
            $rollNo = $_POST['roll_no'];
            $email = $_POST['email'];
            $department = $_POST['department'];

            // Fetch existing applied jobs data from the student table
            $sqlFetchAppliedJobs = "SELECT applied_jobs FROM students WHERE id = $studentId";
            $resultFetchAppliedJobs = $conn->query($sqlFetchAppliedJobs);

            if ($resultFetchAppliedJobs->num_rows > 0) {
                $existingAppliedJobs = $resultFetchAppliedJobs->fetch_assoc()['applied_jobs'];
                $appliedJobsArray = json_decode($existingAppliedJobs, true);

                // Fetch company name and job details
                $sqlFetchJobDetails = "SELECT companies.name as company_name, jobposts FROM companies WHERE id = $companyId";
                $resultFetchJobDetails = $conn->query($sqlFetchJobDetails);

                if ($resultFetchJobDetails->num_rows > 0) {
                    $companyData = $resultFetchJobDetails->fetch_assoc();
                    $jobPosts = json_decode($companyData['jobposts'], true);

                    // Find the job details by job ID
                    if (isset($jobPosts[$jobId])) {
                        $jobDetails = $jobPosts[$jobId];

                        // Add the new applied job details
                        $appliedJobsArray[] = array(
                            'company_id' => $companyId,
                            'job_id' => $jobId,
                            'company_name' => $companyData['company_name'],
                            'name' => $name,
                            'roll_no' => $rollNo,
                            'email' => $email,
                            'department' => $department,
                            'date_applied' => date("Y-m-d H:i:s")
                        );

                        // Update the applied_jobs column with the updated array
                        $updatedAppliedJobs = json_encode($appliedJobsArray);
                        $updateAppliedJobsQuery = "UPDATE students SET applied_jobs = '$updatedAppliedJobs' WHERE id = $studentId";
                        $conn->query($updateAppliedJobsQuery);

                        // Redirect to the "Jobs Applied" page after applying
                        header("Location: applied_job.php");
                        exit();
                    } else {
                        echo 'Job details not found.';
                    }
                } else {
                    echo 'Error fetching job details.';
                }
            }
        } else {
            // Fetch job details from the jobposts column in companies table
            $sqlFetchJobDetails = "SELECT jobposts FROM companies WHERE id = $companyId";
            $resultFetchJobDetails = $conn->query($sqlFetchJobDetails);

            if ($resultFetchJobDetails->num_rows > 0) {
                $jobPosts = json_decode($resultFetchJobDetails->fetch_assoc()['jobposts'], true);

                // Find the job details by job ID
                if (isset($jobPosts[$jobId])) {
                    $jobDetails = $jobPosts[$jobId];

                    // Display the job application form
                    echo '<div class="container student-dashboard">';
                    echo '<form method="post" action="apply_job.php?company_id=' . $companyId . '&job_id=' . $jobId . '">';
                    echo '<h2 class="student-dashboard">Apply for Job</h2>';
                    echo '<label>Name:</label>';
                    echo '<input type="text" name="name" required><br>';
                    echo '<label>Roll No:</label>';
                    echo '<input type="text" name="roll_no" required><br>';
                    echo '<label>Email:</label>';
                    echo '<input type="email" name="email" required><br>';
                    echo '<label>Department:</label>';
                    echo '<input type="text" name="department" required><br>';
                    echo '<input type="hidden" name="company_id" value="' . $companyId . '">';
                    echo '<input type="hidden" name="job_id" value="' . $jobId . '">';
                    echo '<input type="submit" name="submit_application" value="Submit">';
                    echo '</form>';
                    echo '</div>';
                } else {
                    echo 'Job details not found.';
                }
            } else {
                echo 'Error fetching job details.';
            }
        }
    }
}
$conn->close();
?>
</body>
</html>