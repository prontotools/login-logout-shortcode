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
}
