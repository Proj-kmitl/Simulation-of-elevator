<?php	
    require_once 'config.php';
	include 'sidebar.php';
	//include "nav.php";
	date_default_timezone_set('Asia/Bangkok');
	ini_set('mysql.connect_timeout', 300);
    ini_set('default_socket_timeout', 300);
?>	

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Register</title>
	<style>	
		.card-body-server {
			height: 580px;
			overflow-y: scroll;
			
		}
		input, select {
			margin-bottom: 10px;
		}
		button {
			margin-top: 10px;
		}

		#productDisplay {
			border-radius: 100%;
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



        @media screen and (max-height: 450px) {
        .sidenav {padding-top: 15px;}
        .sidenav a {font-size: 18px;}
        }
	</style>

<script>
  
  function getDataFromDb()
  {
      $.ajax({ 
                  url: "get_rfid_data.php" ,
                  type: "POST",
                  data: ''
              })
              .success(function(result) { 
                  var obj = jQuery.parseJSON(result);
                      if(obj != '')
                      {
                            //$("#myTable tbody tr:not(:first-child)").remove();
                            /*$("#myBody").empty();
                            $.each(obj, function(key, val) {
                                      var tr = "<tr>";
                                      tr = tr + "<td>" + val["RFID_ID"] + "</td>";
                                      tr = tr + "</tr>";
                                      $('#myTable > tbody').append(tr);
                            });*/
                            $("#myBody").empty();
                            $.each(obj, function(key, val) {
                                      var tr = "<input type='text' name='rfid_text' id='rfid_text' class='form-control' value='"+val["RFID_ID"]+" '>";
                                      
                                      $('#myRFID > span').append(tr);
                            });
                           
                      }
  
              });
  
  }
  
  setInterval(getDataFromDb, 100);   // 1000 = 1 second
</script>
</head>
<body class="font-mali" >
<div class="sidenav">
    <a href="account.php">Main</a>
    <a href="register_form.php">Add Account</a>
    <a href="edit_form.php">Edit Account</a>
    </div>
<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">

                


				<div class="container mb-2" style="width:60%;">
		<div class="row mt-2 ">
			<div class="col" >
				<div class="card">
					<center><h4 class="card-header bg-danger text-white">Add Users</h4></center>
					<div class="card-body">
						<form action="register.php" method="POST" enctype="multipart/form-data">
							<div class="form-group mb-5">
								<center><img src="image/placeholder.png" width = "200" hieght="200" onclick="triggerClick()" id="productDisplay"><br></center>
							<label for="productImage" hidden>รูปภาพ</label>
								<input type="file" name="image" class="form-control" id="image" accept = "image/*" onchange="displayImage(this) " hidden>
							</div>	
                            <div class="form-group" id="myRFID" >
                                <label for="">รหัส RFID</label>
                                

                                    <span id="myBody"></span> 
									<!-- <button onclick="myFunction()">Copy text</button> -->
                            </div>
                            <?php
                            /*    $sql = "SELECT RFID_ID FROM rfiddata";
                                $result = $connect->query($sql);
                                while($row = $result->fetch_assoc()) {
                                    echo '<div class="form-group">
                                                <label for="">รหัส RFID</label>
                                                <input type="text" name="id" class="form-control" value="'.$row['RFID_ID'].'" required >
                                        </div>';
                                  }
                            */?>
							
                            
							<div class="form-group">
								<label for="">ชื่อและนามสกุล</label>
								<input type="text" name="name" class="form-control" value=" " required>
							</div>
							<div class="form-group">
								<label for="">ตำแหน่ง</label><br>
								<select name="position" id="" class="form-select" aria-label="Default select example" >
									<option value="">---เลือก---</option>
									<option value="พนักงานประจำ">พนักงานประจำ</option>
									<option value="พนักงานชั่วคราว">พนักงานชั่วคราว</option>
									<option value="ผู้ดูแลระบบ">ผู้ดูแลระบบ</option>
									<option value="ผู้บริหาร">ผู้บริหาร</option>
									<option value="ผู้มาติดต่อชั่วคราว">ผู้มาติดต่อชั่วคราว</option>
								</select>
							</div>
                            <div class="form-group">
								<label for="">ชั้นที่มีสิทธิ์</label>
								<input type="number" name="floor" class="form-control" value=" " min="2" >
							</div>
							<div class="form-group">
								<label for="">วันบัตรหมดอายุ</label>
								<input type="date" name="exp_date" class="form-control" value=" " >
								<br>
							</div>
							<div class="form-group">
								<fieldset>
									<legend>รายละเอียดที่อยู่</legend>
									<textarea name="address" id="" cols="70" rows="5" class="form-control mb-2"></textarea>
								</fieldset>
							</div>							
							<button class="btn btn-success" type="submit" name="submit" id="submit" >บันทึก</button>
							<button class="btn btn-warning" type="submit" name="reset" id="reset"  >รีเซ็ต</button>
							<button class="btn btn-primary" type="submit" name="showstock" formaction="account.php" >ดูบัญชีผู้ใช้งาน</button>
						</form>
					</div>
				</div>
			</div>

</main>
	

	<script>
		function myFunction() {
  // Get the text field
		var copyText = document.getElementById("rfid_text");

		// Select the text field
		copyText.select();
		copyText.setSelectionRange(0, 99999); // For mobile devices

		// Copy the text inside the text field
		navigator.clipboard.writeText(copyText.value);

		// Alert the copied text
		//alert("Copied the text: " + copyText.value);
		}
	</script>		
	<script src="imageDisplay.js"></script>
	<?php
	?>
</body>
</html>

