<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ParejasdisputanenfrentamientoFixture
 */
class ParejasdisputanenfrentamientoFixture extends TestFixture
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
        'id_pareja1' => ['type' => 'integer', 'length' => 6, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id_pareja2' => ['type' => 'integer', 'length' => 6, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'enfrentamiento_id' => ['type' => 'integer', 'length' => 6, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'resultado' => ['type' => 'string', 'length' => 9, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        '_indexes' => [
            'id_pareja2' => ['type' => 'index', 'columns' => ['id_pareja2'], 'length' => []],
            'enfrentamiento_id' => ['type' => 'index', 'columns' => ['enfrentamiento_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id_pareja1', 'id_pareja2', 'enfrentamiento_id'], 'length' => []],
            'parejas_disputan_enfrentamiento_ibfk_1' => ['type' => 'foreign', 'columns' => ['id_pareja1'], 'references' => ['parejas', 'id'], 'update' => 'restrict', 'delete' => 'cascade', 'length' => []],
            'parejas_disputan_enfrentamiento_ibfk_2' => ['type' => 'foreign', 'columns' => ['id_pareja2'], 'references' => ['parejas', 'id'], 'update' => 'restrict', 'delete' => 'cascade', 'length' => []],
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
                'id_pareja1' => 1,
                'id_pareja2' => 1,
                'enfrentamiento_id' => 1,
                'resultado' => 'Lorem i'
            ],
        ];
        parent::init();
    }
}
