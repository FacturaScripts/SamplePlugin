<?php
/**
 * This file is part of FacturaScripts
 * Copyright (C) 2017-2018 Carlos Garcia Gomez <carlos@facturascripts.com>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 */
namespace FacturaScripts\Plugins\SamplePlugin\Controller;

use FacturaScripts\Core\Base\DataBase\DataBaseWhere;
use FacturaScripts\Core\Lib\ExtendedController;

/**
 * Controller to edit a single item from the EditProducto model
 *
 * @author Carlos García Gómez          <carlos@facturascripts.com>
 * @author Artex Trading sa             <jcuello@artextrading.com>
 * @author Fco. Antonio Moreno Pérez    <famphuelva@gmail.com>
 */
class EditProductoSample extends ExtendedController\EditController
{

    /**
     *
     * @return string
     */
    public function getModelClassName()
    {
        return 'ProductoSample';
    }

    /**
     * Returns basic page attributes
     *
     * @return array
     */
    public function getPageData()
    {
        $pagedata = parent::getPageData();
        $pagedata['title'] = 'ProductoSample';
        $pagedata['icon'] = 'fa-cube';
        $pagedata['menu'] = 'SamplePlugin';
        $pagedata['showonmenu'] = false;

        return $pagedata;
    }

    /**
     * Load views
     */
    protected function createViews()
    {
        parent::createViews();
        $this->addEditListView('EditFamiliaSample', 'FamiliaSample', 'family', 'fa-object-group');
        $this->addEditListView('EditFabricanteSample', 'FabricanteSample', 'manufacturer', 'fa-tasks');
    }

    /**
     * Load view data procedure
     *
     * @param string                      $viewName
     * @param ExtendedController\BaseView $view
     */
    protected function loadData($viewName, $view)
    {
        switch ($viewName) {
            case 'EditProductoSample':
                $code = $this->request->get('code');
                $view->loadData($code);
                break;

            case 'EditFamiliaSample':
                $codfamilia = $this->getViewModelValue('EditProductoSample', 'codfamilia');
                $where = [new DataBaseWhere('codfamilia', $codfamilia)];
                $view->loadData('', $where, ['codfamilia' => 'ASC'], 0, 0);
                break;

            case 'EditFabricanteSample':
                $codfabricante = $this->getViewModelValue('EditProductoSample', 'codfabricante');
                $where = [new DataBaseWhere('codfabricante', $codfabricante)];
                $view->loadData('', $where, ['codfabricante' => 'ASC'], 0, 0);
                break;
        }
    }
}
