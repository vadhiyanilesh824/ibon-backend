<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SidebarNavLink extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $url;
    public $is_active;
    public function __construct($href="",$active=false)
    {
        //
        $this->url = $href;
        $this->is_active = $active;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.sidebar-nav-link');
    }
}
