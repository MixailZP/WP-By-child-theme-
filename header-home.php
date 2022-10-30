<?php
/**
 * Header file for the Twenty Twenty WordPress default theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

?><!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

	<head>

		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" >

		<link rel="profile" href="https://gmpg.org/xfn/11">

		<?php wp_head(); ?>

	</head>

	<body <?php body_class(); ?>>

		<?php
		wp_body_open();
		?>
    <header class="header">
        <a href="" class="logo"><img src="../../../wp-content/themes/twentytwenty-child/assets/images/logo.png" width="150px" height="70px" alt="img_logo"></a>
        <input class="menu-btn" type="checkbox" id="menu-btn" />
        <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
        <ul class="menu">
            <li><a href="http://projecttest/">Главная</a></li>
            <li><a href="http://projecttest/publication/">Публикации</a></li>
            <li><a href="http://projecttest/add-page/" class="home_addpublication"><img src="../../../wp-content/themes/twentytwenty-child/assets/svg/add-icon.png" class="home_addpublicationIMG" alt="icon_add">Добавить</a></li>
        </ul>
    </header>









