<?php

namespace app\controllers\api;

use app\models\Rectangle;
use app\models\Triangle;
use Yii;
use yii\filters\VerbFilter;
use yii\rest\Controller;

class PolygonController extends Controller
{
    const BAD_REQUEST = 400;
    const INTERNAL_SERVER_ERROR = 500;
    const CREATED = 201;


    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'create-triangle' => ['POST'],
                    'create-rectangle' => ['POST'],
                    'get-area-sum' => ['GET'],
                ]
            ]
        ];
    }

    public function actionCreateTriangle()
    {
        $triangele = new Triangle();
        $triangele->attributes = Yii::$app->request->post();

        $response = Yii::$app->response;
        if ($triangele->validate()) {
            if ($triangele->save()){
                $response->data = json_encode(['success' => true]);
                $response->statusCode = self::CREATED;
            }
            else {
                $response->data = json_encode(['success' => false]);
                $response->statusCode = self::INTERNAL_SERVER_ERROR;
            }


        } else {
            $response->statusCode = self::BAD_REQUEST;
            $response->data = json_encode($triangele->errors);
        }

    }

    public function actionCreateRectangle()
    {
        $rectangle = new Rectangle();
        $rectangle->attributes = Yii::$app->request->post();

        $response = Yii::$app->response;
        if ($rectangle->validate()) {
            if ($rectangle->save()) {
                $response->data = json_encode(['success' => true]);
                $response->statusCode = self::CREATED;
            } else {
                $response->data = json_encode(['success' => false]);
                $response->statusCode = self::INTERNAL_SERVER_ERROR;
            }


        } else {
            $response->statusCode = self::BAD_REQUEST;
            $response->data = json_encode($rectangle->errors);
        }
    }

    public function actionGetAreaSum()
    {
        $response = Yii::$app->response;
        try {
            $response->data = json_encode([
                'success' => true,
                'sum' => Triangle::getAreaSum() + Rectangle::getAreaSum()
            ]);
        } catch (\Exception $e) {
            echo $e->getMessage();
            Yii::error(__CLASS__ . '::' . __METHOD__ . '=>' . $e->getMessage() . ' ' . $e->getMessage());
            $response->data = json_encode(['success' => false]);
            $response->statusCode = self::INTERNAL_SERVER_ERROR;
        }
    }

}