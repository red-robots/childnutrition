<?php
/**
 * The header for theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ACStarter
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'acstarter' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<?php $post = get_post(50);
		setup_postdata( $post );?>

		<?php if(is_home()) { ?>
			<h1 class="logo">
			<a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
			</h1>
		<?php } else { ?>
			<div class="logo">
			<a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
			</div>
		<?php } ?>
		<?php $menu = get_field("menu","option");
		if($menu):?>
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<ul>
					<?php foreach($menu as $tab):?>
						<li id="tab-<?php echo sanitize_title_with_dashes($tab['menu_title']);?>">
							<?php echo $tab['menu_title'];?>
						</li><!--#tab-###-->
					<?php endforeach;?>
				</ul>
			</nav><!-- #site-navigation -->
			<?php foreach($menu as $tab):?>
				<div class="hover-menu" id="menu-<?php echo sanitize_title_with_dashes($tab['menu_title']);?>">
					<div class="col-1">
						<?php if($tab['title']):?>
							<h2><?php echo $tab['title'];?></h2>
						<?php endif;
						if($tab['copy']):?>
							<div class="copy">
								<?php echo $tab['copy'];?>
							</div><!--.copy-->
						<?php endif;?>
					</div><!--.col-1-->
					<div class="col-2">
						<?php if($tab['links']):?>
							<ul>
								<?php foreach($tab['links'] as $link):?>
									<?php if($link['link']):?>
										<li>
											<a href="<?php echo get_the_permalink($link['link']);?>">
												<?php echo get_the_title($link['link']);?>
											</a>
										</li>
									<?php endif;?>
								<?php endforeach;?>
							</ul>
						<?php endif;?>
					</div><!--.col-2-->
				</div><!--#menu-####-->
			<?php endforeach;?>
		<?php endif;?>
		
		<?php wp_reset_postdata();?>
	</header><!-- #masthead -->

	<div id="content" class="site-content wrapper">
