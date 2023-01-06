<?php get_template_part('/template-parts/doc-type');?>
<div id="grid-two-col">
	<!-- /open grid wrapper -->
	<div class="grid-header"><?php get_header(); ?></div>
	<section class="page-title">
		<h1><?php echo $post->post_type; ?></h1>
	</section>
	<aside class="grid-aside">
		<?php get_sidebar(); ?>
	</aside>
	<main class="grid-main animate fadeIn" id="main-container">
		<article class="grid-article">
			<?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb('<p id="breadcrumbs">','</p>'); } ?>

			<h1><?php the_title(); ?></h1>

			

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<?php the_content(); ?>
			<?php endwhile; else: ?>
			<?php endif; ?>


			<!-- OPEN custom metabox info -->
			<div class="metabox-container">

			<div class="metabox-line">
				<?php $post_meta_value = get_post_meta($post->ID, 'shop_name', true);
					echo '<h5>Nombre</h5> ', "<p>" . $post_meta_value . "</p>"; ?>
			</div>


			<div class="metabox-line">
				<?php $post_meta_value = get_post_meta($post->ID, 'shop_address', true);
					echo '<h5>Dirección</h5> ', "<p>" . $post_meta_value . "</p>"; ?>
			</div>


			<div class="metabox-line">
				<?php $post_meta_value = get_post_meta($post->ID, 'shop_description', true);
					echo '<h5>Descripción</h5> ', "<p>" . $post_meta_value . "</p>"; ?>
			</div>
			
			<figure>
				<?php the_post_thumbnail(''); ?>
			</figure>

			</div>
			<!-- CLOSE custom metabox info -->


		</article>
		<?php get_template_part ('/template-parts/author'); ?>

		<nav id="nav-single">
			<div class="pag-previous"><?php previous_post_link( '%link', __( '&laquo; Anterior', 'foo' ) ); ?></div>
			<div class="pag-next"><?php next_post_link( '%link', __( 'Siguiente &raquo;', 'foo' ) ); ?></div>
		</nav>
		
	</main>
	<?php get_footer(); ?>