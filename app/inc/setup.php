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
   wp_enqueue_media();
});
add_action('admin_enqueue_scripts', function () {
   bundle('admin')->enqueue();
}, 100);


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
   add_image_size('column-364-389', 364, 389);
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

// add_action('wp_nav_menu_item_custom_fields', function ($item_id, $item, $depth, $args) {



//    $image_ids = get_post_meta($item_id, '_image_ids', true);
//    $image_ids = $image_ids ? json_decode($image_ids, true) : array();

//    $submenu_page_id = get_post_meta($item_id, '_submenu_page_id', true);
//    $link_description = get_post_meta($item_id, '_link_description', true);
//    $custom_button_title = get_post_meta($item_id, '_custom_button_title', true);

//    $output = '';

//    $output .= '<p class="field-custom description description-wide">';
//    $output .= '<label class="my-admin-label my-admin-label-full for="menu-item-submenu-page-' . $item_id . '">';
//    $output .= __('Select Outstanding Link', 'text_domain') . '<br />';

//    // Sprawdź, czy element menu ma archiwum
//    $post_type = get_post_type($item->object_id);
//    $post_type_object = get_post_type_object($post_type);
//    logger(json_encode($post_type_object->has_archive));
//    if ($post_type_object && $post_type_object->has_archive) {
//       // Jeśli element menu ma archiwum, pobierz posty dla danego typu postu
//       $posts = get_posts([
//          'post_type' => $post_type,
//          'numberposts' => -1
//       ]);

//       $output .= '<select name="menu-item-submenu-page[' . $item_id . ']" id="menu-item-submenu-page-' . $item_id . '">';
//       $output .= '<option value="">' . __('None', 'text_domain') . '</option>';

//       foreach ($posts as $post) {
//          $selected = $submenu_page_id == $post->ID ? ' selected="selected"' : '';
//          $output .= '<option value="' . $post->ID . '"' . $selected . '>' . $post->post_title . '</option>';
//       }

//       $output .= '</select>';
//    } else {
//       // Jeśli element menu jest stroną, pobierz podstrony
//       $output .= wp_dropdown_pages([
//          'name' => 'menu-item-submenu-page[' . $item_id . ']',
//          'id' => 'menu-item-submenu-page-' . $item_id,
//          'selected' => $submenu_page_id,
//          'show_option_none' => __('None', 'text_domain'),
//          'option_none_value' => '',
//          'child_of' => $item->object_id,
//          'echo' => false // Używamy 'echo' => false, aby zwrócić kod HTML zamiast go bezpośrednio wyświetlać
//       ]);
//    }
//    $output .= '</label>';
//    $output .= '</p>';

//    $output .= '<p class="field-custom description description-wide">';
//    $output .= '<label class="my-admin-label" for="menu-item-custom-text-' . $item_id . '">';
//    $output .= __('Outstanding Link Title', 'text_domain') . '<br />';
//    $output .= '<input type="text" id="menu-item-custom-text-' . $item_id . '" class="widefat code menu-item-custom-text" name="menu-item-custom-text[' . $item_id . ']" value="' . esc_attr($link_description) . '" />';
//    $output .= '</label>';
//    $output .= '</p>';


//    $output .= '<p class="field-custom description description-wide">';
//    $output .= '<label class="my-admin-label" for="menu-item-custom-button-title-' . $item_id . '">';
//    $output .= __('Outstanding Link Button Title', 'text_domain') . '<br />';
//    $output .= '<input type="text" id="menu-item-custom-button-title-' . $item_id . '" class="widefat code menu-item-custom-button-title" name="menu-item-custom-button-title[' . $item_id . ']" value="' . esc_attr($custom_button_title) . '" />';
//    $output .= '</label>';
//    $output .= '</p>';

//    $output .= '<p class="field-custom description description-wide">';
//    $output .= '<label class="my-admin-label" for="menu-item-custom-images-' . $item_id . '">';

//    $output .= __('Footer Logos - Images', 'text_domain') . '<br />';
//    $output .= '<input type="hidden" id="menu-item-custom-images-' . $item_id . '" class="widefat code menu-item-custom-images" name="menu-item-custom-images[' . $item_id . ']" value="' . esc_attr(json_encode($image_ids)) . '" />';
//    $output .= '</label>';


