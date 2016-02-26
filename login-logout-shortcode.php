<?php

/*
 * Plugin Name: Login-Logout Shortcode
 * Plugin URI: http://www.prontotools.io/
 * Version: 1.0.0
 */

function login_logout_shortcode() {
    $html  = '<a href="' . esc_url( wp_logout_url() ) . '">';
    $html .= 'Logout</a>';

    return $html;
}

add_shortcode( "login-logout", "login_logout_shortcode" );
