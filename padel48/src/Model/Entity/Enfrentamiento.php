<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Enfrentamiento Entity
 *
 * @property int $id_enfrentamiento
 * @property string $id_capitan1
 * @property string $id_capitan2
 * @property int $id_grupo
 * @property \Cake\I18n\FrozenTime $hora
 * @property \Cake\I18n\FrozenDate $fecha
 * @property int $fase
 */
class Enfrentamiento extends Entity
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
        'id_capitan1' => true,
        'id_capitan2' => true,
        'id_grupo' => true,
        'hora' => true,
        'fecha' => true,
        'fase' => true
    ];
}
