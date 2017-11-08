<!DOCTYPE html>
<html>
<head>
	<title>Issue Assets</title>
</head>
<style type="text/css">
#assettype{
	width: 98%;

}


</style>
<body>
	<div id="assettype">
	<H1>Select Asset Type</H1><br>
	<select class="assettype">
		<option value="bonds">Bonds</option>
		<option value="equity_share">Equity Share</option>
		<option value="mutual_funds">Mutual Funds</option>
		<!--<option value="commodities">Commodities</option>-->
	</select>
	</div>

	<div id="assetdetails">
		<!--show forms according to the asset type-->
	</div>

	<script type="text/javascript" src="./jquery-3.2.1.min.js" ></script>
	<script type="text/javascript">
	$(document).ready(function(){
$.ajax({url: "bonds.html", success: function(result){
            $("#assetdetails").html(result);
            }});

	});
		var assettype;
		$("#assettype select").change(function(){
			assettype = this.value;//load page accordingly
			//alert(assettype);

			if(assettype=="bonds"){
				$.ajax({url: "bonds.html", success: function(result){
            $("#assetdetails").html(result);
            }});
				//alert("equals is working");
			}else if(assettype=="equity_share"){
				$.ajax({url: "equity-share.html", success: function(result){
            $("#assetdetails").html(result);
            }});
				//alert("equal is not working");
			}else if(assettype=="mutual_funds"){
				$.ajax({url: "mutual-funds.html", success: function(result){
            $("#assetdetails").html(result);
            }});

			}

			else{
				alert("Something went wrong");
				$("#assetdetails").html("<h3>Something went wrong</h3>");
			}

			//$.ajax({url: "bonds.html?", success: function(result){
            //$("#assetdetails").html(result);
        //}});
		});
		

	</script>
</body>
</html>