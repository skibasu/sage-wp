<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Str;

class BlockSlogan extends Component
{
   public string $slogan;
   public string $class;
   /**
    * Create a new component instance.
    */
   public function __construct($slogan = "", $class = "")
   {
      $this->slogan = $slogan;
      $this->class = $class;
      //
   }

   /**
    * Get the view / contents that represent the component.
    */
   public function shouldRender(): bool
   {
      return Str::length($this->slogan) > 0;
   }
   public function render(): View|Closure|string
   {
      return view('components.block-slogan');
   }
}
