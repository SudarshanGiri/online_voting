<?php include ('head.php');?>
<body>


<?php
	function passFunc($len, $set = "")
		{
			$gen = "";
			for($i = 0; $i < $len; $i++)
				{
					$set = str_shuffle($set);
					$gen.= $set[0]; 
				}
			return $gen;
		} 
		
?>
    <div id="wrapper">

       <?php include ('side_bar.php');?>
        <!-- Page Content -->
        <div>
            <div class="row">
                <div class="col-12">
                    <center><h3 class="page-header">Voter Registration Form</h3><center>
                </div>
				<div class = "well col-md-6 col-md-offset-3">
					<div class="panel panel-green">
                        <div class="panel-heading">
                            Please Enter the Detail Needed Below
                        </div>
                        <div class="panel-body">
                         <form method = "post" enctype = "multipart/form-data">	
											<div class="form-group">
												<label>ID Number</label>
												<input class ="form-control" type = "text" name = "id_number" placeholder = "ID number" required="true" autocomplete="off">
													
											</div>
											
											<div class="form-group">
											<?php 
													$change =  passFunc(8, 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890');
											?>	
												<label>Password</label>
													<input class="form-control"  type = "text" name = "password" id = "pass" required="true" autocomplete="off" />
													<input type = "button" value = "Generate" onclick = "document.getElementById('pass').value = '<?php echo $change?>'">
											</div>
											
											<div class="form-group">
												<label>Firstname</label>
													<input class="form-control" type ="text" name = "firstname" placeholder="Firstname" required="true">
											</div>
											<div class="form-group">
												<label>Lastname</label>
													<input class="form-control"  type = "text" name = "lastname" placeholder="Please enter lastname" required="true">
											</div>

											<div class="form-group">
												<label>Citizenship Photo</label>
												<input type="file" name="image"required> 
											</div>
											
											<div class="form-group">
												<label>Year_Level</label>
													<select class = "form-control" name = "year_level">
														<option></option>
														<option>1st Year</option>
														<option>2nd Year</option>
														<option>3rd Year</option>
														<option>4th Year</option>
														
													</select>
											</div>
											<div class="form-group">
												<label>ward</label>
													<select class = "form-control" name = "ward">
														<option></option>
														<option>1</option>
														<option>2</option>
														<option>3</option>
														<option>4</option>
														
													</select>
											</div>

																	
											 	 <button name = "save" type="submit" class="btn btn-primary">Register</button>
												 
						  				 </div>
                                       
										
										</form>
								
							<?php 
								require 'dbcon.php';
								
								if (isset($_POST['save'])){
									$firstname=$_POST['firstname'];
									$lastname=$_POST['lastname'];
									$id_number=$_POST['id_number'];
									$year_level=$_POST['year_level'];
									$password = $_POST['password'];
									$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
									$image_name= addslashes($_FILES['image']['name']);
									$image_size= getimagesize($_FILES['image']['tmp_name']);
									$ward = $_POST['ward'];
									move_uploaded_file($_FILES["image"]["tmp_name"],"upload/" . $_FILES["image"]["name"]);			
									$location="upload/" . $_FILES["image"]["name"];


									$query = $conn->query("SELECT * FROM voters WHERE id_number='$id_number'") or die (mysql_error());
									$count = $query->fetch_array();

									if ($count  > 0){ 
									?>
										<script>
											alert("ID Number Already Exist");
										</script>
									<?php
										}
										else{
										$conn->query("insert into voters(id_number, password, firstname,lastname,year_level,status,img,ward) VALUES('$id_number', '$password','$firstname','$lastname','$year_level','Unvoted','$location','$ward')");
										
									?>
									
									
									<script>
										
										alert('Voters Successfully Registered');
										
									</script>
									
							<?php
									}
								} 
							?>
						  
						
						</div>
						</form>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php include ('script.php');?>
</body>

</html>

