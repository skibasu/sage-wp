<?php

class WalkerPrimary extends Walker
{
   // Define item type
   var $tree_type = array('post_type', 'taxonomy', 'custom');

   // Set db_fields for ID and parent
   var $db_fields = array('parent' => 'menu_item_parent', 'id' => 'db_id');

   // Start of each submenu level (overrides default start_lvl method)
   function start_lvl(&$output, $depth = 0, $args = null)
   {
      $indent = str_repeat("\t", $depth);
      $submenu_class = ($depth > 0) ? 'sub-menu' : 'mega-menu';
      $output .= "\n$indent<ul class=\"$submenu_class\">\n";
   }

   // End of each submenu level (overrides default end_lvl method)
   function end_lvl(&$output, $depth = 0, $args = null)
   {
      $indent = str_repeat("\t", $depth);
      $output .= "$indent</ul>\n";
   }

   // Start of each menu item (overrides default start_el method)
   function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
   {
      $indent = ($depth) ? str_repeat("\t", $depth) : '';

      // Merge item classes
      $classes = empty($item->classes) ? array() : (array) $item->classes;
      $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));

      // Mega menu item class adjustment
      if ($depth === 0 && in_array('mega-menu-column', $classes)) {
         $class_names .= ' mega-menu-column';
      }

      // Generate the opening <li> with classes
      $output .= $indent . '<li class="' . esc_attr($class_names) . '">';

      // Link attributes
      $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
      $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
      $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
      $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';

      // Link text

      // Check if $args is an object, if not, convert it to an object
      if (!is_object($args)) {
         $args = (object) $args;
      }

      // Generate link
      $item_output = isset($args->before) ? $args->before : '';
      $item_output .= '<a' . $attributes . '>';
      $item_output .= isset($args->link_before) ? $args->link_before : '';
      $item_output .= apply_filters('the_title', $item->title, $item->ID);
      $item_output .= isset($args->link_after) ? $args->link_after : '';
      $item_output .= '</a>';
      $item_output .= isset($args->after) ? $args->after : '';

      // Add item to output
      $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
   }

   // End of each menu item (overrides default end_el method)
   function end_el(&$output, $item, $depth = 0, $args = null)
   {
      $output .= "</li>\n";
   }

}