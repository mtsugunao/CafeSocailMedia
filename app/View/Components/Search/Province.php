<?php

namespace App\View\Components\Search;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Province extends Component
{
    /**
     * Create a new component instance.
     */
    public $ca;
    public $caProvince;
    public $usStates;
    public $us;
    public function __construct($ca, $caProvince, $usStates, $us)
    {
        $this->ca = $ca;
        $this->caProvince = $caProvince;
        $this->usStates = $usStates;
        $this->us = $us;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.search.province');
    }
}
