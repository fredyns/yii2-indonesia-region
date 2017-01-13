<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace fredyns\daerahIndonesia\models\base;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base-model class for table "_kodepos".
 *
 * @property integer $id
 * @property integer $nomor
 * @property integer $kelurahan_id
 * @property integer $kecamatan_id
 * @property integer $kota_id
 * @property integer $provinsi_id
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 *
 * @property \fredyns\daerahIndonesia\models\Kecamatan $kecamatan
 * @property \fredyns\daerahIndonesia\models\Kelurahan $kelurahan
 * @property \fredyns\daerahIndonesia\models\Kota $kota
 * @property \fredyns\daerahIndonesia\models\Provinsi $provinsi
 * @property string $aliasModel
 */
abstract class Kodepos extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'drhidn_kodepos';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => BlameableBehavior::className(),
            ],
            [
                'class' => TimestampBehavior::className(),
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nomor'], 'required'],
            [['nomor', 'kelurahan_id', 'kecamatan_id', 'kota_id', 'provinsi_id'], 'integer'],
            [['kecamatan_id'], 'exist', 'skipOnError' => true, 'targetClass' => Kecamatan::className(), 'targetAttribute' => ['kecamatan_id' => 'id']],
            [['kelurahan_id'], 'exist', 'skipOnError' => true, 'targetClass' => Kelurahan::className(), 'targetAttribute' => ['kelurahan_id' => 'id']],
            [['kota_id'], 'exist', 'skipOnError' => true, 'targetClass' => Kota::className(), 'targetAttribute' => ['kota_id' => 'id']],
            [['provinsi_id'], 'exist', 'skipOnError' => true, 'targetClass' => Provinsi::className(), 'targetAttribute' => ['provinsi_id' => 'id']]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'           => 'ID',
            'created_at'   => 'Created At',
            'updated_at'   => 'Updated At',
            'created_by'   => 'Created By',
            'updated_by'   => 'Updated By',
            'nomor'        => 'Nomor',
            'kelurahan_id' => 'Kelurahan',
            'kecamatan_id' => 'Kecamatan',
            'kota_id'      => 'Kota',
            'provinsi_id'  => 'Provinsi',
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeHints()
    {
        return array_merge(parent::attributeHints(),
            [
            'id'         => 'id entry',
            'created_at' => 'waktu insert',
            'updated_at' => 'waktu update terakhir',
            'created_by' => 'id user yg melakukan insert terakhir',
            'updated_by' => 'id user yg melakukan update terakhir',
        ]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKecamatan()
    {
        return $this->hasOne(\fredyns\daerahIndonesia\models\Kecamatan::className(), ['id' => 'kecamatan_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKelurahan()
    {
        return $this->hasOne(\fredyns\daerahIndonesia\models\Kelurahan::className(), ['id' => 'kelurahan_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKota()
    {
        return $this->hasOne(\fredyns\daerahIndonesia\models\Kota::className(), ['id' => 'kota_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProvinsi()
    {
        return $this->hasOne(\fredyns\daerahIndonesia\models\Provinsi::className(), ['id' => 'provinsi_id']);
    }

}