<nav class="primary-menu">
                       
                            <ul>
                            <?
                            $activeNav[$navID]  = 'active';
                            $mainNav = getAllData('exceed_navigation', 'status=1 order by `order`');
                            for ($i = 0; $i < sizeof($mainNav); $i++)
                            {
                            $subNav = getAllData('exceed_pages', 'navigation != 1 and navigation = '.$mainNav[$i][0].' and status=1 order by `order`');
                            ?>
                            <li <?php echo (sizeof($subNav) > 1)?'class="dropdown-menu"':'' ?> ><a href="<?=$sitePath?><?=$mainNav[$i]['url'];?>">
							<?=$mainNav[$i][1];?></a>
                            <?
                            
                            if(sizeof($subNav) > 1)
                            {
                            ?>
                            <ul class="dd">
                            <? 
			               	for ($j = 0; $j < sizeof($subNav); $j++)
							{
							?> 
			                	<li><a href="<?=$subNav[$j]['pageURL'];?>"><?=$subNav[$j]['title'];?></a></li>
			                <? 
							} 
							?>
                            </ul>
                            <?
                            }
                            ?>
                            </li>
                            <?
                            }
                            ?>
                            </ul> 
                      
</nav>
				