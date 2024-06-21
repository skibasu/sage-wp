<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Row extends Component
{
   /**
    * Create a new component instance.
    */
   public string $class = "-mx-16 min-w-full flex flex-wrap";
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
      return view('components.row');
   }
}
