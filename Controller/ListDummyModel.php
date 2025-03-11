<?php
namespace FacturaScripts\Plugins\SamplePlugin\Controller;

use FacturaScripts\Core\Lib\ExtendedController\ListController;

class ListDummyModel extends ListController
{
    public function getPageData(): array 
    {
        $pageData = parent::getPageData();
        $pageData['menu'] = 'SamplePlugin';
        $pageData['title'] = 'List samples';
        $pageData['icon'] = 'fa-solid fa-vial';
        return $pageData;
    }

    protected function createViews() 
    {
        $this->addView('ListDummyModel', 'DummyModel', 'Listar DummyModels', 'fa-solid fa-list-ul');
    }
}