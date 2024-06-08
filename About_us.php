<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl7/1hb7Pb2a3WjzRLG4l4pcaeb2i1I6/n0Ul8eCq4" crossorigin="anonymous">
</head>
<style>
    /* Reset some default styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Arial', sans-serif;
    line-height: 1.6;
    color: #333;
}


.containerr {
  max-width: 100%;
  height: auto;
 color: #FFF;
  background: radial-gradient(
        circle farthest-side at 0% 50%,
        #282828 23.5%,
        rgba(255, 170, 0, 0) 0
      )
      21px 30px,
    radial-gradient(
        circle farthest-side at 0% 50%,
        #2c3539 24%,
        rgba(240, 166, 17, 0) 0
      )
      19px 30px,
    linear-gradient(
        #282828 14%,
        rgba(240, 166, 17, 0) 0,
        rgba(240, 166, 17, 0) 85%,
        #282828 0
      )
      0 0,
    linear-gradient(
        150deg,
        #282828 24%,
        #2c3539 0,
        #2c3539 26%,
        rgba(240, 166, 17, 0) 0,
        rgba(240, 166, 17, 0) 74%,
        #2c3539 0,
        #2c3539 76%,
        #282828 0
      )
      0 0,
    linear-gradient(
        30deg,
        #282828 24%,
        #2c3539 0,
        #2c3539 26%,
        rgba(240, 166, 17, 0) 0,
        rgba(240, 166, 17, 0) 74%,
        #2c3539 0,
        #2c3539 76%,
        #282828 0
      )
      0 0,
    linear-gradient(90deg, #2c3539 2%, #282828 0, #282828 98%, #2c3539 0%) 0 0
      #282828;
  background-size: 40px 60px;
}

/* Container styling */
.container {
    width: 80%;
    margin: 0 auto;
    padding: 20px;
}

/* Header styling */
header {
    background: #006633;
    color: #fff;
    padding: 5px 0;
    text-align: left;
}



header h1 {
    margin: 0;
    font-size: 2em;
}

nav ul {
            list-style: none;
            padding: 0;
            text-align: right; /* Aligns the navigation to the right */
        }

        nav ul li {
            display: inline;
            margin-right: 10px;
        }

        nav ul li a {
            display: inline-block; /* Makes the link behave like a block element */
            padding: 10px 20px; /* Adds padding to the link */
            color: #fff; /* Text color */
            background-color: #007BFF; /* Background color */
            border-radius: 5px; /* Rounds the corners */
            text-decoration: none; /* Removes the underline */
            transition: background-color 0.3s; /* Smooth transition for hover effect */
        }

        nav ul li a:hover {
            background-color: #0056b3; /* Darker shade for hover effect */
            text-decoration: none; /* Keeps the underline removed */
        }

/* About section styling */
.about {
   
    padding: 20px 0;
    text-align: center;
}

.about h2 {
    font-size: 1.8em;
    margin-bottom: 10px;
}

.team {
   
    padding: 20px 0;
}

.team h2 {
    font-size: 1.8em;
    margin-bottom: 10px;
    text-align: center;
}

.team-member {
    display: flex;
    align-items: flex-start;
    margin-bottom: 20px;
    background: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}



.team-member-image {
    flex: 1;
    margin-right: 20px;
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
}

.team-member-image img {
    width: 100%;
    max-width: 250px;
    position: relative;
    z-index: 1;
}




.team-member-info {
    flex: 2;
    color: black;
}

.team-member-info h3 {
    margin: 10px 0 5px;
    font-size: 1.5em;
}

.team-member-info p {
    margin: 5px 0;
    font-size: 1em;
    color: #777;
}




.social-icons {
    
    margin-top: 25px;
    color : black;
}

.social-icons a {
    color: #333;
    text-decoration: none;
    margin-right: 10px;
    font-size: 1.2em;
    transition: color 0.3s;
}

.social-icons a:hover {
    color: #07bff;
}

footer {
    background: #006633;
    color: #fff;
    text-align: center;
    padding: 10px 0;
}

footer p {
    margin: 0;
}

/* Responsive styling */
@media (max-width: 768px) {
    .team-member {
        flex-direction: column;
        align-items: center;
        text-align: center;
    }

    .team-member-image {
        margin: 0 0 20px 0;
    }

    .team-member-info {
        text-align: center;
    }
}


</style>
<body>
    <header>
        <div class="container">
            <h1>About Us</h1>
            <nav class="navbar">
                <ul>
                    <li><a href="index.php">Login</a></li>
                    <li><a href="Register.php">Sign Up</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="containerr">
    <section class="about">
        <div class="container">
            <h2>Who We Are</h2>
            <p>We are a team of passionate developers dedicated to creating innovative and efficient solutions. Our expertise spans across various technologies, ensuring that we deliver high-quality projects that meet our clients' needs.</p>
        </div>
    </section>
    <section class="team">
        <div class="container">
            <h2>Meet the Team</h2>
            <div class="team-member">
                <div class="team-member-image">
                    <img src="Images/my image.jpg" alt="Developer 1">
                </div>
                <div class="team-member-info">
                    <h3>Engr. Muhammad Yasin</h3>
                    <p>Full Stack Developer</p>
                    <p>Yasin is a full-stack developer with a passion for creating robust, scalable web applications. With expertise in both front-end and back-end technologies, he delivers seamless user experiences and efficient, secure systems. Committed to continuous learning, Yasin stays ahead of industry trends to provide innovative solutions.</p>
                
                    <div class="social-icons">
                        <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                        <path d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232"/>
                        </svg></a>
                        <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
                         <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854zm4.943 12.248V6.169H2.542v7.225zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248S2.4 3.226 2.4 3.934c0 .694.521 1.248 1.327 1.248zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016l.016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225z"/>
                        </svg></i></a>
                        <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter-x" viewBox="0 0 16 16">
  <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z"/>
</svg></i></a>
                    </div>
                </div>
            </div>
            <div class="team-member">
                <div class="team-member-image">
                    <img src="Images/adil.PNG" alt="Developer 2">
                </div>
                <div class="team-member-info">
                    <h3>Syed Adil</h3>
                    <p>Front-end Developer</p>
                    <p>Syed Adil is a dedicated front-end web developer specializing in crafting intuitive and visually appealing user interfaces. With a keen eye for design and a strong command of modern web technologies, he brings websites to life with seamless interactivity and responsiveness. Passionate about user experience, Adil always focuses on improving his skills to deliver top-notch web solutions.</p>
        
                    <div class="social-icons">
                        <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                        <path d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232"/>
                        </svg></i></a>
                        <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
                        <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854zm4.943 12.248V6.169H2.542v7.225zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248S2.4 3.226 2.4 3.934c0 .694.521 1.248 1.327 1.248zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016l.016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225z"/>
                        </svg></i></a>
                        <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter-x" viewBox="0 0 16 16">
  <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z"/>
</svg></a>
                    </div>
                </div>
            </div>

          
        </div>
    </section>
    </div>
    <footer>
        <div class="container">
            <p>&copy; 2024 Developer Project. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
