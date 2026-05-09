<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AdminLayout extends Component
{
    /**
     * The title of page.
     *
     * @var string
     */
    public $page_title;
 
    /**
     * The description of page.
     *
     * @var string
     */
    public $page_description;
 
    /**
     * Create the component instance.
     *
     * @param  string  $page_title
     * @param  string  $page_description
     * @return void
     */
    public function __construct($pageTitle , $pageDescription )
    {
        $this->page_title = $pageTitle;
        $this->page_description = $pageDescription;
    }

    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('admin_template.base');
    }
}
