<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsuariosInscritosClaseTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UsuariosInscritosClaseTable Test Case
 */
class UsuariosInscritosClaseTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\UsuariosInscritosClaseTable
     */
    public $UsuariosInscritosClase;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.UsuariosInscritosClase',
        'app.Clasesgrupales',
        'app.Usuarios'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('UsuariosInscritosClase') ? [] : ['className' => UsuariosInscritosClaseTable::class];
        $this->UsuariosInscritosClase = TableRegistry::getTableLocator()->get('UsuariosInscritosClase', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UsuariosInscritosClase);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
