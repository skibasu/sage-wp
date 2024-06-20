<?php

namespace App\Fields\Partials;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Partial;

class InfoColumn extends Partial
{
   /**
    * The partial field group.
    */
   public function fields(): Builder
   {
      $infoColumn = Builder::make('info_column');

      $infoColumn
         ->addImage('image', [
            "label" => "Obrazek",
            'return_format' => 'id',
            'preview_size' => 'thumbnail',
         ])

         ->addText('icon_text', [
            'label' => 'Tekst Plus',

         ])
         ->addText('button_title_2', ["label" => "Opis"]);
      return $infoColumn;
   }
}
