<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Image extends Component
{
   public $id;
   public string $size;
   /**
    * Create a new component instance.
    */
   public function __construct($id = null, $size = "")
   {
      $this->id = $id;
      $this->size = $size;
      //
   }

   /**
    * Get the view / contents that represent the component.
    */
   public function shouldRender(): bool
   {
      return !is_null($this->id) && filter_var($this->id, FILTER_VALIDATE_INT) !== false;
   }
   public function render(): View|Closure|string
   {
      return view('components.image');
   }
}
