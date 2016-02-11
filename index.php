<?php
/*----------------------------------------------------------------------------------------------------------
-	Title:		Google Click-to-Call Code
-	Author:		dvg@davidgagne.net / @davidgagne
-	Created:		2016-02-05
-	Notes:		1. The <script> tags *must* appear within the <head></head> tags at the top of the page.
				2. The $ak_code and $cl_code come from Google
				3. The $phone variable is how the phone number will appear on the page.
				4. The $phone_a variable allows the phone number to be clicked on a mobile device.
				5. The $class is the class name used in HTML. It should be all lowercase with no spaces or dashes.

-	from Google:
If you'd like to make sure it's working, you can do a search that brings up your ad, then click the ad to visit your website (you'll be charged for the click). Your regular phone number should now be replaced with a Google forwarding number.

If you're doing repeated tests, delete the "gwcm" cookie from your browser before clicking on an ad again.
----------------------------------------------------------------------------------------------------------*/

	$ak_code	= 'xxxxxxxxx';
	$cl_code	= 'xxxxxxxxxxxxxxxxxxx';
	$phone	= '1 (222) 333-4444';
	$phone_a	= '12223334444';
	$class	= 'google_phone';
?>

<script type="text/javascript">
(function(a,e,c,f,g,b,d){var h={ak:"<?php echo $ak_code; ?>",cl:"<?php echo $cl_code; ?>"};a[c]=a[c]||function(){(a[c].q=a[c].q||[]).push(arguments)};a[f]||(a[f]=h.ak);b=e.createElement(g);b.async=1;b.src="//www.gstatic.com/wcm/loader.js";d=e.getElementsByTagName(g)[0];d.parentNode.insertBefore(b,d);a._googWcmGet=function(b,d,e){a[c](2,b,h,d,null,new Date,e)}})(window,document,"_googWcmImpl","_googWcmAk","script");
</script>

<script type="text/javascript">
	var callback = function( formatted_number, mobile_number )
	{
		// formatted_number: number to display, in the same format as
		//        the number passed to _googWcmGet().
		//        (in this case, '1-800-123-4567')
		// mobile_number: number formatted for use in a clickable link
		//        with tel:-URI (in this case, '+18001234567')
		var e = document.getElementsByClassName( "<?php echo $class; ?>" );

		for( var i = ( e.length - 1 ); i >= 0; i-- )
		{
			e[i].href = "tel:" + mobile_number;
			e[i].innerHTML = "";
			e[i].appendChild( document.createTextNode( formatted_number ) );
		}
	};
</script>

<body onload="_googWcmGet( callback, '<?php echo $phone; ?>')">

<a href="tel:<?php echo $phone_a; ?>" class="<?php echo $class; ?>"><?php echo $phone; ?></a>