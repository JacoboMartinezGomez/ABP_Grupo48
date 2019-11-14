<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Pareja Entity
 *
 * @property int $id
 * @property string $id_capitan
 * @property string $id_pareja
 * @property int $campeonato_id
 * @property int|null $grupo_id
 * @property int $categoria_id
 * @property int $puntuacion
 * @property bool $clasificado
 *
 * @property \App\Model\Entity\Campeonato $campeonato
 * @property \App\Model\Entity\Grupo $grupo
 * @property \App\Model\Entity\Categoria $categoria
 */
class Pareja extends Entity
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
        'id_capitan' => true,
        'id_pareja' => true,
        'campeonato_id' => true,
        'grupo_id' => true,
        'categoria_id' => true,
        'puntuacion' => true,
        'clasificado' => true
    ];
}
