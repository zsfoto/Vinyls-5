<?php
declare(strict_types=1);

namespace App\Test\Fixture;


use Cake\TestSuite\Fixture\TestFixture;
use Cake\Core\Configure;
use Cake\Http\Exception\NotFoundException;


/**
 * AlbumsUsersFixture
 */
class AlbumsUsersFixture extends TestFixture
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
                'id' => 'f43eef17-a674-42fa-822b-f70e7aff96e0',
                'user_id' => 'Lorem ipsum dolor sit amet',
                'album_id' => 'Lorem ipsum dolor sit amet',
                'condition_id' => 1,
                'shelf_id' => 1,
                'custom_serial_number' => 1,
                'last_play' => '2024-06-06',
                'disk_A_condition_id' => 1,
                'disk_B_condition_id' => 1,
                'disk_C_condition_id' => 1,
                'disk_D_condition_id' => 1,
                'disk_E_condition_id' => 1,
                'disk_F_condition_id' => 1,
                'disk_G_condition_id' => 1,
                'disk_H_condition_id' => 1,
                'generic' => 1,
                'name_from' => 'Lorem ipsum dolor sit amet',
                'address_from' => 'Lorem ipsum dolor sit amet',
                'phone_from' => 'Lorem ipsum dolor sit amet',
                'email_from' => 'Lorem ipsum dolor sit amet',
                'price_from' => 1,
                'name_sold' => 'Lorem ipsum dolor sit amet',
                'address_sold' => 'Lorem ipsum dolor sit amet',
                'phone_sold' => 'Lorem ipsum dolor sit amet',
                'email_sold' => 'Lorem ipsum dolor sit amet',
                'price_sold' => 1,
                'comment' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'pos' => 1,
                'visible' => 1,
                'last_used' => '2024-06-06 13:10:59',
                'play_count' => 1,
                'created' => '2024-06-06 13:10:59',
                'modified' => '2024-06-06 13:10:59',
            ],
        ];
        parent::init();
    }
}