//    $output .= '</p>';

//    // Wyświetlanie miniatur wybranych obrazków
//    $output .= '<div class="my-admin-custom-menu menu-item-image-previews" id="menu-item-image-previews-' . $item_id . '">';
//    if (!empty($image_ids)) {
//       foreach ($image_ids as $image_id) {
//          $image_url = wp_get_attachment_url($image_id);
//          $output .= '<div class="menu-item-image-preview">';
//          $output .= '<div class="menu-item-image-preview-wrapper" style="position:relative">';
//          $output .= '<img src="' . esc_url($image_url) . '" style="max-width: 70px; max-height: 70px;display:block;" />';
//          $output .= '<button type="button" class="button remove_image_button" data-image-id="' . esc_attr($image_id) . '" style="position:absolute">X</button>';
//          $output .= '</div></div>';
//       }
//    }
//    $output .= '</div>';
//    $output .= '<button type="button" class="my-admin-upload-button button upload_images_button" data-target="#menu-item-custom-images-' . $item_id . '">' . __('Upload Images', 'text_domain') . '</button>';

//    echo $output;
// }, 10, 4);




add_action('wp_nav_menu_item_custom_fields', function ($item_id, $item, $depth, $args) {

   $image_ids = get_post_meta($item_id, '_image_ids', true);
   $image_ids = $image_ids ? json_decode($image_ids, true) : array();

   $submenu_page_id = get_post_meta($item_id, '_submenu_page_id', true);
   $link_description = get_post_meta($item_id, '_link_description', true);
   $custom_button_title = get_post_meta($item_id, '_custom_button_title', true);

   $output = '';

   $output .= '<p class="field-custom description description-wide">';
   $output .= '<label class="my-admin-label my-admin-label-full for="menu-item-submenu-page-' . $item_id . '">';
   $output .= __('Select Outstanding Link', 'text_domain') . '<br />';

   $front_page_id = get_option('page_on_front');
   $posts_page_id = get_option('page_for_posts');
   $ebooks_page_id = get_option('page_for_ebooks');
   $products_page_id = get_option('page_for_products');
   $industries_page_id = get_option('page_for_industries');

   // Sprawdzanie, czy strona jest front_page, posts_page, ebooks_page, products_page, industries_page
   if ($item->object === 'page' && in_array($item->object_id, [$front_page_id, $posts_page_id, $ebooks_page_id, $products_page_id, $industries_page_id])) {
      $post_type = '';

      if ($item->object_id == $posts_page_id) {
         $post_type = 'post';
      } elseif ($item->object_id == $ebooks_page_id) {
         $post_type = 'ebook';
      } elseif ($item->object_id == $products_page_id) {
         $post_type = 'product';
      } elseif ($item->object_id == $industries_page_id) {
         $post_type = 'industry';
      }

      $posts = get_posts([
         'post_type' => $post_type,
         'posts_per_page' => -1,
         'orderby' => 'title',
         'order' => 'ASC'
      ]);

      $output .= '<select name="menu-item-submenu-page[' . $item_id . ']" id="menu-item-submenu-page-' . $item_id . '">';
      $output .= '<option value="">' . __('None', 'text_domain') . '</option>';

      foreach ($posts as $post) {
         $selected = $submenu_page_id == $post->ID ? ' selected="selected"' : '';
         $output .= '<option value="' . $post->ID . '"' . $selected . '>' . $post->post_title . '</option>';
      }

      $output .= '</select>';
   } else {
      // Inne strony traktowane jak wcześniej
      $output .= wp_dropdown_pages([
         'name' => 'menu-item-submenu-page[' . $item_id . ']',
         'id' => 'menu-item-submenu-page-' . $item_id,
         'selected' => $submenu_page_id,
         'show_option_none' => __('None', 'text_domain'),
         'option_none_value' => '',
         'child_of' => $item->object_id,
         'echo' => false // Używamy 'echo' => false, aby zwrócić kod HTML zamiast go bezpośrednio wyświetlać
      ]);
   }
   $output .= '</label>';
   $output .= '</p>';

   $output .= '<p class="field-custom description description-wide">';
   $output .= '<label class="my-admin-label" for="menu-item-custom-text-' . $item_id . '">';
   $output .= __('Outstanding Link Title', 'text_domain') . '<br />';
   $output .= '<input type="text" id="menu-item-custom-text-' . $item_id . '" class="widefat code menu-item-custom-text" name="menu-item-custom-text[' . $item_id . ']" value="' . esc_attr($link_description) . '" />';
   $output .= '</label>';
   $output .= '</p>';

   $output .= '<p class="field-custom description description-wide">';
   $output .= '<label class="my-admin-label" for="menu-item-custom-button-title-' . $item_id . '">';
   $output .= __('Outstanding Link Button Title', 'text_domain') . '<br />';
   $output .= '<input type="text" id="menu-item-custom-button-title-' . $item_id . '" class="widefat code menu-item-custom-button-title" name="menu-item-custom-button-title[' . $item_id . ']" value="' . esc_attr($custom_button_title) . '" />';
   $output .= '</label>';
   $output .= '</p>';

   $output .= '<p class="field-custom description description-wide">';
   $output .= '<label class="my-admin-label" for="menu-item-custom-images-' . $item_id . '">';

   $output .= __('Footer Logos - Images', 'text_domain') . '<br />';
   $output .= '<input type="hidden" id="menu-item-custom-images-' . $item_id . '" class="widefat code menu-item-custom-images" name="menu-item-custom-images[' . $item_id . ']" value="' . esc_attr(json_encode($image_ids)) . '" />';
   $output .= '</label>';

   $output .= '</p>';

   // Wyświetlanie miniatur wybranych obrazków
   $output .= '<div class="my-admin-custom-menu menu-item-image-previews" id="menu-item-image-previews-' . $item_id . '">';
   if (!empty($image_ids)) {
      foreach ($image_ids as $image_id) {
         $image_url = wp_get_attachment_url($image_id);
         $output .= '<div class="menu-item-image-preview">';
         $output .= '<div class="menu-item-image-preview-wrapper" style="position:relative">';
         $output .= '<img src="' . esc_url($image_url) . '" style="max-width: 70px; max-height: 70px;display:block;" />';
         $output .= '<button type="button" class="button remove_image_button" data-image-id="' . esc_attr($image_id) . '" style="position:absolute">X</button>';
         $output .= '</div></div>';
      }
   }
   $output .= '</div>';
   $output .= '<button type="button" class="my-admin-upload-button button upload_images_button" data-target="#menu-item-custom-images-' . $item_id . '">' . __('Upload Images', 'text_domain') . '</button>';

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
      update_post_meta($menu_item_db_id, '_link_description', sanitize_text_field($_POST['menu-item-custom-text'][$menu_item_db_id]));
   } else {
      delete_post_meta($menu_item_db_id, '_link_description');
   }

   if (isset($_POST['menu-item-custom-button-title'][$menu_item_db_id])) {
      update_post_meta($menu_item_db_id, '_custom_button_title', sanitize_text_field($_POST['menu-item-custom-button-title'][$menu_item_db_id]));
   } else {
      delete_post_meta($menu_item_db_id, '_custom_button_title');
   }

   if (isset($_POST['menu-item-custom-images'][$menu_item_db_id])) {
      $custom_images = sanitize_text_field($_POST['menu-item-custom-images'][$menu_item_db_id]);
      update_post_meta($menu_item_db_id, '_image_ids', $custom_images);
   } else {
      delete_post_meta($menu_item_db_id, '_image_ids');
   }
}, 10, 3);



