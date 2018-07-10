<?
if ($_SETTINGS['home-paragraph-status-testimonials'] == 1)
{
?>

<div class="container">

            <!-- Info section -->
            <div class="row text-center info"> 
                <h3><?=unFormatData($_SETTINGS['home-paragraph-title1-testimonials'])?></h3>
                <div class="swiper-content">
                    <?=unFormatData($_SETTINGS['home-paragraph-contents-testimonials'])?>
                </div>
                <div class="row swiper-row">
                 <div class="small-2 columns"> <i class="fa fa-angle-left"></i></div>
                <div class="small-8 columns">
                <div class="swiper-container text-center"> <!-- Swiper -->
                    <div class="swiper-wrapper">
                                                        
                            <?
                            $logos = getAllData('exceed_photos', "status=1 and `section`='home-logos' order by `order`");
                            for ($i = 0; $i < sizeof($logos); $i++)
                            {
                            ?>
                            <div class="swiper-slide">
                            	<a href="<?=$banners[$j]['linkURL']?>" target="<?=$banners[$j]['linkTarget']?>">
                            		<img src="<?=$sitePath?><?=$logos[$i]['photourl']?>" alt="<?=$logos[$i][1]?>" />
                            	</a>
                            </div>
                            <?
                            }
                            ?>
                        
                       
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                    <!-- Add Arrows -->
                    
                   
                </div>
                 </div>
                 <div class="small-2 columns"> <i class="fa fa-angle-right"></i></div>
                </div>
                <p><a href="<?=unFormatData($_SETTINGS['home-paragraph-readmoreurl-testimonials'])?>" class="morelink">
                    <i class="fa fa-angle-right" aria-hidden="true"></i> <?=unFormatData($_SETTINGS['home-paragraph-readmoretxt-testimonials'])?></a></p>
            </div>
            <!-- End Info section -->
        </div>

<?
$customFooterTags .= '
		<script src="'.$sitePath.'plugins/swiper/js/swiper.min.js"></script>
        <script>
            var swiper = new Swiper(".swiper-container", {
                paginationClickable: true,
                slidesPerView: 4,
                loop: true,
                nextButton: ".fa-angle-right",
                prevButton: ".fa-angle-left",
                spaceBetween: 20,
                breakpoints: {
	            1024: {
	                slidesPerView: 4
	            },
	            768: {
	                slidesPerView: 3
	            },
	            480: {
	                slidesPerView: 2,
	                spaceBetween: 5
	            }
	            }
            });
            
        </script>';
?><?
}
?>