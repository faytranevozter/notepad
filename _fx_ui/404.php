<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?=$title?></title>
	<style type="text/css">

		::selection { background-color: #E13300; color: white; }
		::-moz-selection { background-color: #E13300; color: white; }
		::-webkit-selection { background-color: #E13300; color: white; }

		body {
			background-color: #fff;
			margin: 40px;
			font: 13px/20px normal Helvetica, Arial, sans-serif;
			color: #4F5155;
		}

		a {
			color: #003399;
			background-color: transparent;
			font-weight: normal;
		}

		h1 {
			color: #444;
			background-color: transparent;
			border-bottom: 1px solid #D0D0D0;
			font-size: 19px;
			font-weight: normal;
			margin: 0 0 14px 0;
			padding: 14px 15px 10px 15px;
		}

		#container {
			margin: 10px;
			border: 1px solid #D0D0D0;
			box-shadow: 0 0 8px #D0D0D0;
			text-align: center;
			width: 600px;
			margin: 0 auto;
		}
		#container::after, #container::before {
			content: " ";
			display: table;
			clear: both;
		}

		p {
			background-color: #f9f9f9;
			border-top: 1px solid #D0D0D0;
			display: block;
			margin: 14px 0 0 0;
			padding: 12px 10px 12px 10px;
		}

		img {
			max-width: 200px;
		}

	</style>
</head>
<body>
	<div id="container">
		<h1><?=$title?></h1>
		<img src="<?php echo base_url('assets/images/error-triangle.jpg') ?>" alt="<?=$title?>">
		<p> <?=$message.$link ?></p>
	</div>
</body>
</html>