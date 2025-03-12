<?php
/**
 * This file is part of SamplePlugin for FacturaScripts
 * Copyright (C) 2019 Carlos Garcia Gomez <carlos@facturascripts.com>
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
namespace FacturaScripts\Plugins\SamplePlugin\Extension\Model;

use Closure;
use FacturaScripts\Core\Tools;

/**
 * Description of Producto.
 * 
 * Toda la documentación sobre modelos está en: https://facturascripts.com/publicaciones/extensiones-de-modelos
 *
 * @author Carlos Garcia Gomez <carlos@facturascripts.com>
 */
class Producto
{

    protected string $prefix;
    protected string $suffix;

    /**
     * Adds prefix() method to the model.
     */
    public function prefix() : Closure
    {
        return function() {
            return $this->prefix . $this->referencia;
        };
    }

    /**
     * Adds suffix() method to the model.
     */
    public function suffix() : Closure
    {
        return function() {
            return $this->referencia . $this->suffix;
        }; 
    }

    /**
     * The next methods are avalible in Model
     */
    public function clear() : Closure
    {
        return function(){
            $this->prefix = 'PRE-';
            $this->suffix = '-SUF';
            Tools::log()->notice('This code is executed when a new "Producto" is created.');
        };
    }

    public function delete() : Closure
    {
        return function(){
            Tools::log()->notice('This code is executed after delete() method is called.');
        };
    }

    public function deleteBefore() : Closure
    {
        return function(){
            Tools::log()->notice('This code is executed before delete() method is called.'
                . ' And return false to prevent delete().');
        };
    }

    public function save() : Closure
    {
        return function() {
            Tools::log()->notice('This code is executed after save() method is called.');
        };
    }
    
    public function saveBefore() : Closure
    {
        return function() {
            Tools::log()->notice('This code is executed before save() method is called.'
                . ' And return false to prevent save().');
        };
    }

    public function saveInsert() : Closure
    {
        return function() {
            Tools::log()->notice('This code is executed after inserting "Producto" into the database.');
        };
    }

    public function saveInsertBefore() : Closure
    {
        return function() {
            Tools::log()->notice('This code is executed before inserting "Producto" into the database.'
                . ' And return false to prevent saveInsert().');
        };
    }

    public function saveUpdate() : Closure
    {
        return function() {
            Tools::log()->notice('This code is executed after saveUpdate() method is called.');
        };
    }

    public function saveUpdateBefore() : Closure
    {
        return function() {
            Tools::log()->notice('This code is executed before saveUpdate() method is called.'
                . ' And return false to prevent saveUpdate().');
        };
    }

    public function test() : Closure
    {
        return function() {
            Tools::log()->notice('This code is executed after test() method is called(data validation).');
        };
    }

    public function testBefore() : Closure
    {
        return function() {
            Tools::log()->notice('This code is executed before testBefore() method is called.'
                . ' And return false to prevent saveUpdate().');
        };
    }

    public function onChange() : Closure
    {
        return function() {
            Tools::log()->notice('This code is executed before saveUpdate() method is called. It detects changes in columns');
        };
    }
}
