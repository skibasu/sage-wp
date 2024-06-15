<?php

/**
 * Theme setup.
 */

namespace App;

use function Roots\bundle;

/**
 * Register the theme assets.
 *
 * @return void
 */
add_action('wp_enqueue_scripts', function () {
   bundle('app')->enqueue();
}, 100);

/**
 * Register the theme assets with the block editor.
 *
 * @return void
 */
add_action('enqueue_block_editor_assets', function () {
   bundle('editor')->enqueue();
}, 100);

add_action('admin_enqueue_scripts', function () {
   bundle('admin')->enqueue();
}, 100);

add_action('admin_enqueue_scripts', function () {
   wp_enqueue_media();
});
/**
 * Register the initial theme setup.
 *
 * @return void
 */
add_action('after_setup_theme', function () {
   /**
    * Disable full-site editing support.
    *
    * @link https://wptavern.com/gutenberg-10-5-embeds-pdfs-adds-verse-block-color-options-and-introduces-new-patterns
    */
   remove_theme_support('block-templates');

   /**
    * Register the navigation menus.
    *
    * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
    */
   register_nav_menus([
      'primary_navigation' => __('Primary Navigation', 'sage'),
   ]);

   /**
    * Disable the default block patterns.
    *
    * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#disabling-the-default-block-patterns
    */
   remove_theme_support('core-block-patterns');

   /**
    * Enable plugins to manage the document title.
    *
    * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
    */
   add_theme_support('title-tag');

   /**
    * Enable post thumbnail support.
    *
    * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
    */
   add_theme_support('post-thumbnails');

   /**
    * Enable responsive embed support.
    *
    * @link https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-support/#responsive-embedded-content
    */
   add_theme_support('responsive-embeds');

   /**
    * Enable HTML5 markup support.
    *
    * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
    */
   add_theme_support('html5', [
      'caption',
      'comment-form',
      'comment-list',
      'gallery',
      'search-form',
      'script',
      'style',
   ]);

   /**
    * Enable selective refresh for widgets in customizer.
    *
    * @link https://developer.wordpress.org/reference/functions/add_theme_support/#customize-selective-refresh-widgets
    */
   add_theme_support('customize-selective-refresh-widgets');
}, 20);


add_action('init', function () {
   add_image_size('icon-38', 38, 38);
   add_image_size('column-267-320', 267, 320);
});
/**
 * Register the theme sidebars.
 *
 * @return void
 */
add_action('widgets_init', function () {
   $config = [
      'before_widget' => '<section class="widget %1$s %2$s">',
      'after_widget' => '</section>',
      'before_title' => '<h3>',
      'after_title' => '</h3>',
   ];

   register_sidebar([
      'name' => __('Primary', 'sage'),
      'id' => 'sidebar-primary',
   ] + $config);

   register_sidebar([
      'name' => __('Footer', 'sage'),
      'id' => 'sidebar-footer',
   ] + $config);


});

