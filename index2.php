<meta charset="utf-8">
<script src="jquery.js" type="text/javascript"></script>
	<script>
	$(function() {
		$( "#datepicker" ).datepicker({
			changeMonth: true,
			changeYear: true
		});
	});
	</script>



<div class="demo">

<p>Date: <input type="text" id="datepicker"></p>

</div><!-- End demo -->



<div class="demo-description">
<p>Show month and year dropdowns in place of the static month/year header to facilitate navigation through large timeframes.  Add the boolean <code>changeMonth</code> and <code>changeYear</code> options.</p>
</div><!-- End demo-description -->