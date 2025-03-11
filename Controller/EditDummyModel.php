<?php
namespace FacturaScripts\Plugins\SamplePlugin\Controller;

use FacturaScripts\Core\Lib\ExtendedController\EditController;

class EditDummyModel extends EditController
{
    public function getModelClassName(): string
    {
        return 'DummyModel';
    }

    public function getPageData(): array
    {
        $pagedata = parent::getPageData();
        $pagedata['menu'] = 'SamplePlugin';
        $pagedata['title'] = 'Edit samples';
        $pagedata['icon'] = 'fa-solid fa-pen-to-square';
        $pagedata['showonmenu'] = true; // is false in default
        return $pagedata;
    }

    protected function createViews() 
    {
        $this->addListView('EditDummyModel', 'DummyModel', 'Editar DummyModels', 'fa-solid fa-pen-to-square');
    }
}