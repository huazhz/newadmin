					<!-- Modal -->

                            <div class="modal fade" id="imgPreviewPopUp" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title">View Photo</h4>
                                        </div>
                                        <div class="modal-body" style="text-align:center;">
                                        	<img src="" id="imgPreviewHolder" style="max-width:100%;height:auto;margin:0px auto;">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
								 </div>
                            </div>

<script>
$(document).ready(function() {
	
	 $('.page-selector').focus(function(){
	 	senderxObj = $(this).attr('id');
	 });
	 
});

function viewImage(imgSrc)
{
	$('#imgPreviewHolder').attr('src', imgSrc + '?r=' + Math.random());
	$('#imgPreviewPopUp').modal('show');
}
</script>