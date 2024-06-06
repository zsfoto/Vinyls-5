<?php
declare(strict_types=1);

namespace App\Test\Fixture;


use Cake\TestSuite\Fixture\TestFixture;
use Cake\Core\Configure;
use Cake\Http\Exception\NotFoundException;


/**
 * AlbumsFixture
 */
class AlbumsFixture extends TestFixture
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
                'id' => '0d9f7667-c91b-4894-8093-2fa7c5568495',
                'ext_id' => 'Lorem ipsum dolor ',
                'country_id' => 1,
                'artists_sort' => 'Lorem ipsum dolor sit amet',
                'name' => 'Lorem ipsum dolor sit amet',
                'year' => 1,
                'lowest_price' => 'Lorem ipsum dolor ',
                'laci_price' => 'Lorem ipsum dolor sit amet',
                'released_formatted' => 'Lorem ipsum dolor ',
                'estimated_weight' => 'Lorem ipsum dolor ',
                'released' => 'Lorem ipsum dolor ',
                'notes' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'url' => 'Lorem ipsum dolor sit amet',
                'resource_url' => 'Lorem ipsum dolor sit amet',
                'master_url' => 'Lorem ipsum dolor sit amet',
                'master_id' => 'Lorem ipsum dolor ',
                'url_src' => 'Lorem ipsum dolor sit amet',
                'uri' => 'Lorem ipsum dolor sit amet',
                'thumb' => 'Lorem ipsum dolor sit amet',
                'user_count' => 1,
                'pos' => 1,
                'visible' => 1,
                'last_used' => '2024-06-06 13:10:58',
                'json' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'created' => '2024-06-06 13:10:58',
                'modified' => '2024-06-06 13:10:58',
            ],
        ];
        parent::init();
    }
}
