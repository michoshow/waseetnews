<? $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
	$writer = wp_get_post_terms($post->ID , 'writer');

?>
<div class="CatNewsBlock">
                		<div class="row">

                                            <div class="col-lg-8 col-md-8 CatNewsCont">
                                            <a href="<? the_permalink() ?>" class="CatNewsTitle"><h4 class="Red Normal Right  bshadow"><? the_title(); ?></h4></a>
                                            <p class="Red Right SmallParag"> كتب : <a href="" class="Red" style="direction:rtl;"><?=$writer[0]->name?></a> &nbsp;|&nbsp; في :  <? the_time('j F Y') ; ?></p>
                                            <p class="DarkGray Normal Right"><?=cut(get_the_content() , 550)?></p>
                                            </div>

                        		            <div class="col-lg-4 col-md-4 CatNewsImg">
                                            <a href="<? the_permalink() ?>" class="Fill">
                                                <div class="MediaBlockCont Center">
                                                	
                                                  <div class="MiniReadMore Bold Center">إقرأ المزيد</div>
                                                  <!--  <ul class="MediaList">
                                                    <li class="AudioList"></li>
                                                    <li class="VideoList"></li>
                                                    <li class="ImagesList"></li>
                                                    </ul>-->
							                    </div><!--MediaBlockCont-->
                                            <img src="<?=$feat_image?>" />
                                            </a>
                                            </div>
                                            
                        </div><!--row-->
                </div><!--CatNewsBlock-->