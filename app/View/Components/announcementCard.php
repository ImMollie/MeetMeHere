<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AnnouncementCard extends Component
{
    public $announcements;
    public $creatordetails;
    public $poke;
    public $cancel;
    public $refresh;
    public $dismiss;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($announcements, $creatordetails, $poke, $cancel, $refresh, $dismiss)
    {
        $this->announcements = $announcements;
        $this->creatordetails = $creatordetails;
        $this->poke = $poke;
        $this->cancel = $cancel;
        $this->refresh = $refresh;
        $this->dismiss = $dismiss;       
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
