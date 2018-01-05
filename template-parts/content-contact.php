<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-contact clear-bottom"); ?>>
    <header class="row-1"><h1><?php the_title();?></h1></header>
    <div class="row-2">
        <section class="col-1">
            <div class="copy">
                <?php the_content();?>
            </div><!--.copy-->
            <div class="wrapper">
                <?php $col_1 = get_field("col_1");
                $col_2 = get_field("col_2");
                $col_3 = get_field("col_3");
                if($col_1):?>
                    <div class="col-1 col copy">
                        <?php echo $col_1;?>
                    </div><!--.col-1-->
                <?php endif;
                if($col_2):?>
                    <div class="col-2 col copy">
                        <?php echo $col_2;?>
                    </div><!--.col-2-->
                <?php endif;
                if($col_3):?>
                    <div class="col-3 col copy">
                        <?php echo $col_3;?>
                    </div><!--.col-3-->
                <?php endif;?>
            </div><!--.wrapper-->
        </section><!--.col-1-->
        <?php $parent_id = wp_get_post_parent_id($id);
        $args = array(
            'post_type'=>'page',
            'post_parent'=>$id,
            'posts_per_page'=>-1,
            'order'=>'ASC',
            'orderby'=>'menu_order'
        );
        $query = new WP_Query($args);
        if(!$query->have_posts()):
            if($parent_id):
                $args = array(
                    'post_type'=>'page',
                    'post_parent'=>$parent_id,
                    'posts_per_page'=>-1,
                    'order'=>'ASC',
                    'orderby'=>'menu_order'
                );
                $query = new WP_Query($args);
                if(!$query->have_posts()):
                    $query = null;
                endif;
            else:
                $query = null;
            endif;
        endif;?>
        <?php if($query):?>
            <aside class="col-2">
                <ul>
                    <?php while($query->have_posts()):$query->the_post();?>
                        <li class="clear-bottom"><i class="fa fa-caret-right"></i><a href="<?php echo get_the_permalink();?>"><?php the_title();?></a></li>
                    <?php endwhile;?>
                </ul>
            </aside><!--.col-2-->
        <?php endif;?>
    </div><!--.row-2-->
</article><!-- #post-## -->
