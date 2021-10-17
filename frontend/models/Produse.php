<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "produse".
 *
 * @property int $id
 * @property string $produs_denumire
 * @property string $produs_imagine
 * @property int|null $produs_categorie
 * @property float $produs_pret
 * @property int|null $produs_is_active
 * @property int|null $produs_stock
 */
class Produse extends \yii\db\ActiveRecord
{
    public $file;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'produse';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['produs_denumire', 'produs_imagine', 'produs_pret'], 'required'],
            [['produs_categorie', 'produs_is_active', 'produs_stock'], 'integer'],
            [['produs_pret'], 'number'],
            [['file'], 'file'],
            [['produs_created_date'], 'safe'],
            [['produs_denumire', 'produs_imagine'], 'string', 'max' => 80],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'produs_denumire' => 'Produs Denumire',
            'produs_imagine' => 'Produs Imagine',
            'produs_categorie' => 'Produs Categorie',
            'produs_pret' => 'Produs Pret',
            'produs_is_active' => 'Produs Is Active',
            'produs_stock' => 'Produs Stock',
            'produs_created_date' => 'Data creare produs'
        ];
    }

    public function getCategorie(){
        return $this->hasOne(Categorii::className(), ['id' => 'produs_categorie']);
    }
}