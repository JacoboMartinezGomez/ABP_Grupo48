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
                'usuario_id' => '3afa1472-ddaf-42ae-93b8-104136499ab1',
                'usuario_id2' => 'daffa649-dd4d-48f4-8dff-e79ddef20a92',
                'usuario_id3' => '92c8773d-3eb4-4504-98c3-ad7183030c95',
                'usuario_id4' => '5746657f-53f6-4d59-a46e-ff843929ce74',
                'hora' => '11:34:09'
            ],
        ];
        parent::init();
    }
}
