<?php
/**
 * Template part for displaying page content in index.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-index"); ?>>
	<?php $slider = get_field("slider");
    if($slider):?>
        <div class="flexslider row-1">
            <ul class="slides">
                <?php foreach($slider as $row):?>
                    <?php if($row['image']):?>
                        <li>
                            <div class="wrapper">
                                <img src="<?php echo $row['image']['url'];?>" alt="<?php echo $row['image']['alt'];?>">
                                <?php if($row['fact']):?> 
                                    <div class="fact">
                                        <?php echo $row['fact'];?>
                                    </div><!--.fact-->
                                <?php endif;?>
                            </div><!--.wrapper-->
                        </li>
                    <?php endif;?>
                <?php endforeach;?>
            </ul>
        </div><!--.flexslider-->
    <?php endif;?>
    <?php $content = get_field("content");
    if($content):?>
        <div class="row-2 clear-bottom">
            <?php foreach($content as $row):?>
                <div class="block js-blocks">
                    <?php if($row['link']):?>
                        <a href="<?php echo $row['link'];?>">
                    <?php endif;?>
                        <?php if($row['image']):?>
                            <div class="image-wrapper">
                                <img src="<?php echo $row['image']['sizes']['large'];?>" alt="<?php echo $row['image']['alt'];?>">
                            </div><!--.image-wrapper-->
                        <?php endif;?>
                        <?php if($row['title']):?>
                            <div class="title">
                                <h2><?php echo $row['title'];?></h2>
                            </div><!--.title-->
                        <?php endif;?>
                        <?php if($row['copy']):?>
                            <div class="copy">
                                <?php echo $row['copy'];?>
                            </div><!--.copy-->
                        <?php endif;?>
                        <?php if($row['link_text']):?>
                            <div class="link">
                                <?php echo $row['link_text'];?>
                            </div><!--.link-->
                        <?php endif;?>
                    <?php if($row['link']):?>
                        </a>
                    <?php endif;?>
                </div><!--.block-->
            <?php endforeach;?>
        </div><!--.row-2-->
    <?php endif;?>
</article><!-- #post-## -->
