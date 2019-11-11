<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Campeonato Entity
 *
 * @property int $id_campeonato
 * @property \Cake\I18n\FrozenDate $fecha_inicio
 * @property \Cake\I18n\FrozenDate $fecha_fin
 *
 * @property \App\Model\Entity\Categoria[] $categorias
 * @property \App\Model\Entity\Grupo[] $grupos
 * @property \App\Model\Entity\Pareja[] $parejas
 * @property \App\Model\Entity\ParejasDisputanEnfrentamiento[] $parejas_disputan_enfrentamiento
 */
class Campeonato extends Entity
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
        'fecha_inicio' => true,
        'fecha_fin' => true,
        'categorias' => true,
        'grupos' => true,
        'parejas' => true,
        'parejas_disputan_enfrentamiento' => true
    ];
}
