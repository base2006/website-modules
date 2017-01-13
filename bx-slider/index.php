<!-- TODO: Insert <link href="bx-slider/lib/jquery.bxslider.css" rel="stylesheet" /> in <head> of page -->

<ul class="bxslider">
  <li><img src="http://placehold.it/1920x500" /></li>
  <li><img src="http://placehold.it/1920x500" /></li>
  <li><img src="http://placehold.it/1920x500" /></li>
</ul>

<script src="bx-slider/lib/jquery.bxslider.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		// for options check http://bxslider.com/options
		$('.bxslider').bxSlider({
			auto: true,
			pager: false
		});
	});
</script>
