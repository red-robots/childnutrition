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
		<div class="col-1">
			<?php if(is_home()) { ?>
				<h1 class="logo">
				<a href="<?php bloginfo('url'); ?>"><img src="<?php echo get_template_directory_uri()."/images/logo.png";?>" alt="<?php bloginfo('name'); ?>"></a>
				</h1>
			<?php } else { ?>
				<div class="logo">
				<a href="<?php bloginfo('url'); ?>"><img src="<?php echo get_template_directory_uri()."/images/logo.png";?>" alt="<?php bloginfo('name'); ?>"></a>
				</div>
			<?php } ?>
		</div><!--.col-1-->
		<div class="col-2">
			<?php $provider_link = get_field("provider_link","option");
			$provider_link_text = get_field("provider_link_text","option");
			$parent_link = get_field("parent_link","option");
			$parent_link_text = get_field("parent_link_text","option");
			$donate_link = get_field("donate_link","option");
			$donate_link_text = get_field("donate_link_text","option"); 
			$facebook_link = get_field("facebook_link","option");
			$menu = get_field("menu","option");?>
			<?php if(($provider_link && $provider_link_text)||
				($parent_link && $parent_link_text)||
				($donate_link && $donate_link_text)):?>
				<div class="row-1">
					<?php if($provider_link && $provider_link_text):?>
						<div class="provider">
							<a href="<?php echo $provider_link;?>">
								<?php echo $provider_link_text;?>
							</a>
						</div><!--.provider-->
					<?php endif;?>
					<?php if($parent_link && $parent_link_text):?>
						<div class="parent">
							<a href="<?php echo $parent_link;?>">
								<?php echo $parent_link_text;?>
							</a>
						</div><!--.parent-->
					<?php endif;?>
					<?php if($donate_link && $donate_link_text):?>
						<div class="donate">
							<a href="<?php echo $donate_link;?>">
								<?php echo $donate_link_text;?>
							</a>
						</div><!--.donate-->	
					<?php endif;?>
				</div><!--.row-1-->
			<?php endif;?>
			<?php if($facebook_link):?>
				<div class="row-2">
					<a href="<?php echo $facebook_link;?>"><i class="fa fa-facebook"></i></a>
				</div><!--.row-2-->
			<?php endif;?>
			<?php if($menu):?>
				<div class="row-3">
					<nav id="site-navigation" class="main-navigation" role="navigation">
						<ul>
							<?php foreach($menu as $tab):?>
								<li id="tab;<?php echo sanitize_title_with_dashes($tab['menu_title']);?>">
									<?php echo $tab['menu_title'];?>
								</li><!--#tab-###-->
							<?php endforeach;?>
						</ul>
					</nav><!-- #site-navigation -->
					<div class="hover-menu-wrapper">
						<?php foreach($menu as $tab):?>
							<div class="hover-menu clear-bottom" id="menu-<?php echo sanitize_title_with_dashes($tab['menu_title']);?>">
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
													<li class="clear-bottom">
														<i class="fa fa-caret-right"></i>
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
					</div><!--.hover-menu-wrapper-->
				</div><!--.row-3-->
			<?php endif;?>
		</div><!--.col-2-->
		<?php wp_reset_postdata();?>
	</header><!-- #masthead -->

	<div id="content" class="site-content wrapper">
