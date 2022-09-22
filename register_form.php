<?php	
    require_once 'config.php';
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
	<title>Add Users</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
	<style>	
		.card-body-server {
			height: 580px;
			overflow-y: scroll;
			
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
                                      var tr = "<input type='text' name='amout' class='form-control' value='"+val["RFID_ID"]+" ' readonly>";
                                      
                                      $('#myRFID > tbody').append(tr);
                            });
                           
                      }
  
              });
  
  }
  
  setInterval(getDataFromDb, 100);   // 1000 = 1 second
</script>
</head>
<body class="font-mali">
	<div class="container mb-2" style="width:60%;">
		<div class="row mt-2 ">
			<div class="col" >
				<div class="card">
					<center><h4 class="card-header bg-danger text-white">Add Users</h4></center>
					<div class="card-body">
						<form action="add_stock.php" method="POST" enctype="multipart/form-data">
							<div class="form-group">
								<center><img src="image/placeholder.png" width = "200" hieght="200" onclick="triggerClick()" id="productDisplay"><br></center>
							<label for="productImage">รูปภาพ</label>
								<input type="file" name="image" class="form-control" id="image" accept = "image/*" onchange="displayImage(this) ">
							</div>	
                            <div class="form-group" >
                                <label for="">รหัส RFID</label>
                                    <table id="myRFID" class="form-group" width="100%">

                                       <tbody id="myBody"></tbody> 
</table>
                                    
                                    <!-- body dynamic rows -->
                                    
                        
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
								<select name="type" id="" class="form-select" aria-label="Default select example" >
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
								<input type="number" name="name" class="form-control" value=" " min="2" required>
							</div>
							<div class="form-group">
								<label for="">วันบัตรหมดอายุ</label>
								<input type="date" name="amout" class="form-control" value=" " >
								<br>
							</div>
							<div class="form-group">
								<fieldset>
									<legend>รายละเอียดที่อยู่</legend>
									<textarea name="detail" id="" cols="70" rows="5" class="form-control mb-2"></textarea>
								</fieldset>
							</div>							
							<button class="btn btn-success" type="submit" name="submit" id="submit" >บันทึก</button>
							<button class="btn btn-warning" type="reset" name="reset" id="reset" >รีเซ็ต</button>
							<button class="btn btn-primary" type="submit" name="showstock" formaction="show_stock.php" >ดูบัญชีผู้ใช้งาน</button>
						</form>
					</div>
				</div>
			</div>


			
	<script src="imageDisplay.js"></script>
	<?php
	?>
</body>
</html>

