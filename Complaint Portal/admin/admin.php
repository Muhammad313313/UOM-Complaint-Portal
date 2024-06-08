<?php include('../includes/config.php');?>
<?php 
if(!isset($_SESSION['adminid'])) {
  echo "<script>window.location='index.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="icon" href="../logo-removebg-preview.PNG" type="">
    <title>UOM Complaint Portal Admin </title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Times New Roman', Times, serif;
            
        }

     
        .chart-row {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .chart-container {
            flex: 1;
            margin: 0 10px;
            height: 300px;
        }

        canvas {
            width: 200px;
            margin: 0 auto;
        }

        .calendar-dropdown {
        position: relative;
        display: inline-block;
    }

    .calendar {
        position: absolute;
        top: 100%;
        left: 0;
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 10px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        display: none;
    }

    .calendar-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 5px;
    }

    .calendar-header button {
        background: none;
        border: none;
        cursor: pointer;
        outline: none;
        font-size: 16px;
    }

    .calendar-body {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        gap: 5px;
    }

    .calendar-body button {
        background: none;
        border: none;
        cursor: pointer;
        outline: none;
        padding: 5px;
        text-align: center;
        width: 30px;
        height: 30px;
    }

        .counterr {
            background-image: url('imagesrecord.jpg');
            opacity: 0.6;
            padding: 80px 0px;
            margin: auto;
            width: 80%;
            height: 50px;
            color: #fff;
            font-weight: 800;
        }

              /* Global styles */
      * {
          box-sizing: border-box;
          margin: 0;
          padding: 0;
      }

      body {
        font-family: 'Times New Roman', Times, serif;
          background-image: url('../BgImage.JPG');
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
          min-height: 50%;
          max-width: 70%;
          margin: 50px auto;
          padding: 5px;
          background-color: #fff;
          border-radius: 10px;
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

    </style>
    
</head>
<body>
    <!-- Navbar -->
    <?php include('../includes/admin_navbar.php');?>
    <?php
     $sql = "SELECT category_name, COUNT(*) AS num_complaints FROM complaint 
        INNER JOIN complaint_category ON complaint.Com_CatId = complaint_category.id
        GROUP BY complaint.Com_CatId";

// Execute query
$result = mysqli_query($mysqli, $sql);

// Initialize arrays to store labels and data
$labels = [];
$data = [];

// Fetch data and store it in arrays
while ($row = mysqli_fetch_assoc($result)) {
    $labels[] = $row['category_name'];
    $data[] = $row['num_complaints'];
}

// Convert arrays to JSON format
$labels_json = json_encode($labels);
$data_json = json_encode($data);
?>

 <br>

 <div class="container">
  <img src="../logo.jpg" alt="" width="90px" height="90px">
  <h2 style="text-align: center;">Admin Dashboard - Complaint Portal</h2>
 
  <br>


<br>
  <!-- Charts -->
  <div class="chart-row">
    
    
      <div class="chart-container ">
          
      <div id="monthFilter">
    <label for="month">Select Month:</label>
    <div class="calendar-dropdown">
        <input type="text" id="month" readonly>
        <div class="calendar">
            <div class="calendar-header">
                <button class="prev-month" onclick="prevMonth()">&lt;</button>
                <span id="currentMonth"></span>
                <button class="next-month" onclick="nextMonth()">&gt;</button>
            </div>
            <div class="calendar-body" id="calendarBody">
                <!-- Calendar days will be populated dynamically here -->
            </div>
        </div>
    </div>
    <button onclick="filterByMonth()">Apply</button>
</div>
       
          <canvas id="complaintsBarChart" style="width: 700px;"></canvas>
          <br>
          <h6 style="text-align: center;">Complaints Category</h6>
      </div>

      
  </div>

  
  <br>



  <?php
      $sql = "SELECT COUNT(Role_ID) AS faculty_members FROM registrations where Role_ID = 1";
      $faculty_member = $mysqli->query($sql);
      $faculty_row = $faculty_member->fetch_assoc();
      $num_faculty_members = $faculty_row['faculty_members'];

      $sql2 = "SELECT COUNT(Role_ID) AS student_members FROM registrations where Role_ID = 2";
      $faculty_member2 = $mysqli->query($sql2);
      $faculty_row2 = $faculty_member2->fetch_assoc();
      $num_faculty_members2 = $faculty_row2['student_members'];

      $sql3 = "SELECT COUNT(Role_ID) AS staff_members FROM registrations where Role_ID = 3";
      $faculty_member3 = $mysqli->query($sql3);
      $faculty_row3 = $faculty_member3->fetch_assoc();
      $num_faculty_members3 = $faculty_row3['staff_members'];
    ?>
  <div class="counterr" style="background-image: url('../imagesrecord.jpg'); opacity: 0.6; padding: 80px 0px; margin: auto; width: 60%; height: 30px; color: #fff; font-weight: 800; display: flex; justify-content: center; align-items: center; flex-wrap: wrap;">
    <span style="margin: 10px; font-size: larger;">Faculty Members &nbsp; &nbsp;<?php echo $faculty_row['faculty_members'];?></span>
    <span style="margin: 10px; font-size: larger;">Total Students &nbsp; &nbsp;<?php echo $faculty_row2['student_members'];?></span>
    <span style="margin: 10px; font-size: larger;">Staff Members &nbsp; &nbsp;<?php echo $faculty_row3['staff_members'];?></span>
</div>
  <br>


</div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Chart data
        const data = {
            labels: <?php echo $labels_json; ?>,
            datasets: [
                {
                    label: 'Number of Items',
                    data: <?php echo $data_json; ?>,
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.5)',
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(75, 192, 192, 0.5)',
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(75, 192, 192, 0.5)', 
                        'rgba(255, 99, 132, 0.5)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 0.5)',
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(75, 192, 192, 0.5)',
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(75, 192, 192, 0.5)', 
                        'rgba(255, 99, 132, 0.5)'
                    ],
                    borderWidth: 1
                }
            ]
        };

        // Chart options
        const options = {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        };

        // Create the bar chart
        const ctx = document.getElementById('complaintsBarChart').getContext('2d');
        const chart = new Chart(ctx, {
            type: 'bar',
            data: data,
            options: options
        });

        // Pie chart data
      
      
        var currentDate = new Date();
    var currentMonth = currentDate.getMonth();
    var currentYear = currentDate.getFullYear();

    function generateCalendar(month, year) {
        var firstDay = new Date(year, month, 1);
        var lastDay = new Date(year, month + 1, 0);
        var daysInMonth = lastDay.getDate();
        var startingDay = firstDay.getDay();
        var monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

        document.getElementById('currentMonth').innerText = monthNames[month] + ' ' + year;

        var calendarBody = document.getElementById('calendarBody');
        calendarBody.innerHTML = '';

        // Add empty cells for the days before the start of the month
        for (var i = 0; i < startingDay; i++) {
            var cell = document.createElement('button');
            cell.disabled = true;
            calendarBody.appendChild(cell);
        }

        // Populate the calendar with days
        for (var i = 1; i <= daysInMonth; i++) {
            var cell = document.createElement('button');
            cell.textContent = i;
            cell.setAttribute('data-day', i);
            cell.addEventListener('click', function () {
                document.getElementById('month').value = ('0' + (currentMonth + 1)).slice(-2) + '/' + ('0' + this.getAttribute('data-day')).slice(-2) + '/' + currentYear;
                document.querySelector('.calendar').style.display = 'none';
            });
            calendarBody.appendChild(cell);
        }
    }

    function prevMonth() {
        currentMonth--;
        if (currentMonth < 0) {
            currentMonth = 11;
            currentYear--;
        }
        generateCalendar(currentMonth, currentYear);
    }

    function nextMonth() {
        currentMonth++;
        if (currentMonth > 11) {
            currentMonth = 0;
            currentYear++;
        }
        generateCalendar(currentMonth, currentYear);
    }

    document.getElementById('month').addEventListener('focus', function () {
        document.querySelector('.calendar').style.display = 'block';
        generateCalendar(currentMonth, currentYear);
    });

    document.addEventListener('click', function (event) {
        var calendarDropdown = document.querySelector('.calendar-dropdown');
        if (!calendarDropdown.contains(event.target)) {
            document.querySelector('.calendar').style.display = 'none';
        }
    });

    function filterByMonth() {
        var selectedMonth = document.getElementById('month').value;
        
        // Perform filtering based on the selected month
        console.log('Selected Month:', selectedMonth);
        
        // AJAX request to fetch complaints data for the selected month
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Handle successful response
                    var response = xhr.responseText;
                    // Update chart with the fetched data
                    updateChart(response);
                } else {
                    // Handle error response
                    console.error('Failed to fetch complaints data');
                }
            }
        };
        xhr.open('POST', 'fetch_complaints.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.send('selectedMonth=' + selectedMonth);
    }
    
    function updateChart(data) {
        // Parse the JSON data
        var parsedData = JSON.parse(data);
        
        // Update chart data and labels
        chart.data.labels = parsedData.labels;
        chart.data.datasets[0].data = parsedData.data;
        
        // Update the chart
        chart.update();
    }
</script>

</body>
</html>
