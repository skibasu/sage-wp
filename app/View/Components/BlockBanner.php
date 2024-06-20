<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Str;

class BlockBanner extends Component
{
   public string $icon;
   public string $description;
   public string $class;
   public string $variant_class;
   public array $variants = [
      'light' => 'text-secondary bg-white',
      'dark' => 'text-white bg-secondary',
   ];
   /**
    * Create a new component instance.
    */
   public function __construct($icon = "", $description = "", $class = "", $variant = "dark")
   {
      $this->icon = $icon;
      $this->description = $description;
      $this->class = $class;
      $this->variant_class = $this->variants[$variant] ?? $this->variants['dark'];
   }
   public function shouldRender(): bool
   {
      return Str::length($this->icon) > 0 && Str::length($this->description) > 0;
   }
   /**
    * Get the view / contents that represent the component.
    */
   public function render(): View|Closure|string
   {
      return view('components.block-banner');
   }
}
