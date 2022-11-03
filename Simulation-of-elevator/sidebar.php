<?php
    require_once 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> -->
    <style>
        .sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 100;
            padding: 90px 0 0;
            box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
            z-index: 99;
        }
        #navbar {
            position: sticky;
            top: 0;
        }

        @media (max-width: 767.98px) {
            .sidebar {
                top: 11.5rem;
                padding: 0;
            }
        }
            
        .navbar {
            box-shadow: inset 0 -1px 0 rgba(0, 0, 0, .1);
        }

        @media (min-width: 767.98px) {
            .navbar {
                top: 0;
                position: sticky;
                z-index: 999;
            }
        }

        .sidebar .nav-link {
            color: #333;
        }

        .sidebar .nav-link.active {
            color: #0d6efd;
        }

        #submenu {
            border: none;
            background: none;
            /* top: 11.5rem; */
            margin-top: 2px;
        }

     
    </style>
</head>
<body>
<?php
        $check_data = "SELECT * FROM admin_user ";
        $result = $connect->query($check_data);
        $row = $result->fetch_assoc();
        $x = 2;
        
    ?>

<nav id="navbar" class="navbar navbar-light bg-light p-3">
        <div class="d-flex col-12 col-md-3 col-lg-2 mb-2 mb-lg-0 flex-wrap flex-md-nowrap justify-content-between">
            <a class="navbar-brand" href="#">
            Dashboard
            </a>
            <button class="navbar-toggler d-md-none collapsed mb-3" type="button" data-toggle="collapse" data-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <!-- <div class="col-12 col-md-4 col-lg-2">
            <input class="form-control form-control-dark" type="text" placeholder="Search" aria-label="Search">
        </div> -->
        <div class="col-12 col-md-4 col-lg-2">
        <!-- <ul class="nav navbar-nav navbar-right">
      <li class="dropdown">
       <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-pill label-danger count" style="border-radius:10px;"></span> <span class="glyphicon glyphicon-bell" style="font-size:18px;"></span></a>
       <ul class="dropdown-menu"></ul>
      </li>
     </ul> -->
    </div>
        <div class="col-9 col-md-5 col-lg-8 d-flex align-items-center justify-content-md-end mt-3 mt-md-0">
       
            <div class="mr-3 mt-1">
                <!-- <a class="github-button" href="https://github.com/themesberg/simple-bootstrap-5-dashboard" data-color-scheme="no-preference: dark; light: light; dark: light;" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star /themesberg/simple-bootstrap-5-dashboard">Star</a> -->
                <!-- <ul class="nav navbar-nav navbar-right">
                <div class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i data-feather="bell"></i> </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton"></ul>
                </div>
                </ul> -->
                <div class="dropdown">
                <!-- <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false"><span class="count"></span>
                <i data-feather="bell"></i>
                </button> -->
                <!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown" name="count" id="aaa" ><span data-feather="bell"></span><span class="label label-pill label-danger count" style="border-radius:100%; background-color: red;"></span></a> -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="asd" ><i data-feather="bell" id="www"></i><span class="count" style="border-radius:100%; background-color: red;"></span></a>

                <ul class="dropdown-menu" id="dropdown-noti" aria-labelledby="dropdownMenuButton">
                  
                </ul>
                
                </div>
                
            </div>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false" >
                  <?php echo "Hi ".$row["name"].""; ?>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <li><a class="dropdown-item" href="#">Settings</a></li>
                  <li><a class="dropdown-item" href="#">Messages</a></li>
                  <li><a class="dropdown-item" href="logout.php">Sign out</a></li>
                </ul>
              </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                          <a class="nav-link active" aria-current="page" href="dashboard.php">
                          <i data-feather="home"></i>                            
                          <span class="ml-2">Dashboard</span>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="cctv.php">
                          <i data-feather="video"></i>
                          <span class="ml-2">CCTV</span>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="usage_history.php">
                          <i data-feather="info"></i>                            
                          <span class="ml-2">Usage History</span>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="register_form.php">
                          <i data-feather="user-plus"></i>                            
                          <span class="ml-2">Register</span>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="noti.php">
                          <i data-feather="camera"></i>                            
                          <span class="ml-2">Noti</span>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#">
                          <button onclick="myFunctionq()"><i data-feather="camera"></i> </button>                          
                          <span class="ml-2">test</span>
                          </a>
                        </li>
                        <!-- <li class="nav-item">
                          <a class="nav-link" href="#">
                          <i data-feather="camera"></i>                            
                          <span class="ml-2">Integrations</span>
                          </a>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" href="#" id="submenu">
                            <i data-feather="camera"></i>
                            <span class="ml-2">Dropdown</span>
                            <i class="fa fa-caret-down"></i>
                            </button>
                            <ul class="submenu collapse">
                                <li><a class="nav-link" href="#">Submenu item 1 </a></li>
                                <li><a class="nav-link" href="#">Submenu item 2 </a></li>
                                <li><a class="nav-link" href="#">Submenu item 3 </a> </li>
                            </ul>
                        </li> -->
                        <!-- <li class="nav-item">
                            <a class="btn btn-sm btn-secondary ml-3 mt-2" href="https://themesberg.com/blog/bootstrap/simple-bootstrap-5-dashboard-tutorial">
                            <i data-feather="camera"></i>
                            <span class="ml-2">Read tutorial</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-sm btn-warning ml-3 mt-2" href="https://themesberg.com/product/admin-dashboard/volt-bootstrap-5-dashboard">
                                ⚡︎ Volt Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-sm btn-primary ml-3 mt-2" href="https://themesberg.com">
                                By Themesberg ❤️
                            </a>
                        </li> -->
                        
                        

                      </ul>
                </div>
            </nav>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script>
