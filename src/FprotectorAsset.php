<?php
/**
 * Created by PhpStorm.
 * User: floor12
 * Date: 19.03.2016
 * Time: 15:38
 */

namespace floor12\fprotector;


use yii\web\AssetBundle;

class FprotectorAsset extends AssetBundle
{

    public $publishOptions = [
        'forceCopy' => true,
    ];
    public $sourcePath = '@vendor/floor12/yii2-fprotector/assets/';

    public $js = [
        'secret.js',
    ];


}