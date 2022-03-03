<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TipodocsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TipodocsTable Test Case
 */
class TipodocsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TipodocsTable
     */
    protected $Tipodocs;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Tipodocs',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Tipodocs') ? [] : ['className' => TipodocsTable::class];
        $this->Tipodocs = $this->getTableLocator()->get('Tipodocs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Tipodocs);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TipodocsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
