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
        $pagedata['title'] = 'Create samples';
        $pagedata['icon'] = 'fa-solid fa-pen-to-square';
        return $pagedata;
    }

    protected function createViews()
    {
        $this->addEditView('EditDummyModel', 'DummyModel', 'Editar dummy', 'fa-solid fa-pen-to-square');
    }
}