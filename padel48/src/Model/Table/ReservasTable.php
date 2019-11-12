<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Reservas Model
 *
 * @method \App\Model\Entity\Reserva get($primaryKey, $options = [])
 * @method \App\Model\Entity\Reserva newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Reserva[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Reserva|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Reserva saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Reserva patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Reserva[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Reserva findOrCreate($search, callable $callback = null, $options = [])
 */
class ReservasTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('reservas');
        $this->setDisplayField('id_usuario');
        $this->setPrimaryKey(['id_usuario', 'id_pista', 'hora', 'fecha']);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->scalar('id_usuario')
            ->maxLength('id_usuario', 9)
            ->allowEmptyString('id_usuario', null, 'create');

        $validator
            ->integer('id_pista')
            ->allowEmptyString('id_pista', null, 'create');

        $validator
            ->integer('hora')
            ->allowEmptyString('hora', null, 'create');

        $validator
            ->date('fecha')
            ->allowEmptyDate('fecha', null, 'create');

        return $validator;
    }
}
