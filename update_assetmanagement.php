<?php
//require_once './functions.php';
include "./../connection.php";

	$asset_name=@$_GET['asset_name'];
	$issuer=@$_GET['issuer'];

	$qryUpdate="UPDATE `assetsmanagement` SET `flag`=1, validate_date=CURRENT_TIMESTAMP WHERE asset_name='$asset_name' and issuer='$issuer'";

	$qryGetTableName="SELECT `asset_type` from `assetsmanagement` where asset_name='$asset_name' and issuer='$issuer'";
	$tableNameResult=mysqli_fetch_row(mysqli_query($conn,$qryGetTableName));
	$tableName=$tableNameResult[0];

	$qryBlock="SELECT * FROM `$tableName` where asset_name='$asset_name' AND issuer='$issuer'";


	if(mysqli_query($conn, $qryUpdate)){
		echo "Success";

		if($resultSet=mysqli_query($conn, $qryBlock)){
			while($row=mysqli_fetch_array($resultSet,MYSQLI_ASSOC)){
				$asset_name=$row['asset_name'];
				$issuer=$row['issuer'];
				$quantity=$row['quantity'];
				if($tableName=="bond")
				{
					
					$principal_amt=$row['principal_amt'];
					$coupon=$row['coupon'];
					$market_price=$row['market_price'];
					$maturity=$row['maturity'];
				
				}
				else if($tableName=="equity")
				{
                     $face_value=$row['face_value'];
                     $profit_percent=$row['profit_percent'];
                     $allowed_liability=$row['allowed_liability'];
				}
				else if($tableName=="mutual_fund")
				{
					$months=$row['months'];
					$allowed_liability=$row['allowed_liability'];
					$min_investment=$row['min_investment'];
                      
				}
			}
		}
	}
	else{
		echo "Failure";
	}
?>