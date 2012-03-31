<!DOCTYPE html>
<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>BFS: Better Faculty Search</title>
	<link rel="stylesheet" type="text/css" href="main.css" />
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.js"></script>
	</head>
	<body>
	<div id="header"><div id="title"><img src="images/bfs.png"></div></div>
	<div id="navigation">
		<form action="search.php" method="post">
		<input type="text" name="term" value="Professor or Course Number..." onfocus="if
		(this.value==this.defaultValue) this.value='';"/>
		<button class="glass" type="submit">Search</button>
		</form>
		<script>
		$("input[type='text']").keyup(function(){

			if ($(this).val() !== ''){
				$(this).css('color', '#666')
			} else {
				$(this).css('color', '#cecece')
			}

		});
		</script>
	</div>
	<div id="main">
		<div class="full">
			<h1>Search Results:</h1>