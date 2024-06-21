<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FeaturePost extends Component
{
   public $id;
   public string $class = "block w-full";
   /**
    * Create a new component instance.
    */
   public function __construct($id = null, $class = "")
   {
      $this->id = $id;
      $this->class .= $class ? " $class" : "";

      //
   }
   public function shouldRender(): bool
   {
      return !is_null($this->id) && filter_var($this->id, FILTER_VALIDATE_INT) !== false;
   }
   /**
    * Get the view / contents that represent the component.
    */
   public function render(): View|Closure|string
   {
      return view('components.feature-post');
   }
}