// Ładowanie zapisanych wartości
add_filter('wp_setup_nav_menu_item', function ($menu_item) {
   // Pobranie zapisanych danych meta
   $menu_item->submenu_page_id = get_post_meta($menu_item->ID, '_submenu_page_id', true);
   $menu_item->link_description = get_post_meta($menu_item->ID, '_link_description', true);
   $menu_item->custom_image_ids = json_decode(get_post_meta($menu_item->ID, '_image_ids', true), true);
   $menu_item->custom_button_title = get_post_meta($menu_item->ID, '_custom_button_title', true);

   return $menu_item;
});


// Add second featured image
add_action('add_meta_boxes', function () {
   global $post;
   $depth = count(get_post_ancestors($post->ID));

   if ($depth === 1) {
      add_meta_box('listingimagediv', __('Listing Image', 'text-domain'), function ($post) {
         global $content_width, $_wp_additional_image_sizes;

         $image_id = get_post_meta($post->ID, '_listing_image_id', true);

         $old_content_width = $content_width;
         $content_width = 254;

         if ($image_id && get_post($image_id)) {
            if (!isset($_wp_additional_image_sizes['post-thumbnail'])) {
               $thumbnail_html = wp_get_attachment_image($image_id, array($content_width, $content_width));
            } else {
               $thumbnail_html = wp_get_attachment_image($image_id, 'post-thumbnail');
            }

            if (!empty($thumbnail_html)) {
               $content = $thumbnail_html;
               $content .= '<p class="hide-if-no-js"><a href="javascript:;" id="remove_listing_image_button">' . esc_html__('Remove listing image', 'text-domain') . '</a></p>';
               $content .= '<input type="hidden" id="upload_listing_image" name="_listing_cover_image" value="' . esc_attr($image_id) . '" />';
            }

            $content_width = $old_content_width;
         } else {
            $content = '<img src="" style="width:' . esc_attr($content_width) . 'px;height:auto;border:0;display:none;" />';
            $content .= '<p class="hide-if-no-js"><a title="' . esc_attr__('Set listing image', 'text-domain') . '" href="javascript:;" id="upload_listing_image_button" id="set-listing-image" data-uploader_title="' . esc_attr__('Choose an image', 'text-domain') . '" data-uploader_button_text="' . esc_attr__('Set listing image', 'text-domain') . '">' . esc_html__('Set listing image', 'text-domain') . '</a></p>';
            $content .= '<input type="hidden" id="upload_listing_image" name="_listing_cover_image" value="" />';
         }

         echo $content;
      }, 'page', 'side', 'low');
   }
});

