<?php include('includes/config.php');?>
<?php 
if(!isset($_SESSION['userid'])) {
  echo "<script>window.location='Login.php'</script>";
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="icon" href="./Images/logo-removebg-preview.PNG" type="">
    <title>UOM Complaint Portal</title>
    <style>

* {
    box-sizing: border-box;
  }

  body {          
            font-family: 'Times New Roman', Times, serif;
            background-image: url('./Images/BgImage.jpg');
            background-size: cover; /* Adjust as needed */
            background-position: center; /* Adjust as needed */
            background-color: rgba(255, 255, 255, 0.5); /* White background with 50% opacity */
        }

  .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: auto;
            max-width: 85%;
            padding-bottom: 20px;
            background-color: #fff;
            border-radius: 2px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            opacity: 0.9;
        }

 

  .icon-link {
    display: inline-block;
    color: white; /* Text color */
    padding: 5px 10px;
    border-radius: 5px;
    text-decoration: none; /* Remove underline from the link */
  }

  .icon-link.a{
    color: white;
  }

  .icon-link .icon {
    margin-right: 5px; /* Space between icon and text */
  }

  .logout-button {
    background-color: #007bff;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    display: inline-block;
    text-decoration: none;
  }


  .carousel {
    display: block;
    position: relative;
    width: 70%;
    overflow: hidden;

  }

  .carousel-container {
    display: flex;
    transition: transform 0.5s ease;
    max-width: 100%;
    overflow: hidden;
  }

  .carousel-item {
    flex: 0 0 100%;
    max-width: 70%;
    display: none; /* Hide all slides by default */
  }

  .carousel-img {
    width: 100%;
    height: 500px; /* Set a specific height for the images */
    object-fit: cover; /* Ensure the images cover the entire container */
  }

  .carousel-btn {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background: rgba(0, 0, 0, 0.5);
    color: white;
    padding: 10px;
    border: none;
    cursor: pointer;
    z-index: 1;
  }

 
  .counterr {
  background-image: url('./Images/imagesrecord.jpg');
  background-size: cover; /* Adjust as needed */
  background-position: center; /* Adjust as needed */
  height: auto;

}


  @media screen and (max-width: 768px) {

    body{
      font-size: 12px;
    }
    .carousel-item {
      flex: 0 0 100%;
      max-width: 100%;
    
    }

   

    .carousel{
      max-height:250px;
      margin-bottom:10px;
    }

    .container {

                max-width: 100%;
                padding: 5px;
                font-size: 10px;
      
            }
      h3{
        font-size: 14px;
      }

      h1{
        font-size: 16px;
      }


  

 }


  

  @media screen and (min-width: 768px) {
    .carousel-item {
      flex: 0 0 100%;
      max-width: 100%;
    }
  }

  @media screen and (min-width: 1200px) {
    .carousel-item {
      flex: 0 0 100%;
      max-width: 100%;
    }
  }

  
    </style>
  </head>
  <body>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->




<?php include('includes/user_navbar.php');?>

<div class ="container">

<br>
 

    <div class="carousel" style="margin: auto; width: 90%; height: 500px;">
      <button class="carousel-btn prev" onclick="moveSlide(-1)">&#10094;</button>
      <div class="carousel-container">
        <div class="carousel-item">
          <img class="carousel-img" src="./Images/Carasolue01.jpg" alt="Image 1">
        </div>
        <div class="carousel-item">
          <img class="carousel-img" src="./Images/Carasolue02.jpg" alt="Image 2">
        </div>
        <div class="carousel-item">
          <img class="carousel-img" src="./Images/Carasolue03.jpg" alt="Image 3">
        </div>
      </div>
      <button class="carousel-btn next" onclick="moveSlide(1)">&#10095;</button>
    </div>



    <div class="about" style="width: 80%; margin-top:20px ;">
       <h1 style="text-align: center;"> UOM Complaints Portal </h1>
        <h3 style="text-align: center; color: rgb(58,158,85);">Empowering UOM Family to Voice Their Concerns  </h3>
      <p>
        The University of UOM Complaints Portal is dedicated to promoting a student-centered approach to governance and addressing grievances effectively. Established with the goal of fostering a culture of transparency and accountability, the portal provides students with a platform to raise their concerns and have them addressed promptly.
      </p>
      <P>
      Our primary objective is to facilitate seamless communication between students and university authorities, ensuring that all issues are resolved with priority and in accordance with the university's vision. We are committed to empowering students to voice their opinions, seek guidance, and report any violations they may encounter.
    </P>
    <p>
      Through the portal, students can submit suggestions, personal complaints, grievances, or report any misconduct. We strive to ensure that all submissions are handled fairly and efficiently by the relevant university departments. This manual is designed to assist university staff in effectively responding to matters raised on the portal, ensuring a smooth and transparent process for all stakeholders.
    </P>
    <p></p>
      Together, we aim to create a conducive environment for learning and growth, where every student's voice is heard and valued.
    </P>
    </div>
  

    <div class="counterr" style="background-image: url('./Images/imagesrecord.jpg'); opacity: 0.6; padding: 8px; margin: auto; width: 80%;  color: #fff; font-weight: 800;"  >
    <?php
      $sql = "SELECT COUNT(id) AS solved FROM complaint where STATUS = 2";
      $faculty_member = $mysqli->query($sql);
      $faculty_row = $faculty_member->fetch_assoc();
      $num_faculty_members = $faculty_row['solved'];

      $sql2 = "SELECT COUNT(id) AS insolved FROM complaint where STATUS IN (1, 3)";
      $faculty_member2 = $mysqli->query($sql2);
      $faculty_row2 = $faculty_member2->fetch_assoc();
      $num_faculty_members2 = $faculty_row2['insolved'];

      $sql3 = "SELECT COUNT(id) AS total FROM complaint";
      $faculty_member3 = $mysqli->query($sql3);
      $faculty_row3 = $faculty_member3->fetch_assoc();
      $num_faculty_members3 = $faculty_row3['total'];
    ?>
    
    <div style="display: flex; flex-direction: column; align-items: center;">

    <span style=" font-size: larger;" >
        Solved complaints <?php echo $num_faculty_members ;?>
      </span>
      <br>
      <span style=" font-size: larger;" >
        
        Total Complaints <?php echo $num_faculty_members3 ;?>
      </span>
        <br>
      <span style=" font-size: larger;" >
        Unsolved Complaints <?php echo $num_faculty_members2 ;?>
      </span>

    </div>



    </div>

    </div>

    <?php include('includes/Footer.php');?>

    <script>




      let slideIndex = 1;
  
      function moveSlide(n) {
        showSlides(slideIndex += n);
      }
  
      function showSlides(n) {
        const slides = document.getElementsByClassName("carousel-item");
        if (n > slides.length) { slideIndex = 1 }
        if (n < 1) { slideIndex = slides.length }
        for (let i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";
        }
        slides[slideIndex - 1].style.display = "block";
      }
  
      showSlides(slideIndex);
  
      setInterval(function() {
        moveSlide(1); // Move to the next slide every 3 seconds
      }, 2000); // 2000 milliseconds = 3 seconds
    </script>
  </body>
</html>