<?php
    session_start();
    require_once 'config.php';
    include 'sidebar.php';
?>

<!DOCTYPE html>
<html lang="en">
<head >
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" >
    <title>Dashboard1</title>
    <link href='https://css.gg/css' rel='stylesheet'>
    <link href='https://unpkg.com/css.gg/icons/all.css' rel='stylesheet'>
    <link href='https://cdn.jsdelivr.net/npm/css.gg/icons/all.css' rel='stylesheet'>
    
    <style>
        

        .circle {
            width: 40px;
            height: 40px;
            background-color: white;
            border: solid 1px darkcyan;
            border-radius: 100%;
            text-align: center;
            margin-top: 3px;
            margin-bottom: 3px;
            margin-left: 0px;
    
        }
        .card-header {
            margin-top: 0;
            margin-left: 0;
            margin-right: 0;
        }

        #text1 {
            margin-top: 6px;
            
        }

        #floor{
            margin-top: 6px;
            margin-bottom: 6px;
            margin-left: 10px;
        }

        /* #e1f3{
            background-color: gold;

        } */
        th, td {
            text-align: center;
        }
        thead {
            background: white;
            position: sticky;
            top: 0;
    
        }

        th, td {
            padding: 0.25rem;
        }
        .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
        margin-left: 60px;
        }
        .text_switch {
            margin-left: 30px;
        }

        .switch input { 
        opacity: 0;
        width: 0;
        height: 0;
        }

        .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
        }

        .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
        }

 

        /* Rounded sliders */
        .slider.round {
        border-radius: 34px;
        }

        .slider.round:before {
        border-radius: 50%;
        }
        .sidenav {
        height: 100%;
        width: 160px;
        position: fixed;
        z-index: 2;
        top: 10;
        left: 0;
        background-color: #111;
 
        padding-top: 10px;
        }

        .sidenav a {
        padding: 6px 8px 6px 16px;
        text-decoration: none;
        font-size: 17px;
        color: #818181;
        display: block;
        }

        .sidenav a:hover {
        color: #f1f1f1;
        }
        body{
        background-color: rgba(52,53,57,1);
    }
        
    </style>
    <script>
        function getDataFromDb()
        {
            $.ajax({ 
                        url: "get_user_history.php" ,
                        type: "POST",
                        data: ''
                    })
                    .success(function(result) { 
                        var obj = jQuery.parseJSON(result);
                            if(obj != '')
                            {
                                    
                                    $("#myBody").empty();
                                    $.each(obj, function(key, val) {
                                            var tr = "<tr><td scope='row'>"+val["id"]+"</td><td>"+val["name"]+"</td><td>"+val["from"]+"</td><td>"+val["to"]+"</td><td>"+val["date"]+"</td><td><a href='user_history_report.php?user_id="+val["id"]+"' class='btn btn-sm btn-primary'>View</a></td></tr>";

                                            $('#myTable > tbody').append(tr);
                                    });
                                
                            }
        
                    });
        
        }
  
  setInterval(getDataFromDb, 1000);   // 1000 = 1 second
    </script>
</head>
<body >       
<div class="sidenav">
    <a href="usage_history.php">Main</a>
    <a href="Search_form.php">Search</a>
 
    </div>
    <?php
        $check_data = "SELECT * FROM admin_user ";
        $result = $connect->query($check_data);
        $row = $result->fetch_assoc();
        $x = 2;
        
    ?>

            <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4" >

                <h1 class="h2">Dashboard3</h1>
     
                
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <h5 class="card-header">Usage History</h5>
                            <div class="card-body">
                                <div class="table-responsive" style="height: 550px; overflow: auto;">
                                    <table class="table" id="myTable">
                                        <thead>
                                          
                                            <th scope="col" >ID</th>
                                            <th scope="col">Username</th>
                                            <th scope="col">From(Floor)</th>
                                            <th scope="col">To(Floor)</th>
                                            <th scope="col">Date</th>
                                            <th scope="col"></th>
                                            
                                          
                                        </thead>
                                        <tbody id="myBody">
                                          
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
     
            </main>
        </div>
    </div>
    <script>
        $('#e1_select-all').click(function(event) {   
    if(this.checked) {
        // Iterate each checkbox
        $('.e1_checkbox').each(function() {
            this.checked = true;                        
        });
    } else {
        $('.e1_checkbox').each(function() {
            this.checked = false;                       
        });
    }
});
    </script>

     <script>
        $('#e2_select-all').click(function(event) {   
    if(this.checked) {
        // Iterate each checkbox
        $('.e2_checkbox').each(function() {
            this.checked = true;                        
        });
    } else {
        $('.e2_checkbox').each(function() {
            this.checked = false;                       
        });
    }
});
    </script>
    
    <script>
        new Chartist.Line('#traffic-chart', {
            labels: ['January', 'Februrary', 'March', 'April', 'May', 'June'],
            series: [
                [23000, 25000, 19000, 34000, 56000, 64000]
            ]
            }, {
            low: 0,
            showArea: true
        });
    </script>

<script>
feather.replace()
</script>
</body>
</html>

