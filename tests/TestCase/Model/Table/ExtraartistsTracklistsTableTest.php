<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;


use App\Model\Table\ExtraartistsTracklistsTable;
use Cake\TestSuite\TestCase;
use Cake\Core\Configure;
use Cake\Http\Exception\NotFoundException;


/**
 * App\Model\Table\ExtraartistsTracklistsTable Test Case
 */
class ExtraartistsTracklistsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ExtraartistsTracklistsTable
     */
    protected $ExtraartistsTracklists;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.ExtraartistsTracklists',
        'app.Tracklists',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('ExtraartistsTracklists') ? [] : ['className' => ExtraartistsTracklistsTable::class];
        $this->ExtraartistsTracklists = $this->getTableLocator()->get('ExtraartistsTracklists', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->ExtraartistsTracklists);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ExtraartistsTracklistsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ExtraartistsTracklistsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
