<?php namespace App\View\Components;

use Illuminate\View\Component;

class NavBasketWidget extends Component
{
	public $isMobile;


    /**
     * Create a new component instance.
     *
	 * @param bool $isMobile
     * @return void
     */
    public function __construct($isMobile = false)
    {
        $this->isMobile = $isMobile;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.nav-basket-widget');
    }
}
