	<script type="text/javascript" src="<?=$sitePath?>colorbox/jquery.colorbox.js"></script>
	<link href="<?=$sitePath?>colorbox/colorbox.css" rel="stylesheet" type="text/css" media="all">
    
    <script type="text/javascript">    
    function playYoutTubeVideo(id)
    {
	  $.colorbox({
	  	iframe:true, 
		width:"682px", 
		maxWidth : "90%",
		maxHeight : "90%",
		height:"460px",
		title:'',
		href:'https://www.youtube.com/embed/'+id+'?rel=0&autoplay=1'
	});
	  

    }
    </script>