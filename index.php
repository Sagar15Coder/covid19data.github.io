<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <?php include 'css/style.php'; ?>
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
</head>

<body onload="fetchData()">

<?php include 'menu.php'; ?>
<div class="main_header">
  <div class="row w-100 h-100">
    <div class="col-lg-4 col-md-4 col-12 order-lg-1 order-2">
        <div class="leftside w-100 h-100 d-flex justify-content-center align-items-center">
          <img src="images/covid19.png" width="250" height="250"/>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-12 order-lg-2 order-1">
      <div class ="midside w-100 h-100 d-flex justify-content-center align-items-center">
        <img src="images/imgSD.png" width="400" height="250"/>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-12 order-lg-3 order-3">
      <div class ="rightside w-100 h-100 d-flex justify-content-center align-items-center">
        <img src="images/imginfo.jpg" width="450" height="250"/>
      </div>
    </div>
  </div>
</div>

<section class="corona-data">
  <div class="mb-3">
    <h3 class="text-uppercase text-center">Covid-19 Data</h3>
  </div>
  <br>
  <div class="d-flex justify-content-around align-items-center">
    <div>
      <h1 id="tcases" class="count"></h1>
      <p>Total coronavirus cases</p>
    </div>
    <div>
      <h1 id="tdeaths" class="count"></h1>
      <p>Total deaths</p>
    </div>
    <div>
      <h1 id="trecovered" class="count"></h1>
      <p>Total recovered cases</p>
    </div>
    <div>
      <h1 id="tactive" class="count"></h1>
      <p>Total active cases</p>
    </div>
  </div>
</section>
<br>
<br>

<br>
    <div class="container-fluid table-responsive">
    <table class="table table-bordered table-striped text-center" id="tbid">
    <tr>
        <th>Country</th>
        <th>Total Confirmed</th>
        <th>Total Recovered</th>
        <th>Total Deaths</th>
        <th>New Confirmed</th>
        <th>New Recovered</th>
        <th>New Deaths</th>
    </tr>
    </table>
    </div>
   
    <footer class="footer mt-5">
        <h6 class="text-center bg-dark text-white container-fluid">Copyright C 2020 - All rights reserved -</h6>
    </footer>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.0/jquery.waypoints.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js">
    </script>
    <script>
    
    function fetchData() {
        $.get("https://api.covid19api.com/summary",
        function(data){
            var tcases = document.getElementById('tcases');
            tcases.textContent = data['Global']['TotalConfirmed'];
            var tdeaths = document.getElementById('tdeaths');
            tdeaths.textContent = data['Global']['TotalDeaths'];
            var trecovered = document.getElementById('trecovered');
            trecovered.textContent = data['Global']['TotalRecovered'];
            var tactive = document.getElementById('tactive');
            tactive.textContent = data['Global']['TotalConfirmed']-(data['Global']['TotalDeaths'] + data['Global']['TotalRecovered']);

            //console.log(data['Countries'].length);})
            var tbl = document.getElementById('tbid');

            for(var i=0; i<(data['Countries'].length); i++){
                var row = tbl.insertRow();
                row.insertCell(0);

                tbl.rows[i+1].cells[0].innerHTML = data['Countries'][i]['Country'];
                //tbl.rows[i+1].cells[0].style.background = 'red';
                row.insertCell(1);

                tbl.rows[i+1].cells[1].innerHTML = data['Countries'][i]['TotalConfirmed'];

                row.insertCell(2);

                tbl.rows[i+1].cells[2].innerHTML = data['Countries'][i]['TotalRecovered'];

                row.insertCell(3);

                tbl.rows[i+1].cells[3].innerHTML = data['Countries'][i]['TotalDeaths'];

                row.insertCell(4);

                tbl.rows[i+1].cells[4].innerHTML = data['Countries'][i]['NewConfirmed'];

                row.insertCell(5);

                tbl.rows[i+1].cells[5].innerHTML = data['Countries'][i]['NewRecovered'];

                row.insertCell(6);

                tbl.rows[i+1].cells[6].innerHTML = data['Countries'][i]['NewDeaths'];
            }
        }
        );
          
        
    }
    
    
    
    </script>
    
</body>
</html>