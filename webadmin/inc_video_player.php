                           <div class="modal fade" id="playVid" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title">Play Video</h4>
                                        </div>
                                        <div class="modal-body">
                                        <center>
                                        <iframe id="vidPlayer" style="border:0px;width:480px;height:360px;"></iframe>
                                        </center>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
								 </div>
                            </div>
<script>
function playVid(url)
{
	$('#vidPlayer').attr('src', url);
}

function editVid(id)
{
    $.get("_edit_ajax.php", {  tbl: 'witn_videos', id: id},
    
		function(ajaxdata){
			//alert(ajaxdata);
			var data= JSON.parse(ajaxdata);
			$('.form-control', $('#videoform')).each(function() {
				var n = $(this).attr('name');
				//alert(n);
				$(this).val(data[n]);
			});
			//alert(data['thumbURL']);
			$('#thumbURL').html('<img width="100%" src="'+data['thumbURL']+'" onerror="$(this).attr(\'src\', \''+data['thumbURL2']+'\');">');
	});
}
</script>                            	