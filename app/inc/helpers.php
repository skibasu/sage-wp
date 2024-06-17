<?php
//======================================================================
//   Usable function - f_img(string|int $attachment, string|array $size = 'full-size', bool $html = true);
//
//   RETURN: <img>, <svg> or src in string or array;
//
//   $attachment (string|int) (required) - WP image ID or static path to file;
//   $size (string|array) (optional - default - 'full-size') - WP thumbnail size - usable only with image ID and NOT SVG files;
//   $html (bool) (optional - default = true) - IF set to false, function return STRING with path to file
//   Supports Retina with Retina 2x Wordpress plugin (IF RETINA 2x PLUGIN IS ACTIVE, AND $html SET TO FALSE - RETURN ARRAY (if current image doesn't exist in retina size, return default size for [0] and [1]));
//======================================================================

// Helper Func
function vector_image_path($attachment_id)
{
   $file = get_attached_file($attachment_id, true);
   if (!wp_attachment_is_image($attachment_id)) {
      return false;
   }
   return realpath($file);
}
// Usable Func
function get_image($attachment_id, $size = 'full-size', $html = true)
{
   if (is_int($attachment_id)) {
      $src = wp_get_attachment_image_src($attachment_id, $size);
      if ($html !== true) {
         if (function_exists('wr2x_get_retina_from_url')) {
            $img[] = $src[0];
            $img2x = wr2x_get_retina_from_url($src[0]);
            if (!empty($img2x)) {
               $img[] = $img2x;
            } else {
               $img[] = $src[0];
            }

         } else {
            $img = $src[0];
         }
      } else {
         $ext = pathinfo($src[0], PATHINFO_EXTENSION);
         if ($ext == 'svg') {
            $img = vector_image_path($attachment_id);
            if ($img !== false) {
               $img = file_get_contents($img);
            }
         } else {
            $img = wp_get_attachment_image($attachment_id, $size);
         }
      }
      if ($img === false) {
         $img = '';
      }
   } else {
      $src = get_template_directory() . $attachment_id;
      $ext = pathinfo($src, PATHINFO_EXTENSION);
      if ($html !== true) {
         $img = $src;
      } else {
         if ($ext == 'svg') {
            $img = file_get_contents($src);
         } else {
            $img = $src;
         }
      }
   }
   return $img;
}

// function has_menu_item_children($menu_item_id)
// {
//    $children = get_posts(
//       array(
//          'post_type' => 'nav_menu_item',
//          'posts_per_page' => 1,
//          'post_parent' => $menu_item_id,
//       )
//    );
//    return !empty($children);
// }

// function is_primary_navigation_menu($post)
// {
//    $validation = (!isset($post) || empty($post)) || (isset($post->ID) || empty($post->ID));

//    if (!$validation) {
//       return false;
//    }

//    $menu_id = get_post_meta($post->ID, '_menu_item_object_id', true);
//    $menu_locations = get_nav_menu_locations();
//    $primary_menu_id = $menu_locations['primary_navigation'];

//    if ($menu_id != $primary_menu_id) {
//       return false;
//    } else {
//       return true;
//    }
// }



// function customize_acf_menu_field_visibility($field)
// {
//    global $post;
//    $validation = isset($post->post_type) && $post->post_type == 'nav_menu_item' && is_primary_navigation_menu($post);

//    if (!$validation) {
//       return $field;
//    }

//    $parent_id = get_post_meta($post->ID, '_menu_item_menu_item_parent', true);
//    $depth = ($parent_id == 0) ? 0 : 1;
//    $has_children = has_menu_item_children($post->ID);


//    if ($depth != 0 || !$has_children) {
//       return false; // Ukrywa pole
//    }
// }

function has_menu_item_children($menu_item_id)
{
   $children = get_posts(
      array(
         'post_type' => 'nav_menu_item',
         'posts_per_page' => 1,
         'post_parent' => $menu_item_id,
      )
   );
   return !empty($children);
}

function is_primary_navigation_menu($menu_item_id)
{
   // Pobieranie ID menu, do którego należy ten element
   $menu_item = wp_get_nav_menu_items($menu_item_id);
   if (empty($menu_item)) {
      return false;
   }

   $menu_id = $menu_item[0]->ID; // Menu item ID

   // Pobieranie lokalizacji menu
   $menu_locations = get_nav_menu_locations();
   $primary_menu_id = $menu_locations['primary_navigation'] ?? null;

   if ($menu_id != $primary_menu_id) {
      return false;
   }
   return true;
}

function logger($msg)
{
   echo "<script>console.log('LOGGER: " . $msg . "');</script>";
}

function array_some($array, $callback)
{
   foreach ($array as $element) {
      if ($callback($element)) {
         return true;
      }
   }
   return false;
}