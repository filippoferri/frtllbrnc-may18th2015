<?php

// Custom WordPress Footer
function remove_footer_admin () {
    echo '&copy; 2015 Branca';
}
add_filter('admin_footer_text', 'remove_footer_admin');

// remove WordPress version
function demo_footer_version ($default) {
    return '';
}
add_filter ('update_footer', 'demo_footer_version', 999);

//Unwanted dashboard widgets
function remove_dashboard_meta() {
remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_primary', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
	remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
	remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_activity', 'dashboard', 'normal' );
	remove_action( 'welcome_panel', 'wp_welcome_panel' );
}
add_action( 'admin_init', 'remove_dashboard_meta' );

//Remove Metaboxes
function remove_metaboxes() {
 	remove_meta_box( 'postcustom' , 'post' , 'normal' ); //removes custom fields for page
 	//remove_meta_box( 'commentstatusdiv' , 'post' , 'normal' ); //removes comments status for page
 	remove_meta_box( 'commentsdiv' , 'post' , 'normal' ); //removes comments for page
 	remove_meta_box( 'authordiv' , 'post' , 'normal' ); //removes author for page
}
add_action( 'admin_menu' , 'remove_metaboxes' );

/**
 * Admin Style
 *
 *
 */
function admin_css() {
    wp_enqueue_style( 'admin_css', get_template_directory_uri() . '/dist/styles/admin-style.css' );
}
add_action('admin_print_styles', 'admin_css' );


/**
 * Login Style
 *
 *
 */
// Add Login Style
function login_css() {
    wp_enqueue_style( 'login_css', get_template_directory_uri() . '/dist/styles/login-style.css' );
    //wp_enqueue_script( 'custom-login', get_template_directory_uri() . '/dist/scripts/style-login.js' );
}
add_action( 'login_enqueue_scripts', 'login_css' );
// Change Logo Url
function my_login_logo_url() {
    return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

    //Add Login Tutle
    function my_login_logo_url_title() {
        return 'Branca';
    }
    add_filter( 'login_headertitle', 'my_login_logo_url_title' );

    //Remove Password Link
    function remove_lostpassword_text ( $text ) {
        if ($text == 'Lost your password?'){$text = '';}
        return $text;
    }
    add_filter( 'gettext', 'remove_lostpassword_text' );

//Remove Logo from admin bar
function annointed_admin_bar_remove() {
   global $wp_admin_bar;

   /* Remove their stuff */
   $wp_admin_bar->remove_menu('wp-logo');
}



//Remove Menu
function remove_menus(){
  global $submenu, $userdata;
  get_currentuserinfo();
  if ( $userdata->ID != 1 ) {
    //remove_menu_page( 'index.php' );                  //Dashboard
    //remove_menu_page( 'edit.php' );                   //Posts
    //remove_menu_page( 'upload.php' );                 //Media
    //remove_menu_page( 'edit.php?post_type=page' );    //Pages
    //remove_menu_page( 'edit-comments.php' );          //Comments
    //remove_menu_page( 'themes.php' );                 //Appearance
    //remove_menu_page( 'plugins.php' );                //Plugins
    //remove_menu_page( 'users.php' );                  //Users
    remove_menu_page( 'tools.php' );                  //Tools
    //remove_menu_page( 'options-general.php' );        //Settings
  }
}
add_action( 'admin_menu', 'remove_menus' );
