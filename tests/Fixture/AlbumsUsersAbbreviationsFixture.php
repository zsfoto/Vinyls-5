<?php
declare(strict_types=1);

namespace App\Test\Fixture;


use Cake\TestSuite\Fixture\TestFixture;
use Cake\Core\Configure;
use Cake\Http\Exception\NotFoundException;


/**
 * AlbumsUsersAbbreviationsFixture
 */
class AlbumsUsersAbbreviationsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'albums_user_id' => 'Lorem ipsum dolor sit amet',
                'abbreviation_id' => 1,
                'pos' => 1,
                'visible' => 1,
                'last_used' => '2024-06-06 13:10:59',
                'created' => '2024-06-06 13:10:59',
                'modified' => '2024-06-06 13:10:59',
            ],
        ];
        parent::init();
    }
}