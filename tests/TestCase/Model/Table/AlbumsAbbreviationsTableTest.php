<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;


use App\Model\Table\AlbumsAbbreviationsTable;
use Cake\TestSuite\TestCase;
use Cake\Core\Configure;
use Cake\Http\Exception\NotFoundException;


/**
 * App\Model\Table\AlbumsAbbreviationsTable Test Case
 */
class AlbumsAbbreviationsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AlbumsAbbreviationsTable
     */
    protected $AlbumsAbbreviations;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.AlbumsAbbreviations',
        'app.Albums',
        'app.Abbreviations',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('AlbumsAbbreviations') ? [] : ['className' => AlbumsAbbreviationsTable::class];
        $this->AlbumsAbbreviations = $this->getTableLocator()->get('AlbumsAbbreviations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->AlbumsAbbreviations);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\AlbumsAbbreviationsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\AlbumsAbbreviationsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
