<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Parejasdisputanenfrentamiento Model
 *
 * @property \App\Model\Table\EnfrentamientosTable&\Cake\ORM\Association\BelongsTo $Enfrentamientos
 *
 * @method \App\Model\Entity\Parejasdisputanenfrentamiento get($primaryKey, $options = [])
 * @method \App\Model\Entity\Parejasdisputanenfrentamiento newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Parejasdisputanenfrentamiento[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Parejasdisputanenfrentamiento|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Parejasdisputanenfrentamiento saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Parejasdisputanenfrentamiento patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Parejasdisputanenfrentamiento[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Parejasdisputanenfrentamiento findOrCreate($search, callable $callback = null, $options = [])
 */
class ParejasdisputanenfrentamientoTable extends Table
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

        $this->setTable('parejas_disputan_enfrentamiento');
        $this->setDisplayField('id_pareja1');
        $this->setPrimaryKey(['id_pareja1', 'id_pareja2', 'enfrentamiento_id']);

        $this->belongsTo('Enfrentamientos', [
            'foreignKey' => 'enfrentamiento_id',
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
            ->integer('id_pareja1')
            ->allowEmptyString('id_pareja1', null, 'create');

        $validator
            ->integer('id_pareja2')
            ->allowEmptyString('id_pareja2', null, 'create');

        $validator
            ->scalar('resultado')
            ->maxLength('resultado', 9)
            ->allowEmptyString('resultado');

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
}
