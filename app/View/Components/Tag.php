<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Tag extends Component
{
   public $id;
   public string $class = "py-8 px-12 text-button-m rounded-full border border-solid border-white inline-block mb-16";
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
   public function render(): View|Closure|string
   {
      return view('components.tag');
   }
}
