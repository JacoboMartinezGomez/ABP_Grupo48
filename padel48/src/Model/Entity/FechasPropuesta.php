<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * FechasPropuesta Entity
 *
 * @property int $id
 * @property int $enfrentamiento_id
 * @property string $creador
 * @property \Cake\I18n\FrozenTime $hora
 * @property \Cake\I18n\FrozenDate $fecha
 *
 * @property \App\Model\Entity\Enfrentamiento $enfrentamiento
 */
class FechasPropuesta extends Entity
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
        'enfrentamiento_id' => true,
        'creador' => true,
        'hora' => true,
        'fecha' => true,
        'enfrentamiento' => true
    ];
}