add_action('save_post', function ($post_id) {
   if (isset($_POST['_listing_cover_image'])) {
      $image_id = (int) $_POST['_listing_cover_image'];
      update_post_meta($post_id, '_listing_image_id', $image_id);
   }
}, 10, 1);


add_action('admin_init', function () {
   register_setting('reading', 'page_for_ebooks');
   register_setting('reading', 'page_for_products');
   register_setting('reading', 'page_for_industries');

   add_settings_field('page_for_ebooks', 'Strona dla Ebooków', function () {
      wp_dropdown_pages([
         'name' => 'page_for_ebooks',
         'show_option_none' => __('None', 'text_domain'),
         'option_none_value' => '0',
         'selected' => get_option('page_for_ebooks')
      ]);
   }, 'reading', 'default');

   add_settings_field('page_for_products', 'Strona dla Produktów', function () {
      wp_dropdown_pages([
         'name' => 'page_for_products',
         'show_option_none' => __('None', 'text_domain'),
         'option_none_value' => '0',
         'selected' => get_option('page_for_products')
      ]);
   }, 'reading', 'default');

   add_settings_field('page_for_industries', 'Strona dla Branż', function () {
      wp_dropdown_pages([
         'name' => 'page_for_industries',
         'show_option_none' => __('None', 'text_domain'),
         'option_none_value' => '0',
         'selected' => get_option('page_for_industries')
      ]);
   }, 'reading', 'default');
});

