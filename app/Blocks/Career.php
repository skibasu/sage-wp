<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use Log1x\AcfComposer\Builder;

class Career extends Block
{
   /**
    * The block name.
    *
    * @var string
    */
   public $name = 'Career';

   /**
    * The block description.
    *
    * @var string
    */
   public $description = 'A simple Career block.';

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
      'core/paragraph' => ['placeholder' => 'Welcome to the Career block.'],
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
      $career = Builder::make('career');

      $career
         ->addTab('column_1_tab', [
            'label' => 'Kolumna 1'
         ])
         ->addImage('title_icon', [
            "label" => "Ikonka",
            'return_format' => 'id',
            'preview_size' => 'thumbnail',
         ])
         ->addText('title', ["label" => "Tytuł"])
         ->addText('slogan', ["label" => "Slogan"])
         ->addText('button_title', ["label" => "Text Przycisku"])
         ->addPageLink('button_link', [
            'label' => 'Link Przycisku',
            'post_type' => ['page'],
            'filters' => ['search'],
            'return_format' => 'object',
         ])
         ->addTab('column_2_tab', [
            'label' => 'Kolumna 2'
         ])->addRepeater('column_2_repeater_1', [
               'label' => 'Obrazki Avatary',
               'layout' => 'block',
               'max' => 3,
            ])->addImage('avatar', [
               "label" => "Avatar",
               'return_format' => 'id',
               'preview_size' => 'thumbnail',
            ])
         ->endRepeater()

         ->addRepeater('column_2_repaeter_2', [
            'label' => 'Obrazki lub Video',
            'layout' => 'block',
            'max' => 2,
         ])->addImage('image_video', [
               "label" => "Obrazek/Video",
               'return_format' => 'id',
               'preview_size' => 'thumbnail',
            ])
         ->endRepeater()
         ->addTab('column_3_tab', [
            'label' => 'Slider'
         ])

         ->addRelationship('related_offers', [
            'label' => 'Oferty',
            'post_type' => ['post'],
            'taxonomy' => [],
            'allow_null' => false,
            'multiple' => true,
            'return_format' => 'id',
            'filters' => [
               0 => 'search',
               2 => 'taxonomy',
            ],

         ]);


      return $career->build();
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
         "button_title" => get_field('button_title'),
         "button_link" => get_field('button_link'),
      ];
   }

   public function column_2(): array
   {
      return [
         "avatars" => get_field('column_2_repeater_1'),
         "images_videos" => get_field('column_2_repeater_2'),
      ];
   }

   public function column_3(): array
   {
      return [
         "related_offers" => get_field('related_offers'),
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
