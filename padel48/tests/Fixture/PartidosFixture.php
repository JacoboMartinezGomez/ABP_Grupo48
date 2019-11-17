<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PartidosFixture
 */
class PartidosFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id_partido' => ['type' => 'integer', 'length' => 4, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'usuario_id' => ['type' => 'string', 'length' => 9, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'usuario_id2' => ['type' => 'string', 'length' => 9, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'usuario_id3' => ['type' => 'string', 'length' => 9, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'usuario_id4' => ['type' => 'string', 'length' => 9, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'fecha' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'hora' => ['type' => 'time', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'usuario_id' => ['type' => 'index', 'columns' => ['usuario_id'], 'length' => []],
            'usuario_id2' => ['type' => 'index', 'columns' => ['usuario_id2'], 'length' => []],
            'usuario_id3' => ['type' => 'index', 'columns' => ['usuario_id3'], 'length' => []],
            'usuario_id4' => ['type' => 'index', 'columns' => ['usuario_id4'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id_partido'], 'length' => []],
            'partidos_ibfk_1' => ['type' => 'foreign', 'columns' => ['usuario_id'], 'references' => ['usuarios', 'dni'], 'update' => 'restrict', 'delete' => 'cascade', 'length' => []],
            'partidos_ibfk_2' => ['type' => 'foreign', 'columns' => ['usuario_id2'], 'references' => ['usuarios', 'dni'], 'update' => 'restrict', 'delete' => 'cascade', 'length' => []],
            'partidos_ibfk_3' => ['type' => 'foreign', 'columns' => ['usuario_id3'], 'references' => ['usuarios', 'dni'], 'update' => 'restrict', 'delete' => 'cascade', 'length' => []],
            'partidos_ibfk_4' => ['type' => 'foreign', 'columns' => ['usuario_id4'], 'references' => ['usuarios', 'dni'], 'update' => 'restrict', 'delete' => 'cascade', 'length' => []],
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
                'id_partido' => 1,
                'usuario_id' => 'Lorem i',
                'usuario_id2' => 'Lorem i',
                'usuario_id3' => 'Lorem i',
                'usuario_id4' => 'Lorem i',
                'fecha' => '2019-11-17',
                'hora' => '11:13:31'
            ],
        ];
        parent::init();
    }
}
