<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Parejasdisputanenfrentamiento Entity
 *
 * @property int $id_pareja1
 * @property int $id_pareja2
 * @property int $enfrentamiento_id
 * @property string|null $resultado
 *
 * @property \App\Model\Entity\Enfrentamiento $enfrentamiento
 */
class Parejasdisputanenfrentamiento extends Entity
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
        'resultado' => true,
        'enfrentamiento_id' => true,
        'id_pareja1' => true,
        'id_pareja2' => true
    ];
}
