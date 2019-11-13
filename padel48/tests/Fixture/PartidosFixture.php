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
            'usuario_id2' => ['type' => 'index', 'columns' => ['usuario_id2'], 'length' => []],
            'usuario_id3' => ['type' => 'index', 'columns' => ['usuario_id3'], 'length' => []],
            'usuario_id4' => ['type' => 'index', 'columns' => ['usuario_id4'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['usuario_id', 'usuario_id2', 'usuario_id3', 'usuario_id4'], 'length' => []],
            'partidos_ibfk_1' => ['type' => 'foreign', 'columns' => ['usuario_id2'], 'references' => ['usuarios', 'dni'], 'update' => 'restrict', 'delete' => 'cascade', 'length' => []],
            'partidos_ibfk_2' => ['type' => 'foreign', 'columns' => ['usuario_id3'], 'references' => ['usuarios', 'dni'], 'update' => 'restrict', 'delete' => 'cascade', 'length' => []],
            'partidos_ibfk_3' => ['type' => 'foreign', 'columns' => ['usuario_id4'], 'references' => ['usuarios', 'dni'], 'update' => 'restrict', 'delete' => 'cascade', 'length' => []],
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
                'usuario_id' => '6b47f69d-3257-4149-b9ae-3d5e2b917bcd',
                'usuario_id2' => '33489bce-6155-467a-bbce-4dca973cb490',
                'usuario_id3' => 'bba0726c-322d-4ea0-ba71-5437ee0914c6',
                'usuario_id4' => 'f687b118-839e-4a72-9aa9-738675e04cf3',
                'hora' => '20:10:31'
            ],
        ];
        parent::init();
    }
}
