<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Grupo Entity
 *
 * @property int $id_grupo
 * @property int $campeonato_id
 * @property int $categoria_id
 *
 * @property \App\Model\Entity\Campeonato $campeonato
 * @property \App\Model\Entity\Categoria $categoria
 * @property \App\Model\Entity\Enfrentamiento[] $enfrentamientos
 * @property \App\Model\Entity\Pareja[] $parejas
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
        'categoria_id' => true,
        'campeonato' => true,
        'id_grupo' => true
        
    ];
}
