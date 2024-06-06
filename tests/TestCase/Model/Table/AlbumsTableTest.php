<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;


use App\Model\Table\AlbumsTable;
use Cake\TestSuite\TestCase;
use Cake\Core\Configure;
use Cake\Http\Exception\NotFoundException;


/**
 * App\Model\Table\AlbumsTable Test Case
 */
class AlbumsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AlbumsTable
     */
    protected $Albums;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Albums',
        'app.Countries',
        'app.AlbumsExtraartists',
        'app.Identifiers',
        'app.Images',
        'app.Tracklists',
        'app.Videos',
        'app.Abbreviations',
        'app.Artists',
        'app.Companies',
        'app.Formats',
        'app.Genres',
        'app.Labels',
        'app.Languages',
        'app.Styles',
        'app.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Albums') ? [] : ['className' => AlbumsTable::class];
        $this->Albums = $this->getTableLocator()->get('Albums', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Albums);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\AlbumsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\AlbumsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
