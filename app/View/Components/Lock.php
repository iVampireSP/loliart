<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Lock extends Component
{

    public $for;
    public $lock;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($for, $lock = true)
    {
        $this->for = $for;
        $this->lock = $lock;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.lock');
    }
}
