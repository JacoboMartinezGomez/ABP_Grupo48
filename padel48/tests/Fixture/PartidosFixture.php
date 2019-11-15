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
        'usuario_id' => ['type' => 'string', 'length' => 9, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'usuario_id2' => ['type' => 'string', 'length' => 9, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'usuario_id3' => ['type' => 'string', 'length' => 9, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'usuario_id4' => ['type' => 'string', 'length' => 9, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'hora' => ['type' => 'time', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'partido_ibfk_2' => ['type' => 'index', 'columns' => ['usuario_id2'], 'length' => []],
            'partido_ibfk_3' => ['type' => 'index', 'columns' => ['usuario_id3'], 'length' => []],
            'partido_ibfk_4' => ['type' => 'index', 'columns' => ['usuario_id4'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['usuario_id', 'usuario_id2', 'usuario_id3', 'usuario_id4'], 'length' => []],
            'partidos_ibfk_1' => ['type' => 'foreign', 'columns' => ['usuario_id'], 'references' => ['usuarios', 'dni'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'partidos_ibfk_2' => ['type' => 'foreign', 'columns' => ['usuario_id2'], 'references' => ['usuarios', 'dni'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'partidos_ibfk_3' => ['type' => 'foreign', 'columns' => ['usuario_id3'], 'references' => ['usuarios', 'dni'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'partidos_ibfk_4' => ['type' => 'foreign', 'columns' => ['usuario_id4'], 'references' => ['usuarios', 'dni'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
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
                'usuario_id' => 'b66fc2ea-7244-4a40-9c94-77f26ec2a2af',
                'usuario_id2' => '6e46edf9-d833-40e6-8499-11fc11deb789',
                'usuario_id3' => '639133ec-5799-40fe-8c17-b5d988bf4f0f',
                'usuario_id4' => '5720c772-9fd4-46a6-898e-87a012befa5a',
                'hora' => '16:51:03'
            ],
        ];
        parent::init();
    }
}
