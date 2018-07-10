<?


$socialIcons = array('adn','apple','android','bitbucket','bitbucket-square','bitcoin','btc','css3 ','dribbble','dropbox','facebook','facebook-square','flickr','foursquare','github','github-alt','github-square','google-plus','google-plus-square','houzz','html5','instagram','linkedin','linkedin-square ','linux','maxcdn','pagelines','pinterest','pinterest-square','renren','skype','stack-exchange','stack-overflow','trello','tumblr','tumblr-square','twitter','twitter-square','vimeo-square','vk','weibo','windows','xing','xing-square','youtube','youtube-play','youtube-square');
?>
					<!-- Modal -->
                            <div class="modal fade" id="fontAwsomeSocialIconSelector" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <div class="pull-right" style="max-width:200px;margin-right:15px;">
							                    <div class="input-group">
								                    <span class="input-group-addon"><i class="fa fa-search fa-fw"></i></span>
								                    	<input type="text" id="icon-keyword-social-selector" class="form-control" placeholder="search.." onkeydown="searhc4socialIcon($(this).val())">
							                  	</div>
                                            </div>
                                            <h4 class="modal-title">Select Icon <small>&nbsp;&nbsp;&nbsp; click on icon to select!</small></h4>
                                            
                                        </div>
                                        <div class="modal-body social-icons" style="max-height:400px;overflow:auto;">
                                        <?
                                        for ($i = 0; $i < sizeof($socialIcons); $i++)
                                        {
                                        if ($fontAwsomeIcon[$socialIcons[$i]] != '')
                                        {
                                        ?>
                                        <div class="icon-box-selector btn fa-<?=$socialIcons[$i]?>" onclick="selectSocialIcon('&#x<?=$fontAwsomeIcon[$socialIcons[$i]]?>;', '<?=$socialIcons[$i]?>')">
                                        <i class="fa fa-<?=$socialIcons[$i]?>"></i><br>
                                        <?=$socialIcons[$i]?>
                                        </div>
                                        <?
                                        }
                                        }
                                        ?>
                                        
                                        
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
								 </div>
                            </div>

<script>
var senderObjx = '';
$(document).ready(function() {
	
	 $('.social-icons-selector').focus(function(){
	 	$('#fontAwsomeSocialIconSelector').modal('show');
	 	senderObjx = $(this).attr('id');
	 });
	 
	 
});

function searhc4socialIcon(keyword)
{
	if(keyword != '')
	{
		$('.icon-box-selector').hide();
		$('.icon-box-selector:contains("'+keyword+'")').show();
	}
	else
	{
		$('.icon-box-selector').show();
	}
}

function selectSocialIcon(iconCode, iconName)
{
	$('#'+senderObjx).val(iconCode);
	$('#'+senderObjx).removeClass();
	$('#'+senderObjx).addClass('form-control ');
	$('#'+senderObjx).addClass('social-icons-selector');
	$('#'+senderObjx).addClass('fa-'+iconName);
	$('#icon-keyword-social-selector').val('');
	$('.icon-box-selector').show();
	$('#fontAwsomeSocialIconSelector').modal('hide');
}
</script>