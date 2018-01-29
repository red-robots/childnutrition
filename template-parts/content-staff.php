<?php
/**
 * Template part for displaying page content in page-staff.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-staff clear-bottom"); ?>>
    <header class="row-1"><h1><?php the_title();?></h1></header>
    <div class="row-2">
        <div class="col-1">
            <div class="copy">
                <?php the_content();?>
            </div><!--.copy-->
            <div class="wrapper">
                <?php $args = array(
                    'post_type'=>'staff',
                    'posts_per_page'=>1,
                    'tax_query'=>array(array(
                        'taxonomy'=>'staff_type',
                        'field'=>'term_id',
                        'terms'=>array(12)
                    ))
                );
                $query = new WP_Query($args);
                if($query->have_posts()): $query->the_post();?>
                    <section class="executive-director clear-bottom">
                        <?php $image = get_field("image");
                        $phone = get_field("phone");
                        $email = get_field("email");
                        $title = get_field("title");?>
                        <div class="col-1">
                            <?php if($image):?>
                                <img src="<?php echo $image['sizes']['large'];?>" alt="<?php echo $image['alt'];?>">
                            <?php endif;?>
                        </div><!--.col-1-->
                        <div class="col-2">
                            <header><h2><?php the_title();?></h2></header>
                            <?php if($title):?>
                                <div class="title">
                                    <?php echo $title;?>
                                </div><!--.title-->
                            <?php endif;?>
                            <?php if($email):?>
                                <div class="email">
                                    <?php echo $email;?>
                                </div><!--.email-->
                            <?php endif;?>
                            <?php if($phone):?>
                                <div class="phone">
                                    <?php echo $phone;?>
                                </div><!--.phone-->
                            <?php endif;?>
                        </div><!--.col-2-->
                    </section><!--executive-director-->
                    <?php wp_reset_postdata();
                endif;
                //Staff types below?>
                <?php $args = array('taxonomy'=>"staff_type",'order'=>'ASC','orderby'=>'term_order','hide_empty'=>0,'exclude'=>array(12));
                $staff_types = get_terms($args);
                if(!is_wp_error($staff_types)&&is_array($staff_types)&&!empty($staff_types)):
                    foreach($staff_types as $term):?>
                        <?php $args = array(
                            'post_type'=>'staff',
                            'posts_per_page'=>-1,
                            'order'=>'ASC',
                            'orderby'=>'menu_order',
                            'tax_query'=>array(array(
                                'taxonomy'=>'staff_type',
                                'field'=>'term_id',
                                'terms'=>array($term->term_id)
                            ))
                        );
                        $query = new WP_Query($args);
                        if($query->have_posts()): ?>
                            <section class="staff-type clear-bottom">
                                <header><h2><?php echo $term->name;?></h2></header>
                                <?php while($query->have_posts()): $query->the_post();?>
                                    <?php $image = get_field("image");
                                    $phone = get_field("phone");
                                    $email = get_field("email");
                                    $title = get_field("title");?>
                                    <?php if($image):?>
                                        <div class="staff js-blocks">
                                            <img src="<?php echo $image['sizes']['large'];?>" alt="<?php echo $image['alt'];?>">
                                            <header><h3><?php the_title();?></h3></header>
                                            <?php if($title):?>
                                                <div class="title">
                                                    <?php echo $title;?>
                                                </div><!--.title-->
                                            <?php endif;?>
                                            <?php if($email):?>
                                                <div class="email">
                                                    <?php echo $email;?>
                                                </div><!--.email-->
                                            <?php endif;?>
                                            <?php if($phone):?>
                                                <div class="phone">
                                                    <?php echo $phone;?>
                                                </div><!--.phone-->
                                            <?php endif;?>
                                        </div><!--.staff-->
                                    <?php endif;?>
                                <?php endwhile;?>
                            </section><!--.staff-type-->
                            <?php wp_reset_postdata();
                        endif;?>
                    <?php endforeach;
                endif;?>
            </div><!--.wrapper-->
        </div><!--.col-1-->
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
