<?php
/*
Plugin Name: Custom Admin Menus
Plugin URI: 
Description: This plugin supports the tutorial in wptutsplus. It customizes the WordPress dashboard.
Version: 1.0
Author: 
Author 
License: GPLv2
*/

// Rename Posts to News in Menu
function change_post_menu_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Items';
    $submenu['edit.php'][5][0] = 'Items';
    $submenu['edit.php'][10][0] = 'Add Item';
}
add_action( 'admin_menu', 'change_post_menu_label' );


// Edit submenus
function change_post_object_label() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Itema';
    $labels->singular_name = 'Item';
    $labels->add_new = 'Add Item';
    $labels->add_new_item = 'Add Item';
    $labels->edit_item = 'Edit Item';
    $labels->new_item = ' Item';
    $labels->view_item = 'View Item';
    $labels->search_items = 'Search Items';
    $labels->not_found = 'No Items found';
    $labels->not_found_in_trash = 'No Items found in Trash';
}
add_action( 'admin_menu', 'change_post_object_label' );



// Remove Comments menu item for all but Administrators
function wptutsplus_remove_comments_menu_item() {
    $user = wp_get_current_user();
    if ( ! $user->has_cap( 'manage_options' ) ) {
        remove_menu_page( 'edit-comments.php' );
    }
}
add_action( 'admin_menu', 'wptutsplus_remove_comments_menu_item' );



?>