<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\Model\CatModel; 

class Leftbar extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function __construct(CatModel $catModel){
        $this->catModel = $catModel;
    }
    public function run()
    {
        $items = $this->catModel->getItems_leftbar();

        return view('templates.cnews.left_bar', [
            'items'  => $items,
            'config' => $this->config,
        ]);
    }
}