add_action('init', function () {
   $custom_post_types = [
      'ebook' => [
         'singular' => 'Ebook',
         'plural' => 'Ebooki',
         'menu_icon' => 'dashicons-book-alt',
         'supports' => ['title', 'editor', 'author', 'revisions', 'thumbnail'],
         'posts_per_page' => 5,
      ],
      'product' => [
         'singular' => 'Produkt',
         'plural' => 'Produkty',
         'menu_icon' => 'dashicons-cart',
         'supports' => ['title', 'editor', 'author', 'revisions', 'thumbnail'],
         'posts_per_page' => 10,
      ],
      'industry' => [
         'singular' => 'Branza',
         'plural' => 'Branze',
         'menu_icon' => 'dashicons-building',
         'supports' => ['title', 'editor', 'author', 'revisions', 'thumbnail'],
         'posts_per_page' => 15,
      ],
   ];

   foreach ($custom_post_types as $type => $labels) {
      register_post_type($type, [
         'label' => __($labels['singular'], 'text-domain'),
         'description' => __('Custom post type for ' . strtolower($labels['plural']), 'text-domain'),
         'labels' => [
            'name' => _x($labels['plural'], 'Post Type General Name', 'text-domain'),
            'singular_name' => _x($labels['singular'], 'Post Type Singular Name', 'text-domain'),
            'menu_name' => __($labels['plural'], 'text-domain'),
            'name_admin_bar' => __($labels['singular'], 'text-domain'),
            'archives' => __($labels['singular'] . ' Archiwum', 'text-domain'),
            'attributes' => __($labels['singular'] . ' Atrybuty', 'text-domain'),
            'parent_item_colon' => __('Rodzic ' . $labels['singular'] . ':', 'text-domain'),
            'all_items' => __('Wszystkie ' . $labels['plural'], 'text-domain'),
            'add_new_item' => __('Dodaj nowy ' . $labels['singular'], 'text-domain'),
            'add_new' => __('Dodaj nowy', 'text-domain'),
            'new_item' => __('Nowy ' . $labels['singular'], 'text-domain'),
            'edit_item' => __('Edytuj ' . $labels['singular'], 'text-domain'),
            'update_item' => __('Zaktualizuj ' . $labels['singular'], 'text-domain'),
            'view_item' => __('Zobacz ' . $labels['singular'], 'text-domain'),
            'view_items' => __('Zobacz ' . $labels['plural'], 'text-domain'),
            'search_items' => __('Szukaj ' . $labels['singular'], 'text-domain'),
            'not_found' => __('Nie znaleziono', 'text-domain'),
            'not_found_in_trash' => __('Nie znaleziono w koszu', 'text-domain'),
            'featured_image' => __('Obrazek wyróżniający', 'text-domain'),
            'set_featured_image' => __('Ustaw obrazek wyróżniający', 'text-domain'),
            'remove_featured_image' => __('Usuń obrazek wyróżniający', 'text-domain'),
            'use_featured_image' => __('Użyj jako obrazka wyróżniającego', 'text-domain'),
            'insert_into_item' => __('Wstaw do ' . strtolower($labels['singular']), 'text-domain'),
            'uploaded_to_this_item' => __('Przesłano do tego ' . strtolower($labels['singular']), 'text-domain'),
            'items_list' => __('Lista ' . $labels['plural'], 'text-domain'),
            'items_list_navigation' => __('Nawigacja listy ' . $labels['plural'], 'text-domain'),
            'filter_items_list' => __('Filtruj listę ' . strtolower($labels['plural']), 'text-domain'),
         ],
         'supports' => $labels['supports'],
         'taxonomies' => ['category'],
         'hierarchical' => false,
         'public' => true,
         'show_ui' => true,
         'show_in_menu' => true,
         'menu_position' => 5,
         'menu_icon' => $labels['menu_icon'],
         'show_in_admin_bar' => true,
         'show_in_nav_menus' => true,
         'can_export' => true,
         'has_archive' => true,
         'exclude_from_search' => false,
         'publicly_queryable' => true,
         'capability_type' => 'post',
         'show_in_rest' => true,
      ]);
   }
}, 0);

add_action('pre_get_posts', function ($query) {
   if (!is_admin() && $query->is_main_query()) {
      if (is_post_type_archive('ebook')) {
         $query->set('posts_per_page', 10);
      }
      if (is_post_type_archive('product')) {
         $query->set('posts_per_page', 5);
      }
      if (is_post_type_archive('industry')) {
         $query->set('posts_per_page', 8);
      }
   }
});