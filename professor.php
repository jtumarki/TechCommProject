<? include("header.php"); ?>

<div id="container">
<div id="info">
<span class="cname">Von Ahn</span>

<table>
<tr class = "light">
<td class="star">&#9733; &#9733; &#9733; &#9733;</td>
<td class="professor">15251 - Great Theoretical Ideas in Computer Science
<div class="reviews" style="display:none"><br />Reviews for Von Ahn Teaching 251<br /><br /><br /><br /></div>
</td>
<td class"toggle"><a href="#" class="show-reviews"><h2 class="down">&nbsp;</h2></a>
</td>
</tr>


<tr class ="dark">
<td class="star">&#9733; &#9733; </td>
<td class="professor">15396 - Special Topic: Science of the Web
<div class="reviews" style="display:none"><br />Reviews for Von Ahn Teaching 396</div>
</td>
<td class"toggle"><a href="#" class="show-reviews1"><h3 class="down">&nbsp;</h3></a>
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
</script>

</div>
</div><!-- close container -->

<? include("footer.php"); ?>
