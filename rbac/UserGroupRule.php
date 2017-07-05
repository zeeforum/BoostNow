<?php
namespace app\rbac;

use Yii;
use yii\rbac\Rule;

/**
 * Checks if admin group matches
 */
class UserGroupRule extends Rule
{
    public $name = 'userGroup';

    public function execute($user, $item, $params)
    {
        if (!Yii::$app->admin->isGuest) {
            $group = Yii::$app->admin->identity->role;
            if ($item->name === 'admin') {
                return $group == 'admin';
            } elseif ($item->name === 'author') {
                return $group == 'admin' || $group == 'author';
            }
        }
        return false;
    }
}