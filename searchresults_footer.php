<div id="search">
		<form action="search.php" method="post">
		<input type="text" name="term" value="Search keyword again..." onfocus="if
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
	</div>

<div class="push"></div>
<div id="footer">
<div id="fleft"><img src="images/logo.png" style="padding-right: 20px; float: left;" /><br /><br /><br /> &copy; Copyright 2012. TSTJ. All Rights Reserved.<br />
<a href="">About</a> &nbsp;&nbsp; <a href="">Contact Us</a></div>
	</body>
</html>