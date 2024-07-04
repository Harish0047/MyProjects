<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            background: #f7f7f7;
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
        }

        .container {
            background-color: white;
            opacity: 0.95;
            margin: 20px;
            padding: 20px;
            border-radius: 10px;
            overflow: hidden;
        }

        .career-roadmap {
            display: none;
            transition: transform 0.5s ease-in-out;
        }

        .visible-roadmap {
            display: block;
            transform: translateX(0);
        }

        .slide-right {
            transform: translateX(100%);
        }

        .slide-left {
            transform: translateX(-100%);
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar">
        <ul>
            <li><a href="student_dashboard.php">Home</a></li>
            <li><a href="chat.html">Chat</a></li>
            <li><a href="assesments.php">Assessment</a></li>
            <li><a href="applied_job.php">Jobs Applied</a></li>
            <li><a href="games.php">Educational Games</a></li>
            <li><a href="resume_builder.php">Resume Builder</a></li>
            <li><a href="career_roadmaps.php">Career Roadmaps</a></li>
        </ul>
    </nav>

    <div class="container">
        <h2>Career Roadmaps</h2>
        
        <!-- Computer Science Roadmap -->
        <div class="career-roadmap visible-roadmap" id="cs-roadmap">
            <h3>Computer Science Roadmap</h3>
            <p>Explore the roadmap for a successful career in Computer Science:</p>
            <iframe src="https://example.com/cs-roadmap" width="100%"
</div>
</body>
</html>