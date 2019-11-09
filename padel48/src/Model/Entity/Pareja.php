<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Pareja Entity
 *
 * @property string $id_capitan
 * @property string $id_pareja
 * @property int $campeonato_id
 * @property string $tipo
 * @property int $nivel
 * @property int $puntuacion
 * @property bool $clasificado
 *
 * @property \App\Model\Entity\Campeonato $campeonato
 */
class Pareja extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'tipo' => true,
        'nivel' => true,
        'puntuacion' => true,
        'clasificado' => true,
        'campeonato' => true
    ];
}
