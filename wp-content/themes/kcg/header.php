<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php echo kcg_favicon(); ?>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<main data-page="<?php echo kcg_page_name(); ?>">
<?php 
	$kcg_is_page = is_page( 'Home' ) || is_page( 'contact' ) ? ' h-white' : '';
 ?>
<header class="header <?php echo esc_attr($kcg_is_page); ?>">
    <?php get_template_part( 'template-parts/header/nav/content', 'nav'); ?>
</header>
