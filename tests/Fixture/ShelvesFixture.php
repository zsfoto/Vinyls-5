<?php
declare(strict_types=1);

namespace App\Test\Fixture;


use Cake\TestSuite\Fixture\TestFixture;
use Cake\Core\Configure;
use Cake\Http\Exception\NotFoundException;


/**
 * ShelvesFixture
 */
class ShelvesFixture extends TestFixture
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
                'user_id' => 'Lorem ipsum dolor sit amet',
                'name' => 'Lorem ipsum dolor sit amet',
                'album_count' => 1,
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
