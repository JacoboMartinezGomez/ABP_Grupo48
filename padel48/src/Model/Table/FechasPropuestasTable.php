<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * FechasPropuestas Model
 *
 * @property \App\Model\Table\EnfrentamientosTable&\Cake\ORM\Association\BelongsTo $Enfrentamientos
 *
 * @method \App\Model\Entity\FechasPropuesta get($primaryKey, $options = [])
 * @method \App\Model\Entity\FechasPropuesta newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\FechasPropuesta[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\FechasPropuesta|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FechasPropuesta saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FechasPropuesta patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\FechasPropuesta[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\FechasPropuesta findOrCreate($search, callable $callback = null, $options = [])
 */
class FechasPropuestasTable extends Table
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

        $this->setTable('fechas_propuestas');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Enfrentamientos', [
            'foreignKey' => 'enfrentamiento_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Enfrentamientos', [
            'foreignKey' => 'creador'
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
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->time('hora')
            ->requirePresence('hora', 'create')
            ->notEmptyTime('hora');

        $validator
            ->date('fecha')
            ->requirePresence('fecha', 'create')
            ->notEmptyDate('fecha');

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
        $rules->add($rules->existsIn(['enfrentamiento_id'], 'Enfrentamientos'));

        return $rules;
    }

    public function isOwnedBy($fechaId, $userId)
    {
        return $this->exists(['id' => $fechaId, 'creador' => $userId]);
    }


}
