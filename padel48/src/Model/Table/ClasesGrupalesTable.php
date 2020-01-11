<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ClasesGrupales Model
 *
 * @property \App\Model\Table\UsuariosTable&\Cake\ORM\Association\BelongsTo $Usuarios
 *
 * @method \App\Model\Entity\ClasesGrupale get($primaryKey, $options = [])
 * @method \App\Model\Entity\ClasesGrupale newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ClasesGrupale[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ClasesGrupale|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ClasesGrupale saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ClasesGrupale patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ClasesGrupale[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ClasesGrupale findOrCreate($search, callable $callback = null, $options = [])
 */
class ClasesGrupalesTable extends Table
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

        $this->setTable('clases_grupales');
        $this->setDisplayField('id_claseGrupal');
        $this->setPrimaryKey('id_claseGrupal');

        $this->belongsTo('Usuarios', [
            'foreignKey' => 'usuario_id',
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
            ->integer('id_claseGrupal')
            ->allowEmptyString('id_claseGrupal', null, 'create');

        $validator
            ->date('fecha_inicio')
            ->requirePresence('fecha_inicio', 'create')
            ->notEmptyDate('fecha_inicio');

        $validator
            ->time('hora')
            ->requirePresence('hora', 'create')
            ->notEmptyTime('hora');

        $validator
            ->integer('num_max_apuntados')
            ->requirePresence('num_max_apuntados', 'create')
            ->notEmptyString('num_max_apuntados');

        $validator
            ->integer('num_actual_apuntados')
            ->requirePresence('num_actual_apuntados', 'create')
            ->notEmptyString('num_actual_apuntados');

        $validator
            ->integer('precio')
            ->requirePresence('precio', 'create')
            ->notEmptyString('precio');

        $validator
            ->integer('pista_reserva')
            ->requirePresence('pista_reserva', 'create')
            ->notEmptyString('pista_reserva');

        $validator
            ->integer('hora_reserva')
            ->requirePresence('hora_reserva', 'create')
            ->notEmptyString('hora_reserva');

        $validator
            ->date('fecha_reserva')
            ->requirePresence('fecha_reserva', 'create')
            ->notEmptyDate('fecha_reserva');

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
        $rules->add($rules->existsIn(['usuario_id'], 'Usuarios'));

        return $rules;
    }
}
