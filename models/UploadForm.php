<?php
    namespace app\models;

    use yii\base\Model;
    use yii\web\UploadedFile;
    use Yii;

class UploadForm extends Model
{
    /**
     * @var UploadedFile[]
     */

    public $imageFiles;

    public function rules()
    {
        return [
            [['imageFiles'], 'file', 'skipOnEmpty' => false, 'extensions' => 'pdf, jpg', 'maxFiles' => 0, 'checkExtensionByMimeType' => false],
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            foreach ($this->imageFiles as $file) {
                $filename = Yii::$app->getSecurity()->generateRandomString(15);
                $file->saveAs('uploads/' . $filename . '.' . $file->extension);
//                $this->imageFiles->saveAs("uploads/{this->imageFiles->baseName}.{this->imageFiles->extension}");
            }
            return true;
        } else {
            return false;
        }
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'imageFiles' => 'Файлы',
        ];
    }
}