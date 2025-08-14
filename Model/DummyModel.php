<?php
namespace FacturaScripts\Plugins\SamplePlugin\Model;

use FacturaScripts\Core\Template\ModelClass;
use FacturaScripts\Core\Template\ModelTrait;
use FacturaScripts\Core\Tools;

class DummyModel extends ModelClass
{
    use ModelTrait;

    //defined model cols in ../Table/modelName.xml
    public $id;
    public $name;
    public $price;
    public $dummy_type;
    public $resell_value;
    public $dummy_passwd;
    public $verified;
    public $color;
    public $description;

    public $profile_photo;
    public $dummy_rating;
    public $programmed_date;
    public $programmed_hour;

    public $asociated_city;
    public $asociated_product;
    public $dummy_file;
    public $other_dummy;
    public $random_number;
    public $creation_date;
    public $modification_date;

    public static function primaryColumn(): string {
        return 'id';
    }

    public static function tableName(): string {
        return 'dummies';
    }

    public function clear(): void {
        parent::clear();
        // define here default values for cols
        $this->price = 0;
        $this->dummy_type = "new";
        $this->random_number = mt_rand();
        $this->resell_value = "middle";
        $this->dummy_rating = 0;
        $this->programmed_date = Tools::date();
        $this->programmed_hour = Tools::hour();
    }
    
    public function saveInsert(array $values = []): bool
    {
        // when model saved for first time
        $this->creation_date = Tools::dateTime();
        $this->modification_date = Tools::dateTime();
        return parent::saveInsert($values);
    }

    public function saveUpdate(array $values = []): bool
    {
        // when model updated
        $this->modification_date = Tools::dateTime();
        return parent::saveUpdate($values); 
    }
}