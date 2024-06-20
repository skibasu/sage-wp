<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Str;

class BlockTitle extends Component
{
   public string $title;
   public int $icon;
   public string $class;
   /**
    * Create a new component instance.
    */
   public function __construct($icon = "", $title = "", $classes = "")
   {
      $this->icon = $icon;
      $this->title = $title;
      $this->class = $classes;
      //
   }

   /**
    * Get the view / contents that represent the component.
    */
   public function shouldRender(): bool
   {
      return Str::length($this->title) > 0;
   }
   public function render(): View|Closure|string
   {
      return view('components.block-title');
   }
}
