<?php

class TblProductController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */

	public function init()
	{
		header("Access-Control-Allow-Origin: http://localhost:3000");
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
		header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
		parent::init();
	}

	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}
	
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	public function actionCreate()
	{
		$model=new TblProduct;
		
		$request = Yii::app()->request->getRestParams();

		if(isset($request))
		{
			$model->attributes=$request;
			if($model->save())
			echo CJSON::encode('success');
		}
		echo CJSON::encode($request);
	}

	public function actionEdit($id) 
	{
		$model = $this->loadModel($id);
		echo CJSON::encode($model->attributes);
	}

	public function actionUpdate($id)
	{
		$model = $this->loadModel($id);
	
		if($model===null)
		{
			echo CJSON::encode('Error: Model not found');
			Yii::app()->end();
		}
	
		$request = Yii::app()->request->getRestParams();
	
		if(isset($request))
		{
			$model->attributes=$request;
			if($model->validate() && $model->save())
			{
				echo CJSON::encode('success');
				Yii::app()->end();
			}
			else
			{
				echo CJSON::encode($model->getErrors());
				Yii::app()->end();
			}
		}
		echo CJSON::encode($request);
	}


	public function actionDelete($id)
	{
		$model = $this->loadModel($id);
		if($model === null)   
			throw new NotFoundHttpException('The requested page does not exist.');  
		$model->delete();
	}

	public function actionIndex()
	{
		$criteria = new CDbCriteria;
		$criteria->with = array('status'); // assuming 'status' is the relation name in TblProduct model for TblStatus
		$records = TblProduct::model()->findAll($criteria);
		$data = array_map(function($record) {
			return array_merge($record->attributes, [
				'status' => $record->status->attributes, // assuming 'status' is the relation name
			]);
		}, $records);
		echo CJSON::encode($data);
	}

	public function actionStatus()
	{
		$records = TblStatus::model()->findAll();
		echo CJSON::encode($records);
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new TblProduct('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['TblProduct']))
			$model->attributes=$_GET['TblProduct'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return TblProduct the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=TblProduct::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param TblProduct $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='tbl-product-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
