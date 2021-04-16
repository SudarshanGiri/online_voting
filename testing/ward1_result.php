<?php //get the post data
	$ward=$_POST['ward'];
	$election_id=$_POST['election_id'];
	//dynamic tablename
	$table="votes"."_"."$election_id";
	// echo $table;
?>

<?php include ('../head.php');?>
<?php include ('decrypt_and_count.php');?>

<!--initialize values for counting in chart -->
<?php
//initializing variables for counting the votes of a specific party in specificposition for use in BarGraph

//Nepal Communist Party
$count_nepalCommunistParty_WardChairperson=0;
$count_nepalCommunistParty_Member=0;
$count_nepalCommunistParty_WomanMember=0;
$count_nepalCommunistParty_DalitWomanMember=0;

//Nepali Congress 
$count_nepaliCongress_WardChairperson=0;
$count_nepaliCongress_Member=0;
$count_nepaliCongress_WomanMember=0;
$count_nepaliCongress_DalitWomanMember=0;

//Rastriya Janata Party
$count_rastriyaJanataParty_WardChairperson=0;
$count_rastriyaJanataParty_Member=0;
$count_rastriyaJanataParty_WomanMember=0;
$count_rastriyaJanataParty_DalitWomanMember=0;

//Samajbadi Party
$count_samajbadiParty_WardChairperson=0;
$count_samajbadiParty_Member=0;
$count_samajbadiParty_WomanMember=0;
$count_samajbadiParty_DalitWomanMember=0;


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div id="loading"></div>
<div class="container ">
<?php /* echo "$ward"; $countNCP=0; */?>


			<div class="panel-heading" style="background-color:black;color:white;text-align:center;">
				<h1>Election Result (WARD <?php echo "$ward"; ?>)</h1>
			</div>
			<!--mayor and Deputy Mayor -->
				
				<table class="table highchart w3-table-all table-striped table-bordered table-hover ">
						<thead>
							<th style = "width:600px;" class = "alert alert-success">Candidate for Mayor</th>
							<th style = "width:200px;"class = "alert alert-success">Image</th>
							<th style = "width:200px;"class = "alert alert-success">Party Name</th>
							<th class = "alert alert-success">Total Vote</th>
						
						</thead>
						<?php
							
								$query = $conn->query("SELECT * FROM candidate WHERE position = 'Mayor'");
							while($fetch = $query->fetch_array())
							{	  

								include ('checkcondition.php');
								
						?>
						<tbody> 
							<td><?php echo $fetch ['firstname']. " ".$fetch ['lastname'];?></td>
							<td><img src = "../admin/<?php echo $fetch ['img'];?>" style = "width:40px; height:40px; border-radius:500px; " >
							<td><?php echo $fetch ['party_name']; ?></td>
	

							<?php

								if($fetch['party_name']=="Nepal Communist Party"){
									$count_nepalCommunistParty_Mayor = $count;

								}
								if($fetch['party_name']=="Nepali Congress"){

									$count_nepaliCongress_Mayor = $count;
								}
								if($fetch['party_name']=="Rastriya Janata Party"){
									$count_rastriyaJanataParty_Mayor = $count;
								}
								if($fetch['party_name']=="Samajbadi Party"){
									$count_samajbadiParty_Mayor = $count;
									
								}


							?>
							<td style = "width:20px; text-align:center"><button class = "btn btn-primary"disabled><?php echo $count;?></button>	</td>
						<?php }?>
						</tbody>
						
						
				</table>
				<table class="table table-striped table-bordered table-hover " >
						<thead>
							<td style = "width:600px;"class = "alert alert-success">Deputy Mayor</td>
							<td style = "width:200px;" class = "alert alert-success">Image</td>
							<td style = "width:200px;" class = "alert alert-success">Party Name</td>

							<td class = "alert alert-success">Total Vote</td>
						
						</thead>
						<?php
								$query = $conn->query("SELECT * FROM candidate WHERE position = 'Deputy Mayor'");
							while($fetch = $query->fetch_array())
							{
								include ('checkcondition.php');

								
						?>
						<tbody> 
							<td><?php echo $fetch ['firstname']. " ".$fetch ['lastname'];?></td>
							<td><img src = "../admin/<?php echo $fetch ['img'];?>" style = "width:40px; height:40px; border-radius:500px; " >
							<td><?php echo $fetch ['party_name']; ?></td>

						

							<td style = "width:20px; text-align:center"><button class = "btn btn-primary"disabled><?php echo  $count;?></button>	</td>
						<?php }?>
						</tbody>
						
						
				</table>


			<!--end mayor and Deputy mayor -->
            <table class="table table-striped table-bordered table-hover chairperson">
					<thead>
						<td style = "width:600px;"class = "alert alert-success">Ward Chairperson</td>
						<td style = "width:200px;" class = "alert alert-success">Image</td>
						<td style = "width:200px;" class = "alert alert-success">Party Name</td>

						<td class = "alert alert-success">Total Vote</td>
					
					</thead>
					<?php
							$query = $conn->query("SELECT * FROM candidate WHERE position = 'Ward Chairperson' and ward='$ward' ");
						while($fetch = $query->fetch_array())
						{
                             include ('checkcondition.php');

							
					?>
					<tbody> 
						<td><?php echo $fetch ['firstname']. " ".$fetch ['lastname'];?></td>
						<td><img src = "../admin/<?php echo $fetch ['img'];?>" style = "width:40px; height:40px; border-radius:500px; " >
						<td><?php echo $fetch ['party_name']; ?></td>
						
						<?php
						//testing the count of votes for bar graph
						// echo $fetch ['party_name'];
				
							if($fetch['party_name']=="Nepal Communist Party"){
								$count_nepalCommunistParty_WardChairperson= $count;
							
							}
							if($fetch['party_name']=="Nepali Congress"){
						
								$count_nepaliCongress_WardChairperson= $count;
							}
							if($fetch['party_name']=="Rastriya Janata Party"){
								$count_rastriyaJanataParty_WardChairperson= $count;
							}
							if($fetch['party_name']=="Samajbadi Party"){
								$count_samajbadiParty_WardChairperson= $count;
							}

						?>
                      

						<td style = "width:20px; text-align:center"><button class = "btn btn-primary"disabled><?php echo  $count;?></button>	</td>
					<?php }?>
					</tbody>
					
					
			</table>

            <table class="table table-striped table-bordered table-hover ">
					<thead>
						<td style = "width:600px;"class = "alert alert-success">Member</td>
						<td style = "width:200px;" class = "alert alert-success">Image</td>
						<td style = "width:200px;" class = "alert alert-success">Party Name</td>
						<td class = "alert alert-success">Total Vote</td>
					
					</thead>
					<?php
							$query = $conn->query("SELECT * FROM candidate WHERE position = 'Member' and ward='$ward' ");
						while($fetch = $query->fetch_array())
						{
                             include ('checkcondition.php');

							
					?>
					<tbody> 
						<td><?php echo $fetch ['firstname']. " ".$fetch ['lastname'];?></td>
						<td><img src = "../admin/<?php echo $fetch ['img'];?>" style = "width:40px; height:40px; border-radius:500px; " >
						<td><?php echo $fetch ['party_name']; ?></td>

                      

						<td style = "width:20px; text-align:center"><button class = "btn btn-primary"disabled><?php echo  $count;?></button>	</td>
					<?php }?>
					</tbody>
					
					
			</table>
            <table class="table table-striped table-bordered table-hover ">
					<thead>
						<td style = "width:600px;"class = "alert alert-success">Woman Member</td>
						<td style = "width:200px;" class = "alert alert-success">Image</td>
						<td style = "width:200px;" class = "alert alert-success">Party Name</td>
						<td class = "alert alert-success">Total Vote</td>
					
					</thead>
					<?php
							$query = $conn->query("SELECT * FROM candidate WHERE position = 'Woman Member' and ward='$ward' ");
						while($fetch = $query->fetch_array())
						{
                             include ('checkcondition.php');

							
					?>
					<tbody> 
						<td><?php echo $fetch ['firstname']. " ".$fetch ['lastname'];?></td>
						<td><img src = "../admin/<?php echo $fetch ['img'];?>" style = "width:40px; height:40px; border-radius:500px; " >
						<td><?php echo $fetch ['party_name']; ?></td>

                      

						<td style = "width:20px; text-align:center"><button class = "btn btn-primary"disabled><?php echo  $count;?></button>	</td>
					<?php }?>
					</tbody>
					
					
			</table>
            <table class="table table-striped table-bordered table-hover ">
					<thead>
						<td style = "width:600px;"class = "alert alert-success">Dalit Woman Woman Member</td>
						<td style = "width:200px;" class = "alert alert-success">Image</td>
						<td style = "width:200px;" class = "alert alert-success">Party Name</td>
						<td class = "alert alert-success">Total Vote</td>
					
					</thead>
					<?php
							$query = $conn->query("SELECT * FROM candidate WHERE position = 'Dalit Woman Member' and ward='$ward' ");
						while($fetch = $query->fetch_array())
						{
                             include ('checkcondition.php');

							
					?>
					<tbody> 
						<td><?php echo $fetch ['firstname']. " ".$fetch ['lastname'];?></td>
						<td><img src = "../admin/<?php echo $fetch ['img'];?>" style = "width:40px; height:40px; border-radius:500px; " >
						<td><?php echo $fetch ['party_name']; ?></td>

                      

						<td style = "width:20px; text-align:center"><button class = "btn btn-primary"disabled><?php echo  $count;?></button>	</td>
					<?php }?>
					</tbody>
					
					
			</table>




            
