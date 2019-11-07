<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Enfrentamientos Model
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
            ->scalar('id_capitan1')
            ->maxLength('id_capitan1', 9)
            ->requirePresence('id_capitan1', 'create')
            ->notEmptyString('id_capitan1');

        $validator
            ->scalar('id_capitan2')
            ->maxLength('id_capitan2', 9)
            ->requirePresence('id_capitan2', 'create')
            ->notEmptyString('id_capitan2');

        $validator
            ->integer('id_grupo')
            ->requirePresence('id_grupo', 'create')
            ->notEmptyString('id_grupo');

        $validator
            ->time('hora')
            ->requirePresence('hora', 'create')
            ->notEmptyTime('hora');

        $validator
            ->date('fecha')
            ->requirePresence('fecha', 'create')
            ->notEmptyDate('fecha');

        $validator
            ->integer('fase')
            ->requirePresence('fase', 'create')
            ->notEmptyString('fase');

        return $validator;
    }
}
