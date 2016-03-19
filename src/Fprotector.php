<?php
/**
 * Created by PhpStorm.
 * User: floor12
 * Date: 19.03.2016
 * Time: 15:36
 */

namespace floor12\fprotector;


class Fprotector
{

    static public function checkScript($modelName)
    {
        $view = \Yii::$app->view;
        FprotectorAsset::register($view);
        $view->registerJs("$(document).ready(function(){fprotectorCheck($('#{$modelName}_code'));})", $view::POS_END, 'fprotector_'.$modelName);
        return "<input type='hidden' id='{$modelName}_code' name='{$modelName}[code]' value='" . md5($_SERVER['REMOTE_ADDR']) . "'>";
    }


    static public function check($modelName)
    {
        if (!isset($_POST[$modelName]['code']))
            die('hacker');
        if ($_POST[$modelName]['code'] != md5(md5($_SERVER['REMOTE_ADDR']))) {
            die('hacker');
        }
    }

}