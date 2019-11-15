<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Partidos Model
 *
 * @property \App\Model\Table\UsuariosTable&\Cake\ORM\Association\BelongsTo $Usuarios
 *
 * @method \App\Model\Entity\Partido get($primaryKey, $options = [])
 * @method \App\Model\Entity\Partido newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Partido[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Partido|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Partido saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Partido patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Partido[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Partido findOrCreate($search, callable $callback = null, $options = [])
 */
class PartidosTable extends Table
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

        $this->setTable('partidos');
        $this->setDisplayField('usuario_id');
        $this->setPrimaryKey(['usuario_id', 'usuario_id2', 'usuario_id3', 'usuario_id4']);

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
            ->scalar('usuario_id2')
            ->maxLength('usuario_id2', 9)
            ->allowEmptyString('usuario_id2', null, 'create');

        $validator
            ->scalar('usuario_id3')
            ->maxLength('usuario_id3', 9)
            ->allowEmptyString('usuario_id3', null, 'create');

        $validator
            ->scalar('usuario_id4')
            ->maxLength('usuario_id4', 9)
            ->allowEmptyString('usuario_id4', null, 'create');

        $validator
            ->time('hora')
            ->requirePresence('hora', 'create')
            ->notEmptyTime('hora');

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

    /**
     * Returns Falso si el partido esta cerrado, es decir, tiene ya 4 inscritos y verdadero
     * si tiene algun hueco libre y ha podido añadir al deportista
     *
     * @param $id_partido ID del partido a comprobar
     * @param $dni dni del usuario a introducir
     * @return bool
     */
    public function addDeportista($id_partido, $dni){
        $partido = $this->get($id_partido);

        if($partido->usuario_id != null){
            $partido->usuario_id = $dni;
            $this->save($partido);
            return true;
        }else if($partido->usuario_id2 != null){
            $partido->usuario_id2 = $dni;
            $this->save($partido);
            return true;
        }else if($partido->usuario_id3 != null){
            $partido->usuario_id3 = $dni;
            $this->save($partido);
            return true;
        }else if($partido->usuario_id4 != null){
            $partido->usuario_id4 = $dni;
            $this->save($partido);
            return true;
        }else{
            return false;
        }
    }
}

//    public function statusPartido($id_partido){
//        $partido = $this->get($id_partido);
//
//        if($partido->usuario_id != null){
//            return true;
//        }else if($partido->usuario_id2 != null){
//            return true;
//        }else if($partido->usuario_id3 != null){
//            return true;
//        }else if($partido->usuario_id4 != null){
//            return true;
//        }else{
//            return false;
//        }
//    }
