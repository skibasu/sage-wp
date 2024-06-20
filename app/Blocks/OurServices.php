<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use Log1x\AcfComposer\Builder;
use App\Fields\Partials\StandardColumn;

class OurServices extends Block
{
   /**
    * The block name.
    *
    * @var string
    */
   public $name = 'Our Services';

   /**
    * The block description.
    *
    * @var string
    */
   public $description = 'A simple Our Services block.';

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
      'core/paragraph' => ['placeholder' => 'Welcome to the Our Services block.'],
   ];

   /**
    * Data to be passed to the block before rendering.
    */
   public function with(): array
   {
      return [
         'column_1' => $this->column_1(),
         'column_2' => $this->column_2(),
      ];
   }


   /**
    * The block field group.
    */
   public function fields(): array
   {
      $ourServices = Builder::make('our_services');

      $ourServices
         ->addTab('column_1_tab', [
            'label' => 'Kolumna 1'
         ])
         ->addPartial(StandardColumn::class)
         ->addTab('column_2_tab', [
            'label' => 'Kolumna 2'
         ])
         ->addRepeater('services_list', ["label" => "Lista usług", 'max' => 6,])
         ->addImage('image', [
            "label" => "Obrazek/Ikona",
            'return_format' => 'id',
            'preview_size' => 'thumbnail',
         ])
         ->addText('title', ["label" => "Tytuł"])
         ->addText('description', ["label" => "Opis"])
         ->endRepeater();

      return $ourServices->build();
   }

   /**
    * Retrieve the items.
    *
    * @return array
    */
   public function column_1(): array
   {
      return [
         'column_1' => StandardColumn::getStandardColumnFields()
      ];
   }

   /**
    * Retrieve the items for column 2.
    *
    * @return array
    */
   public function column_2(): array
   {
      return [
         'column_2' => get_field('services_list')
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
