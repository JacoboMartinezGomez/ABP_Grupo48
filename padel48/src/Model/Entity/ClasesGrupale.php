<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ClasesGrupale Entity
 *
 * @property int $id_claseGrupal
 * @property \Cake\I18n\FrozenDate $fecha_inicio
 * @property \Cake\I18n\FrozenTime $hora
 * @property string $usuario_id
 * @property int $num_max_apuntados
 * @property int $num_actual_apuntados
 * @property int $precio
 * @property int $pista_reserva
 * @property int $hora_reserva
 * @property \Cake\I18n\FrozenDate $fecha_reserva
 *
 * @property \App\Model\Entity\Usuario $usuario
 */
class ClasesGrupale extends Entity
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
        'hora' => true,
        'usuario_id' => true,
        'num_max_apuntados' => true,
        'num_actual_apuntados' => true,
        'precio' => true,
        'pista_reserva' => true,
        'hora_reserva' => true,
        'fecha_reserva' => true,
        'usuario' => true
    ];
}
