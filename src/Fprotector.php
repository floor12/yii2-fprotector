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
        FprotectorAsset::register(\Yii::$app->view);
        return "<script>fprotectorChech($('#{$modelName}_code'));</script>";
    }


    static public function check($modelName)
    {
        if ($_POST[$modelName]['code'] != md5(md5($_SERVER['REMOTE_ADDR']))) {
            die('hacker');
        }
    }

    static public function code()
    {
        return md5($_SERVER['REMOTE_ADDR']);
    }
}