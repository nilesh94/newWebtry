<?php
include "./../connection.php";

$assettype=@$_GET["type"];

if($assettype=='bonds'){


$bname=@$_POST['bondname'];
$pamt=@$_POST['principalamt'];
$maturity=@$_POST['maturity'];
$coupon=@$_POST['coupon'];
$market_price=@$_POST['market_price'];
$bond_type=@$_POST['bond_type'];
$issuer=@$_POST['issuer'];
$quantity=@$_POST['quantity'];
echo "<i style='color:green;'>Success</i> ".$assettype."<br>".$bname."<br>".$bond_type;

// $qry="INSERT INTO bond ('asset_name', 'principal_amt', 'coupon', 'market_price', 'bond_type', 'issuer','maturity') VALUES ('$bname', $pamt, $coupon, $market_price, '$bond_type', '$issuer',$maturity)";

$qryx="INSERT INTO `bond` (`sr_no`, `asset_name`, `principal_amt`, `coupon`, `market_price`, `bond_type`, `issuer`, `maturity`,`quantity`) VALUES (NULL, '$bname', '$pamt', '$coupon', '$market_price', '$bond_type', '$issuer', '$maturity','$quantity')";

$qryAssetManagement="INSERT INTO `assetsmanagement` (`sr_no`, `asset_name`, `asset_type`, `issuer`, `entry_date`, `validate_date`, `quantity`, `flag`) VALUES (NULL, '$bname', 'bond', '$issuer', CURRENT_TIMESTAMP, NULL, '$quantity', '0');";

if(mysqli_query($conn,$qryx)){
			echo "<h1><i style='color:green;'>Success</i></h1>";
			mysqli_query($conn,$qryAssetManagement);
		}else{
			echo "<h1><i style='color:red;'>Fail</i></h1> " ;
		}

}else if($assettype=="equity"){
	$equity_name=@$_POST['equity_name'];
	$face_value=@$_POST['face_value'];
	$profit_value=@$_POST['profit_value'];
	$allow_liability=@$_POST['allow_liability'];
	$issuer=@$_POST['issuer'];
	$quantity=@$_POST['quantity'];

	$qryx="INSERT INTO `equity` (`sr_no`, `asset_name`, `face_value`, `profit_percent`, `allowed_liability`,`issuer`,`quantity`) VALUES (NULL, '$equity_name', '$face_value', '$profit_value', '$allow_liability','$issuer','$quantity')";
	$qryAssetManagement="INSERT INTO `assetsmanagement` (`sr_no`, `asset_name`, `asset_type`, `issuer`, `entry_date`, `validate_date`, `quantity`, `flag`) VALUES (NULL, '$equity_name', 'equity', '$issuer', CURRENT_TIMESTAMP, NULL, '$quantity', '0');";

		if(mysqli_query($conn,$qryx)){
			echo "<h1><i style='color:green;'>Success</i></h1>";
			mysqli_query($conn,$qryAssetManagement);
		}else{
			echo "<h1><i style='color:red;'>Fail</i></h1> ";
		}

}else if($assettype=='mutual'){

	$mfundname=@$_POST['mfundname'];
	$maturity_date=@$_POST['maturity_date'];
	$allow_liability=@$_POST['allow_liability'];
    $min_investment=@$_POST['Min_Investment'];
    $issuer=@$_POST['issuer'];
    $quantity=@$_POST['quantity'];

	$qryx="INSERT INTO `mutual_fund` (`sr_no`, `asset_name`, `months`, `allowed_liability`,`min_investment`,`issuer`,`quantity`) VALUES (NULL, '$mfundname', '$maturity_date', '$allow_liability','$min_investment','$issuer','quantity')";
	$qryAssetManagement="INSERT INTO `assetsmanagement` (`sr_no`, `asset_name`, `asset_type`, `issuer`, `entry_date`, `validate_date`, `quantity`, `flag`) VALUES (NULL, '$fund_name', 'mutual_fund', '$issuer', CURRENT_TIMESTAMP, NULL, '$quantity', '0');";

	if(mysqli_query($conn,$qryx)){
			echo "<h1><i style='color:green;'>Success</i></h1>";
			mysqli_query($conn,$qryAssetManagement);
		}else{
			echo "<h1><i style='color:red;'>Fail</i></h1> ";
		}
	// echo "mutual funds qrys";
}

?>
