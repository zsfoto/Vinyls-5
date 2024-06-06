<?php
declare(strict_types=1);

namespace App\Test\Fixture;


use Cake\TestSuite\Fixture\TestFixture;
use Cake\Core\Configure;
use Cake\Http\Exception\NotFoundException;


/**
 * PlaysFixture
 */
class PlaysFixture extends TestFixture
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
                'albums_users_id' => 'Lorem ipsum dolor sit amet',
                'created' => '2024-06-06 13:11:01',
            ],
        ];
        parent::init();
    }
}
