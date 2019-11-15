<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ParejasDisputanEnfrentamientoFixture
 */
class ParejasDisputanEnfrentamientoFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'parejas_disputan_enfrentamiento';
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
        'id_enfrentamiento' => ['type' => 'integer', 'length' => 6, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'parDisEnf_ibfk_1' => ['type' => 'index', 'columns' => ['campeonato_id'], 'length' => []],
            'parDisEnf_ibfk_3' => ['type' => 'index', 'columns' => ['id_pareja'], 'length' => []],
            'parDisEnf_ibfk_4' => ['type' => 'index', 'columns' => ['id_enfrentamiento'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id_capitan', 'id_pareja', 'campeonato_id', 'id_enfrentamiento'], 'length' => []],
            'parDisEnf_ibfk_1' => ['type' => 'foreign', 'columns' => ['campeonato_id'], 'references' => ['parejas', 'campeonato_id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'parDisEnf_ibfk_2' => ['type' => 'foreign', 'columns' => ['id_capitan'], 'references' => ['parejas', 'id_capitan'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'parDisEnf_ibfk_3' => ['type' => 'foreign', 'columns' => ['id_pareja'], 'references' => ['parejas', 'id_pareja'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'parDisEnf_ibfk_4' => ['type' => 'foreign', 'columns' => ['id_enfrentamiento'], 'references' => ['enfrentamientos', 'id_enfrentamiento'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
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
                'id_capitan' => 'af9caaac-187a-4a49-88d0-d0fbb108708d',
                'id_pareja' => '110d108a-08d1-4703-841c-8f88f5fa25c3',
                'campeonato_id' => 1,
                'id_enfrentamiento' => 1
            ],
        ];
        parent::init();
    }
}