</div>  <!--close container-->           
<!---Testing chart -->
<?php

	$dataPoints1 = array(
		array("label"=> "Mayor", "y"=> $count_nepalCommunistParty_Mayor),
		array("label"=> "Ward Chairperson", "y"=> $count_nepalCommunistParty_WardChairperson),
		array("label"=> "Member", "y"=> $count_nepalCommunistParty_Member),
		array("label"=> "Woman Member", "y"=>$count_nepalCommunistParty_WomanMember),
		array("label"=> "DalitWomanMember", "y"=> $count_nepalCommunistParty_DalitWomanMember)

	);
	$dataPoints2 = array(
		array("label"=> "Mayor", "y"=> $count_nepaliCongress_Mayor),
		array("label"=> "Ward Chairperson", "y"=> $count_nepaliCongress_WardChairperson),
		array("label"=> "Member", "y"=> $count_nepaliCongress_Member),
		array("label"=> "Woman Member", "y"=> $count_nepaliCongress_WomanMember),
		array("label"=> "DalitWomanMember", "y"=> $count_nepaliCongress_DalitWomanMember),

	);
	$dataPoints3 = array(
		array("label"=> "Mayor", "y"=> $count_rastriyaJanataParty_Mayor),

		array("label"=> "Ward Chairperson", "y"=> 4.61),
		array("label"=> "Member", "y"=> 70.55),
		array("label"=> "Woman Member", "y"=> 2.50),
		array("label"=> "DalitWomanMember", "y"=> 81.30),

	);
	$dataPoints4 = array(
		array("label"=> "Mayor", "y"=> $count_samajbadiParty_Mayor),
		array("label"=> "Ward Chairperson", "y"=> 100.61),
		array("label"=> "Member", "y"=> 100),
		array("label"=> "Woman Member", "y"=> 10.50),
		array("label"=> "DalitWomanMember", "y"=> 100.30),

	);
	
