<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Talent Thrive Junction</title>
</head>
<style>
    /* Add some colors and fonts to the website */
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    body {
        background-color: #f0f0f0;
        font-family: Arial, sans-serif;
    }

    .logo {
        width: 200px;
        height: auto;
    }

    header {
        background-color: #333;
        color: white;
        padding: 20px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    header h1 {
        font-size: 36px;
    }

    header p {
        font-size: 18px;
    }

    nav {
        background-color: #eee;
        padding: 10px;
        display: flex;
        justify-content: center;
    }

    nav a {
        color: #333;
        text-decoration: none;
        margin: 0 10px;
    }

    nav a:hover {
        color: #999;
    }

    section {
        max-width: 1200px;
        margin: 20px auto;
        padding: 20px;
        background-color: white;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    section h2 {
        font-size: 28px;
        margin-bottom: 10px;
    }

    section p {
        font-size: 16px;
        line-height: 1.5;
    }

    section ul {
        list-style: none;
        margin-left: 20px;
    }

    section ul li {
        font-size: 16px;
        line-height: 1.5;
        margin-bottom: 5px;
    }

    section ul li::before {
        content: "\2713";
        color: green;
        margin-right: 10px;
    }

    .main_back {
  position: absolute;
  border-radius: 10px;
  transform: rotate(90deg);
  width: 11em;
  height: 11em;
  background: linear-gradient(270deg, #03a9f4, #cc39a4, #ffb5d2);
  z-index: -2;
  box-shadow: inset 0px 0px 180px 5px #ffffff;
}

.main {
  display: flex;
  flex-wrap: wrap;
  width: 14em;
  align-items: center;
  justify-content: center;
  z-index: -1;
}

.card {
  
  width: 60px;
  height: 60px;
  border-top-left-radius: 10px;
  background: lightgrey;
  transition: .4s ease-in-out, .2s background-color ease-in-out, .2s background-image ease-in-out;
  background: rgba(255, 255, 255, 0.596);
  backdrop-filter: blur(5px);
  border: 1px solid transparent;
  -webkit-backdrop-filter: blur(5px);
  display: flex;
  align-items: center;
  justify-content: center;
}

.card .instagram {
  opacity: 0;
  transition: .2s ease-in-out;
  fill: #cc39a4;
}

.card:nth-child(2) {
  border-radius: 0px;
}

.card:nth-child(2) .twitter {
  opacity: 0;
  transition: .2s ease-in-out;
  fill: #03A9F4;
}

.card:nth-child(3) {
  border-top-right-radius: 10px;
  border-top-left-radius: 0px;
}

.card:nth-child(3) .dribble {
  opacity: 0;
  transition: .2s ease-in-out;
  fill: #ffb5d2;
}

.card:nth-child(4) {
  border-radius: 0px;
}

.card:nth-child(4) .codepen {
  opacity: 0;
  transition: .2s ease-in-out;
  fill: black;
}

.card:nth-child(5) {
  border-radius: 0px;
}

.card:nth-child(5) .uiverse {
  position: absolute;
  margin-left: 0.2em;
  margin-top: 0.2em;
  opacity: 0;
  transition: .2s ease-in-out;
}

.card:nth-child(6) {
  border-radius: 0px;
}

.card:nth-child(6) .discord {
  opacity: 0;
  transition: .2s ease-in-out;
  fill: #8c9eff;
}

.card:nth-child(7) {
  border-bottom-left-radius: 10px;
  border-top-left-radius: 0px;
}

.card:nth-child(7) .github {
  opacity: 0;
  transition: .2s ease-in-out;
  fill: black;
}

.card:nth-child(8) {
  border-radius: 0px;
}

.card:nth-child(8) .telegram {
  opacity: 0;
  transition: .2s ease-in-out;
  fill: #29b6f6;
}

.card:nth-child(9) {
  border-bottom-right-radius: 10px;
  border-top-left-radius: 0px;
}

.card:nth-child(9) .reddit {
  opacity: 0;
  transition: .2s ease-in-out;
}

.main:hover {
  width: 14em;
  cursor: pointer;
}

.main:hover .main_back {
  opacity: 0;
}

.main:hover .card {
  align='center';
  margin: .2em;
  border-radius: 10px;
  box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
  border: 1px solid rgba(255, 255, 255, 0.3);
  background: rgba(255, 255, 255, 0.2);
}

.main:hover .card:nth-child(5) {
  border: transparent;
}

.main:hover .text {
  opacity: 0;
  z-index: -3;
}

.main:hover .instagram {
  opacity: 1;
}

.main:hover .twitter {
  opacity: 1;
}

.main:hover .dribble {
  opacity: 1;
}

.main:hover .codepen {
  opacity: 1;
}

.main:hover .uiverse {
  opacity: 1;
}

.main:hover .discord {
  opacity: 1;
}

.main:hover .github {
  opacity: 1;
}

.main:hover .telegram {
  opacity: 1;
}

.main:hover .reddit {
  opacity: 1;
}

.card:nth-child(1):hover {
  background-color: #cc39a4;
}

.card:nth-child(1):hover .instagram {
  fill: white;
}

.card:nth-child(2):hover {
  background-color: #03A9F4;
}

.card:nth-child(2):hover .twitter {
  fill: white;
}

.card:nth-child(3):hover {
  background-color: #ffb5d2;
}

.card:nth-child(3):hover .dribble {
  fill: white;
}

.card:nth-child(4):hover {
  background-color: #1E1F26;
}

.card:nth-child(4):hover .codepen {
  fill: white;
}

.card:nth-child(5):hover {
  animation: backgroundIMG .1s;
  animation-fill-mode: forwards;
}

.card:nth-child(5):hover .uiverse #paint0_linear_501_142 stop {
  stop-color: white;
}

.card:nth-child(5):hover .uiverse #paint1_linear_501_142 stop {
  stop-color: white;
}

.card:nth-child(5):hover .uiverse #paint2_linear_501_142 stop {
  stop-color: white;
}

