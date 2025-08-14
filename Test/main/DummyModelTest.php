<?php

namespace FacturaScripts\Test\Plugins;

use FacturaScripts\Plugins\SamplePlugin\Model\DummyModel;
use FacturaScripts\Test\Traits\LogErrorsTrait;
use PHPUnit\Framework\TestCase;

final class DummyModelTest extends TestCase
{
    use LogErrorsTrait;

    public function testPrimaryColumn(): void
    {
        $this->assertEquals('id', DummyModel::primaryColumn());
    }

    public function testTableName(): void
    {
        $this->assertEquals('dummies', DummyModel::tableName());
    }

    public function testClear(): void
    {
        $model = new DummyModel();
        $model->clear();

        $this->assertEquals(0, $model->price);
        $this->assertEquals("new", $model->dummy_type);
        $this->assertGreaterThanOrEqual(0, $model->random_number);
        $this->assertEquals("middle", $model->resell_value);
        $this->assertEquals(0, $model->dummy_rating);
        $this->assertNotEmpty($model->programmed_date);
        $this->assertNotEmpty($model->programmed_hour);
    }

    public function testSaveInsert(): void
    {
        $model = new DummyModel();
        $model->clear();
        $insert = $model->saveInsert();

        $this->assertNotEmpty($model->creation_date);
        $this->assertNotEmpty($model->modification_date);
        $this->assertTrue($insert);
        $model->delete();
    }

    public function testSaveInsertNoInsert(): void
    {
        $model = new DummyModel();
        $model->clear();
        $model->id = 999;
        $model->saveInsert();

        $model2 = new DummyModel();
        $model2->clear();
        $model2->id = 999;
        $insert = $model2->saveInsert();

        //no se debe insertar porque ese id ya existe
        $this->assertFalse($insert);
        $model->delete();
    }

    public function testSaveUpdate(): void
    {
        $model = new DummyModel();
        $model->clear();
        $model->saveInsert();
        $fechaM = $model->modification_date;

        //esperamos 2 segundos para que la fecha de modificacion sea diferente
        sleep(2);
        $update = $model->saveUpdate();

        $this->assertTrue($update);
        $this->assertNotEquals($fechaM, $model->modification_date);
        $model->delete();
    }

    protected function tearDown(): void
    {
        $this->logErrors();
    }
}
