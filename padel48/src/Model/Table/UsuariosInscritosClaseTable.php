<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * UsuariosInscritosClase Model
 *
 * @property \App\Model\Table\ClasesgrupalesTable&\Cake\ORM\Association\BelongsTo $Clasesgrupales
 * @property \App\Model\Table\UsuariosTable&\Cake\ORM\Association\BelongsTo $Usuarios
 *
 * @method \App\Model\Entity\UsuariosInscritosClase get($primaryKey, $options = [])
 * @method \App\Model\Entity\UsuariosInscritosClase newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\UsuariosInscritosClase[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\UsuariosInscritosClase|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UsuariosInscritosClase saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UsuariosInscritosClase patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\UsuariosInscritosClase[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\UsuariosInscritosClase findOrCreate($search, callable $callback = null, $options = [])
 */
class UsuariosInscritosClaseTable extends Table
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

        $this->setTable('usuarios_inscritos_clase');
        $this->setDisplayField('claseGrupal_id');
        $this->setPrimaryKey(['claseGrupal_id', 'usuario_id']);

        $this->belongsTo('Clasesgrupales', [
            'foreignKey' => 'claseGrupal_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Usuarios', [
            'foreignKey' => 'usuario_id',
            'joinType' => 'INNER'
        ]);
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
        $rules->add($rules->existsIn(['claseGrupal_id'], 'Clasesgrupales'));
        $rules->add($rules->existsIn(['usuario_id'], 'Usuarios'));

        return $rules;
    }
}
