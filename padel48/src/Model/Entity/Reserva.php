<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Reserva Entity
 *
 * @property string $id_usuario
 * @property int $pista_id
 * @property int $hora
 * @property \Cake\I18n\FrozenDate $fecha
 *
 * @property \App\Model\Entity\Pista $pista
 */
class Reserva extends Entity
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
        'pista_id' => true,
        'id_usuario' => true,
        'hora' => true,
        'fecha' => true,
    ];
}
