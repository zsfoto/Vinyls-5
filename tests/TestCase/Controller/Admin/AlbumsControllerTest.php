<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller\Admin;


use App\Controller\Admin\AlbumsController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;
use Cake\Core\Configure;
use Cake\Http\Exception\NotFoundException;


/**
 * App\Controller\Admin\AlbumsController Test Case
 *
 * @uses \App\Controller\Admin\AlbumsController
 */
class AlbumsControllerTest extends TestCase
{
    use IntegrationTestTrait;

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
        'app.AlbumsAbbreviations',
        'app.AlbumsArtists',
        'app.AlbumsCompanies',
        'app.AlbumsFormats',
        'app.AlbumsGenres',
        'app.AlbumsLabels',
        'app.AlbumsLanguages',
        'app.AlbumsStyles',
        'app.AlbumsUsers',
    ];

    /**
     * Test index method
     *
     * @return void
     * @uses \App\Controller\Admin\AlbumsController::index()
     */
    public function testIndex(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     * @uses \App\Controller\Admin\AlbumsController::view()
     */
    public function testView(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     * @uses \App\Controller\Admin\AlbumsController::add()
     */
    public function testAdd(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     * @uses \App\Controller\Admin\AlbumsController::edit()
     */
    public function testEdit(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     * @uses \App\Controller\Admin\AlbumsController::delete()
     */
    public function testDelete(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
