<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Parejas Model
 *
 * @property \App\Model\Table\CampeonatosTable&\Cake\ORM\Association\BelongsTo $Campeonatos
 * @property \App\Model\Table\GruposTable&\Cake\ORM\Association\BelongsTo $Grupos
 * @property \App\Model\Table\CategoriasTable&\Cake\ORM\Association\BelongsTo $Categorias
 *
 * @method \App\Model\Entity\Pareja get($primaryKey, $options = [])
 * @method \App\Model\Entity\Pareja newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Pareja[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Pareja|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Pareja saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Pareja patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Pareja[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Pareja findOrCreate($search, callable $callback = null, $options = [])
 */
class ParejasTable extends Table
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

        $this->setTable('parejas');
        $this->setDisplayField('id_capitan');
        $this->setPrimaryKey(['id_capitan', 'id_pareja', 'campeonato_id']);

        $this->belongsTo('Campeonatos', [
            'foreignKey' => 'campeonato_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Grupos', [
            'foreignKey' => 'grupo_id'
        ]);
        $this->belongsTo('Categorias', [
            'foreignKey' => 'categoria_id',
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
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('id_capitan')
            ->maxLength('id_capitan', 9)
            ->requirePresence('id_capitan', 'create')
            ->notEmptyString('id_capitan');

        $validator
            ->scalar('id_pareja')
            ->maxLength('id_pareja', 9)
            ->requirePresence('id_pareja', 'create')
            ->notEmptyString('id_pareja');

        $validator
            ->integer('puntuacion')
            ->requirePresence('puntuacion', 'create')
            ->notEmptyString('puntuacion');

        $validator
            ->boolean('clasificado')
            ->requirePresence('clasificado', 'create')
            ->notEmptyString('clasificado');

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
        $rules->add($rules->existsIn(['id_campeonato'], 'Campeonatos'));
        $rules->add($rules->existsIn(['id_grupo'], 'Grupos'));
        $rules->add($rules->existsIn(['id_categoria'], 'Categorias'));

        return $rules;
    }
}
