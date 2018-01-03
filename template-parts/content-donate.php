<?php
/**
 * Template part for displaying page content in page-donate.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-donate clear-bottom"); ?>>
    <header class="row-1"><h1><?php the_title();?></h1></header>
    <div class="row-2">
        <section class="col-1">
            <div class="copy">
                <?php the_content();?>
            </div><!--.copy-->
        </section><!--.col-1-->
        <aside class="col-2">
            <?php $copy = get_field("sidebar_copy");
            $image = get_field("sidebar_photo");
            if($image):?>
                <img src="<?php echo $image['sizes']['large'];?>" alt="<?php echo $image['alt'];?>">
            <?php endif;
            if($copy):?>
                <div class="copy">
                    <?php echo $copy;?>
                </div><!--.copy-->
            <?php endif;?>
        </aside><!--.col-2-->
    </div><!--.row-2-->
</article><!-- #post-## -->
