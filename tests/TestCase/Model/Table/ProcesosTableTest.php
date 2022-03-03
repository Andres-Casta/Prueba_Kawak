<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProcesosTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProcesosTable Test Case
 */
class ProcesosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ProcesosTable
     */
    protected $Procesos;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Procesos',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Procesos') ? [] : ['className' => ProcesosTable::class];
        $this->Procesos = $this->getTableLocator()->get('Procesos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Procesos);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ProcesosTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
