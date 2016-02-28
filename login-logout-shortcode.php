<?php
/*
 * Plugin Name: Simple Login-Logout Shortcode
 * Plugin URI: https://github.com/prontotools/login-logout-shortcode
 * Description: A single shortcode you can place anywhere to allow visitors to login/logout.
 * Version: 1.0.0
 * Author: Pronto Tools
 * Author URI: http://www.prontotools.io
 */

function login_logout_shortcode() {
    $html  = '<a href="' . esc_url( wp_logout_url() ) . '">';
    $html .= 'Logout</a>';

    return $html;
}

add_shortcode( "login-logout", "login_logout_shortcode" );
