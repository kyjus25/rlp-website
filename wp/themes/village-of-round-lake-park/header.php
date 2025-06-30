<!DOCTYPE html>
<html>
<head>
    <title><?php wp_title(); ?></title>
    <?php wp_head(); ?>
</head>
<body>
    <header>
        <h1><a href="<?php echo get_home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
        <p><?php bloginfo('description'); ?></p>
    </header>
    <h1 class="text-3xl font-bold underline">
        Hello world!
    </h1>
    <div class="container">