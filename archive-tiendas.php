<?php get_template_part('/template-parts/doc-type'); ?>
<div id="grid-one-col-wide">
    <!-- OPEN GRID / close on footer -->
    <div class="grid-header"><?php get_header(); ?></div>

    <section class="page-title">
        <?php
        the_archive_title('<h1 class="page-title">', '</h1>');
        the_archive_description('<div class="archive-description">', '</div>');
        ?>
    </section>

    <main class="grid-main animate fadeIn" id="main-container">
        <?php if (function_exists('yoast_breadcrumb')) {
            yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
        } ?>

        <section class="post-grid">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <div class="post-col col-4">
                        <div class="grid-item">
                            <figure><a title="<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('large'); ?></a>
                            </figure>
                            <div class="grid-item-content">
                                <h5>
                                    <?php the_title(); ?>
                                </h5>
                                <p class="grid-item-excerpt">
                                    <?php echo excerpt('32'); ?>
                                </p>
                                <a class="button" href="<?php the_permalink(); ?>"><?php _e('ver más', 'panambi'); ?></a>
                            </div>
                        </div>
                    </div>
                <?php endwhile;
            else : ?>
                <p class="no-post-msj"><?php _e('Lo sentimos, ninguna entrada coincide con tus criterios de búsqueda.
		                Utilize el menú de la parte superior para navegar por nuestra web.', 'foo'); ?></p>
            <?php endif; ?>
        </section>

            <nav class="pagination">
                <?php echo paginate_links(); ?>
            </nav>

    </main>
    <?php get_footer(); ?>