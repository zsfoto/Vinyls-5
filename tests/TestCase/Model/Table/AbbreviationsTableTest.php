<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;


use App\Model\Table\AbbreviationsTable;
use Cake\TestSuite\TestCase;
use Cake\Core\Configure;
use Cake\Http\Exception\NotFoundException;


/**
 * App\Model\Table\AbbreviationsTable Test Case
 */
class AbbreviationsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AbbreviationsTable
     */
    protected $Abbreviations;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Abbreviations',
        'app.Albums',
        'app.AlbumsUsers',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Abbreviations') ? [] : ['className' => AbbreviationsTable::class];
        $this->Abbreviations = $this->getTableLocator()->get('Abbreviations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Abbreviations);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\AbbreviationsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
