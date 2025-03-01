<?php
/**
 * Created by PhpStorm.
 * User: floor12
 * Date: 19.03.2016
 * Time: 15:36
 */

namespace floor12\fprotector;


use yii\web\BadRequestHttpException;

class Fprotector
{
    /**
     * @param $modelName
     * @return string
     */
    static public function checkScript($modelName)
    {
        $view = \Yii::$app->view;
        FprotectorAsset::register($view);
        $view->registerJs("jQuery(document).ready(function(){fprotectorCheck02(jQuery('#{$modelName}_code'));})", $view::POS_END, 'fprotector_' . $modelName);
        return "<input type='hidden' id='{$modelName}_code' name='{$modelName}[code]' value='" . md5($_SERVER['REMOTE_ADDR']) . "'>";
    }

    /**
     * @param $modelName
     * @return bool
     * @throws BadRequestHttpException
     */
    static public function check($modelName)
    {
        if (!YII_ENV_TEST && (!isset($_POST[$modelName]['code']) || $_POST[$modelName]['code'] != md5(md5($_SERVER['REMOTE_ADDR'])))) {
            throw new BadRequestHttpException('Вы похожи на спам-бота. Попробуйте отправить форму еще раз.');
        }
        return true;
    }

}
