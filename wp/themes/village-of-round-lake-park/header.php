<header>
    <div class="container flex justify-between py-8">
        <div class="flex items-center">
            <a href="<?php echo get_home_url(); ?>">
                <?php
                $custom_logo_id = get_theme_mod('custom_logo');
                if ($custom_logo_id) {
                    echo wp_get_attachment_image($custom_logo_id, 'full', false, [
                        'class' => 'w-52',
                        'alt'   => get_bloginfo('name'),
                    ]);
                } else {
                    echo '<h1 class="text-xl text-primary font-bold">' . esc_html(get_bloginfo('name')) . '</h1>';
                }
                ?>
                <?php bloginfo('description'); ?>
            </a>
        </div>
        <div class="flex items-center">
            <?php if ($mayor = get_theme_mod('mayor_name')): ?>
                <p class="text-accent font-bold">Mayor <?php echo esc_html($mayor); ?></p>
            <?php endif; ?>
        </div>
        <div>
            <div class="flex items-center gap-8">
                <div class="flex items-center">
                    <button class="bg-primary hover:bg-primary-darken py-2 px-3 text-white cursor-pointer">EN</button>
                    <button class="bg-white hover:bg-white/90 py-2 px-3 text-black cursor-pointer">FR</button>
                    <button class="bg-white hover:bg-white/90 py-2 px-3 text-black cursor-pointer">ES</button>
                </div>
                <button class="flex items-center gap-2 bg-white hover:bg-white/90 py-1 px-3 text-black cursor-pointer">
                    <span class="dashicons dashicons-location-alt text-primary !w-auto !h-auto before:!text-2xl"></span>
                    Map
                </button>
                <div class="inline-flex">
                    <input type="text" placeholder="Search this site..." class="bg-white py-2 px-4 placeholder:italic" />
                    <button class="bg-primary hover:bg-primary-darken px-2 py-1 text-white cursor-pointer">
                        <span class="dashicons dashicons-search !w-auto !h-auto before:!text-2xl"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</header>