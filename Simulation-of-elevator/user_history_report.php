<?php
  include "sidebar.php";
  require_once "config.php";
?>


<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User History</title>
        <link href='https://css.gg/css' rel='stylesheet'>
    <link href='https://unpkg.com/css.gg/icons/all.css' rel='stylesheet'>
    <link href='https://cdn.jsdelivr.net/npm/css.gg/icons/all.css' rel='stylesheet'>

        <!-- <script>
        function getDataFromDb()
        {
            $.ajax({ 
                        url: "get_history_report.php" ,
                        type: "POST",
                        data: ''
                    })
                    .success(function(result) { 
                        var obj = jQuery.parseJSON(result);
                            if(obj != '')
                            {
                                    
                                    $("#myBody").empty();
                                    $.each(obj, function(key, val) {
                                            var tr = "<tr><td scope='row'>"+val["id"]+"</td><td>"+val["name"]+"</td><td>"+val["from"]+"</td><td>"+val["to"]+"</td><td>"+val["date"]+"</td></tr>";

                                            $('#myTable > tbody').append(tr);
                                    });
                                
                            }
        
                    });
        
        }
  
        setInterval(getDataFromDb, 1000);   // 1000 = 1 second
    </script> -->
    <style>
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
        .card-header {
            margin-top: 0;
            margin-left: 0;
            margin-right: 0;
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
    </head>
    <body>
    <div class="sidenav">
    <a href="usage_history.php">Main</a>
    <a href="Search_form.php">Search</a>
    </div>
        <?php
            if (isset($_REQUEST['user_id'])){
                $user_id = $_REQUEST['user_id'];
                $sql = "SELECT * FROM user_history WHERE id = $user_id ORDER BY date DESC";
                $result = $connect->query($sql);
                //$intNumField = $result->num_fields();
                $resultArray = array();
                $historyArray = array();
                $fieldinfo = $result -> fetch_fields();
                $arrCol = array();
                   while($row = $result->fetch_assoc())
                   {
                       $id = $row['id'];
                       $name = $row['name'];
                       $from = $row['from'];
                       $to = $row['to'];
                       $date = $row['date'];
                       $resultArray[] = array("id" => $id, "name" => $name, "from" => $from, "to" => $to, "date" => $date); 
                   }
                } 
        ?>
    <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4" >
    <div class="row">
                    <div class="col">
                        <div class="card">
                            <h5 class="card-header"><?php echo "<b>$user_id</b>"; ?> Usage History </h5>
                            <div class="card-body">
                                <div class="table-responsive" style="height: 200px; overflow: auto;">
                                    <table class="table" id="myTable">
                                        <thead>
                                          
                                            <th scope="col" >ID</th>
                                            <th scope="col">Username</th>
                                            <th scope="col">From(Floor)</th>
                                            <th scope="col">To(Floor)</th>
                                            <th scope="col">Date</th>
                                        
                                            
                                          
                                        </thead>
                                        <tbody id="myBody">
                                          <?php
                                           if (isset($_REQUEST['user_id'])){
                                            $user_id = $_REQUEST['user_id'];
                                            
                                            $sql = "SELECT * FROM user_history WHERE id = $user_id ORDER BY date DESC";
                                            $result = $connect->query($sql);
                                            //$intNumField = $result->num_fields();
                                            $resultArray = array();
                                            $historyArray = array();
                                            $fieldinfo = $result -> fetch_fields();
                                            $arrCol = array();
                                               while($row = $result->fetch_assoc())
                                               {
                                                   $id = $row['id'];
                                                   $name = $row['name'];
                                                   $from = $row['from'];
                                                   $to = $row['to'];
                                                   $date = $row['date'];
                                           
                                                   $resultArray[] = array("id" => $id, "name" => $name, "from" => $from, "to" => $to, "date" => $date); 

                                                   echo "
                                                        <tr>
                                                            <td>".$row['id']."</td>
                                                            <td>".$row['name']."</td>
                                                            <td>".$row['from']."</td>
                                                            <td>".$row['to']."</td>
                                                            <td>".$row['date']."</td>
                                                        </tr>
                                                        ";
                                           
                                                   
                                               }
                                            }        
                                          ?>
                                        </tbody>
                                    </table>
                                </div>
                            
                                <!-- Scrollable modal -->





                            </div>
                        </div>
                    </div>
                </div>
                                        </main>
    </body>
    </html>

   

