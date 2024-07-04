<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Talent Thrive Junction</title>
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <style>

		
		body {
                margin: 0;
            padding: 0;
		
}
.topbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: linear-gradient(to right, #000000, #6b00b3);
    color: #fff;
    padding: 10px 20px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.brand {
    font-size: 24px;
    font-weight: bold;
}

.menu {
    display: flex;
    align-items: center;
}

.menuItem {
    text-decoration: none;
    color: #fff;
    margin: 0 15px;
    transition: color 0.3s ease-in-out;
}

.menuItem:hover {
    color: #e5a5ff;
}

.ctaButton {
    background-color: #e5a5ff;
    color: #fff;
    border: none;
    padding: 10px 15px;
    border-radius: 5px;
    cursor: pointer;
    outline: none;
    transition: background-color 0.3s ease-in-out;
}

.ctaButton:hover {
    background-color: #6b00b3;
}

        #particles-js {
            height: 100vh;
            background-color: #1a1a1a;
            position: fixed;
            width: 100%;
            z-index: -1;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            z-index: 1;
            position: relative;
            color: #fff;
        }

        header {
            text-align: center;
            z-index: 1;
            position: relative;
        }

        h1 {
            color: #87CEEB;
            font-size: 36px;
            margin-bottom: 20px;
        }

        .envelope {
            position: relative;
            cursor: pointer;
            width: 350px;
            margin: 0 auto;
            z-index: 1;
        }

        #envelopeIcon {
            width: 100%;
            height: auto;
            transition: transform 0.3s ease-in-out;
        }

        .options {
            display: none;
            position: absolute;
            top: 100px;
            left: 50%;
            transform: translateX(-50%);
            text-align: center;
            background-color: #fff;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            z-index: 1;
        }

        .student-option,
        .company-option {
            display: inline-block;
            margin: 10px;
            text-decoration: none;
            color: #333;
        }

        .student-option img,
        .company-option img {
            width: 100px;
            height: 100px;
            margin-bottom: 10px;
        }

        footer {
            text-align: center;
            margin-top: 20px;
            color: #666;
            z-index: 1;
        }
    </style>
</head>
<body>
<div class="topbar">
        <div class="brand">Placement Cell</div>
        <div class="menu">
            <a href="index.php" class="menuItem">Home</a>
            <a href="about_us.php" class="menuItem">About Us</a>
            <a href="admin_login.php" class="menuItem">Admin</a>
            <a href="contact.html" class="menuItem">Contuct Us</a>
        </div>
    </div>
    <div id="particles-js"></div>
    < <header>
            <h1>Welcome to Talent Thrive Junction</h1>
        </header>
        <main>
            <div class="envelope" id="envelope">
                <img src="envelope.png" alt="Envelope" id="envelopeIcon">
                <div class="options" id="options">
                    <a href="student_login.php" class="student-option">
                        <img src="student.jpeg" alt="Student Icon">
                        <p>Login as Student</p>
                    </a>
                    <a href="company_login.php" class="company-option">
                        <img src="company.png" alt="Company Icon">
                        <p>Login as Company</p>
                    </a>
                </div>
            </div>
        </main>
        <footer>
            <p>2023 Placement Cell Hub</p>
        </footer>
        <script>
            document.getElementById('envelope').addEventListener('click', function () {
                var options = document.getElementById('options');
                var envelopeIcon = document.getElementById('envelopeIcon');

                if (options.style.display === 'none' || options.style.display === '') {
                    options.style.display = 'block';
                    envelopeIcon.style.transform = 'rotate(180deg)';
                } else {
                    options.style.display = 'none';
                    envelopeIcon.style.transform = 'rotate(0deg)';
                }
            });

    particlesJS('particles-js', {
        particles: {
            number: {
                value: 90,
                density: {
                    enable: true,
                    value_area: 900
                }
            },
            color: {
                value: '#87CEEB' // Set this to the sky blue color of your choice
            },
            shape: {
                type: 'circle',
                stroke: {
                    width: 0,
                    color: '#000000'
                },
                polygon: {
                    nb_sides: 6
                },
                image: {
                    src: 'img/github.svg',
                    width: 100,
                    height: 100
                }
            },
            opacity: {
                value: 0.7,
                random: false,
                anim: {
                    enable: false,
                    speed: 1,
                    opacity_min: 0.1,
                    sync: false
                }
            },
            size: {
                value: 5,
                random: true,
                anim: {
                    enable: false,
                    speed: 40,
                    size_min: 0.1,
                    sync: false
                }
            },
            line_linked: {
                enable: true,
                distance: 150,
                color: '#87CEEB',
                opacity: 0.4,
                width: 1
            },
            move: {
                enable: true,
                speed: 6,
                direction: 'none',
                random: false,
                straight: false,
                out_mode: 'out',
                bounce: false,
                attract: {
                    enable: false,
                    rotateX: 600,
                    rotateY: 1200
                }
            }
        },
        interactivity: {
            detect_on: 'canvas',
            events: {
                onhover: {
                    enable: true,
                    mode: 'repulse'
                },
                onclick: {
                    enable: true,
                    mode: 'push'
                },
                resize: true
            },
            modes: {
                grab: {
                    distance: 400,
                    line_linked: {
                        opacity: 1
                    }
                },
                bubble: {
                    distance: 400,
                    size: 40,
                    duration: 2,
                    opacity: 8,
                    speed: 3
                },
                repulse: {
                    distance: 200,
                    duration: 0.4
                },
                push: {
                    particles_nb: 4
                },
                remove: {
                    particles_nb: 2
                }
            }
        },
        retina_detect: true
    });



        </script>
    </div>
</body>
</html>
