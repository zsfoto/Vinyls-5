<?php
declare(strict_types=1);

namespace App\Test\Fixture;


use Cake\TestSuite\Fixture\TestFixture;
use Cake\Core\Configure;
use Cake\Http\Exception\NotFoundException;


/**
 * LyricsFixture
 */
class LyricsFixture extends TestFixture
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
                'id' => 'dba4a5d3-404a-444c-ba25-9939b68ebf66',
                'tracklist_id' => 'Lorem ipsum dolor sit amet',
                'httpGetUrl' => 'Lorem ipsum dolor sit amet',
                'TrackId' => 'Lorem ipsum dolor sit amet',
                'LyricChecksum' => 'Lorem ipsum dolor sit amet',
                'LyricId' => 'Lorem ipsum dolor ',
                'LyricSong' => 'Lorem ipsum dolor sit amet',
                'LyricArtist' => 'Lorem ipsum dolor sit amet',
                'LyricUrl' => 'Lorem ipsum dolor sit amet',
                'LyricCovertArtUrl' => 'Lorem ipsum dolor sit amet',
                'LyricRank' => 'Lorem ip',
                'LyricCorrectUrl' => 'Lorem ipsum dolor sit amet',
                'Lyric' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
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
