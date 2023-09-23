<?php

use Yii;
use TblProduct;
use TblProductController;

class TblProductControllerTest extends Yii\CDbTestCase
{
    public $fixtures = array(
        'products' => TblProduct::class,
    );

    public function setUp()
    {
        parent::setUp();
        $this->controller = new TblProductController('TblProductController');
        Yii::app()->controller = $this->controller;
    }

    public function testActionIndex()
    {
        $_SERVER['REQUEST_URI'] = '/tblProduct/index';
        $this->controller->run('index');
        $this->assertNotEmpty($this->controller->layout);
    }

    public function testActionView()
    {
        $_GET['id'] = 1;
        $this->controller->run('view');
        $this->assertNotEmpty($this->controller->layout);
    }

    public function testActionCreate()
    {
        $_POST[TblProduct::class] = array(
            'name' => 'Test',
            'price' => 0.01,
            'count' => 10
        );
        $this->controller->run('create');
        $this->assertCount(2, TblProduct::model()->findAll());
    }

    public function testActionUpdate()
    {
        $_GET['id'] = 1;
        $_POST[TblProduct::class] = array(
            'name' => 'Updated Test',
            'price' => 0.02,
            'count' => 20
        );
        $this->controller->run('update');
        $this->assertEquals('Updated Test', TblProduct::model()->findByPk(1)->name);
    }

    public function testActionDelete()
    {
        $_GET['id'] = 1;
        $this->controller->run('delete');
        $this->assertCount(0, TblProduct::model()->findAll());
    }
}