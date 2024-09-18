<?php

namespace App\View\Components\Admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Request;
use Illuminate\View\Component;

class AdminLayout extends Component
{
    public $currentRoute;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->currentRoute = Request::route()->getName();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('layouts.admin.admin-layout');
    }
}
