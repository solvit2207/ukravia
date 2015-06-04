<?php

namespace app\controllers;

use Yii;
use app\models\City;
use app\models\Tickettype;
use app\models\Date;
use app\models\Flight;
use app\models\Place;
use app\models\Classy;
use app\models\Reserv;
use app\models\Passager;
use app\models\PassagerSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PassagerController implements the CRUD actions for Passager model.
 */

class PassagerController extends Controller
{ 
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Passager models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PassagerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Passager model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    
    public function actionView1($id)
    {
        return $this->render('view1', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Passager model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Passager();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_pass]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
	public function actionCreate1()
    {
        $model = new Reserv();
        $model->time=$model->getDateTimeForDb();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view1', 'id' => $model->id]);
        } else {
            return $this->render('create1', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Passager model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view1', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Passager model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['site/index']);
    }

    /**
     * Finds the Passager model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Passager the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Reserv::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    public function actionLists($class)
    {
        $countCities = \app\models\Place::find()
                ->where(['class' => $class])
                ->count();
 
        $cities= \app\models\Place::find()
                ->where(['class' => $class])
                ->all();
 
        if($countCities>0){
            foreach($cities as $city){
                echo "<option value='".$city->id_place."'>".$city->id_place."</option>";
            }
        }
        else{
            echo "<option>-</option>";
        }
 
    }
    
    public function actionClassType($class)
    {
        $type= \app\models\Tickettype::find()
                ->where(['class' => $class])
                ->all();
             foreach($type as $type){
                echo "<option value='".$type->type."'>".$type->type."</option>";
            }   
          
    }
    public function actionClassPrice($class)
    {
        $city1= \app\models\Classy::find()
                ->where(['class' => $class])
                ->one();
                echo $city1->margin;
          
    }
    public function actionPrice($reys)
    {
        $city= \app\models\City::find()
                ->where(['reys' => $reys])
                ->one();
                echo $city->price;
          
    }
    public function actionBag($kg)
    {
        $bag=$kg*40;
        return $bag;
          
    }
     public function actionPriceType($type)
    {
         if ($type == 'детский') 
         $marg = 0.8;
        else 
            $marg = 1;
        
        return $marg;
          
    }
    public function actionDates($reys)
    {
        $countCities = \app\models\Date::find()
                ->where(['reys' => $reys])
                ->count();
 
        $cities= \app\models\Date::find()
                ->where(['reys' => $reys])
                ->all();
 
        if($countCities>0){
            foreach($cities as $city){
                echo "<option value='".$city->date."'>".$city->date."</option>";
            }
        }
        else{
            echo "<option>-</option>";
        }
 
    }
    
}
