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

    protected function createViews($viewName = 'ListDummyModel') 
    {
        $this->addView($viewName, 'DummyModel', 'Listar dummy', 'fa-solid fa-list-ul')
            ->addSearchFields(['name'])
            ->addFilterCheckbox('filter1', 'verified', 'verified', '=', true)
            ->addOrderBy(['price'], 'order-by-price', 2)
            ->addOrderBy(['dummy_type'], 'order-by-condition')
            ->addOrderBy(['resell_value'], 'order-by-resell_value');
    }
}