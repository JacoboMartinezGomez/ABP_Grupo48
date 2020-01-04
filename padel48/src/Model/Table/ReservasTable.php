<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Reservas Model
 *
 * @property \App\Model\Table\PistasTable&\Cake\ORM\Association\BelongsTo $Pistas
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
        $this->setPrimaryKey(['id_usuario', 'pista_id', 'hora', 'fecha']);

        $this->belongsTo('Pistas', [
            'foreignKey' => 'pista_id',
            'joinType' => 'INNER'
        ]);
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
            ->integer('hora')
            ->allowEmptyString('hora', null, 'create');

        $validator
            ->date('fecha')
            ->allowEmptyDate('fecha', null, 'create');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['pista_id'], 'Pistas'));

        return $rules;
    }
}
