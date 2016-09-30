<?php
/**
 * Created by PhpStorm.
 * User: pangxb
 * Date: 16/8/31
 * Time: 下午5:14
 */
namespace app\models;
use Yii;
use yii\base\Model;

class Test extends Model{
      public function findAll(){
          $test = Yii::$app->db->createCommand('SELECT * FROM test')->queryAll();
          return $test;
      }
}