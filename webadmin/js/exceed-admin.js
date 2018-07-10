$(document).ready(function() {
	 $(".show-video-player").colorbox({iframe:true, innerWidth:640, innerHeight:390});
	 
	 $('button', $('.table-add-on-focus')).click(function(){
	 	var idStr = $(this).attr('id');
	 	var idNum = idStr.match(/\d+/)[0];
	 	var firstRow = idStr.replace(idNum, '0');
	 	for (var i=0; i < idNum; i++)
	 	{
	 		firstRow = idStr.replace(idNum, i);
	 		if (!$('#'+firstRow).is(":visible"))
	 		{
	 			$('#'+firstRow).fadeIn();
	 			break;
	 		}
	 	}
	 	
	 });
	 //show nono-empty rows
	 $('button', $('.table-add-on-focus')).each(function(){
	 	var idStr = $(this).attr('id');
	 	var idNum = idStr.match(/\d+/)[0];
	 	var firstRow = idStr.replace(idNum, '0');
	 	//alert(idNum);
	 	for (var i=0; i < idNum; i++)
	 	{
	 		firstRow = idStr.replace(idNum, i);
	 		if (!$('#'+firstRow).is(":visible"))
	 		{
	 			if ($('input:last-child',$('#'+firstRow)).val() != '')
	 			{ 
	 			$('#'+firstRow).fadeIn();
	 			//break;
	 			}
	 		}
	 	}
	 	
	 });
	 
	 
});
function stripslashes (str) {

  return (str + '').replace(/\\(.?)/g, function (s, n1) {
    switch (n1) {
    case '\\':
      return '\\';
    case '0':
      return '\u0000';
    case '':
      return '';
    default:
      return n1;
    }
  });
}


function addForm(fid, txt)
{
	
   $('.modal-title', $('#'+fid)).html(txt);
   $('form', $('#'+fid)).trigger("reset");
   $('.form-control', $('#'+fid)).val('');
   $('.form-control', $('#'+fid)).each(function() {
   //alert( fid);
	  if ($(this).attr('data-ckeditor') == 1)
	  CKEDITOR.instances[$(this).attr('id')].setData('');
   });
}

function addOptionForm(fid, txt)
{
   $('.modal-title', $('#'+fid)).html(txt);
   //$('form', $('#'+fid)).trigger("reset");
   //$('.form-control', $('#'+fid)).val('');
}
    
function editForm(fid, txt, tbl, id)
{
    $('.modal-title', $('#'+fid)).html(txt);
    $('form', $('#'+fid)).trigger("reset");
    $.get("_edit_ajax.php", {  tbl: tbl, id: id},
    
		function(ajaxdata){
			//alert(ajaxdata);
			var data= JSON.parse(ajaxdata);
			$('.form-control', $('#'+fid)).each(function() {
				var n = $(this).attr('name');
				$(this).val(data[n]);
				$('#'+n+'_colorpicker').css('background-color', data[n]);
				if ($(this).attr('data-ckeditor') == 1)
				{
					CKEDITOR.instances[$(this).attr('id')].setData(stripslashes (data[n]));
				}
				if ($(this).hasClass('icons-selector'))
				{
				$(this).val(data[n].replace('u', '&#x'));
				}

			});
			$('input[type=radio]', $('#'+fid)).each(function() {
				var n = $(this).attr('name');
				$('#'+n+data[n]).attr('checked', 'checked');
			});
			$('input[type=checkbox]', $('#'+fid)).each(function() {
				var n = $(this).attr('name');
				if ($(this).val() == data[n])
				$(this).attr('checked', true);
				else
				$(this).attr('checked', false);
			});
	});
}
    
function deleteFunction(txt, id, query)
{
    	if (confirm('Are you sure to delete this '+ txt+'?'))
    	{
    		$.get("_edit_ajax.php", {  query: query});
    		$('#'+txt+id).fadeOut();
    		return true;
    	}
    	
}

function deleteFile(id, query, filebath)
    {    	
    	if (confirm('Are you sure to delete this file?'))
    	{
    		$.get("_edit_ajax.php", {  query: query,id:id});
    		$('#file'+id).fadeOut();
    		$.get("_edit_ajax.php", {  unlinkfile: filebath});
    		
    	}	
    }

function swapStatus(id, tbl, btnObj)
{
		$.get("_status_ajax.php", {tbl: tbl, id: id},
		function(newstatus){
		//alert(newstatus );
			if (newstatus == 1) 
			{
			$('#'+id).removeClass('inactive-record');
			btnObj.html('<i class="fa fa-eye-slash fa-fw"></i> Hide');
			}
			else 
			{
			$('#'+id).addClass('inactive-record');
			btnObj.html('<i class="fa fa-eye fa-fw"></i> Show');
			}
		});
}


