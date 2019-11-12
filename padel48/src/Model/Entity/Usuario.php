<?php
namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * Usuario Entity
 *
 * @property string $dni
 * @property string $passwd
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
        'dni' => true,
        'password' => true,
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

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];

    protected function _setPassword($value)
    {
        if (strlen($value)) {
            $hasher = new DefaultPasswordHasher();

            return $hasher->hash($value);
        }
    }
}
