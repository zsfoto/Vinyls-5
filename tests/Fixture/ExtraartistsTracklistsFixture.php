<?php
declare(strict_types=1);

namespace App\Test\Fixture;


use Cake\TestSuite\Fixture\TestFixture;
use Cake\Core\Configure;
use Cake\Http\Exception\NotFoundException;


/**
 * ExtraartistsTracklistsFixture
 */
class ExtraartistsTracklistsFixture extends TestFixture
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
                'tracklist_id' => 'Lorem ipsum dolor sit amet',
                'extraartist_id' => 1,
                'role' => 'Lorem ipsum dolor sit amet',
                'pos' => 1,
                'visible' => 1,
                'last_used' => '2024-06-06 13:11:00',
                'created' => '2024-06-06 13:11:00',
                'modified' => '2024-06-06 13:11:00',
            ],
        ];
        parent::init();
    }
}
