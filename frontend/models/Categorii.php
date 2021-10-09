<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "categorii".
 *
 * @property int $id
 * @property string $categorie_denumire
 * @property int|null $categorie_is_active
 */
class Categorii extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categorii';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['categorie_denumire'], 'required'],
            [['categorie_is_active'], 'integer'],
            [['categorie_denumire'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'categorie_denumire' => 'Categorie Denumire',
            'categorie_is_active' => 'Categorie Is Active',
        ];
    }
}
