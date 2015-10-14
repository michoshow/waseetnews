
<? echo do_shortcode(' [latestnews  mobile="1" tablet="1" desktop="2" num="5" ]الأكثر قراْة[/latestnews]');  ?>

<div class="row" style="margin-top:20px;">
		
        <div class="col-md-6 col-lg-6">
        	<img src="<? bloginfo('template_directory'); ?>/uploads/300X600.jpg" />
        </div>
		<? global $thecat; ?>
        <div class="col-md-6 col-lg-6" style="font-size:0.85em;">
        <? $cat_id = get_cat_ID($thecat[0]->name); ?>
       	<? echo do_shortcode('[vnews cat="'.$cat_id.'" num="3"]'); ?>
        </div><!--col-md-6 col-lg-6-->
        
</div><!---row-->



