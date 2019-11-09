<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Pista Entity
 *
 * @property int $num_pista
 * @property string $tipo
 * @property string $lugar
 *
 * @property \App\Model\Entity\Horario[] $horarios
 */
class Pista extends Entity
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
        'lugar' => true,
        'horarios' => true
    ];
}
