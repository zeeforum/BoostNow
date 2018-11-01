<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\db\Query;

class MainController extends Controller {

    // categories to show in navigation
    protected $categories = array();
    
    // website common preferences
    protected $preferences;

    function setPreferences() {
        $this->categories = $this->getCategories();
    }

    function getCategories() {
        $categories = (new Query)
        ->select(['id', 'name', 'parent_id'])
        ->from('categories')
        ->where(['draft' => 'no'])
        ->orderBy('name asc')
        ->all();
        
        return $categories;
    }

    function preFormat($arr) {
        echo '<pre>';
        print_r($arr);
        echo '</pre>';
        exit();
    }
}