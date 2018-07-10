 <div class="section" id="section-two">
    <div class="row">

            <!-- Custom section -->
            <?
             $data = getAllData('exceed_pages', 'status=1 and navigation=10001 order by `order`');
            for ($j = 0; $j < sizeof($data); $j++)
			{
			$imgPhoto = "uploads/page_img_thumb".$data[$j][0].".jpg";
            ?>
            <div class="small-12 medium-6 large-4 columns">
            <div class="content-s">

                    <img src="<?=$sitePath?><?=$imgPhoto?>" alt="<?=unFormatData($data[$j][1])?>" />
                    <h3 class="purple"><?=unFormatData($data[$j][1])?></h3>
                    <?=unFormatData($data[$j][2])?>
                    <br>
                    <?
                    if ($data[$j][10] != '')
                    {
                    ?>
                    <a href="<?=unFormatData($data[$j][10])?>" target="<?=unFormatData($data[$j][11])?>" class="button purplebg"><?=unFormatData($data[$j][9])?></a>
                    <?
                    }
                    if ($data[$j][14] != '')
                    {
                    ?>
                    <a href="<?=unFormatData($data[$j][14])?>" target="<?=unFormatData($data[$j][16])?>" class="button bluebg"><?=unFormatData($data[$j][13])?></a>
                	<?
                	}
                	?>
                </div>
                </div>
            <?
            }
            ?>
            
        </div>
</div>