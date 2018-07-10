<?  
$banners = getAllData('exceed_photos', "status=1 and `section`='mainbanner' order by `order`");
?>

<div class="front-page-slider">
    <div class="swiper-container main-slider">
      <div class="swiper-wrapper">

		  <?
        for ($i = 0; $i < sizeof($banners); $i++)
        {
        ?>
        <div class="swiper-slide"><img src="<?=$sitePath?><?=$banners[$i]['photourl']?>" alt="<?=$banners[$i]['title']?>" title="#caption<?=$i;?>"></div>
        <?
        }
        ?>
</div>
      <!-- Add Pagination --> 
      
      <!-- Add Arrows -->
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
    </div>
  </div>