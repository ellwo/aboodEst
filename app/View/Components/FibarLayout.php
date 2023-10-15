<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FibarLayout extends Component
{
    /**
     * Create a new component instance.
     */

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('fiber-layout');
    }
}
