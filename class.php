<? include("header.php"); ?>

<div id="container">
<div id="info">
<span class="cname">15251 - Great Theoretical Ideas in Computer Science</span>

<table>
<tr class = "light">
<td class="star">&#9733; &#9733;</td>
<td class="professor">Adamchik
<div class="reviews" style="display:none"><br />
<table class="reviews">
<tr class="dark">
<td>
 &#9733; &#9733; <b>User</b> says, "This is my teacher."<br />
 More comments and detailed stuff here.
</td>
</tr>

<tr class="light">
<td>
&#9733; &#9733; <b>Another</b> says, "He was cool."
</td>
</tr>
</table>
</div>
</td>
<td class"toggle"><a href="#" class="show-reviews"><h2 class="down">&nbsp;</h2></a>
</td>
</tr>


<tr class ="dark">
<td class="star">&#9733; &#9733; &#9733;</td>
<td class="professor">Gupta
<div class="reviews" style="display:none"><br />Reviews for Gupta</div>
</td>
<td class"toggle"><a href="#" class="show-reviews1"><h3 class="down">&nbsp;</h3></a>
</td>
</tr>

<tr class = "light">
<td class="star">&#9733;</td>
<td class="professor">Guruswami
<div class="reviews" style="display:none"><br />Reviews for Guruswami</div>
</td>
<td class"toggle"><a href="#" class="show-reviews2"><h4 class="down">&nbsp;</h4></a>
</td>
</tr>

<tr class = "dark">
<td class="star">&#9733; &#9733;</td>
<td class="professor">Sleator
<div class="reviews" style="display:none"><br />Reviews for Sleator</div>
</td>
<td class"toggle"><a href="#" class="show-reviews3"><h5 class="down">&nbsp;</h5></a>
</td>
</tr>

<tr class = "light">
<td class="star">&#9733; &#9733; &#9733; &#9733;</td>
<td class="professor">Von Ahn
<div class="reviews" style="display:none"><br />Reviews for Von Ahn</div>
</td>
<td class"toggle"><a href="#" class="show-reviews4"><h6 class="down">&nbsp;</h6></a>
</td>
</tr>
</table>


<script type="text/javascript">
  $('.show-reviews').click(function(){
    $(this).parent().prev().find('div.reviews').slideToggle('fast');
	$("td h2").toggleClass("down up"); 		
  })
  
  $('.show-reviews1').click(function(){
    $(this).parent().prev().find('div.reviews').slideToggle('fast');
	$("td h3").toggleClass("down up"); 		
  })
  
  $('.show-reviews2').click(function(){
    $(this).parent().prev().find('div.reviews').slideToggle('fast');
	$("td h4").toggleClass("down up"); 		
  })
  
  $('.show-reviews3').click(function(){
    $(this).parent().prev().find('div.reviews').slideToggle('fast');
	$("td h5").toggleClass("down up"); 		
  })
  
  $('.show-reviews4').click(function(){
    $(this).parent().prev().find('div.reviews').slideToggle('fast');
	$("td h6").toggleClass("down up"); 		
  })
</script>

</div>
</div><!-- close container -->

<? include("footer.php"); ?>