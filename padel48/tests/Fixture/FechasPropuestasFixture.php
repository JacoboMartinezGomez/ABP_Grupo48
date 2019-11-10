<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * FechasPropuestasFixture
 */
class FechasPropuestasFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 6, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'enfrentamiento_id' => ['type' => 'integer', 'length' => 6, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'capitan1_id' => ['type' => 'string', 'length' => 9, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'capitan2_id' => ['type' => 'string', 'length' => 9, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'hora' => ['type' => 'time', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'fecha' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'enfrentamiento_ibfk_1' => ['type' => 'index', 'columns' => ['enfrentamiento_id'], 'length' => []],
            'enfrentamiento_ibfk_2' => ['type' => 'index', 'columns' => ['capitan1_id'], 'length' => []],
            'enfrentamiento_ibfk_3' => ['type' => 'index', 'columns' => ['capitan2_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fechas_propuestas_ibfk_1' => ['type' => 'foreign', 'columns' => ['enfrentamiento_id'], 'references' => ['enfrentamientos', 'id_enfrentamiento'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'fechas_propuestas_ibfk_2' => ['type' => 'foreign', 'columns' => ['capitan1_id'], 'references' => ['enfrentamientos', 'id_capitan1'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'fechas_propuestas_ibfk_3' => ['type' => 'foreign', 'columns' => ['capitan2_id'], 'references' => ['enfrentamientos', 'id_capitan2'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd
    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'enfrentamiento_id' => 1,
                'capitan1_id' => 'Lorem i',
                'capitan2_id' => 'Lorem i',
                'hora' => '20:00:43',
                'fecha' => '2019-11-09'
            ],
        ];
        parent::init();
    }
}
