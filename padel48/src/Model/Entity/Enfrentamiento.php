<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Enfrentamiento Entity
 *
 * @property int $id_enfrentamiento
 * @property int $grupo_id
 * @property \Cake\I18n\FrozenTime|null $hora
 * @property \Cake\I18n\FrozenDate|null $fecha
 * @property int $fase
 *
 * @property \App\Model\Entity\Grupo $grupo
 * @property \App\Model\Entity\FechasPropuesta[] $fechas_propuestas
 * @property \App\Model\Entity\ParejasDisputanEnfrentamiento[] $parejas_disputan_enfrentamiento
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
        'grupo_id' => true,
        'hora' => true,
        'fecha' => true,
        'fase' => true,
        'grupo' => true,
        'fechas_propuestas' => true,
        'parejas_disputan_enfrentamiento' => true
    ];
}
