<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Enfrentamientos Model
 *
 * @property \App\Model\Table\GruposTable&\Cake\ORM\Association\BelongsTo $Grupos
 * @property \App\Model\Table\FechasPropuestasTable&\Cake\ORM\Association\HasMany $FechasPropuestas
 * @property \App\Model\Table\ParejasDisputanEnfrentamientoTable&\Cake\ORM\Association\HasMany $ParejasDisputanEnfrentamiento
 *
 * @method \App\Model\Entity\Enfrentamiento get($primaryKey, $options = [])
 * @method \App\Model\Entity\Enfrentamiento newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Enfrentamiento[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Enfrentamiento|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Enfrentamiento saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Enfrentamiento patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Enfrentamiento[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Enfrentamiento findOrCreate($search, callable $callback = null, $options = [])
 */
class EnfrentamientosTable extends Table
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

        $this->setTable('enfrentamientos');
        $this->setDisplayField('id_enfrentamiento');
        $this->setPrimaryKey('id_enfrentamiento');

        $this->belongsTo('Grupos', [
            'foreignKey' => 'grupo_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('FechasPropuestas', [
            'foreignKey' => 'enfrentamiento_id'
        ]);
        $this->hasMany('ParejasDisputanEnfrentamiento', [
            'foreignKey' => 'enfrentamiento_id'
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
            ->integer('id_enfrentamiento')
            ->allowEmptyString('id_enfrentamiento', null, 'create');

        $validator
            ->time('hora')
            ->allowEmptyTime('hora');

        $validator
            ->date('fecha')
            ->allowEmptyDate('fecha');

        $validator
            ->integer('fase')
            ->requirePresence('fase', 'create')
            ->notEmptyString('fase');

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
        $rules->add($rules->existsIn(['grupo_id'], 'Grupos'));

        return $rules;
    }
}
