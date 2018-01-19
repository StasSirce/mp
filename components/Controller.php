<?php

namespace app\components;
use yii\helpers\Url;
use Yii;
use yii\base\InvalidRouteException;

class Controller extends \yii\web\Controller {

    private $params;
    private $pjaxUrl;

    /**
     * @param string $view
     * @param array $params
     * @param bool|true $pjaxForce
     * @return string
     */
    public function render($view, $params = [], $pjaxForce = true) {
        if(isset($_SERVER["HTTP_X_PJAX"])) {
            $this->layout = "//pjax";
        }

        if ($pjaxForce && $this->hasMethod("action".ucfirst($view))) {
            $args = [];
            foreach ($this->actionParams as $key => $value) {
                $args[$key] =  $value;
            }

            $url = Url::toRoute(array_merge([$view], $args));
            if (strpos($url, '/') === 0 && strpos($url, '//') !== 0) $url = Yii::$app->getRequest()->getHostInfo() . $url;
            $this->pjaxUrl = $url;
        }

        $content = $this->getView()->render($view, $params, $this);
        return $this->renderContent($content);
    }

    /**
     * @inheritdoc
     */
    public function beforeAction($action) {
        if (isset($this->params['_pjax'])) unset($this->params['_pjax']);
        $url = Url::toRoute(array_merge([$action->id], $this->params));

        if (strpos($url, '/') === 0 && strpos($url, '//') !== 0) $url = Yii::$app->getRequest()->getHostInfo() . $url;

        $this->pjaxUrl = $url;
        return parent::beforeAction($action);
    }

    /**
     * @inheritdoc
     */
    public function afterAction($action, $result) {

        if (!strlen(Yii::$app->response->headers->get("X-PJAX-URL")))
            Yii::$app->response->headers->add("X-PJAX-URL", $this->pjaxUrl);

        return parent::afterAction($action, $result);
    }

    /**
     * @inheritdoc
     */
    public function runAction($id, $params = []) {
        $this->params = $params;
        return parent::runAction($id, $params);
    }


}