?>
 
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "Graphical Representation"
	},
	axisY:{
		includeZero: true
	},
	legend:{
		cursor: "pointer",
		verticalAlign: "center",
		horizontalAlign: "right",
		itemclick: toggleDataSeries
	},
	data: [{
		type: "column",
		name: "Nepal Communist Party",
		indexLabel: "{y}",
		// yValueFormatString: "$#0.##",
	
		showInLegend: true,
		dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
	},{
		type: "column",
		name: "Nepali Congress",
		indexLabel: "{y}",
		// yValueFormatString: "$#0.##",
		showInLegend: true,
		dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
	},{
		type: "column",
		name: "Rastriya Janata Party",
		indexLabel: "{y}",
		// yValueFormatString: "$#0.##",
		showInLegend: true,
		dataPoints: <?php echo json_encode($dataPoints3, JSON_NUMERIC_CHECK); ?>
	},{
		type: "column",
		name: "Samajbadi Party",
		indexLabel: "{y}",
		// yValueFormatString: "$#0.##",
		showInLegend: true,
		dataPoints: <?php echo json_encode($dataPoints4, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
function toggleDataSeries(e){
	if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = false;
	}
	else{
		e.dataSeries.visible = true;
	}
	chart.render();
}
 
}
</script>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
                          

<!--end testing -->







</body>
</html>
