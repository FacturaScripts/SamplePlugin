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

use FacturaScripts\Core\Lib\ExtendedController;

/**
 * Sample based on ListProducto.
 *
 * @author Carlos García Gómez <carlos@facturascripts.com>
 * @author Francesc Pineda Segarra <francesc.pineda@x-netdigital.com>
 */
class ListControllerWithTabsSample extends ExtendedController\ListController
{

    /**
     * Returns basic page attributes
     *
     * @return array
     */
    public function getPageData()
    {
        $pagedata = parent::getPageData();
        $pagedata['title'] = 'ListControllerWithTabsSample';
        $pagedata['icon'] = 'fa-cubes';
        $pagedata['menu'] = 'SamplePlugin';

        return $pagedata;
    }

    /**
     * Load views
     */
    protected function createViews()
    {
        $this->createViewProducto();
        $this->createViewFamily();
        $this->createViewManufacturer();
    }

    /**
     * This method include all calls to generate products tab.
     */
    private function createViewProducto()
    {
        $this->addView('ListProductoSample', 'ProductoSample', 'products', 'fa-cubes');
        $this->addSearchFields('ListProductoSample', ['referencia', 'descripcion', 'observaciones']);
        $this->addOrderBy('ListProductoSample', ['referencia'], 'reference');
        $this->addOrderBy('ListProductoSample', ['descripcion'], 'description');
        $this->addOrderBy('ListProductoSample', ['precio'], 'price');
        $this->addOrderBy('ListProductoSample', ['stockfis'], 'stock');
        $this->addOrderBy('ListProductoSample', ['actualizado'], 'update-time');

        $manufacturers = $this->codeModel::all('fabricantes', 'codfabricante', 'nombre');
        $this->addFilterSelect('ListProductoSample', 'codfabricante', 'manufacturer', 'codfabricante', $manufacturers);

        $families = $this->codeModel::all('familias', 'codfamilia', 'descripcion');
        $this->addFilterSelect('ListProductoSample', 'codfamilia', 'family', 'codfamilia', $families);

        $taxes = $this->codeModel::all('impuestos', 'codimpuesto', 'descripcion');
        $this->addFilterSelect('ListProductoSample', 'codimpuesto', 'tax', 'codimpuesto', $taxes);

        $this->addFilterCheckbox('ListProductoSample', 'nostock', 'no-stock', 'nostock');
        $this->addFilterCheckbox('ListProductoSample', 'bloqueado', 'locked', 'bloqueado');
        $this->addFilterCheckbox('ListProductoSample', 'secompra', 'for-purchase', 'secompra');
        $this->addFilterCheckbox('ListProductoSample', 'sevende', 'for-sale', 'sevende');
        $this->addFilterCheckbox('ListProductoSample', 'publico', 'public', 'publico');
    }

    /**
     * This method include all calls to generate families tab.
     */
    private function createViewFamily()
    {
        $this->addView('ListFamiliaSample', 'FamiliaSample', 'families', 'fa-object-group');
        $this->addSearchFields('ListFamiliaSample', ['descripcion', 'codfamilia', 'madre']);
        $this->addOrderBy('ListFamiliaSample', ['codfamilia'], 'code');
        $this->addOrderBy('ListFamiliaSample', ['descripcion'], 'description');
        $this->addOrderBy('ListFamiliaSample', ['madre'], 'parent');

        $selectValues = $this->codeModel::all('familias', 'codfamilia', 'descripcion');
        $this->addFilterSelect('ListFamiliaSample', 'madre', 'parent', 'madre', $selectValues);
    }

    /**
     * This method include all calls to generate manufacturers tab.
     */
    private function createViewManufacturer()
    {
        $this->addView('ListFabricanteSample', 'FabricanteSample', 'manufacturers', 'fa-tasks');
        $this->addSearchFields('ListFabricanteSample', ['codfabricante']);
        $this->addOrderBy('ListFabricanteSample', ['codfabricante'], 'reference');
        $this->addOrderBy('ListFabricanteSample', ['nombre'], 'name');
        $manufacturers = $this->codeModel::all('fabricantes', 'codfabricante', 'nombre');
        $this->addFilterSelect('ListFabricanteSample', 'codfabricante', 'manufacturer', 'codfabricante', $manufacturers);
    }
}
