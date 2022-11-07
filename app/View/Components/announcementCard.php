<?php

namespace App\View\Components;

use Illuminate\View\Component;

class announcementCard extends Component
{
    public $announcements;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($announcements)
    {
       $this->announcements = $announcements;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.announcement-card');
    }
}
