<?php

require_once( "login-logout-shortcode.php" );

class Login_Logout_Shortcode_Test extends WP_UnitTestCase {
    public function setUp() {
        parent::setUp();
    }

    public function test_login_logout_shortcode_is_registered_to_shortcode_handler() {
        global $shortcode_tags;

        $this->assertTrue( array_key_exists(
            "login-logout",
            $shortcode_tags
        ) );

        $expected = "login_logout_shortcode";
        $this->assertEquals( $expected, $shortcode_tags["login-logout"] );
    }

    public function test_when_not_logged_in_and_no_params_should_show_logout_link_redirecting_to_login_page_by_default() {
        $expected  = '<a href="' . esc_url( wp_logout_url() ) . '">';
        $expected .= esc_html( "Login" ) . '</a>';

        $actual = do_shortcode( "[login-logout]" );

        $this->assertEquals( $expected, $actual );
    }

    public function test_when_not_logged_in_and_text_when_logout_should_show_logout_link_and_text_when_logout() {
        $expected  = '<a href="' . esc_url( wp_logout_url() ) . '">';
        $expected .= esc_html( "Please just log me in" ) . '</a>';

        $actual = do_shortcode( '[login-logout text_when_logout="Please just log me in"]' );

        $this->assertEquals( $expected, $actual );
    }
}
