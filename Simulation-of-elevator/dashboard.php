<?php
    session_start();
    require_once 'config.php';
    include 'sidebar.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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

        input:checked + .slider {
        background-color: green;
        }

        input:focus + .slider {
        box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
        border-radius: 34px;
        }

        .slider.round:before {
        border-radius: 50%;
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
<body>
    <?php
        $check_data = "SELECT * FROM admin_user ";
        $result = $connect->query($check_data);
        $row = $result->fetch_assoc();
        $x = 2;
        
    ?>
    
            <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4" >
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Overview</li>
                    </ol>
                </nav>
                <h1 class="h2">Dashboard</h1>
                <!-- <p>This is the homepage of a simple admin interface which is part of a tutorial written on Themesberg</p> -->
                <div class="row my-4" style="border: solid none;">
                    <div class="col-12 col-md-6 col-lg-3 mb-4 mb-lg-0" >
                        <div class="card" >
                            <h5 class="card-header">Status</h5>
                            <div class="card-body">
                              <h5 class="card-title"></h5>
                              <p class="card-text">Floor 1
                                <label class="switch">
                                <input type="checkbox" class="e1_checkbox" checked>
                                <span class="slider round"></span>
                                </label>
                              </p>
                              <p class="card-text">Floor 2
                                <label class="switch">
                                <input type="checkbox" class="e1_checkbox" checked>
                                <span class="slider round"></span>
                                </label>
                              </p>
                              <p class="card-text">Floor 3
                                <label class="switch">
                                <input type="checkbox" class="e1_checkbox" checked>
                                <span class="slider round"></span>
                                </label>
                              </p>
                              <p class="card-text">Floor 4
                                <label class="switch">
                                <input type="checkbox" class="e1_checkbox" checked>
                                <span class="slider round"></span>
                                </label>
                              </p>
                              <p class="card-text">Close All
                              <label class="switch" style="margin-left: 50px;">
                                <input type="checkbox" id="e1_select-all" checked>
                                <span class="slider round"></span>
                                </label>
                              </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 mb-4 mb-lg-0 col-lg-3">
                    <div class="card">
                            <h5 class="card-header">Status</h5>
                            <div class="card-body">
                              <h5 class="card-title"></h5>
                              <p class="card-text">Floor 1
                                <label class="switch">
                                <input type="checkbox" class="e2_checkbox" checked>
                                <span class="slider round"></span>
                                </label>
                              </p>
                              <p class="card-text">Floor 2
                                <label class="switch">
                                <input type="checkbox" class="e2_checkbox" checked>
                                <span class="slider round"></span>
                                </label>
                              </p>
                              <p class="card-text">Floor 3
                                <label class="switch">
                                <input type="checkbox" class="e2_checkbox" checked>
                                <span class="slider round"></span>
                                </label>
                              </p>
                              <p class="card-text">Floor 4
                                <label class="switch">
                                <input type="checkbox" class="e2_checkbox" checked>
                                <span class="slider round"></span>
                                </label>
                              </p>
                              <p class="card-text">Close All
                              <label class="switch" style="margin-left: 50px;">
                                <input type="checkbox" id="e2_select-all" checked>
                                <span class="slider round"></span>
                                </label>
                              </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 mb-4 mb-lg-0 col-lg-3" style="border: solid none;">
                        <div class="row" style="border: solid none;">
                        <div class="card ">
                            <h5 class="card-header" style="background-color: none;">Elevator 1</h5>
                            <div class="row" id="floor">
                                    <div class="col-3" >
                                        <div class="floor"><div id="text1">Floor</div></div>  
                                    </div>
                                    <?php
                                        if ($x == 1){
                                            echo '  
                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f1" style="background-color: gold;"><div id="text1">1</div></div>  
                                                    </div>

                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f2"><div id="text1">2</div></div>  
                                                    </div>

                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f3"><div id="text1">3</div></div>  
                                                    </div>

                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f4"><div id="text1">4</div></div>  
                                                    </div>
                                                    ';
                                        }
                                        elseif($x == 2){
                                            echo '  
                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f1"><div id="text1">1</div></div>  
                                                    </div>

                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f2" style="background-color: gold;"><div id="text1">2</div></div>  
                                                    </div>
                                                    
                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f3"><div id="text1">3</div></div>  
                                                    </div>

                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f4"><div id="text1">4</div></div>  
                                                    </div>
                                                    ';
                                        }
                                        elseif($x == 3){
                                            echo '  
                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f1"><div id="text1">1</div></div>  
                                                    </div>

                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f2"><div id="text1">2</div></div>  
                                                    </div>

                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f3" style="background-color: gold;"><div id="text1">3</div></div>  
                                                    </div>

                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f4"><div id="text1">4</div></div>  
                                                    </div>
                                                    ';
                                        }
                                        elseif($x == 4){
                                            echo '  
                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f1"><div id="text1">1</div></div>  
                                                    </div>

                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f2"><div id="text1">2</div></div>  
                                                    </div>

                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f3"><div id="text1">3</div></div>  
                                                    </div>

                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f4" style="background-color: gold;"><div id="text1">4</div></div>  
                                                    </div>
                                                    ';
                                        }
                                        else{
                                            echo '  
                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f1"><div id="text1">1</div></div>  
                                                    </div>

                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f2"><div id="text1">2</div></div>  
                                                    </div>

                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f3"><div id="text1">3</div></div>  
                                                    </div>

                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f4"><div id="text1">4</div></div>  
                                                    </div>                                            
                                                    ';
                                        }
                                    ?>
                                    <!-- <div class="col-2" >
                                        <div class="circle" id="e1f1"><div id="text1">1</div></div>  
                                    </div>

                                    <div class="col-2" >
                                        <div class="circle" id="e1f2"><div id="text1">2</div></div>  
                                    </div>

                                    <div class="col-2" >
                                        <div class="circle" id="e1f3"><div id="text1">3</div></div>  
                                    </div>

                                    <div class="col-2" >
                                        <div class="circle" id="e1f4"><div id="text1">4</div></div>
                                    </div> -->
                                
                            </div> 
                        </div>
                        </div>

                        <div class="row" style="border: solid none; margin-top: 5px;">
                        <div class="card ">
                            <h5 class="card-header">Elevator 1</h5>
                            <div class="row" id="floor">
                                    <div class="col-3" >
                                        <div class="floor"><div id="text1">Active</div></div>  
                                    </div>
                                    <?php
                                        if ($x == 1){
                                            echo '  
                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f1" style="background-color: gold;"><div id="text1">1</div></div>  
                                                    </div>

                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f2"><div id="text1">2</div></div>  
                                                    </div>

                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f3"><div id="text1">3</div></div>  
                                                    </div>

                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f4"><div id="text1">4</div></div>  
                                                    </div>
                                                    ';
                                        }
                                        elseif($x == 2){
                                            echo '  
                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f1"><div id="text1">1</div></div>  
                                                    </div>

                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f2" style="background-color: gold;"><div id="text1">2</div></div>  
                                                    </div>
                                                    
                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f3"><div id="text1">3</div></div>  
                                                    </div>

                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f4"><div id="text1">4</div></div>  
                                                    </div>
                                                    ';
                                        }
                                        elseif($x == 3){
                                            echo '  
                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f1"><div id="text1">1</div></div>  
                                                    </div>

                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f2"><div id="text1">2</div></div>  
                                                    </div>

                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f3" style="background-color: gold;"><div id="text1">3</div></div>  
                                                    </div>

                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f4"><div id="text1">4</div></div>  
                                                    </div>
                                                    ';
                                        }
                                        elseif($x == 4){
                                            echo '  
                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f1"><div id="text1">1</div></div>  
                                                    </div>

                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f2"><div id="text1">2</div></div>  
                                                    </div>

                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f3"><div id="text1">3</div></div>  
                                                    </div>

                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f4" style="background-color: gold;"><div id="text1">4</div></div>  
                                                    </div>
                                                    ';
                                        }
                                        else{
                                            echo '  
                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f1"><div id="text1">1</div></div>  
                                                    </div>

                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f2"><div id="text1">2</div></div>  
                                                    </div>

                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f3"><div id="text1">3</div></div>  
                                                    </div>

                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f4"><div id="text1">4</div></div>  
                                                    </div>                                            
                                                    ';
                                        }
                                    ?>
                                    <!-- <div class="col-2" >
                                        <div class="circle" id="e1f1"><div id="text1">1</div></div>  
                                    </div>

                                    <div class="col-2" >
                                        <div class="circle" id="e1f2"><div id="text1">2</div></div>  
                                    </div>

                                    <div class="col-2" >
                                        <div class="circle" id="e1f3"><div id="text1">3</div></div>  
                                    </div>

                                    <div class="col-2" >
                                        <div class="circle" id="e1f4"><div id="text1">4</div></div>
                                    </div> -->
                                
                            </div> 
                        </div>
                        </div>
                        <div class="row" style="border: solid none; margin-top: 5px;">
                        <div class="card ">
                            <h5 class="card-header">Elevator 1</h5>
                            <div class="row" id="floor">
                                    <div class="col-3" >
                                        <div class="floor"><div id="text1">Active</div></div>  
                                    </div>
                                    <?php
                                        if ($x == 1){
                                            echo '  
                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f1" style="background-color: gold;"><div id="text1">1</div></div>  
                                                    </div>

                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f2"><div id="text1">2</div></div>  
                                                    </div>

                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f3"><div id="text1">3</div></div>  
                                                    </div>

                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f4"><div id="text1">4</div></div>  
                                                    </div>
                                                    ';
                                        }
                                        elseif($x == 2){
                                            echo '  
                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f1"><div id="text1">1</div></div>  
                                                    </div>

                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f2" style="background-color: gold;"><div id="text1">2</div></div>  
                                                    </div>
                                                    
                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f3"><div id="text1">3</div></div>  
                                                    </div>

                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f4"><div id="text1">4</div></div>  
                                                    </div>
                                                    ';
                                        }
                                        elseif($x == 3){
                                            echo '  
                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f1"><div id="text1">1</div></div>  
                                                    </div>

                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f2"><div id="text1">2</div></div>  
                                                    </div>

                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f3" style="background-color: gold;"><div id="text1">3</div></div>  
                                                    </div>

                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f4"><div id="text1">4</div></div>  
                                                    </div>
                                                    ';
                                        }
                                        elseif($x == 4){
                                            echo '  
                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f1"><div id="text1">1</div></div>  
                                                    </div>

                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f2"><div id="text1">2</div></div>  
                                                    </div>

                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f3"><div id="text1">3</div></div>  
                                                    </div>

                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f4" style="background-color: gold;"><div id="text1">4</div></div>  
                                                    </div>
                                                    ';
                                        }
                                        else{
                                            echo '  
                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f1"><div id="text1">1</div></div>  
                                                    </div>

                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f2"><div id="text1">2</div></div>  
                                                    </div>

                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f3"><div id="text1">3</div></div>  
                                                    </div>

                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f4"><div id="text1">4</div></div>  
                                                    </div>                                            
                                                    ';
                                        }
                                    ?>
                                    <!-- <div class="col-2" >
                                        <div class="circle" id="e1f1"><div id="text1">1</div></div>  
                                    </div>

                                    <div class="col-2" >
                                        <div class="circle" id="e1f2"><div id="text1">2</div></div>  
                                    </div>

                                    <div class="col-2" >
                                        <div class="circle" id="e1f3"><div id="text1">3</div></div>  
                                    </div>

                                    <div class="col-2" >
                                        <div class="circle" id="e1f4"><div id="text1">4</div></div>
                                    </div> -->
                                
                            </div> 
                        </div>
                        </div>
                    
                    </div>

                    <div class="col-12 col-md-6 mb-4 mb-lg-0 col-lg-3" style="border: solid none; ">
                        <div class="row" style="border: solid none;  margin-left: 3px;">
                        <div class="card ">
                            <h5 class="card-header">Elevator 2</h5>
                            <div class="row" id="floor">
                                    <div class="col-3" >
                                        <div class="floor"><div id="text1">Floor</div></div>  
                                    </div>
                                    <?php
                                        if ($x == 1){
                                            echo '  
                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f1" style="background-color: gold;"><div id="text1">1</div></div>  
                                                    </div>

                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f2"><div id="text1">2</div></div>  
                                                    </div>

                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f3"><div id="text1">3</div></div>  
                                                    </div>

                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f4"><div id="text1">4</div></div>  
                                                    </div>
                                                    ';
                                        }
                                        elseif($x == 2){
                                            echo '  
                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f1"><div id="text1">1</div></div>  
                                                    </div>

                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f2" style="background-color: gold;"><div id="text1">2</div></div>  
                                                    </div>
                                                    
                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f3"><div id="text1">3</div></div>  
                                                    </div>

                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f4"><div id="text1">4</div></div>  
                                                    </div>
                                                    ';
                                        }
                                        elseif($x == 3){
                                            echo '  
                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f1"><div id="text1">1</div></div>  
                                                    </div>

                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f2"><div id="text1">2</div></div>  
                                                    </div>

                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f3" style="background-color: gold;"><div id="text1">3</div></div>  
                                                    </div>

                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f4"><div id="text1">4</div></div>  
                                                    </div>
                                                    ';
                                        }
                                        elseif($x == 4){
                                            echo '  
                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f1"><div id="text1">1</div></div>  
                                                    </div>

                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f2"><div id="text1">2</div></div>  
                                                    </div>

                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f3"><div id="text1">3</div></div>  
                                                    </div>

                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f4" style="background-color: gold;"><div id="text1">4</div></div>  
                                                    </div>
                                                    ';
                                        }
                                        else{
                                            echo '  
                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f1"><div id="text1">1</div></div>  
                                                    </div>

                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f2"><div id="text1">2</div></div>  
                                                    </div>

                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f3"><div id="text1">3</div></div>  
                                                    </div>

                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f4"><div id="text1">4</div></div>  
                                                    </div>                                            
                                                    ';
                                        }
                                    ?>
                                    <!-- <div class="col-2" >
                                        <div class="circle" id="e1f1"><div id="text1">1</div></div>  
                                    </div>

                                    <div class="col-2" >
                                        <div class="circle" id="e1f2"><div id="text1">2</div></div>  
                                    </div>

                                    <div class="col-2" >
                                        <div class="circle" id="e1f3"><div id="text1">3</div></div>  
                                    </div>

                                    <div class="col-2" >
                                        <div class="circle" id="e1f4"><div id="text1">4</div></div>
                                    </div> -->
                                
                            </div> 
                        </div>
                        </div>

                        <div class="row" style="border: solid none; margin-top: 5px; margin-left: 3px;">
                        <div class="card ">
                            <h5 class="card-header">Elevator 2</h5>
                            <div class="row" id="floor">
                                    <div class="col-3" >
                                        <div class="floor"><div id="text1">Active</div></div>  
                                    </div>
                                    <?php
                                        if ($x == 1){
                                            echo '  
                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f1" style="background-color: gold;"><div id="text1">1</div></div>  
                                                    </div>

                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f2"><div id="text1">2</div></div>  
                                                    </div>

                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f3"><div id="text1">3</div></div>  
                                                    </div>

                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f4"><div id="text1">4</div></div>  
                                                    </div>
                                                    ';
                                        }
                                        elseif($x == 2){
                                            echo '  
                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f1"><div id="text1">1</div></div>  
                                                    </div>

                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f2" style="background-color: gold;"><div id="text1">2</div></div>  
                                                    </div>
                                                    
                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f3"><div id="text1">3</div></div>  
                                                    </div>

                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f4"><div id="text1">4</div></div>  
                                                    </div>
                                                    ';
                                        }
                                        elseif($x == 3){
                                            echo '  
                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f1"><div id="text1">1</div></div>  
                                                    </div>

                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f2"><div id="text1">2</div></div>  
                                                    </div>

                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f3" style="background-color: gold;"><div id="text1">3</div></div>  
                                                    </div>

                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f4"><div id="text1">4</div></div>  
                                                    </div>
                                                    ';
                                        }
                                        elseif($x == 4){
                                            echo '  
                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f1"><div id="text1">1</div></div>  
                                                    </div>

                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f2"><div id="text1">2</div></div>  
                                                    </div>

                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f3"><div id="text1">3</div></div>  
                                                    </div>

                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f4" style="background-color: gold;"><div id="text1">4</div></div>  
                                                    </div>
                                                    ';
                                        }
                                        else{
                                            echo '  
                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f1"><div id="text1">1</div></div>  
                                                    </div>

                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f2"><div id="text1">2</div></div>  
                                                    </div>

                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f3"><div id="text1">3</div></div>  
                                                    </div>

                                                    <div class="col-2" >
                                                        <div class="circle" id="e1f4"><div id="text1">4</div></div>  
                                                    </div>                                            
                                                    ';
                                        }
                                    ?>
                                    <!-- <div class="col-2" >
                                        <div class="circle" id="e1f1"><div id="text1">1</div></div>  
                                    </div>

                                    <div class="col-2" >
                                        <div class="circle" id="e1f2"><div id="text1">2</div></div>  
                                    </div>

                                    <div class="col-2" >
                                        <div class="circle" id="e1f3"><div id="text1">3</div></div>  
                                    </div>

                                    <div class="col-2" >
                                        <div class="circle" id="e1f4"><div id="text1">4</div></div>
                                    </div> -->
                                
                            </div> 
                        </div>
                        </div>
                        <!-- <div class="row" style="border: solid none; margin-top: 5px; margin-left: 3px;">
                        <div class="card ">
                            <h5 class="card-header">Elevator 2</h5>
                            <div class="row" id="floor">
                                    <div class="col-3" >
                                        <div class="floor" ><i data-feather="arrow-up" ></i></div>  
                                    </div> -->
                                    <?php
                                        // if ($x == 1){
                                        //     echo '  
                                        //             <div class="col-2" >
                                        //                 <div class="circle" id="e1f1" style="background-color: gold;"><div id="text1">1</div></div>  
                                        //             </div>

                                        //             <div class="col-2" >
                                        //                 <div class="circle" id="e1f2"><div id="text1">2</div></div>  
                                        //             </div>

                                        //             <div class="col-2" >
                                        //                 <div class="circle" id="e1f3"><div id="text1">3</div></div>  
                                        //             </div>

                                        //             <div class="col-2" >
                                        //                 <div class="circle" id="e1f4"><div id="text1">4</div></div>  
                                        //             </div>
                                        //             ';
                                        // }
                                        // elseif($x == 2){
                                        //     echo '  
                                        //             <div class="col-2" >
                                        //                 <div class="circle" id="e1f1"><div id="text1">1</div></div>  
                                        //             </div>

                                        //             <div class="col-2" >
                                        //                 <div class="circle" id="e1f2" style="background-color: gold;"><div id="text1">2</div></div>  
                                        //             </div>
                                                    
                                        //             <div class="col-2" >
                                        //                 <div class="circle" id="e1f3"><div id="text1">3</div></div>  
                                        //             </div>

                                        //             <div class="col-2" >
                                        //                 <div class="circle" id="e1f4"><div id="text1">4</div></div>  
                                        //             </div>
                                        //             ';
                                        // }
                                        // elseif($x == 3){
                                        //     echo '  
                                        //             <div class="col-2" >
                                        //                 <div class="circle" id="e1f1"><div id="text1">1</div></div>  
                                        //             </div>

                                        //             <div class="col-2" >
                                        //                 <div class="circle" id="e1f2"><div id="text1">2</div></div>  
                                        //             </div>

                                        //             <div class="col-2" >
                                        //                 <div class="circle" id="e1f3" style="background-color: gold;"><div id="text1">3</div></div>  
                                        //             </div>

                                        //             <div class="col-2" >
                                        //                 <div class="circle" id="e1f4"><div id="text1">4</div></div>  
                                        //             </div>
                                        //             ';
                                        // }
                                        // elseif($x == 4){
                                        //     echo '  
                                        //             <div class="col-2" >
                                        //                 <div class="circle" id="e1f1"><div id="text1">1</div></div>  
                                        //             </div>

                                        //             <div class="col-2" >
                                        //                 <div class="circle" id="e1f2"><div id="text1">2</div></div>  
                                        //             </div>

                                        //             <div class="col-2" >
                                        //                 <div class="circle" id="e1f3"><div id="text1">3</div></div>  
                                        //             </div>

                                        //             <div class="col-2" >
                                        //                 <div class="circle" id="e1f4" style="background-color: gold;"><div id="text1">4</div></div>  
                                        //             </div>
                                        //             ';
                                        // }
                                        // else{
                                        //     echo '  
                                        //             <div class="col-2" >
                                        //                 <div class="circle" id="e1f1"><div id="text1">1</div></div>  
                                        //             </div>

                                        //             <div class="col-2" >
                                        //                 <div class="circle" id="e1f2"><div id="text1">2</div></div>  
                                        //             </div>

                                        //             <div class="col-2" >
                                        //                 <div class="circle" id="e1f3"><div id="text1">3</div></div>  
                                        //             </div>

                                        //             <div class="col-2" >
                                        //                 <div class="circle" id="e1f4"><div id="text1">4</div></div>  
                                        //             </div>                                            
                                        //             ';
                                        // }
                                    ?>
                                    <!-- <div class="col-2" >
                                        <div class="circle" id="e1f1"><div id="text1">1</div></div>  
                                    </div>

                                    <div class="col-2" >
                                        <div class="circle" id="e1f2"><div id="text1">2</div></div>  
                                    </div>

                                    <div class="col-2" >
                                        <div class="circle" id="e1f3"><div id="text1">3</div></div>  
                                    </div>

                                    <div class="col-2" >
                                        <div class="circle" id="e1f4"><div id="text1">4</div></div>
                                    </div> -->
                                
                            </div> 
                        </div>
                        </div>
                    </div>
                                    
                </div>
                
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <h5 class="card-header">Usage History</h5>
                            <div class="card-body">
                                <div class="table-responsive" style="height: 200px; overflow: auto;">
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
                                <a href="usage_history.php" class="btn btn-block btn-light">View all</a>
                                <!-- Scrollable modal -->





                            </div>
                        </div>
                    </div>
                </div>
                    <!-- <div class="col-12 col-xl-4">
                        <div class="card">
                            <h5 class="card-header">Traffic last 6 months</h5>
                            <div class="card-body">
                                <div id="traffic-chart"></div>
                            </div>
                        </div>
                    </div>
                </div> -->

  
                <!-- <footer class="pt-5 d-flex justify-content-between">
                    <span>Copyright © 2019-2020 <a href="https://themesberg.com">Themesberg</a></span>
                    <ul class="nav m-0">
                        <li class="nav-item">
                          <a class="nav-link text-secondary" aria-current="page" href="#">Privacy Policy</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link text-secondary" href="#">Terms and conditions</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link text-secondary" href="#">Contact</a>
                        </li>
                      </ul>
                </footer> -->
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

