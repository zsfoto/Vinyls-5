<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;


use App\Model\Table\AlbumsGenresTable;
use Cake\TestSuite\TestCase;
use Cake\Core\Configure;
use Cake\Http\Exception\NotFoundException;


/**
 * App\Model\Table\AlbumsGenresTable Test Case
 */
class AlbumsGenresTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AlbumsGenresTable
     */
    protected $AlbumsGenres;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.AlbumsGenres',
        'app.Albums',
        'app.Genres',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('AlbumsGenres') ? [] : ['className' => AlbumsGenresTable::class];
        $this->AlbumsGenres = $this->getTableLocator()->get('AlbumsGenres', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->AlbumsGenres);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\AlbumsGenresTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\AlbumsGenresTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
