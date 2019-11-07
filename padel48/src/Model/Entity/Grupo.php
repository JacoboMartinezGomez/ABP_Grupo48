<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Grupo Entity
 *
 * @property int $id_grupo
 * @property int $campeonato_id
 * @property string $tipo
 * @property int $nivel
 *
 * @property \App\Model\Entity\Campeonato $campeonato
 */
class Grupo extends Entity
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
        'campeonato_id' => true,
        'tipo' => true,
        'nivel' => true,
        'campeonato' => true
    ];
}
