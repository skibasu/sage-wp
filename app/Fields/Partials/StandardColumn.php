<?php

namespace App\Fields\Partials;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Partial;

class StandardColumn extends Partial
{
   /**
    * The partial field group.
    */
   public function fields(): Builder
   {
      $standardColumn = Builder::make('standard_column');

      $standardColumn
         ->addImage('title_icon', [
            "label" => "Ikonka",
            'return_format' => 'id',
            'preview_size' => 'thumbnail',
         ])
         ->addText('title', ["label" => "Tytuł"])
         ->addText('slogan', ["label" => "Slogan"])
         ->addText('description', ["label" => "Opis"])
         ->addText('button_title', ["label" => "Text Przycisku"])
         ->addPageLink('button_link', [
            'label' => 'Link Przycisku',
            'post_type' => ['page'],
            'filters' => ['search'],
            'return_format' => 'id',
         ]);

      return $standardColumn;
   }
   public static function getStandardColumnFields(): array
   {
      return [
         "title" => get_field('title'),
         "title_icon" => get_field('title_icon'),
         "slogan" => get_field('slogan'),
         "description" => get_field('description'),
         "button_title" => get_field('button_title'),
         "button" => get_field('button'),
      ];
   }
}