@keyframes backgroundIMG {
  100% {
    background-image: linear-gradient(#BF66FF,#6248FF,#00DDEB);
  }
}

.card:nth-child(6):hover {
  background-color: #8c9eff;
}

.card:nth-child(6):hover .discord {
  fill: white;
}

.card:nth-child(7):hover {
  background-color: black;
}

.card:nth-child(7):hover .github {
  fill: white;
}

.card:nth-child(8):hover {
  background-color: #29b6f6;
}

.card:nth-child(8):hover .telegram > path:nth-of-type(1) {
  fill: white;
}

.card:nth-child(8):hover .telegram > path:nth-of-type(2) {
  fill: #29b6f6;
}

.card:nth-child(8):hover .telegram > path:nth-of-type(3) {
  fill: #29b6f6;
}

.card:nth-child(9):hover {
  background-color: rgb(255,69,0);
}

.card:nth-child(9) .reddit > g circle {
  fill: rgb(255,69,0);
}

.card:nth-child(9) .reddit > g path {
  fill: white;
}

.text {
  position: absolute;
  font-size: 0.7em;
  transition: .4s ease-in-out;
  color: black;
  text-align: center;
  font-weight: bold;
  letter-spacing: 0.33em;
  z-index: 3;
}


    .slider-container {
        max-width: 1200px;
        margin: 20px auto;
        padding: 20px;
        background-color: white;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
        position: relative;
    }

    .slider-container .open-btn {
        width: 200px;
        height: 50px;
        border: none;
        border-radius: 10px;
        background-color: #333;
        color: white;
        font-size: 18px;
        cursor: pointer;
    }

    .slider-container .open-btn:hover {
        background-color: #555;
    }

    .slider-container .slider-popup {
        width: 800px;
        height: 600px;
        border: 5px solid #333;
        border-radius: 10px;
        background-color: white;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        display: none;
    }

    .slider-container .slider-popup .close-btn {
        width: 40px;
        height: 40px;
        border: none;
        border-radius: 50%;
        background-color: #333;
        color: white;
        font-size: 24px;
        cursor: pointer;
        position: absolute;
        top: -20px;
        right: -20px;
    }

    .slider-container .slider-popup .close-btn:hover {
        background-color: #555;
    }

    .slider-container .slider-popup .slider-content {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .slider-container .slider-popup .slider-content img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    footer {
        background-color: #333;
        color: white;
        padding: 20px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    footer p {
        font-size: 16px;
    }

    footer a {
        color: white;
        text-decoration: none;
        margin-left: 10px;
    }

    footer a:hover {
        color: #999;
    }
</style>
<body>

<div class="main-content">
    <header>
        <img src="logo.png" alt="Talent Thrive Junction Logo" class="logo">
        <h1>Welcome to Talent Thrive Junction</h1>
        <p>Your Gateway to Innovative Placements</p>
    </header>

    <nav><!-- Navigation links here if needed --></nav>

    <section id="about-us">
        <h2>About Us</h2>
        <p>Talent Thrive Junction is more than just a placement platform; it's a dynamic and innovative approach to connecting students and companies in the ever-evolving landscape of education and employment. Our mission is to transform traditional placements into engaging experiences, enhance skill development through gamification, and provide predictive analytics for personalized guidance. We believe in creating a platform that not only streamlines the placement process but also fosters continuous improvement to meet evolving industry demands. At Talent Thrive Junction, we are driven by the passion to bridge the gap between student skills and industry requirements. We envision a future where placements are not just transactions but transformative experiences for both students and companies.</p>
        <h3>Key Objectives</h3>
        <ul>
            <li>Transforming traditional placements into engaging experiences.</li>
            <li>Enhancing skill development through gamification.</li>
            <li>Providing predictive analytics for personalized guidance.</li>
            <li>Implementing an automated assessment framework for efficiency and accuracy.</li>
        </ul>
    </section>

    <section id="team">
        <h2>Meet Our Team</h2>
        <p>Behind Talent Thrive Junction is a dedicated team of professionals passionate about reshaping the future of student placements. We bring together expertise in technology, education, and industry insights to create a platform that truly makes a difference.</p>
        <!-- Add information about team members, roles, and expertise -->
    </section>
    </div>

        </div>
    </div>
    <footer>
        2024 Placement cell
</footer>
<script>
// This function toggles the visibility of the slider popup
function toggleSlider() {
  let sliderPopup = document.getElementById("sliderPopup");
  sliderPopup.style.display = sliderPopup.style.display === "none" ? "block" : "none";
}

// This function changes the image in the slider popup based on the user input
function changeSlide(n) {
  let slideIndex = 0; // This variable keeps track of the current slide
  let slides = document.getElementsByClassName("slider-content"); // This variable stores all the images in the slider popup
  slideIndex += n; // This line updates the slide index based on the user input
  if (slideIndex < 0) {
    slideIndex = slides.length - 1; // This line prevents the slide index from going below zero
  }
  if (slideIndex > slides.length - 1) {
    slideIndex = 0; // This line prevents the slide index from going above the number of slides
  }
  for (let i = 0; i < slides.length; i++) {
    slides[i].style.display = "none"; // This line hides all the slides
  }
  slides[slideIndex].style.display = "block"; // This line shows the current slide
}

</script>
</body>
</html>
