<?php
session_start();
include 'config.php';

if (isset($_SESSION['student_id'])) {
    $studentId = $_SESSION['student_id'];

    // Fetch applied jobs details from the student table
    $sqlFetchAppliedJobs = "SELECT applied_jobs FROM students WHERE id = $studentId";
    $resultFetchAppliedJobs = $conn->query($sqlFetchAppliedJobs);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
        }

        @keyframes gradient {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }

        .navbar {
            background-color: rgba(63, 81, 181, 0.7); /* Transparent navbar with blue tint */
            overflow: hidden;
        }

        .navbar ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }

        .navbar li {
            float: left;
        }

        .navbar a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .navbar a:hover {
            background-color: rgba(255, 255, 255, 0.2); /* Hover background color with transparency */
            color: white;
        }

        .navbar .icon {
            display: none;
        }

        @media screen and (max-width: 600px) {
            .navbar a:not(:first-child) {
                display: none;
            }
            .navbar a.icon {
                float: right;
                display: block;
            }
        }

        .container {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            max-width: 800px;
            margin: 50px auto;
            padding: 30px;
            opacity: 0.95;
            transform: translateY(20px);
            animation: slideIn 0.5s ease-in-out forwards;
        }

        @keyframes slideIn {
            from {
                transform: translateY(50px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 0.95;
            }
        }

        header,
        main,
        footer {
            text-align: center;
        }

        h1 {
            margin-bottom: 20px;
        }

        .applied-jobs {
            list-style-type: none;
            padding: 0;
        }

        .applied-job {
            background-color: #f9f9f9;
            margin: 20px 0;
            padding: 20px;
            border-radius: 5px;
        }

        .applied-job-title {
            font-size: 24px;
            color: #333;
            margin-bottom: 10px;
        }

        .job-details {
            font-size: 16px;
            color: #777;
            margin-bottom: 5px;
        }

        .no-applied-jobs {
            font-size: 18px;
            color: #777;
        }

        footer {
            margin-top: 20px;
            color: #777;
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar">
        <ul>
            <li><a href="student_dashboard"><i class="fas fa-home"></i> Home</a></li>
            <li><a href="chat.php"><i class="fas fa-comments"></i> Chat</a></li>
            <li><a href="assesments.html"><i class="fas fa-tasks"></i> Assessments</a></li>
            <li><a href="applied_job.php"><i class="fas fa-briefcase"></i> Jobs Applied</a></li>
            <li><a href="games.html"><i class="fas fa-gamepad"></i> Educational Games</a></li>
            <li><a href="resume_builder.php"><i class="fas fa-file-alt"></i> Resume Builder</a></li>
            <li><a href="career_roadmaps.php"><i class="fas fa-map-signs"></i> Career Roadmaps</a></li>
            <li class="icon"><a href="javascript:void(0);" onclick="toggleNavbar()"><i class="fas fa-bars"></i></a></li>
        </ul>
    </nav>

    <div class="container student-dashboard">
        <header class="student-dashboard">
            <h1 class="student-dashboard">Jobs Applied</h1>
        </header>
        <main class="student-dashboard">
            <?php
            if ($resultFetchAppliedJobs->num_rows > 0) {
                $appliedJobs = json_decode($resultFetchAppliedJobs->fetch_assoc()['applied_jobs'], true);
                if (!empty($appliedJobs)) {
                    echo '<ul class="applied-jobs">';
                    foreach ($appliedJobs as $appliedJob) {
                        echo '<li class="applied-job">';
                        echo '<strong class="applied-job-title">' . $appliedJob['name'] . '</strong>';
                        echo '<p class="job-details">Application Date: ' . $appliedJob['date_applied'] . '</p>';

                        $companyId = $appliedJob['company_id'];
                        $jobId = $appliedJob['job_id'];
                        $sqlFetchJobDetails = "SELECT companies.name as company_name, jobposts FROM companies WHERE id = $companyId";
                        $resultFetchJobDetails = $conn->query($sqlFetchJobDetails);

                        if ($resultFetchJobDetails->num_rows > 0) {
                            $companyData = $resultFetchJobDetails->fetch_assoc();
                            $jobPosts = json_decode($companyData['jobposts'], true);
                            if (isset($jobPosts[$jobId])) {
                                $jobDetails = $jobPosts[$jobId];
                                echo '<p class="job-details">Company: ' . $companyData['company_name'] . '</p>';
                                echo '<p class="job-details">Job ID: ' . $jobId . '</p>';
                                echo '<p class="job-details">Location: ' . $jobDetails['location'] . '</p>';
                                echo '<p class="job-details">Requirements: ' . $jobDetails['requirements'] . '</p>';
                            } else {
                                echo '<p class="error-message">Job details not found.</p>';
                            }
                        } else {
                            echo '<p class="error-message">Error fetching job details.</p>';
                        }
                        echo '</li>';
                    }
                    echo '</ul>';
                } else {
                    echo '<p class="no-applied-jobs">No jobs applied yet.</p>';
                }
            } else {
                echo '<p class="error-message">Error fetching applied jobs.</p>';
            }
            ?>
        </main>
        <footer class="student-dashboard">
            <p class="student-dashboard">&copy; 2023 Placement Cell</p>
        </footer>
    </div>

    <script>
        function toggleNavbar() {
            var x = document.querySelector(".navbar ul");
            if (x.style.display === "block") {
                x.style.display = "none";
            } else {
                x.style.display = "block";
            }
        }
    </script>
</body>
</html>

<?php
} else {
    // Redirect to login page if student ID is not set in the session
    header("Location: student_login.php");
    exit();
}

$conn->close();
?>
