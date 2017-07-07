<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ACStarter
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<?php $business_name = get_field("business_name","option");
		$non_discrimination_text = get_field("non_discrimination_text","option");
		$non_discrimination_link = get_field("non_discrimination_link","option");
		$address = get_field("address","option");?>
		<div class="col-1">
			<?php if($business_name):?>
				<div class="business-name">
					<?php echo $business_name;?>
				</div><!--.business-name-->
			<?php endif;?>
			<?php if($non_discrimination_link && $non_discrimination_text):?>
				<div class="non-discrimination">
					<a href="<?php echo $non_discrimination_link;?>">
						<?php echo $non_discrimination_text;?>
					</a>
				</div><!--.non-discrimination-->
			<?php endif;?>
		</div><!--.col-1-->
		<div class="col-2">
			<?php if($address):?>
				<div class="addresss">
					<?php echo $address;?>
				</div><!--.address-->
			<?php endif;?>
			<div class="sitemap-bw">
				<?php wp_nav_menu( array( 'theme_location' => 'sitemapbw' ) ); ?>
			</div><!--.sitemap-bw-->
		</div><!--.col-2-->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
