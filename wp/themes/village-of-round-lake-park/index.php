<!DOCTYPE html>
<html>
    <head>
        <title><?php wp_title(); ?></title>
        <meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width" />
		<!-- <link rel="icon" type="image/png" href={isProd ? '/rlp-website/favicon.png' : '/favicon.png'} /> -->
        <?php wp_head(); ?>
    </head>
    <body class="antialiased font-sans bg-canvas text-[#565656]">
        
        <?php if ($img_url = get_theme_mod('canvas_image')): ?>
        <div class="absolute top-0 w-full -z-10">
			<div style="background-image: url(<?php echo esc_url($img_url); ?>)" class="bg-[url('/background.jpg')] h-[600px] bg-no-repeat bg-fit min-[1900px]:bg-cover bg-[center_top_-25rem]"></div>
			<div class="absolute top-[216px] w-full backdrop-blur-[2px] h-[390px] bg-linear-to-b from-[rgba(0,0,0,0)] to-[#F2F2F2]"></div>
		</div>
        <?php endif; ?>
        

        <?php get_header(); ?>

        <div class="container">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <article>
                    <?php if ( get_post_type() === 'post' ) : ?>
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <?php endif; ?>
                    <div><?php the_content(); ?></div>
                </article>
            <?php endwhile; else : ?>
                <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
            <?php endif; ?>
        </div>

        <?php get_footer(); ?>
        <?php wp_footer(); ?>
    </body>
</html>