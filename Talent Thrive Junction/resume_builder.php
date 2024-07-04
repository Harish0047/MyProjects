<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Talent Thrive Junction - Resume Builder</title>
    
    <style>
        body {
            background-image: url('resume.jpg'); /* Replace with your image file */
            background-size: cover;
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
        }

        .resume-builder {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            opacity: 0.9;
            text-align: center;
        }

        h1 {
            color: #333;
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }

        input,
        textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .education-section,
        .certifications-section,
        .extracurricular-section {
            margin-top: 20px;
        }

        .add-more {
            color: #3498db;
            cursor: pointer;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
        }

        .resume-preview {
            margin-top: 20px;
            border-top: 1px solid #ccc;
            padding-top: 20px;
            color: #555;
        }

        img {
            max-width: 100px;
            height: auto;
            border-radius: 50%;
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <!-- Resume Builder Form -->
    <div class="resume-builder">
        <h1>Talent Thrive Junction - Resume Builder</h1>
        <form id="resumeForm" action="submit_resume.php" method="post" enctype="multipart/form-data">
            <label for="fullName">Full Name:</label>
            <input type="text" id="fullName" name="fullName" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="university">University:</label>
            <input type="text" id="university" name="university" required>

            <label for="degree">Degree:</label>
            <input type="text" id="degree" name="degree" required>

            <label for="gradYear">Graduation Year:</label>
            <input type="text" id="gradYear" name="gradYear" required>

            <div class="education-section">
                <label>Education (Add More):</label>
                <div class="education-container">
                    <input type="text" name="education_course[]" placeholder="Course" required>
                    <br>
                    <input type="text" name="education_institution[]" placeholder="Institution Name" required>
                    <br>
                    <input type="text" name="education_year[]" placeholder="Year" required>
                    <br>
                    <input type="text" name="education_cgpa[]" placeholder="CGPA" required>
                </div>
                <span class="add-more" onclick="addMore('education-container')">+ Add More</span>
            </div>

            <label for="skills">Skills (comma-separated):</label>
            <input type="text" id="skills" name="skills" required>

            <div class="certifications-section">
                <label>Certifications (Add More):</label>
                <div class="certifications-container">
                    <input type="text" name="certifications[]" placeholder="Certification details" required>
                </div>
                <span class="add-more" onclick="addMore('certifications-container')">+ Add More</span>
            </div>

            <label for="experience">Experience:</label>
            <textarea id="experience" name="experience"></textarea>

            <label for="projects">Projects:</label>
            <textarea id="projects" name="projects"></textarea>

            <div class="extracurricular-section">
                <label>Extracurricular Activities (Add More):</label>
                <div class="extracurricular-container">
                    <input type="text" name="extracurricular[]" placeholder="Activity details" required>
                </div>
                <span class="add-more" onclick="addMore('extracurricular-container')">+ Add More</span>
            </div>

            <label for="profileImage">Profile Image:</label>
            <input type="file" id="profileImage" name="profileImage" accept="image/*">

            <button type="submit">Generate Resume</button>
        </form>

        <!-- Resume Preview Section -->
        <div id="resumePreview" class="resume-preview"></div>

        <!-- Placeholder Image Suggestion -->
        <img src="footer.jpg" alt="Profile Image">
    </div>

    <!-- JavaScript for Live Preview and Adding More Sections -->
    <script>
      function addMore(containerId, labels) {
            const container = document.querySelector(`.${containerId}`);
            const row = document.createElement('div');
            row.className = 'row';

            labels.forEach(label => {
                const input = document.createElement('input');
                input.type = 'text';
                input.name = `${containerId.slice(0, -9)}_${label.toLowerCase().replace(/\s/g, '_')}[]`;
                input.placeholder = `${label}`;
                input.required = true;
                row.appendChild(input);
            });

            const removeButton = document.createElement('button');
            removeButton.textContent = 'Remove';
            removeButton.type = 'button';
            removeButton.className = 'remove-button';
            removeButton.addEventListener('click', function () {
                container.removeChild(row);
            });

            row.appendChild(removeButton);
            container.appendChild(row);
        }

        document.getElementById('resumeForm').addEventListener('input', function () {
            updateResumePreview();
        });

        function updateResumePreview() {
            // ... (Your existing JavaScript code) ...
            const fullName = document.getElementById('fullName').value;
            const email = document.getElementById('email').value;
            const university = document.getElementById('university').value;
            const degree = document.getElementById('degree').value;
            const gradYear = document.getElementById('gradYear').value;
            const skills = document.getElementById('skills').value;
            const experience = document.getElementById('experience').value;
            const projects = document.getElementById('projects').value;

            const resumePreview = `
                <h2>${fullName}</h2>
                <p>Email: ${email}</p>
                <h3>Education</h3>
                <p>${degree}, ${university} (Graduation Year: ${gradYear})</p>
                <h3>Skills</h3>
                <p>${skills}</p>
                <h3>Experience</h3>
                <p>${experience}</p>
                <h3>Projects</h3>
                <p>${projects}</p>
            `;

            document.getElementById('resumePreview').innerHTML = resumePreview;
}
        }
    </script>

</body>

</html>

        }
    </script>

</body>
</html>
