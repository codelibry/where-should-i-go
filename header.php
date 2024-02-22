<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
	<meta name="google-site-verification" content="-CcxukKeeXt-bDVpvn9Sxp41-mYwUi4fO8MFyRu3TZs" />
    <?php wp_head(); ?>

</head>

<?php
$body_classes = '';
?>

<body <?php body_class($body_classes); ?>>

    <?php get_template_part('template-parts/header/header'); ?>

    <div id="main">