<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Partido Entity
 *
 * @property string $usuario_id
 * @property string $usuario_id2
 * @property string $usuario_id3
 * @property string $usuario_id4
 * @property \Cake\I18n\FrozenTime $hora
 *
 * @property \App\Model\Entity\Usuario $usuario
 */
class Partido extends Entity
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
        'hora' => true,
        'usuario' => true
    ];
}
