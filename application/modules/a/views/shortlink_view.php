<!DOCTYPE html>
<html>
<head>
	<title>Your ShortLink</title>

<style type="text/css">
	center
	{
			margin-top: 21%;
		    border: solid 1px blue;
		    width: 40%;
		    margin-left: 30%;
		    padding: 25px;
   			 background: cyan;
	}	

</style>
</head>
<body style="background-color: cornflowerblue;">
<center >
	
	<?php $showlink = $this->session->userdata('showlink');  

echo 'Your Short Link for  '.$showlink->long_url.' is ';
echo '<a href= '.$showlink->long_url.' target="_blank" >'.$showlink->short_url.'</a>';

?>
</center>

</body>
</html>