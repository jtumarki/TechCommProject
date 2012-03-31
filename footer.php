<div class="push"></div>
<div id="footer">
<div id="fleft"><img src="images/logo.png" style="padding-right: 20px; float: left;" /><br /><br /><br /> &copy; Copyright 2012. TSTJ. All Rights Reserved.<br />
<a href="">About</a> &nbsp;&nbsp; <a href="">Contact Us</a></div>

<div id="fright">
<form action="search.php" method="post">
<input type="text" class="footer" name="term" value="Enter keyword and press enter" onfocus="if
(this.value==this.defaultValue) this.value='';"/>
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
</body>
</html>