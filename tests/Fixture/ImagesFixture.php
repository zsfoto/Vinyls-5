<?php
declare(strict_types=1);

namespace App\Test\Fixture;


use Cake\TestSuite\Fixture\TestFixture;
use Cake\Core\Configure;
use Cake\Http\Exception\NotFoundException;


/**
 * ImagesFixture
 */
class ImagesFixture extends TestFixture
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
                'id' => 'ae46aaab-328f-4e09-a3a1-3d26f49dff2e',
                'album_id' => 'Lorem ipsum dolor sit amet',
                'name' => 'Lorem ipsum dolor sit amet',
                'url' => 'Lorem ipsum dolor sit amet',
                'width' => 1,
                'height' => 1,
                'resource_url' => 'Lorem ipsum dolor sit amet',
                'type' => 'Lorem ipsum dolor ',
                'uri150' => 'Lorem ipsum dolor sit amet',
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
