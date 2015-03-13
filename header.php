<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package russbrown
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,100' rel='stylesheet' type='text/css'>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">

    <header class="header has-floating-buttons" role="banner">
        <h3 class="header__title"><a href="/">Russ Brown</a></h3>

        <a href="/links" class="floating-button header__floating-button__one">
            <i class="floating-button__icon fa fa-list-ul"></i>
        </a>

        <a href="/contact" class="floating-button header__floating-button__two">
            <i class="floating-button__icon fa fa-envelope"></i>
        </a>
    </header>  

	<div id="content" class="site-content">
