<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use Log1x\AcfComposer\Builder;
use App\Fields\Partials\StandardColumn;
use App\Fields\Partials\InfoColumn;

class Industries extends Block
{
   /**
    * The block name.
    *
    * @var string
    */
   public $name = 'Industries';

   /**
    * The block description.
    *
    * @var string
    */
   public $description = 'A simple Industries block.';

   /**
    * The block category.
    *
    * @var string
    */
   public $category = 'formatting';

   /**
    * The block icon.
    *
    * @var string|array
    */
   public $icon = 'editor-ul';

   /**
    * The block keywords.
    *
    * @var array
    */
   public $keywords = [];

   /**
    * The block post type allow list.
    *
    * @var array
    */
   public $post_types = [];

   /**
    * The parent block type allow list.
    *
    * @var array
    */
   public $parent = [];

   /**
    * The ancestor block type allow list.
    *
    * @var array
    */
   public $ancestor = [];

   /**
    * The default block mode.
    *
    * @var string
    */
   public $mode = 'edit';

   /**
    * The default block alignment.
    *
    * @var string
    */
   public $align = '';

   /**
    * The default block text alignment.
    *
    * @var string
    */
   public $align_text = '';

   /**
    * The default block content alignment.
    *
    * @var string
    */
   public $align_content = '';

   /**
    * The supported block features.
    *
    * @var array
    */
   public $supports = [
      'align' => true,
      'align_text' => false,
      'align_content' => false,
      'full_height' => false,
      'anchor' => false,
      'mode' => false,
      'multiple' => true,
      'jsx' => true,
      'color' => [
         'background' => true,
         'text' => true,
         'gradient' => true,
      ],
   ];

   /**
    * The block styles.
    *
    * @var array
    */
   public $styles = ['light', 'dark'];

   /**
    * The block preview example data.
    *
    * @var array
    */
   public $example = [
      'items' => [
         ['item' => 'Item one'],
         ['item' => 'Item two'],
         ['item' => 'Item three'],
      ],
   ];

   /**
    * The block template.
    *
    * @var array
    */
   public $template = [
      'core/heading' => ['placeholder' => 'Hello World'],
      'core/paragraph' => ['placeholder' => 'Welcome to the Industries block.'],
   ];

   /**
    * Data to be passed to the block before rendering.
    */
   public function with(): array
   {
      return [
         'column_1' => $this->column_1(),
         'column_2' => $this->column_2(),
         'column_3' => $this->column_3(),
      ];
   }


   /**
    * The block field group.
    */
   public function fields(): array
   {
      $industries = Builder::make('industries');

      $industries
         ->addTab('column_1_tab', [
            'label' => 'Kolumna 1'
         ])
         ->addPartial(StandardColumn::class)
         ->addTab('column_2_tab', [
            'label' => 'Kolumna 2'
         ])
         ->addPartial(InfoColumn::class)
         ->addTab('column_3_tab', [
            'label' => 'Kolumna 3'
         ])
         ->addRepeater('column_3_repeater', ["label" => "Branze", 'max' => 6,])
         ->addImage("icon", [
            "label" => "Ikona",
            'return_format' => 'id',
            'preview_size' => 'thumbnail',
         ])
         ->addText("description", ["label" => "Opis",])
         ->endRepeater();

      return $industries->build();
   }

   /**
    * Retrieve the items.
    *
    * @return array
    */
   public function column_1(): array
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

   public function column_2(): array
   {
      return [
         "image" => get_field('image'),
         "button_title_2" => get_field('button_title_2'),
         "button_link_2" => get_field('button_link_2'),
      ];
   }

   public function column_3(): array
   {
      return [
         "industries" => get_field('column_3_repeater'),
      ];
   }

   /**
    * Assets enqueued when rendering the block.
    */
   public function assets(array $block): void
   {
      //
   }
}
