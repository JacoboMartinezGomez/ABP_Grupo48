<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UsuariosInscritosClase Entity
 *
 * @property int $claseGrupal_id
 * @property string $usuario_id
 *
 * @property \App\Model\Entity\Clasesgrupale $clasesgrupale
 * @property \App\Model\Entity\Usuario $usuario
 */
class UsuariosInscritosClase extends Entity
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
        'clasesgrupale' => true,
        'usuario' => true
    ];
}
