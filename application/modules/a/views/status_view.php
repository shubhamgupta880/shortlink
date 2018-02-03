<!DOCTYPE html>
<html>
<head>
	<title>Link Status</title>
	<center><h1>Statistics</h1></center><hr>

	<style type="text/css">
		
	body
	{

		background-color:lightblue;
	}
	#s
	{
		margin-top: 30px;
		text-align: center;
    border: 2px solid;
    margin-left: 244px;
    margin-right: 244px;
    background: darkgoldenrod;
    color: wheat;
	}

	</style>
</head>
<body>
<?php $long_url =  $status->long_url; ?>
<?php $short_url =  $status->short_url; ?>
<div id="s">
<h3>Site Title</h3>
<?php echo $status->title; ?>
<h3>Original URL</h3>
<?php echo $long_url; ?>
<h3>Short URL</h3>
<?php echo "http://localhost/shortlink/s/li/".$short_url; ?>
<h3>Total Clicks</h3>
<?php echo $status->clicks ?>
<h3>Short URL Creation Date</h3>
<?php echo $status->date; ?>
</div>
</body>
</html>
