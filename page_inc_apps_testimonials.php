<?
$testimonial = getDetails('exceed_pages', 'status=1 and id='.$appID);
if ($testimonial[0] > 0)
{
    $imgPhoto = "uploads/page_img_thumb".$testimonial[0].".jpg";
    ?>
    	<div class="testimonial-main">
        	
           <div class="row">
           <?
           if(file_exists($imgPhoto))
           {
           ?>
           	<div class="medium-3 columns">
<div class="box-img1"><img src="<?=$sitePath?><?=$imgPhoto?>"></div></div>
           	<div class="medium-9 columns">
           	<?
           	}
           	else
           	{
           	?>
           	<div class="medium-12 columns">
           	<?
           	}
           	?>
    	<h3><?=unFormatData($testimonial[1])?></span></h3>
            <div class="testimoni-cmt">
<?=unFormatData($testimonial[2])?>
            </div>
            <div class="commet-user" style="padding-top:0px;"><?=unFormatData($testimonial[9])?></div>

            

</p> 
            </div>
           </div>
        </div>
        
       <?
       }
?>