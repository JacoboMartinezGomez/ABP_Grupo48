<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Campeonatos Model
 *
 * @property \App\Model\Table\CategoriasTable&\Cake\ORM\Association\HasMany $Categorias
 * @property \App\Model\Table\GruposTable&\Cake\ORM\Association\HasMany $Grupos
 * @property \App\Model\Table\ParejasTable&\Cake\ORM\Association\HasMany $Parejas
 *
 * @method \App\Model\Entity\Campeonato get($primaryKey, $options = [])
 * @method \App\Model\Entity\Campeonato newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Campeonato[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Campeonato|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Campeonato saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Campeonato patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Campeonato[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Campeonato findOrCreate($search, callable $callback = null, $options = [])
 */
class CampeonatosTable extends Table
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

        $this->setTable('campeonatos');
        $this->setDisplayField('id_campeonato');
        $this->setPrimaryKey('id_campeonato');

        $this->hasMany('Categorias', [
            'foreignKey' => 'campeonato_id'
        ]);
        $this->hasMany('Grupos', [
            'foreignKey' => 'campeonato_id'
        ]);
        $this->hasMany('Parejas', [
            'foreignKey' => 'campeonato_id'
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
            ->integer('id_campeonato')
            ->allowEmptyString('id_campeonato', null, 'create');

        $validator
            ->date('fecha_inicio')
            ->requirePresence('fecha_inicio', 'create')
            ->notEmptyDate('fecha_inicio');

        $validator
            ->date('fecha_fin')
            ->requirePresence('fecha_fin', 'create')
            ->notEmptyDate('fecha_fin');

        return $validator;
    }
}
