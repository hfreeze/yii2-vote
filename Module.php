<?php
/**
 * @link https://github.com/Chiliec/yii2-vote
 * @author Vladimir Babin <vovababin@gmail.com>
 * @license http://opensource.org/licenses/BSD-3-Clause
 */

namespace chiliec\vote;

use yii\base\InvalidConfigException;
use Yii;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'chiliec\vote\controllers';

    /**
     * Разешить голосовать гостям?
     * @var bool
     */
    public $allow_guests = true;

    /**
     * Сопоставление моделей с их id
     * @var array
     */
    public $matchingModels;

    public function init()
    {
        parent::init();
        if(!isset($this->matchingModels)) {
            throw new InvalidConfigException('matchingModels not configurated');
        }
        if(empty(Yii::$app->i18n->translations['vote'])) {
            Yii::$app->i18n->translations['vote'] = [
                'class' => 'yii\i18n\PhpMessageSource',
                'sourceLanguage' => 'en-US',
                'basePath' => __DIR__ . '/messages',
            ];
        }
    }
}
