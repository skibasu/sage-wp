<?php

namespace App\Blocks;

use App\Fields\Partials\StandardColumn;
use App\Fields\Partials\InfoColumn;
use Log1x\AcfComposer\Block;
use Log1x\AcfComposer\Builder;


class About extends Block
{
   /**
    * The block name.
    *
    * @var string
    */
   public $name = 'About';

   /**
    * The block description.
    *
    * @var string
    */
   public $description = 'A simple About block.';

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
      'multiple' => true,
      'jsx' => true,
      'mode' => true,
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
      'core/paragraph' => ['placeholder' => 'Welcome to the About block.'],
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
      $about = Builder::make('feature');

      $about
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
         ->addRepeater('column_3_repeater', [
            'label' => 'Lata Doswiadczenia',
            'layout' => 'block',
            'max' => 3,
         ])
         ->addText('years', ["label" => "Lata Doswiadczenia"])
         ->addTextarea('years_description', [
            "label" => "Opis",
            'maxlength' => '140',
            'rows' => '3',
         ])
         ->endRepeater();

      return $about->build();
   }
   /**
    * Retrieve the items.
    *
    * @return array
    */
   /**
    * Retrieve the items for column 1.
    *
    * @return array
    */
   public function column_1(): array
   {
      return StandardColumn::getStandardColumnFields();
   }

   /**
    * Retrieve the items for column 2.
    *
    * @return array
    */
   public function column_2(): array
   {
      return [
         "image" => get_field('image'),
         "banner_label" => get_field('button_title_2'),
         "icon_label" => get_field('icon_text'),
      ];
   }
   /**
    * Retrieve the items for column 3.
    *
    * @return array
    */
   public function column_3(): array
   {
      return [
         "years" => get_field('column_3_repeater'),
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