add_action('wp_nav_menu_item_custom_fields', function ($item_id, $item, $depth, $args) {
   logger(json_encode($args));
   $hasChildren = !$args->walker->has_children ? "nie" : "tak";
   logger(("$hasChildren" . " " . "$depth"));
   if ($depth > 0 || !$args->walker->has_children) {
      return;
   }
   $image_urls = get_post_meta($item_id, '_custom_image_urls', true);
   $image_urls = $image_urls ? json_decode($image_urls, true) : array();

   $submenu_page_id = get_post_meta($item_id, '_submenu_page_id', true);
   $custom_text = get_post_meta($item_id, '_custom_text', true);

   $output = '';

   $output .= '<p class="field-custom description description-wide">';
   $output .= '<label for="edit-menu-item-submenu-page-' . $item_id . '">';
   $output .= __('Select Submenu Page', 'text_domain') . '<br />';
   $output .= wp_dropdown_pages(
      array(
         'name' => 'menu-item-submenu-page[' . $item_id . ']',
         'id' => 'edit-menu-item-submenu-page-' . $item_id,
         'selected' => $submenu_page_id,
         'show_option_none' => __('None', 'text_domain'),
         'option_none_value' => '',
         'child_of' => $item->object_id,
         'echo' => false // Używamy 'echo' => false, aby zwrócić kod HTML zamiast go bezpośrednio wyświetlać
      )
   );
   $output .= '</label>';
   $output .= '</p>';

   $output .= '<p class="field-custom description description-wide">';
   $output .= '<label for="edit-menu-item-custom-images-' . $item_id . '">';
   $output .= __('Custom Images', 'text_domain') . '<br />';
   $output .= '<input type="hidden" id="edit-menu-item-custom-images-' . $item_id . '" class="widefat code edit-menu-item-custom-images" name="menu-item-custom-images[' . $item_id . ']" value="' . esc_attr(json_encode($image_urls)) . '" />';
   $output .= '<button type="button" class="button upload_images_button" data-target="#edit-menu-item-custom-images-' . $item_id . '">' . __('Upload Images', 'text_domain') . '</button>';
   $output .= '</label>';
   $output .= '</p>';

   // Wyświetlanie miniatur wybranych obrazków
   $output .= '<div class="my-admin-custom-menu menu-item-image-previews" id="menu-item-image-previews-' . $item_id . '">';
   if (!empty($image_urls)) {
      foreach ($image_urls as $image_url) {
         $output .= '<div class="menu-item-image-preview">';
         $output .= '<div class="menu-item-image-preview-wrapper" style="position:relative">';
         $output .= '<img src="' . esc_url($image_url) . '" style="max-width: 70px; max-height: 70px;display:block;" />';
         $output .= '<button type="button" class="button remove_image_button" data-image-url="' . esc_url($image_url) . '" style="position:absolute">X</button>';
         $output .= '</div></div>';
      }
   }
   $output .= '</div>';

   $output .= '<p class="field-custom description description-wide">';
   $output .= '<label for="edit-menu-item-custom-text-' . $item_id . '">';
   $output .= __('Custom Text', 'text_domain') . '<br />';
   $output .= '<input type="text" id="edit-menu-item-custom-text-' . $item_id . '" class="widefat code edit-menu-item-custom-text" name="menu-item-custom-text[' . $item_id . ']" value="' . esc_attr($custom_text) . '" />';
   $output .= '</label>';
   $output .= '</p>';

   echo $output;
}, 10, 4);


add_action('wp_update_nav_menu_item', function ($menu_id, $menu_item_db_id, $args) {
   // Zapisanie ID wybranej podstrony
   if (isset($_POST['menu-item-submenu-page'][$menu_item_db_id])) {
      update_post_meta($menu_item_db_id, '_submenu_page_id', $_POST['menu-item-submenu-page'][$menu_item_db_id]);
   } else {
      delete_post_meta($menu_item_db_id, '_submenu_page_id');
   }

   // Zapisanie niestandardowego tekstu
   if (isset($_POST['menu-item-custom-text'][$menu_item_db_id])) {
      update_post_meta($menu_item_db_id, '_custom_text', sanitize_text_field($_POST['menu-item-custom-text'][$menu_item_db_id]));
   } else {
      delete_post_meta($menu_item_db_id, '_custom_text');
   }
   if (isset($_POST['menu-item-custom-images'][$menu_item_db_id])) {
      $custom_images = sanitize_text_field($_POST['menu-item-custom-images'][$menu_item_db_id]);
      update_post_meta($menu_item_db_id, '_custom_image_urls', $custom_images);
   } else {
      delete_post_meta($menu_item_db_id, '_custom_image_urls');
   }
}, 10, 3);



// Ładowanie zapisanych wartości
add_filter('wp_setup_nav_menu_item', function ($menu_item) {
   // Pobranie zapisanych danych meta
   $menu_item->submenu_page_id = get_post_meta($menu_item->ID, '_submenu_page_id', true);
   $menu_item->custom_text = get_post_meta($menu_item->ID, '_custom_text', true);
   $menu_item->custom_image_urls = get_post_meta($menu_item->ID, '_custom_image_urls', true);

   return $menu_item;
});
