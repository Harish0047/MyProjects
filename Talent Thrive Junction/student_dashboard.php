<?php
session_start();

include 'config.php';

// Check if the student ID is set in the session
if (isset($_SESSION['student_id'])) {
    $studentId = $_SESSION['student_id'];

    // Retrieve student details
    $sqlStudent = "SELECT * FROM students WHERE id = $studentId";
    $resultStudent = $conn->query($sqlStudent);

    if ($resultStudent->num_rows > 0) {
        $studentData = $resultStudent->fetch_assoc();

        // Display matching jobs with details
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   
 <style>
        body {
            background-image: url('background-image.jpg'); /* Replace 'background-image.jpg' with your image file */
            background-size: cover;
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
        }
         /* Additional styles for the About and Options */
 .about-section {
    font-size: 14px;
    color: #555;
}

.additional-options {
    display: flex;
    justify-content: space-around;
    margin-top: 15px;
}

.option-btn {
    background-color: #3498db;
    color: white;
    padding: 8px 12px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 14px;
    transition: background-color 0.3s;
}
button[type="submit"] {
    background: #3498db; /* Blue color for the Post Job button */
    color: #fff;
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
}

.option-btn:hover {
    background-color: #2980b9;
}


        .navbar {
            background-color: #333;
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
            background-color: #ddd;
            color: black;
        }

        .container {
            background-color: white;
            opacity: 0.9;
            margin: 20px;
            padding: 20px;
            border-radius: 10px;
        }

        .available-jobs {
            list-style-type: none;
            padding: 0;
        }

        .available-job {
            background-color: #f9f9f9;
            margin: 10px 0;
            padding: 15px;
            border-radius: 5px;
        }

        .available-job-title {
            font-size: 24px;
            color: #333;
        }

        .job-details {
            font-size: 16px;
            color: #555;
        }

        .apply-btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .apply-btn:hover {
            background-color: #45a049;
        }

        .no-companies {
            font-size: 18px;
            color: #555;
        }

        .student-dashboard {
            color: #333;
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


        footer {
            margin-top: 20px;
            text-align: center;
            color: #555;
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <<!-- Navigation Bar -->
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
</body>
    <!-- Your existing HTML content -->

<?php

        // Display matching jobs with details
        echo '<div class="container student-dashboard">';
        echo '<header class="student-dashboard">';
        echo '<h1 class="student-dashboard">Welcome, ' . $studentData['name'] . '!</h1>';
        echo '</header>';
        echo '<main class="student-dashboard">';

        // Display available jobs that match the student's profile
        echo '<h2 class="student-dashboard">Available Jobs</h2>';
        echo '<ul class="available-jobs">';
        
        // Assuming there is a table named 'companies' with jobposts column
        $sqlCompanies = "SELECT * FROM companies";
        $resultCompanies = $conn->query($sqlCompanies);

        if ($resultCompanies->num_rows > 0) {
            while ($companyData = $resultCompanies->fetch_assoc()) {
                $jobPosts = json_decode($companyData['jobposts'], true);

                foreach ($jobPosts as $jobId => $job) {
                    // Check if job requirements match the student's profile
                    if (isset($job['requirements']) && strpos(strtolower($job['requirements']), strtolower($studentData['profile'])) !== false) {
                        echo '<li class="available-job">';
                        echo '<strong class="available-job-title">' . $job['title'] . '</strong>';
                        // Add additional job details here based on your preferences
                        echo '<p class="job-details">Location: ' . $job['location'] . '</p>';
                        echo '<p class="job-details">Requirements: ' . $job['requirements'] . '</p>';
                        echo '<p class="job-details">Salary: ' . $job['salary'] . '</p>';
                        echo '<button class="apply-btn" onclick="applyForJob(' . $companyData['id'] . ', \'' . $jobId . '\')"> Apply</button>';
                        echo '</li>';
  echo '<form class="logout-form company-dashboard" action="student_login.php" method="POST">';              
 echo '<button type="submit" class="logout-button company-dashboard">Logout</button>';
                    }
                }
            }
        } else {
            echo '<p class="no-companies">No companies available</p>';
        }

        echo '</ul>';

        echo '</main>';
        echo '<footer class="student-dashboard">';
        echo '<p class="student-dashboard">&copy; 2023 Placement Cell</p>';
        echo '</footer>';
        echo '</div>';
    } else {
        // Redirect to login page if student ID is not valid
        header("Location: student_login.php");
        exit();
    }
} else {
    // Redirect to login page if student ID is not set in the session
    header("Location: student_login.php");
    exit();
}

$conn->close();
?>

<script>
function applyForJob(companyId, jobId) {
    // Check if the student has uploaded a resume
    if (confirm("Do you want to apply for this job?")) {
        // Assuming you have a PHP file to handle the application process (e.g., apply_job.php)
        window.location.href = 'apply_job.php?company_id=' + companyId + '&job_id=' + jobId;
    }
}
</script>
</html>