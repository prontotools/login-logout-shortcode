<?php

/*
 * Plugin Name: Simple Login-Logout Shortcode
 * Plugin URI: https://github.com/prontotools/login-logout-shortcode
 * Description: A single shortcode you can place anywhere to allow visitors to login/logout.
 * Version: 1.0.0
 * Author: Pronto Tools
 * Author URI: http://www.prontotools.io
 */

function login_logout_shortcode( $atts ) {
    $defaults = array(
        "text_to_login"  => "Login",
        "text_to_logout" => "Logout",
        "redirect"       => $_SERVER["REQUEST_URI"],
        "class"          => "",
    );

    $atts = shortcode_atts( $defaults, $atts );

    if ( true == is_user_logged_in() ) {
        $html = '<a href="' . esc_url( wp_logout_url( $atts["redirect"] ) ) . '"';
        $text = $atts["text_to_logout"];
    } else {
        $html = '<a href="' . esc_url( wp_login_url( $atts["redirect"] ) ) . '"';
        $text = $atts["text_to_login"];
    }

    if ( "" != $atts["class"] ) {
        $html .= ' class="' . $atts["class"] . '">';
    } else {
        $html .= '>';
    }

    $html .= $text . "</a>";

    return $html;
}

add_shortcode( "login-logout", "login_logout_shortcode" );
