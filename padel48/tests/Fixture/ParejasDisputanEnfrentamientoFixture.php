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
        'id_capitan1' => ['type' => 'string', 'length' => 9, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'id_capitan2' => ['type' => 'string', 'length' => 9, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'enfrentamiento_id' => ['type' => 'integer', 'length' => 6, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'resultado' => ['type' => 'string', 'length' => 9, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        '_indexes' => [
            'id_capitan2' => ['type' => 'index', 'columns' => ['id_capitan2'], 'length' => []],
            'enfrentamiento_id' => ['type' => 'index', 'columns' => ['enfrentamiento_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id_capitan1', 'id_capitan2', 'enfrentamiento_id'], 'length' => []],
            'parejas_disputan_enfrentamiento_ibfk_1' => ['type' => 'foreign', 'columns' => ['id_capitan1'], 'references' => ['parejas', 'id_capitan'], 'update' => 'restrict', 'delete' => 'cascade', 'length' => []],
            'parejas_disputan_enfrentamiento_ibfk_2' => ['type' => 'foreign', 'columns' => ['id_capitan2'], 'references' => ['parejas', 'id_capitan'], 'update' => 'restrict', 'delete' => 'cascade', 'length' => []],
            'parejas_disputan_enfrentamiento_ibfk_3' => ['type' => 'foreign', 'columns' => ['enfrentamiento_id'], 'references' => ['enfrentamientos', 'id_enfrentamiento'], 'update' => 'restrict', 'delete' => 'cascade', 'length' => []],
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
                'id_capitan1' => '1335584b-675c-40ac-8739-855e1c1e740d',
                'id_capitan2' => '5032ee65-8b8e-49e1-8dab-45edefb4f609',
                'enfrentamiento_id' => 1,
                'resultado' => 'Lorem i'
            ],
        ];
        parent::init();
    }
}
