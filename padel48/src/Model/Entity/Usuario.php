<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Usuario Entity
 *
 * @property string $dni
 * @property string $nombre
 * @property string $apellido
 * @property string $email
 * @property string $sexo
 * @property int $telefono
 * @property string $rol
 * @property int $numero_pistas
 *
 * @property \App\Model\Entity\Noticia[] $noticias
 * @property \App\Model\Entity\Partido[] $partidos
 */
class Usuario extends Entity
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
        'nombre' => true,
        'apellido' => true,
        'email' => true,
        'sexo' => true,
        'telefono' => true,
        'rol' => true,
        'numero_pistas' => true,
        'noticias' => true,
        'partidos' => true
    ];
}
