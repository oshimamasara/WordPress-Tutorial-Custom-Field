<?php
/**
 *
 * The template part for displaying content
 *
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class();?>>
	<?php if( has_post_thumbnail() && ! post_password_required() ) : ?>
		<header class="entry-header">
			<div class="entry-thumbnail post-thumbnail">
				<?php if ( ! is_single() ) : ?>
					<a href="<?php esc_url( the_permalink() ); ?>" class="read-more-button"><?php the_post_thumbnail( 'medium' ); ?></a>
				<?php else : ?>
					<?php the_post_thumbnail( 'medium' ); ?>
				<?php endif; ?>
			</div>

			<div class="entry-inside">
				<?php if ( ! is_single() ) : ?>
					<a href="<?php esc_url( the_permalink() ); ?>" class="read-more-button"><?php esc_html_e( 'Read more', 'xclean' ); ?></a>
				<?php endif; ?>
			</div><!-- End .entry-inside -->
		</header><!-- End .entry-header -->
	<?php endif; ?>

	<div class="entry-description">
		<?php if( is_single() ) : ?>
			<h2><?php esc_html( the_title() ); ?></h2>
		<?php else : ?>
			<h2><a href="<?php esc_url( the_permalink() ); ?>" rel="bookmark"><?php esc_html( the_title() ); ?></a></h2>
		<?php endif; ?>

		<!-- <div class="entry-meta "><?php xclean_post_meta(); ?></div> -->

		<!-- Custom Field   Price -->
		<?php
		  $price = get_post_meta($post->ID, 'Price', true);
		  if($price){ ?>
		    <h4><? echo $price . '円'; ?></h4>
		    <?php
		  } else {
		    echo "No pricing";
		} ?>

		<!-- Custom Field   Allergy -->
		<?php
		  $allergy = get_post_meta($post->ID, 'Allergy', true);
		  if($allergy){ ?>
		    <h4><? echo 'アレルギー:' . $allergy ; ?></h4>
		    <?php
		  } else {
		    echo "アレルギー物質なし";
		  } ?>	

	</div>

	<div class="entry-content">
		<?php
			if ( is_single() ) {
				the_content( '' );
				wp_link_pages();
			} else {
				the_excerpt();
			}
		?>
	</div><!-- End .entry-content -->
</article><!-- End #post-## -->