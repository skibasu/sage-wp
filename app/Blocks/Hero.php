<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use Log1x\AcfComposer\Builder;

class Hero extends Block
{
   /**
    * The block name.
    *
    * @var string
    */
   public $name = 'Hero';

   /**
    * The block description.
    *
    * @var string
    */
   public $description = 'A simple Hero block.';

   /**
    * The block category.
    *
    * @var string
    */
   public $category = 'myAwesomePageTheme';

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
      'core/paragraph' => ['placeholder' => 'Welcome to the Hero block.'],
   ];

   /**
    * Data to be passed to the block before rendering.
    */
   public function with(): array
   {
      return [
         'column_1' => $this->column_1(),
         'column_2' => $this->column_2()
      ];
   }

   /**
    * The block field group.
    */
   public function fields(): array
   {
      $hero = Builder::make('hero');

      $hero
         ->addTab('column_1_tab', [
            'label' => 'Column 1'
         ])
         ->addText('slogan_1', ["label" => "Page Title - Fraze 1"])
         ->addText('slogan_2', ["label" => "Page Title - Fraze 2"])
         ->addImage('slogan_2_icon', [
            "label" => "Page Title Fraze 2 Symbol",
            'return_format' => 'id',
            'preview_size' => 'thumbnail',
         ])
         ->conditional('slogan_2', "!=", "")
         ->addText('description', ["label" => "Description"])
         ->addRepeater('hero_buttons', ['label' => 'Page Buttons', 'layout' => 'block', "max" => 2])
         ->addText('button_text', ["label" => "Button Label"])
         ->addSelect('button_variant', ["label" => "Button Variant", 'choices' => ["filled" => "Filled", "outlined" => "Outlined", "ghost" => "Ghost", "filled-contrast" => "Filled Dark Theme", 'outlined-contrast' => "Outlined Dark Theme"], "default_value" => "Filled",])
         ->addPageLink('button_link', ["label" => "Button Link", 'post_type' => ['page', "post"], 'allow_archives' => false, 'type' => 'page_link'])
         ->endRepeater()
         ->addTab('column_2_tab', [
            'label' => 'Column 2'
         ])
         ->addImage('column_2_image', [
            "label" => "Image",
            'return_format' => 'id',
            'preview_size' => 'thumbnail',
         ])
         ->addRepeater('popup_messeges', ['label' => 'PopUp Messeges', 'layout' => 'block', "max" => 3])
         ->addImage("popup_image", [
            "label" => "Icon",
            'return_format' => 'id',
            'preview_size' => 'thumbnail',
         ])
         ->addText('popup_message', ['label' => "Message"])
         ->addRadio('position', ["label" => "Position", 'choices' => ["top-left" => "top-left", "bottom-left" => "bottom-left", "center-right" => "center-right"], "default_value" => "top-left",])
         ->endRepeater()
         ->addText("text_more", ["label" => "Info Message"]);

      return $hero->build();
   }

   /**
    * Retrieve the items.
    *
    * @return array
    */
   public function column_1(): array
   {
      return [
         "slogan_1" => get_field('slogan_1'),
         "slogan_2" => get_field('slogan_2'),
         "icon" => get_field('slogan_2_icon'),
         "description" => get_field('description'),
         "buttons" => get_field('hero_buttons'),
      ];
   }
   public function column_2(): array
   {
      return [
         "column_2_image" => get_field('column_2_image'),
         "popups" => get_field('popup_messeges'),
         "more_info" => get_field('text_more'),
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
