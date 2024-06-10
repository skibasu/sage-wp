<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Str;

class Button extends Component
{
   /**
    * Create a new component instance.
    */
   public string $label;
   public string $variant;
   public string $variant_class;
   public array $variants = [
      'filled' => 'disabled:bg-neutral-60 disabled:text-white bg-primary text-black hover:text-white hover:bg-secondary hover:drop-shadow-button disabled:hover:bg-neutral-60 disabled:hover:drop-shadow-none transition-all',
      'outlined' => 'disabled:text-neutral-60 disabled:border-neutral-60 bg-transparent border border-solid border-primary text-primary hover:border-black hover:text-black transition-all',
      "ghost" => "disabled:text-neautral-60 bg-transparent text-primary underline",
      'filled-contrast' => 'disabled:bg-neutral-60 disabled:text-white bg-primary text-black hover:bg-primary-60 hover:drop-shadow-button disabled:hover:bg-neutral-60 disabled:hover:drop-shadow-none transition-all',
      'outlined-contrast' => 'disabled:text-neutral-60 disabled:border-neutral-60 bg-transparent border border-solid border-primary text-primary hover:border-primary-60 hover:text-primary-60 transition-all',

   ];

   public function __construct($label = "button", $variant = "filled")
   {
      $this->label = $label;
      $this->variant = $variant;
      $this->variant_class = $this->variants[$variant];
   }

   public function shouldRender(): bool
   {
      return Str::length($this->label) > 0;
   }
   /**
    * Get the view / contents that represent the component.
    */
   public function render(): View|Closure|string
   {
      return view('components.button');
   }
}



