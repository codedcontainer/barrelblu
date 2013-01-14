$(document).ready(function()
{
	$(scrollpane);
			//Hides lighbox from start
	$('#desc').hide();
	$('#exit').hide();
	$('#box').hide();
			//Fires functions
	$(description);
	$(click);
			//determines window height
			//SDubtracts height for the sand.
	var bottomheight=window.innerHeight;
	bottomheight-=93;
			//Determines the size of the window, in order to make div always span to bottom.
			//Created for smaller resolutions. 800 height respectivly. 
	if(bottomheight<=565)
	{
		$('#sand').css('height','630');	
	}
	else
	{
		$('#sand').css('height',bottomheight);
	}
	function description()
	{
			//Lightbox background, determine size of window relative to opac background.
		var height=window.innerHeight;
		var width=window.innerWidth;
		width+=600;
		height+=100;
		$('#desc').css({height:height,width:width});
		$(document).css('overflow','hidden');
		//$('#desc').hide();
	}	
			//All images width and height are pre-determined.
	$('img').attr
	({
		height: 160,
		width:110
	});
	function click()
	{
		$.ajaxSetup
		({
			cache:false
		});
				//Click on image, the attribute gets sent as a id to box.php.
				//The html from box.php is included into the div.
		$('#con img').click(function()
		{
			var text=$(this).attr('src');
			var loadurl='box.php?id='+text;
			$('#box').load(loadurl);
		});
				//When you click on a image the lightbox displays.
		$('#con img').click(function()
		{
			$('#desc').fadeIn();
			$('#box').fadeIn('fast');
			$('#exit').fadeIn();			
			$('#exit').click(function()
			{
				$('#desc').fadeOut();
				$('#box').fadeOut('slow');
				$('#exit').fadeOut('fast');
			});
		});
	}
	function scrollpane(){
		$('#con').jScrollPane();
	}
});