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
    <link rel="icon" href="logo-removebg-preview.PNG" type="">
    <title>UOM Complaint Portal</title>
    <style>
        /* Global styles */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {          
            font-family: 'Times New Roman', Times, serif;
            background-image: url('BgImage.jpg');
            background-size: cover; /* Adjust as needed */
            background-position: center; /* Adjust as needed */
            background-color: rgba(255, 255, 255, 0.5); /* White background with 50% opacity */
        }

        /* Footer styles */
        .footer {
            background-color: rgb(0, 102, 51);
            color: #fff;
            font-size: x-small;
            text-align: center;
            padding-top: 20px;
            width: 100%;
            position: static;
            bottom: 0;
            margin-top: 20px;
        }

        .footer-content {
            display: flex;
            flex-wrap: wrap;
            font-size: x-small;
            justify-content: space-around;
            max-width: 1200px;
            margin: 0 auto;
        }

        .footer-section {
            flex: 1;
            padding: 0 20px;
        }

        .footer-section h3 {
            color: #fff;
            font-size: 18px;
            margin-bottom: 20px;
            text-transform: uppercase;
        }

        .footer-section ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .footer-section ul li {
            margin-bottom: 10px;
        }

        .footer-section a {
            color: #fff;
            text-decoration: none;
        }

        .footer-section a:hover {
            text-decoration: underline;
        }

        .footer-bottom {
            background-color: #222;
            text-align: center;
            padding: 5px 0;
        }

        .footer-bottom p {
            margin: 0;
            color: #fff;
            font-size: 14px;
        }

        .footer-bottom a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
        }

        .footer-bottom a:hover {
            text-decoration: underline;
        }

        /* Container styles */
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: auto;
            max-width: 55%;
            margin: 70px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            opacity: 0.9;
        }

        /* Input styles */
        input[type="text"],
        input[type="password"],
        select {
            padding: 8px;
            border-radius: 3px;
            border: 1px solid #ccc;
            width: 100%;
            margin-bottom: 10px;
        }

        /* Button styles */
        #reg {
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            width: 120px;
            height: auto;
            border-radius: 5px;
            cursor: pointer;
            margin: auto;
            align-items: center;
        }

        button:hover {
            background-color: #0056b3;
        }

        /* Editor styles */
        body {
            font-family: 'Times New Roman', Times, serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header, footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
        }

        main {
            max-width: 100%;
            margin: 20px auto;
            padding: 0 20px;
        }

        section {
            margin-bottom: 20px;
          
        }

        label, input, button {
            margin-right: 10px;
        }

        .table-container {
            overflow-x: auto;
            width : 100%;

        }

        table {
           
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: rgb(53,122,85);
            color: #fff;
        }

        /* Styles for Search Form */
        input[type="text"] {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-right: 10px;
            flex: 1;
        }

        button {
            padding: 8px 16px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        .icon-link {
            display: inline-block;
            color: white; /* Text color */
            padding: 5px 10px;
            border-radius: 5px;
            text-decoration: none; /* Remove underline from the link */
        }

        .icon-link.a {
            color: white;
        }

        @media screen and (max-width: 600px) {
            .container {
                max-width: 95%;
                margin: 10px auto;
            }

            main {
                padding: 0 10px;
            }

            table{
                width:100%;
                font-size: 8px;
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



    <div class="container">
    <?php 
      
      $select = "SELECT * FROM registrations WHERE registrations.Enroll_ID = '".$_SESSION['userid']."'";
      $selectrun = $mysqli->query($select);
      $selectrow = $selectrun->fetch_array();
      ?>
      <?php if($selectrow['profile_image']) { ?>
          <img src="uploads/<?php echo $selectrow['profile_image']; ?>" alt="" width="82px" height="70px">
      <?php } else { ?>
          <img src="logo.jpg" alt="" width="82px" height="70px">
      <?php } ?>
      <br>
      <h5>VIEW COMPLAINT STATUS</h5>

        <main>
          <section>
              
              <div class="table-container">
                  <table>
                      <thead>
                          <tr>
                              <th> ID</th>
                              <th>Subject</th>
                              <th>Status</th>
                              <th>Category</th>
                              <th>Priority</th>
                          </tr>
                      </thead>
                      <tbody id="complaintDetails">
                        <?php 
                         if(isset($_GET['complaintId'])) {
                          $complaintId = $_GET['complaintId'];
                          $whereClause = "WHERE `UserId`='".$_SESSION['userid']."' AND `id`='$complaintId'";
                      } else {
                          $whereClause = "WHERE `UserId`='".$_SESSION['userid']."'";
                      }
                      
                      $select = "SELECT *
                      FROM complaint
                      JOIN complaint_category ON complaint.Com_CatId = complaint_category.id $whereClause";
                      $selectrun = $mysqli->query($select);
                      ?>
                          <tr>
                         <?php if($selectrun->num_rows > 0) {
                        while($selectrow = $selectrun->fetch_array()) { ?>
                              <td><?php echo $selectrow['id'];?></td>
                              <td><?php echo $selectrow['Subject'];?></td>
                              <?php if($selectrow['STATUS'] == 1){ ?>
                              <td><i class="fas fa-circle" style="color: red;"></i> Pending </td>
                              <?php } if($selectrow['STATUS'] == 2){ ?>
                              <td><i class="fas fa-circle" style="color: green;"></i> Completed</td>
                              <?php } if($selectrow['STATUS'] == 3){ ?>
                                <td><i class="fas fa-circle" style="color: yellow;"></i> Open</td>
                                <?php } ?>
                              <td><?php echo $selectrow['category_name'];?></td>
                              <td>High</td>
                          </tr>
                       <?php }
                    } else {
                        echo "<tr><td colspan='6'>No complaints found.</td></tr>";
                    }
                    ?>
                      </tbody>
                      
                  </table>
              </div>
          </section>
      </main>
    </div>


    <?php include('includes/Footer.php');?>
    

  </body>
</html>
