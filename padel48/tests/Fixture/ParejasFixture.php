<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ParejasFixture
 */
class ParejasFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id_capitan' => ['type' => 'string', 'length' => 9, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'id_pareja' => ['type' => 'string', 'length' => 9, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'campeonato_id' => ['type' => 'integer', 'length' => 4, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'tipo' => ['type' => 'string', 'length' => null, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'nivel' => ['type' => 'integer', 'length' => 2, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'puntuacion' => ['type' => 'integer', 'length' => 2, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'clasificado' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'pareja_ibfk_3' => ['type' => 'index', 'columns' => ['id_pareja'], 'length' => []],
            'pareja_ibfk_1' => ['type' => 'index', 'columns' => ['campeonato_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id_capitan', 'id_pareja', 'campeonato_id'], 'length' => []],
            'parejas_ibfk_1' => ['type' => 'foreign', 'columns' => ['campeonato_id'], 'references' => ['categorias', 'campeonato_id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'parejas_ibfk_2' => ['type' => 'foreign', 'columns' => ['id_capitan'], 'references' => ['usuarios', 'dni'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'parejas_ibfk_3' => ['type' => 'foreign', 'columns' => ['id_pareja'], 'references' => ['usuarios', 'dni'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
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
                'id_capitan' => 'aa4f7c1f-ffce-4ed1-ace0-197365ee1d29',
                'id_pareja' => '3aa34682-6330-4a4c-aaeb-c0b60e22ea05',
                'campeonato_id' => 1,
                'tipo' => 'Lorem ipsum dolor sit amet',
                'nivel' => 1,
                'puntuacion' => 1,
                'clasificado' => 1
            ],
        ];
        parent::init();
    }
}
