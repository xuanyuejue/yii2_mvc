<?php
/**
 * Created by PhpStorm.
 * User: pangxb
 * Date: 16/8/31
 * Time: 下午5:05
 */

namespace  app\controllers;
use Yii;
use yii\web\Controller;
use app\models\Test;


class TestController extends Controller{
      public function actionTest(){
          echo "The url's param is : ".$_GET['id'];
          $userHost = Yii::$app->request->userHost;
          $userIP = Yii::$app->request->userIP;
          echo $userHost." ".$userIP;
      }
      public function actionTest2(){
          $list = Test::findAll();
          var_export($list);
      }

}