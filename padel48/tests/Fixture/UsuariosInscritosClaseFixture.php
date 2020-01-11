<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsuariosInscritosClaseFixture
 */
class UsuariosInscritosClaseFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'usuarios_inscritos_clase';
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'claseGrupal_id' => ['type' => 'integer', 'length' => 4, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'usuario_id' => ['type' => 'string', 'length' => 9, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        '_indexes' => [
            'inscritos_ibfk_1' => ['type' => 'index', 'columns' => ['usuario_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['claseGrupal_id', 'usuario_id'], 'length' => []],
            'inscritos_ibfk_1' => ['type' => 'foreign', 'columns' => ['usuario_id'], 'references' => ['usuarios', 'dni'], 'update' => 'cascade', 'delete' => 'restrict', 'length' => []],
            'inscritos_ibfk_2' => ['type' => 'foreign', 'columns' => ['claseGrupal_id'], 'references' => ['clasesgrupales', 'id_claseGrupal'], 'update' => 'cascade', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'latin1_swedish_ci'
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
                'claseGrupal_id' => 1,
                'usuario_id' => '0494b2cb-629b-4d31-9b34-56991e12e579'
            ],
        ];
        parent::init();
    }
}
