<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Hamburger extends Component
{
   public string $class = "block cursor-pointer w-[48px] h-[42px]";
   public $id = "hamburger";
   /**
    * Create a new component instance.
    */
   public function __construct($class = "", $id = "")
   {
      $this->class .= $class ? " $class" : "";
      $this->hamburger = $id ? $id : 'hamburger';
   }

   /**
    * Get the view / contents that represent the component.
    */
   public function render(): View|Closure|string
   {
      return view('components.hamburger');
   }
}
