<?php

namespace App\View\Components;

use Log1x\Navi\Navi;
use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;

class Navigation extends Component
{
   public $navigation;

   /**
    * Create a new component instance.
    */
   public function __construct()
   {
      $nav = Navi::make()->build('primary_navigation');

      // Dodaj dane meta do każdego elementu menu
      $this->navigation = $this->addMetaToNavigation($nav->toArray());
      logger(json_encode($this->navigation));
   }

   /**
    * Get the view / contents that represent the component.
    */
   public function shouldRender(): bool
   {
      return count($this->navigation) > 0;
   }

   public function render(): View|Closure|string
   {
      return view('components.navigation');
   }

   /**
    * Rekurencyjnie dodaje meta dane do elementów nawigacji
    *
    * @param array $items
    * @return array
    */
   private function addMetaToNavigation($items)
   {
      foreach ($items as &$item) {

         $item->submenu_page_id = get_post_meta($item->id, '_submenu_page_id', true);
         $item->link_description = get_post_meta($item->id, '_link_description', true);
         $item->button_title = get_post_meta($item->id, '_custom_button_title', true);
         $item->custom_image_ids = get_post_meta($item->id, '_image_ids', true);
         $item->custom_image_ids = $item->custom_image_ids ? json_decode($item->custom_image_ids, true) : [];

         if (!empty($item->children)) {
            $item->children = $this->addMetaToNavigation($item->children);
         }
      }
      return $items;
   }
}
