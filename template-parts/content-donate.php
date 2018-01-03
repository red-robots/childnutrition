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
