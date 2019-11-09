<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Horarios Model
 *
 * @property \App\Model\Table\PistasTable&\Cake\ORM\Association\BelongsTo $Pistas
 *
 * @method \App\Model\Entity\Horario get($primaryKey, $options = [])
 * @method \App\Model\Entity\Horario newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Horario[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Horario|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Horario saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Horario patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Horario[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Horario findOrCreate($search, callable $callback = null, $options = [])
 */
class HorariosTable extends Table
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

        $this->setTable('horarios');
        $this->setDisplayField('id_horario');
        $this->setPrimaryKey('id_horario');

        $this->belongsTo('Pistas', [
            'foreignKey' => 'pista_id',
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
            ->integer('id_horario')
            ->allowEmptyString('id_horario', null, 'create');

        $validator
            ->time('hora_inicio')
            ->requirePresence('hora_inicio', 'create')
            ->notEmptyTime('hora_inicio');

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
        $rules->add($rules->existsIn(['pista_id'], 'Pistas'));

        return $rules;
    }

    /**
     * Cambia las horas de inicio de todas las pistas en la tabla horarios
     * con intervalos de 1h 30min. Devuelve true o false.
     *
     * @param $horaInicio hora en formato array a la que se puede empezar
     * a reserver pistas
     *
     * @return bool
     */
    public function editHorarios($horaInicio){

        //Recupera todos los ids de las pistas en horarios
        $query = $this->find('all')->select(['pista_id']);

        //Convierte la consulta en un array
        $horarios = $query->toArray();

        //Recorre todos los horarios
        foreach ($horarios as $horario){

            //Recupera todas las horas asociadas a una pista
            $horas = $this
                            ->find()
                            ->where(['pista_id =' => $horario->get('pista_id')]);

            //Convierte la hora de inicio pasada a formato hora:min:seg
            $newHora = date('H:i:s' ,strtotime($horaInicio['hour'].":".$horaInicio['minute']));

            //Recorre todas las horas de cada pista
            foreach ($horas as $hora){
                //Actualizamos la hora
                $hora->hora_inicio = $newHora;

                //Guardamos el resultado y comprobamos que la consulta no ha tenido errores
                if(!$this->save($hora)){
                  return false;
                };

                //Añadimos el intervalo de 1h 30min
                $newHora = date('H:i:s' ,strtotime($newHora) + strtotime("01:30:00"));
            }
        }

        //Si no ha habido problemas
        return true;

    }
}
