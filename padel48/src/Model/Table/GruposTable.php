<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Grupos Model
 *
 * @property \App\Model\Table\CampeonatosTable&\Cake\ORM\Association\BelongsTo $Campeonatos
 * @property &\Cake\ORM\Association\BelongsTo $Categorias
 * @property &\Cake\ORM\Association\HasMany $Enfrentamientos
 * @property &\Cake\ORM\Association\HasMany $Parejas
 * @property \App\Model\Table\CategoriasTable&\Cake\ORM\Association\BelongsTo $Categorias
 * @property \App\Model\Table\EnfrentamientosTable&\Cake\ORM\Association\HasMany $Enfrentamientos
 * @property \App\Model\Table\ParejasTable&\Cake\ORM\Association\HasMany $Parejas
 *
 * @method \App\Model\Entity\Grupo get($primaryKey, $options = [])
 * @method \App\Model\Entity\Grupo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Grupo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Grupo|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Grupo saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Grupo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Grupo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Grupo findOrCreate($search, callable $callback = null, $options = [])
 */
class GruposTable extends Table
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

        $this->setTable('grupos');
        $this->setDisplayField('id_grupo');
        $this->setPrimaryKey(['id_grupo', 'campeonato_id', 'categoria_id']);

        $this->belongsTo('Campeonatos', [
            'foreignKey' => 'campeonato_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Categorias', [
            'foreignKey' => 'categoria_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Enfrentamientos', [
            'foreignKey' => 'grupo_id'
        ]);
        $this->hasMany('Parejas', [
            'foreignKey' => 'grupo_id'
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
            ->integer('id_grupo')
            ->allowEmptyString('id_grupo', null, 'create');

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
        $rules->add($rules->existsIn(['campeonato_id'], 'Campeonatos'));
        //$rules->add($rules->existsIn(['categoria_id'], 'Categorias'));

        return $rules;
    }
}
