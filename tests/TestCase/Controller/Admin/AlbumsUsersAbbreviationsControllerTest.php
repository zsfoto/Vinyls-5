<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller\Admin;


use App\Controller\Admin\AlbumsUsersAbbreviationsController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;
use Cake\Core\Configure;
use Cake\Http\Exception\NotFoundException;


/**
 * App\Controller\Admin\AlbumsUsersAbbreviationsController Test Case
 *
 * @uses \App\Controller\Admin\AlbumsUsersAbbreviationsController
 */
class AlbumsUsersAbbreviationsControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.AlbumsUsersAbbreviations',
        'app.AlbumsUsers',
        'app.Abbreviations',
    ];

    /**
     * Test index method
     *
     * @return void
     * @uses \App\Controller\Admin\AlbumsUsersAbbreviationsController::index()
     */
    public function testIndex(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     * @uses \App\Controller\Admin\AlbumsUsersAbbreviationsController::view()
     */
    public function testView(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     * @uses \App\Controller\Admin\AlbumsUsersAbbreviationsController::add()
     */
    public function testAdd(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     * @uses \App\Controller\Admin\AlbumsUsersAbbreviationsController::edit()
     */
    public function testEdit(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     * @uses \App\Controller\Admin\AlbumsUsersAbbreviationsController::delete()
     */
    public function testDelete(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
