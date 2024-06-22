<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Column extends Component
{
   public string $class = 'px-24 lg:px-16';
   /**
    * Create a new component instance.
    */
   public function __construct($class = "")
   {
      if ($class !== "") {
         $this->class .= " $class";
      }

      //
   }

   /**
    * Get the view / contents that represent the component.
    */
   public function render(): View|Closure|string
   {
      return view('components.column');
   }
}
