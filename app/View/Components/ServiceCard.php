<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Str;

class ServiceCard extends Component
{
   public string $class = "p-24 bg-white rounded-normal text-black";
   public string $title;
   public string $description;
   public $id;
   /**
    * Create a new component instance.
    */

   /**
    * Create a new component instance.
    */
   public function __construct($class = "", $title = "", $description = "", $id = null)
   {
      if ($class !== "") {
         $this->class .= " $class";
      }
      $this->title = $title;
      $this->description = $description;
      $this->id = $id;


      //
   }
   public function shouldRender(): bool
   {
      return Str::length($this->title) > 0 && Str::length($this->description) > 0 && !is_null($this->id) && filter_var($this->id, FILTER_VALIDATE_INT) !== false;
   }
   /**
    * Get the view / contents that represent the component.
    */
   public function render(): View|Closure|string
   {
      return view('components.servicecard');
   }
}
