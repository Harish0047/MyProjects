<?php
// submit_resume.php

include "config.php";
    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Extract data from the form
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $university = $_POST['university'];
    $degree = $_POST['degree'];
    $gradYear = $_POST['gradYear'];
    $educationCourses = $_POST['education_course'];
    $educationInstitutions = $_POST['education_institution'];
    $educationYears = $_POST['education_year'];
    $educationCGPAs = $_POST['education_cgpa'];
    $skills = $_POST['skills'];
    $certifications = $_POST['certifications'];
    $experience = $_POST['experience'];
    $projects = $_POST['projects'];
    $appliedJobs = json_encode($_POST['applied_jobs']);
    $resumeText = $_POST['resume'];

    // Example: Handle profile image upload
    $profileImageName = ''; // Set a default value
    if ($_FILES['profileImage']['error'] == 0) {
        $uploadDir = 'uploads/'; // Specify your upload directory
        $profileImageName = $uploadDir . basename($_FILES['profileImage']['name']);
        move_uploaded_file($_FILES['profileImage']['tmp_name'], $profileImageName);
    }

    // Insert data into the detailed_resumes table
    $sqlInsertDetailedResume = "INSERT INTO detailed_resumes 
    (student_id, full_name, email, university, degree, graduation_year, education_course, education_institution, education_year, education_cgpa, skills, certifications, experience, projects, extracurricular_activities, profile_image_path, resume_text, applied_jobs) 
    VALUES 
    (1, '$fullName', '$email', '$university', '$degree', $gradYear, '$educationCourses', '$educationInstitutions', $educationYears, $educationCGPAs, '$skills', '$certifications', '$experience', '$projects', '', '$profileImageName', '$resumeText', '$appliedJobs')";

    if ($conn->query($sqlInsertDetailedResume) === TRUE) {
        echo "Resume submitted successfully!";
    } else {
        echo "Error: " . $sqlInsertDetailedResume . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();

?>
