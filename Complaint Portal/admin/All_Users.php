<?php include('../includes/config.php');?>
<?php 
if(!isset($_SESSION['adminid'])) {
  echo "<script>window.location='index.php'</script>";
}
?>
<?php
// Assuming database connection is already established

if(isset($_GET['delid'])) {
    $id = $_GET['delid']; // Get the 'delid' parameter from the URL
    
    // Prepare and execute the DELETE query
    $sql = "DELETE FROM registrations WHERE Enroll_ID = '$id'";
    if (mysqli_query($mysqli, $sql)) {
        echo "<script>alert('Record deleted successfully');</script>";
        echo "<script>window.location='Validate_User.php';</script>";
    } else {
        echo "<script>alert('Error deleting record: " . mysqli_error($mysqli) . "');</script>";
    }
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
    <link rel="icon" href="../Images/logo-removebg-preview.PNG" type="">
    <title>UOM Complaint Portal Admin </title>
    <style>
      /* Global styles */
      * {
          box-sizing: border-box;
          margin: 0;
          padding: 0;
      }

      body {
        font-family: 'Times New Roman', Times, serif;
          background-image: url('../Images/BgImage.jpg');
          background-size: cover; /* Adjust as needed */
          background-position: center; /* Adjust as needed */
          background-color: rgba(255, 255, 255, 0.5); /* White background with 50% opacity */
      }

     
      /* Container styles */
      .container {
          display: flex;
          flex-direction: column;
          align-items: center;
          justify-content: center;
          min-height: 60%;
          max-width: 75%;
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
      .editor-container {
          position: relative;
          max-width: 100%;
          min-height: 150px;
          border: 1px solid #ccc;
          font-family: Arial, sans-serif;
          font-size: 16px;
          padding: 5px;
          background-color: #fff;
          border-radius: 5px;
          box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
          margin-top: 20px;
      }

      .toolbar {
          position: sticky;
          top: 0;
          left: 0;
          right: 0;
          background-color: grey;
          padding: 1px;
          border-bottom: 1px solid #ccc;
          border-top-left-radius: 1px;
          border-top-right-radius: 1px;
      }

      .toolbar button {
          margin-right: 5px;
          padding: 5px;
          font-size: 16px;
          font-family: Arial, sans-serif;
          cursor: pointer;
          background: none;
          border: none;
      }

      .editor-content {
          width: auto;
          height: 200px;
          min-height: 50px;
          padding: 10px;
          border: 1px solid #ccc;
          border-radius: 5px;
          font-size: 16px;
          outline: none;
          overflow: scroll;
      }
      .table-container{
        width: 1270px;
        padding: 20px; ;
      }

      label {
  font-weight: bold;
  margin-right: 10px; /* Add space between label and input */
}


/* Style for the file input */
input[type="file"] {
  /* Hide the default file input button */
  display: none;
}

/* Style for the custom file input button */
.custom-file-upload {
  display: inline-block;
  padding: 8px 12px;
  cursor: pointer;
  background-color: #007bff;
  color: white;
  border: none;
  border-radius: 5px;
}

/* Style for the custom file input button on hover */
.custom-file-upload:hover {
  background-color: #0056b3;
}

/* Style for the selected file display */
.selected-file {
  margin-left: 10px; /* Add space between file button and file name */
}

/* Style for the remove icon */
.remove-icon {
  margin-left: 5px;
  color: #f00; /* Red color for the remove icon */
  cursor: pointer;
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


/* Global styles */


/* Table styles */
.table-container {
  overflow-x: auto;
  margin-top: 20px;
  width: 95%;
  padding: 20px;
}

table {
  border-collapse: collapse;
  width: 95%;
  background-color: #fff;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  font-size: smaller;
}

th,
td {

  padding: 5px; /* Adjust padding as needed */
  text-align: left;
  height: 5px; /* Set the desired row height */
  border-bottom: 2px; 
  border-color: #333;
}
tr {
  border-bottom: 1px solid #ddd; /* Add a solid border bottom to each row */
  max-height: 20px;
}
th {
  background-color: #f2f2f2;
}



/* Status icons */
.status-icon {
  font-size: 1.2em;
  margin-right: 5px;
}

.received {
  color: blue;
}

.in-progress {
  color: orange;
}

.completed {
  color: green;
}

/* Action icons */
.action-icon {
  font-size: 1.2em;
  margin-right: 5px;
  text-decoration: none;
  color: #333;
}

.action-icon:hover {
  color: #007bff;
}

/* Search container */
.-container {
  display: flex;
  justify-content: flex-end;
  margin-bottom: 10px;
}

.search-input {
  padding: 5px;
  border-radius: 5px;
  border: 1px solid #ccc;
  margin-right: 10px;
}

.search-button {
  padding: 5px 10px;
  border-radius: 5px;
  background-color: #007bff;
  color: #fff;
  border: none;
  cursor: pointer;
}

.search-button:hover {
  background-color: #0056b3;
}

.select-icon {
  position: relative;
  display: inline-block;
}

.select-icon .status-dropdown {
  padding-left: 20px; /* Adjust as needed */
  appearance: none;
  -webkit-appearance: none;
  -moz-appearance: none;
  background-image: url('data:image/svg+xml;utf8,<svg fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path fill="currentColor" d="M16.59 8.59L12 13.17 7.41 8.59 6 10l6 6 6-6-1.41-1.41z"/></svg>');
  background-repeat: no-repeat;
  background-position: right 8px center;
  background-size: 12px;
  padding-right: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
  color: gray;
  /* Change the background color of the dropdown */
  background-color: #f8f9fa; /* Adjust as needed */
}

.select-icon .status-dropdown option {
  background-color: #fff; /* Adjust as needed */
  color: #333; /* Adjust as needed */
}

.select-icon .status-dropdown option:checked {
  background-color: #f0f0f0; /* Adjust as needed */
}

.select-icon .status-dropdown option[data-icon] {
  padding-left: 20px;
  background-repeat: no-repeat;
  background-position: center left 10px;
}

.select-icon .status-dropdown option[value="received"] {
  background-image: url('data:image/svg+xml;utf8,<svg fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/></svg>');
}

.select-icon .status-dropdown option[value="in-progress"] {
  background-image: url('data:image/svg+xml;utf8,<svg fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/></svg>');
  animation: spin 2s linear infinite;
}

.select-icon .status-dropdown option[value="completed"] {
  background-image: url('data:image/svg+xml;utf8,<svg fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M9 16.2l-4.2-4.2-1.4 1.4 5.6 5.6 12-12-1.4-1.4-10.6 10.6z"/></svg>');
}

.select-icon .status-dropdown option:checked:before {
  content: "\f111"; /* Adjust the Unicode for the selected icon */
  font-family: "Font Awesome 5 Free";
  margin-right: 5px;
  color: inherit;
}

.select-icon .fas.fa-circle,
.select-icon .fas.fa-circle-notch,
.select-icon .fas.fa-check-circle {
  font-size: 10px;
  margin-right: 5px;
}

.select-icon .fas.fa-circle-notch {
  animation: spin 2s linear infinite;
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

/* Red delete icon */
.action-icon.delete {
  color: red;
}

.action-icon.delete:hover {
  color: #dc3545; /* Darker red on hover */
}

/* Green download icon */
.action-icon.download {
  color: green;
}

/* Custom color for submit icon */
.action-icon.submit {
  color: #007bff;
; /* Magenta */
}


section {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
}

form {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-wrap: wrap;
}

.input-group {
    display: flex;
    align-items: center;
    margin-bottom: 10px;
}

label {
    margin-right: 10px;
}

input[type="text"],
select {
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin-right: 10px;
    flex: 1; /* Allow input to grow and take up available space */
}

button {
    padding: 8px 16px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
    margin-top: -10px; /* Adjust margin-top as needed */
}


button:hover {
    background-color: #0056b3;
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

    <!-- Navbar -->
 <?php include('../includes/admin_navbar.php');?>
 <?php
// Assuming database connection is already established

if(isset($_GET['delid'])) {
    $id = $_GET['delid']; // Get the 'delid' parameter from the URL
    
    // Prepare and execute the DELETE query
    $sql = "DELETE FROM registrations WHERE Enroll_ID = '$id'";
    if (mysqli_query($mysqli, $sql)) {
        echo "<script>alert('Record deleted successfully');</script>";
        echo "<script>window.location='All_Users.php';</script>";
    } else {
        echo "<script>alert('Error deleting record: " . mysqli_error($mysqli) . "');</script>";
    }
} 
?>
<br>


    <div class="container">
    <img src="../Images/logo.jpg" alt="" width="90px" height="90px">
  
      <h5>USERS MANAGEMENT</h5>
      <br>
      <section>
      <form>
            <div class="input-group">
                <label for="filter">Filter By Deportment<i class="fas fa-filter"></i></label>
                <select id="filter" name="filter">
                <option >Select Deportment</option>
              <?php
            $role = "SELECT * FROM departments";
            $run = $mysqli->query($role);
            while($stmt = $run->fetch_array()) {
                ?>
                <option value="<?php echo $stmt['id'];?>"><?php echo $stmt['dep_name'];?></option>
              <?php } ?>
                </select>
            </div>
            <div class="input-group">
                <label for="search">Serach By Id <i class="fas fa-search  "></i></label>
                <input type="text" id="search" name="searchid" required>
                <button type="submit"><i class="fas fa-search"></i> Search</button>
            </div>
        </form>
    </section>
    <?php
    if(isset($_GET['searchid'])) {
    // Extract search criteria
    $searchid = $_GET['searchid'];
    $filter = $_GET['filter'];
    // Modify SQL query to filter results based on search criteria
    $select = "SELECT * FROM `registrations` WHERE Enroll_ID LIKE '%$searchid%' and Department_ID LIKE '%$filter%'";
    $sno = 1;
} else {
    // Default SQL query to fetch all records
    $select = "SELECT * FROM `registrations`";
    $sno = 1;
}

// Execute SQL query
$selectrun = $mysqli->query($select);

?>
    
      <div class="table-container">
          <table id="complaintTable">
              <thead>
                  <tr>
                  <th>Sno</th>
                      <th>EnrolL Id</th>
                      <th>Full Name</th>
                      <th>CINC Number</th>
                      <th>Contact Number</th>
                      <th>Actions</th>
                  </tr>
              </thead>
              <tbody>
              <?php
            // Fetch and display records
            while($selectrow = $selectrun->fetch_array()) {
            ?>
                <tr>
                  <td><?php echo $sno ++ ;?></td>
                  <td><?php echo $selectrow['Enroll_ID'];?></td>
                  <td><?php echo $selectrow['Name'];?></td>
                  <td><?php echo $selectrow['CNIC'];?></td>
                  <td><?php echo $selectrow['Contact_No'];?></td>
                  <td>
                      <a href="Ad_Register_Update.php?editid=<?php echo $selectrow['Enroll_ID'];?>" class="action-icon edit" title="Edit">&#9998; Edit</a>
                      <a href="All_Users.php?editid=<?php echo $selectrow['Enroll_ID'];?>" class="action-icon delete">&#128465; Delete</a>
                  </td>
              </tr>
             <?php } ?>
              
              </tbody>
          </table>

          <br>
          <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-end">
              <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
              </li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item">
                <a class="page-link" href="#">Next</a>
              </li>
            </ul>
          </nav>

      </div>
    </div>




    

    <script>

// Example JS functionality to handle status change
document.querySelectorAll('.status-dropdown').forEach(item => {
    item.addEventListener('change', event => {
        // Perform your action when status changes (e.g., update database, change styling)
        console.log('Status changed to: ', event.target.value);
    })
});
var fileInput = document.getElementById('file');
    var selectedFileSpan = document.querySelector('.selected-file');
    var removeIcon = document.querySelector('.remove-icon');

    fileInput.addEventListener('change', function() {
      var fileName = this.files[0].name;
      selectedFileSpan.textContent = '(' + fileName + ')';
      removeIcon.style.display = 'inline'; // Show the remove icon
    });

    removeIcon.addEventListener('click', function() {
      fileInput.value = ''; // Reset the file input
      selectedFileSpan.textContent = ''; // Remove the selected file name display
      removeIcon.style.display = 'none'; // Hide the remove icon
    });
    </script>

  </body>
</html>