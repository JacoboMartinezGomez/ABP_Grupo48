<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Categoria Entity
 *
 * @property int $id_categoria
 * @property int $campeonato_id
 * @property string $tipo
 * @property int $nivel
 *
 * @property \App\Model\Entity\Campeonato $campeonato
 */
class Categoria extends Entity
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
        'id_categoria' => true,
        'tipo' => true,
        'nivel' => true,
        'campeonato' => true
    ];
}
