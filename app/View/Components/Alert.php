<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Session;

class Alert extends Component
{
    /**
     * The type of page.
     *
     * @var string
     */
    public $type;

    /**
     * The message of page.
     *
     * @var string
     */
    public $message;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type,$message)
    {
        $this->type = $type;
        $this->message = $message;
        if($message == ""){
            $this->displayAlert();
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.alert');
    }

    public function displayAlert()
    {
        if (Session::has('error')) {
            //list($type, $message) = explode('|', Session::get('error'));

            $this->type =  'error';
            $this->message = Session::get('error');
            
//            return sprintf('<div class="alert alert-%s">%s</div>', $type, $message);
        }else if (Session::has('success')) {
            $this->type =  'success';
            $this->message = Session::get('success');
        }
    }
}
