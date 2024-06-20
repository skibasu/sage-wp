<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use Log1x\AcfComposer\Builder;

class BlogInfo extends Block
{
   /**
    * The block name.
    *
    * @var string
    */
   public $name = 'Blog Info';

   /**
    * The block description.
    *
    * @var string
    */
   public $description = 'A simple Blog Info block.';

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
      'core/paragraph' => ['placeholder' => 'Welcome to the Blog Info block.'],
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
      $blogInfo = Builder::make('blog_info');

      $blogInfo
         ->addTab('column_1_tab', [
            'label' => 'Kolumna 1'
         ])->addImage('title_icon', [
               "label" => "Ikonka",
               'return_format' => 'id',
               'preview_size' => 'thumbnail',
            ])
         ->addText('title', ["label" => "Tytuł"])
         ->addText('slogan', ["label" => "Slogan"])
         ->addRelationship('feature_posts', [
            'label' => 'Wpis Wyrózniający',
            'post_type' => ['post'],
            'taxonomy' => [],
            'allow_null' => false,
            'multiple' => 0,
            'return_format' => 'id',
            'filters' => [
               0 => 'search',

               2 => 'taxonomy',
            ],

            'min' => '1',
            'max' => '1',
         ])
         ->addTab('column_2_tab', [
            'label' => 'Kolumna 2'
         ])->addRelationship('latest_posts', [
               'label' => 'Ostatnie Wpisy',
               'post_type' => ['post'],
               'taxonomy' => [],
               'allow_null' => false,
               'multiple' => true,
               'return_format' => 'id',
               'filters' => [
                  0 => 'search',

                  2 => 'taxonomy',
               ],
               'min' => '1',
               'max' => '3',
            ])
         ->addText('button', ["label" => "Tekst Przycisku"]);

      return $blogInfo->build();
   }

   /**
    * Retrieve the items.
    *
    * @return array
    */
   public function column_1(): array
   {
      return [
         "title_icon" => get_field('title_icon'),
         "title" => get_field('title'),
         "slogan" => get_field('slogan'),
         "feature_posts" => get_field('feature_posts'),
      ];
   }

   public function column_2(): array
   {
      return [
         "latest_posts" => get_field('latest_posts'),
         "button" => get_field('button'),
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
