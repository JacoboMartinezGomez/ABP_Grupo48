<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Noticia Entity
 *
 * @property int $id_noticia
 * @property string|null $usuario_id
 * @property string $titulo
 * @property string $contenido
 *
 * @property \App\Model\Entity\Usuario $usuario
 */
class Noticia extends Entity
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
        'usuario_id' => true,
        'titulo' => true,
        'contenido' => true,
        'usuario' => true
    ];
}
