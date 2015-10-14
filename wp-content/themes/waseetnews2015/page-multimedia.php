<?php
/**
 * The main Pages template file
 *
 */

get_header(); ?>
<!-- Start Main Body -->
<h1>Multimedia</h1>
<? if(have_posts()): while (have_posts()): the_post(); ?>

        <? the_content(); ?>

<? endwhile;  endif; ?>
<?php get_footer(); ?>
