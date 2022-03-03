<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DocDocumentoTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DocDocumentoTable Test Case
 */
class DocDocumentoTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DocDocumentoTable
     */
    protected $DocDocumento;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.DocDocumento',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('DocDocumento') ? [] : ['className' => DocDocumentoTable::class];
        $this->DocDocumento = $this->getTableLocator()->get('DocDocumento', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->DocDocumento);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\DocDocumentoTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
