<div class="container">
            <!-- Custom section -->
            <div class="row small-up-1 medium-up-2 large-up-2 custom">
            <?
            $data = getAllData('exceed_pages', 'status=1 and navigation=10002 order by `order`');
            for ($j = 0; $j < sizeof($data); $j++)
			{
			$imgPhoto = "uploads/page_img_thumb".$data[$j][0].".jpg";
            ?>
                <div class="column">
                    <img src="<?=$sitePath?><?=$imgPhoto?>" alt="<?=unFormatData($data[$j][1])?>" />
                    <h2 class="purple"><?=unFormatData($data[$j][1])?></h2>
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
            <?
            }
            ?>
            </div> 
            <!-- End Custom section -->

        </div>
