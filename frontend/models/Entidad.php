<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

class Entidad extends Model
{
    public $id;
    public $codigo;
    public $descripcion;
    public $fecha;
    public $nombre;

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'codigo' => 'Código',
            'descripcion' => 'Descripción',
            'fecha' => 'Fecha',
            'nombre' => 'Nombre'
        ];
    }

}
