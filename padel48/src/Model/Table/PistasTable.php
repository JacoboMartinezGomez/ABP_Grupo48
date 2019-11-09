<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pistas Model
 *
 * @property \App\Model\Table\HorariosTable&\Cake\ORM\Association\HasMany $Horarios
 *
 * @method \App\Model\Entity\Pista get($primaryKey, $options = [])
 * @method \App\Model\Entity\Pista newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Pista[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Pista|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Pista saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Pista patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Pista[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Pista findOrCreate($search, callable $callback = null, $options = [])
 */
class PistasTable extends Table
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

        $this->setTable('pistas');
        $this->setDisplayField('num_pista');
        $this->setPrimaryKey('num_pista');

        $this->hasMany('Horarios', [
            'foreignKey' => 'pista_id'
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
            ->integer('num_pista')
            ->allowEmptyString('num_pista', null, 'create');

        $validator
            ->scalar('tipo')
            ->requirePresence('tipo', 'create')
            ->notEmptyString('tipo');

        $validator
            ->scalar('lugar')
            ->requirePresence('lugar', 'create')
            ->notEmptyString('lugar');

        return $validator;
    }
}
