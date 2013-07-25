<html>
	<head>
		<title><?php echo $title; ?></title>
		<style>
			body{ background: lightsteelblue; margin: 0; }
			#header{ background: steelblue; color: white; padding: 5px 10px; font-size: 2em; }
			#main{ padding: 0 10px; }
			#infoMessage{ color: #ff3; font-weight:bold; width: 400px; line-height: 5px; padding: 5px; }
		</style>
	</head>
	<body>
		<div id="header"><?php echo $title; ?></div>
		<div id="main"><?php echo $content; ?></div>
	</body>
</html>
