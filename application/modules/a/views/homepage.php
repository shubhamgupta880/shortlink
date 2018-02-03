<!DOCTYPE html>
<html>
<head>

	<title>ShortLink</title>

	<style type="text/css">
		
		#header{
			
		    margin: 0px 0px 5px 0px;
		    padding: 10px;
		      color:white;
		        background: orange;
    margin-top: 0px;

		}
		body
		{
			background:DodgerBlue;
			
			
		}
		#list1
		{
			 margin: 0px 0px 5px 0px;
		    padding: 10px;
		    background:grey;
		    color:black;		
		}

		#list
		{
			background-color: lightblue;
			margin:30px 100px 25px 100px;
			border:2px solid blue;
			padding: 2px
		}
		div #input
		{
			padding: 6px;
    border-radius: 18px;
    width: 351px;
    height: 23px;
		}
		#submit1
		{
			
		}
		#mylink
		{
			margin:100px;
			background-color:black;
			color:orange;
		}

	</style>
</head>
<body>
<?php echo validation_errors(); ?>
<?php echo form_open('a/shorten_url'); ?>

<center id="header">
		<h1>Shorten URL</h1>
		
		<div id="input"><input type="text" name="url" value="" placeholder=" Paste a link to shorten it" required="" required-style="padding: 6px;
    border-radius: 18px;
    width: 351px;
    height: 23px;" style="
    padding: 6px;
    border-radius: 18px;
    width: 351px;
    height: 23px;
"></div><br>
		
		<div id="submit1"><?php echo form_submit('submit','Get URL'); ?></div>
		
</center>
<?php echo form_close(); ?>
<div id="list">
	<center id="list1"><h2>Short Links</h2></center>
	<?php if(count($alldata)) { ?>
<table>

	<tbody>
	<?php foreach($alldata as $data) { ?>
			<tr>
			<tr><td><p>Short URL for</p></td></tr>

			<tr><td><p><?php echo $data->long_url; ?></p></td></tr>

			<tr><td><p>Title =>  <?php echo $data->title; ?></p></td></tr>

			<tr><td id="mylink">http://localhost/shortlink/s/li/<?php echo $data->short_url; ?></td><td><?php echo $data->clicks; ?></td></tr>


			<tr><td><?= anchor('a/all_links/'.$data->id, $data->short_url); ?></td><td><?= anchor('a/link_data/'.$data->id,'Link Status'); ?></td></tr>
			<tr><td><hr></td></tr>
			</tr>
		
	
	<?php } 
	}
	else{
		echo "No Url";
	}

	?>
	</tbody>		

</table>

</div>


</body>
</html>

