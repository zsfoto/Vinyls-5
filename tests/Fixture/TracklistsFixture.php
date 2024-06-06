<?php
declare(strict_types=1);

namespace App\Test\Fixture;


use Cake\TestSuite\Fixture\TestFixture;
use Cake\Core\Configure;
use Cake\Http\Exception\NotFoundException;


/**
 * TracklistsFixture
 */
class TracklistsFixture extends TestFixture
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
                'id' => 'c0eec22f-52a6-47cf-ae50-02013a91e953',
                'album_id' => 'Lorem ipsum dolor sit amet',
                'condition_id' => 1,
                'title' => 'Lorem ipsum dolor sit amet',
                'position' => 'Lorem ipsum dolor ',
                'duration' => 'Lorem ipsum dolor ',
                'type' => 'Lorem ipsum dolor ',
                'lyrics' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'lyrics_checked_user_id' => 'Lorem ipsum dolor sit amet',
                'pos' => 1,
                'visible' => 1,
                'last_used' => '2024-06-06 13:11:01',
                'created' => '2024-06-06 13:11:01',
                'modified' => '2024-06-06 13:11:01',
            ],
        ];
        parent::init();
    }
}