feather.replace()
</script>
<script>
    function myDropFunc() {
  var x = document.getElementById("demoDrop");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
    x.previousElementSibling.className += " w3-green";
  } else { 
    x.className = x.className.replace(" w3-show", "");
    x.previousElementSibling.className = 
    x.previousElementSibling.className.replace(" w3-green", "");
  }
}
</script>
<script>
    document.addEventListener("DOMContentLoaded", function(){
  document.querySelectorAll('.sidebar .nav-link').forEach(function(element){
    
    element.addEventListener('click', function (e) {

      let nextEl = element.nextElementSibling;
      let parentEl  = element.parentElement;	

        if(nextEl) {
            e.preventDefault();	
            let mycollapse = new bootstrap.Collapse(nextEl);
            
            if(nextEl.classList.contains('show')){
              mycollapse.hide();
            } else {
                mycollapse.show();
                // find other submenus with class=show
                var opened_submenu = parentEl.parentElement.querySelector('.submenu.show');
                // if it exists, then close all of them
                if(opened_submenu){
                  new bootstrap.Collapse(opened_submenu);
                }
            }
        }
    }); // addEventListener
  }) // forEach
}); 
</script>

</body>
</html>

<script>
$(document).ready(function(){
 
 function load_unseen_notification(view = '')
 {
  $.ajax({
   url:"fetch.php",
   method:"POST",
   data:{view:view},
   dataType:"json",
   success:function(data)
   {
    $('#dropdown-noti').html(data.notification);
    if(data.unseen_notification > 0)
    {
     $('.count').html(data.unseen_notification);
    }
   }
  });
 }
 
 load_unseen_notification();
 
 $('#comment_form').on('submit', function(event){
  event.preventDefault();
  if($('#subject').val() != '' && $('#comment').val() != '')
  {
   var form_data = $(this).serialize();
   $.ajax({
    url:"insert.php",
    method:"POST",
    data:form_data,
    success:function(data)
    {
     $('#comment_form')[0].reset();
     load_unseen_notification();
    }
   });
  }
  else
  {
   alert("Both Fields are Required");
  }
 });
 
 $(document).on('change', '#asd', function(){
  $('.count').html('');
  load_unseen_notification('yes');
 });
 
 setInterval(function(){ 
  load_unseen_notification();; 
 }, 1000);
 
});
</script>

