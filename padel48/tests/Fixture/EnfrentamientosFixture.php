<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EnfrentamientosFixture
 */
class EnfrentamientosFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id_enfrentamiento' => ['type' => 'integer', 'length' => 6, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'id_capitan1' => ['type' => 'string', 'length' => 9, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'id_capitan2' => ['type' => 'string', 'length' => 9, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'id_grupo' => ['type' => 'integer', 'length' => 4, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'hora' => ['type' => 'time', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'fecha' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'fase' => ['type' => 'integer', 'length' => 1, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'enfrentamiento_ibfk_1' => ['type' => 'index', 'columns' => ['id_grupo'], 'length' => []],
            'enfrentamiento_ibfk_2' => ['type' => 'index', 'columns' => ['id_capitan1'], 'length' => []],
            'enfrentamiento_ibfk_3' => ['type' => 'index', 'columns' => ['id_capitan2'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id_enfrentamiento'], 'length' => []],
            'enfrentamientos_ibfk_1' => ['type' => 'foreign', 'columns' => ['id_grupo'], 'references' => ['grupos', 'id_grupo'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'enfrentamientos_ibfk_2' => ['type' => 'foreign', 'columns' => ['id_capitan1'], 'references' => ['parejas', 'id_capitan'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'enfrentamientos_ibfk_3' => ['type' => 'foreign', 'columns' => ['id_capitan2'], 'references' => ['parejas', 'id_capitan'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
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
                'id_enfrentamiento' => 1,
                'id_capitan1' => 'Lorem i',
                'id_capitan2' => 'Lorem i',
                'id_grupo' => 1,
                'hora' => '16:51:02',
                'fecha' => '2019-11-07',
                'fase' => 1
            ],
        ];
        parent::init();
    }
}
