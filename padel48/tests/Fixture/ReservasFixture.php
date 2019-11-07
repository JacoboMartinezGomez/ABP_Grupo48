<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ReservasFixture
 */
class ReservasFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id_usuario' => ['type' => 'string', 'length' => 9, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'id_pista' => ['type' => 'integer', 'length' => 2, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'hora' => ['type' => 'integer', 'length' => 2, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'fecha' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'reserva_ibfk_1' => ['type' => 'index', 'columns' => ['id_pista'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id_usuario', 'id_pista', 'hora', 'fecha'], 'length' => []],
            'reservas_ibfk_1' => ['type' => 'foreign', 'columns' => ['id_pista'], 'references' => ['pistas', 'num_pista'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'reservas_ibfk_2' => ['type' => 'foreign', 'columns' => ['id_usuario'], 'references' => ['usuarios', 'dni'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
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
                'id_usuario' => 'd5ed33dc-2354-46c2-9a01-189978a7b35a',
                'id_pista' => 1,
                'hora' => 1,
                'fecha' => '2019-11-07'
            ],
        ];
        parent::init();
    }
}
