<?php


/**
 * Поведение для работы с файлами
 * @property yii\db\ActiveRecord owner
 */
namespace app\components\behaviors;

use yii\db\ActiveRecord;
use yii\base\Behavior;
use yii\web\UploadedFile;
use Yii;

class FileBehavior extends Behavior {
    private $savePath = "@webroot";
    private $folder = "uploads";
    private $thumbnailPostfix = "_thumb.jpg";
    public $attributes = [];

    public function events() {
        return [
            ActiveRecord::EVENT_BEFORE_VALIDATE => 'beforeValidate',
            ActiveRecord::EVENT_BEFORE_UPDATE => 'beforeInsert',
            ActiveRecord::EVENT_BEFORE_INSERT => 'beforeInsert',
        ];
    }

    private function getAttributesByRules() {
        foreach ($this->owner->rules() as $rule) {
            if ($rule[1] == "file" || $rule[1] == "image") {
                foreach ($rule[0] as $attr) {
                    $this->attributes[$attr] = [];
                }
            }
        }
    }

    public function beforeValidate() {
        if (empty($this->attributes)) $this->getAttributesByRules();

        foreach($this->attributes as $name => $type) {
            // Атрибут, который должен быть файлов
            $attr = $this->owner->attributes[$name];

            // Если он пустой, попробуем поставить ему старое значение
            if (!strlen($attr)) {
                if (isset($this->owner->oldAttributes[$name])) $this->owner->setAttribute($name, $this->owner->oldAttributes[$name]);
            }
        }
    }

    // Прежде чем добавлять запись
    public function beforeInsert() {
        foreach($this->attributes as $name => $attr) {
            if ($file = UploadedFile::getInstance($this->owner, $name)) {
                $fileName = DIRECTORY_SEPARATOR.$this->folder.DIRECTORY_SEPARATOR.uniqid().".".$file->extension;
                $file->saveAs(Yii::getAlias($this->savePath).$fileName);
                $this->owner->setAttribute($name,$fileName, false);

                if (isset($attr['type'])) {
                    switch($attr['type']) {
                        case "image":
                            $this->checkImage($fileName, $attr);
                            break;
                    }
                }
            }
        }
    }

    // Подгоняем изображение
    public function checkImage($fileName, $attr) {
        $image = new \Imagick();
        $image->setBackgroundColor(new \ImagickPixel('#ffffff'));
        $image->readImage(Yii::getAlias("@webroot").$fileName);

        // resize and crop image
        if (isset($attr['size'])) {
            $image->cropThumbnailImage($attr['size'][0], $attr['size'][1]);
        }

        // generate thumbnail
        if (isset($attr['thumbnail'])) {
            $thumbnail = new \Imagick(Yii::getAlias("@webroot").$fileName);
            $thumbnail->cropThumbnailImage($attr['thumbnail'][0], $attr['thumbnail'][1]);
            $thumbnail->setImageFormat("jpg");
            $thumbnail->writeImage(Yii::getAlias("@webroot").$fileName.$this->thumbnailPostfix);
        }

        $image->writeImage(Yii::getAlias("@webroot").$fileName);
    }

    /**
     * Returns thumbnailed image, if it exists. In case of not - returns original image
     * @param null $attr
     * @return string
     */
    public function getThumbnail($attr = null) {
        if (!$attr) $attr = array_keys($this->attributes)[0];
        $photo = $this->owner->getAttribute($attr);

        if (file_exists(Yii::getAlias("@webroot").$photo.$this->thumbnailPostfix)) {
            return $photo.$this->thumbnailPostfix;
        } else {
            return $photo;
        }
    }
}