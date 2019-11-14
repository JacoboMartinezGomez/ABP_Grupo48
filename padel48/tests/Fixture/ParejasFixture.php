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
        'id' => ['type' => 'integer', 'length' => 6, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'id_capitan' => ['type' => 'string', 'length' => 9, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'id_pareja' => ['type' => 'string', 'length' => 9, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'campeonato_id' => ['type' => 'integer', 'length' => 4, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'grupo_id' => ['type' => 'integer', 'length' => 4, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'categoria_id' => ['type' => 'integer', 'length' => 4, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'puntuacion' => ['type' => 'integer', 'length' => 2, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'clasificado' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'id_capitan' => ['type' => 'index', 'columns' => ['id_capitan'], 'length' => []],
            'id_pareja' => ['type' => 'index', 'columns' => ['id_pareja'], 'length' => []],
            'grupo_id' => ['type' => 'index', 'columns' => ['grupo_id'], 'length' => []],
            'parejas_ibfk_3' => ['type' => 'index', 'columns' => ['categoria_id'], 'length' => []],
            'parejas_ibfk_5' => ['type' => 'index', 'columns' => ['campeonato_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'parejas_ibfk_1' => ['type' => 'foreign', 'columns' => ['id_capitan'], 'references' => ['usuarios', 'dni'], 'update' => 'restrict', 'delete' => 'cascade', 'length' => []],
            'parejas_ibfk_2' => ['type' => 'foreign', 'columns' => ['id_pareja'], 'references' => ['usuarios', 'dni'], 'update' => 'restrict', 'delete' => 'cascade', 'length' => []],
            'parejas_ibfk_3' => ['type' => 'foreign', 'columns' => ['categoria_id'], 'references' => ['categorias', 'id_categoria'], 'update' => 'restrict', 'delete' => 'cascade', 'length' => []],
            'parejas_ibfk_4' => ['type' => 'foreign', 'columns' => ['grupo_id'], 'references' => ['enfrentamientos', 'grupo_id'], 'update' => 'restrict', 'delete' => 'cascade', 'length' => []],
            'parejas_ibfk_5' => ['type' => 'foreign', 'columns' => ['campeonato_id'], 'references' => ['categorias', 'campeonato_id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
                'id_capitan' => 'Lorem i',
                'id_pareja' => 'Lorem i',
                'campeonato_id' => 1,
                'grupo_id' => 1,
                'categoria_id' => 1,
                'puntuacion' => 1,
                'clasificado' => 1
            ],
        ];
        parent::init();
    }
}
