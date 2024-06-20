<?php

namespace App\View\Components;


use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Str;

class BlockDescription extends Component
{
   public string $description;
   public string $class;

   /**
    * Create a new component instance.
    */
   public function __construct($description = "", $class = "")
   {
      $this->description = $description;
      $this->class = $class;
   }

   public function shouldRender(): bool
   {
      return Str::length($this->description) > 0;
   }
   /**
    * Get the view / contents that represent the component.
    */
   public function render(): View|Closure|string
   {
      return view('components.block-description');
   }
}
