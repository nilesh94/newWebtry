<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
table, th, td {
    border: 1px solid black;
}
</style>
</head>
<body>


<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "./../connection.php";
$qryx="SELECT * FROM `assetsmanagement` WHERE `flag` = 0";


?>
<div id="results"></div>
<div id="assetData">
<table  style="width:100%">
<tr>
	<th>Srno</th>
	<th>Asset Name</th>
	<th>Assset type</th>
	<th>Issuer</th>
	<th>Entry Date</th>
	<th>Quantity</th>
	<th>Flag</th>
</tr>

<?php
	if($result=mysqli_query($conn,$qryx)){

         while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
        //printf ("%s (%s)\n", $row[1], $row[2],$row[3],$row[4],$row[5]);
         	$temp_str=implode(",", $row);
         	// echo $temp_str;
        ?>
        <tr>
        	<center><td><?php echo $row['sr_no']; ?></td></center>
        	<center><td><?php echo $row['asset_name']; ?></td></center>
        	<center><td><?php echo $row['asset_type']; ?></td></center>
        	<center><td><?php echo $row['issuer']; ?></td></center>
        	<center><td><?php echo $row['entry_date']; ?></td></center>
        	<center><td><?php echo $row['quantity']; ?></td></center>
        		<center><td><?php echo $row['flag']; ?></td></center>
            <center><td><button onclick="approveAsset('<?php echo $temp_str; ?>')" >Approve</button></td></center>
           
        </tr>
        	<?php
        //echo "<br>";
    }
	}
	?>
</table>
</div>

<script type="text/javascript" src="./jquery-3.2.1.min.js" ></script>
	<script type="text/javascript">
		
		function approveAsset(row) {
			// body...
			// alert("click");
			row=row.split(",");
			// $("#something").html($row[0]);
			// alert(row[0]);

			$.ajax({url: "update_assetmanagement.php?asset_name="+row[1]+"&issuer="+row[3], success: function(result){
           // alert(result);
           // alert(result.trim());

            if(result.trim()=="Failure"){
            	$("#results").html("<i style='color:red;'>"+result+"</i>");
            	// $("#assetData").load();
            	// location.reload();
            	// alert(result);
            }else
            if(result.trim()=="Success"){
            	$("#results").html("<i style='color:green;'>"+result+"</i>");
            	 // $("#assetData").load();
            	 alert(result.trim());
            	 // alert(result);
            	 location.reload();
            }else {
            	//alert("kuch match ni kar raha");
            	$("#results").html(result);
            	// alert(result);
            }

            }});

		}
	</script>
</body>
</html>
