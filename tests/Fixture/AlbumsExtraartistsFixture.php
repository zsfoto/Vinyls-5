<?php
declare(strict_types=1);

namespace App\Test\Fixture;


use Cake\TestSuite\Fixture\TestFixture;
use Cake\Core\Configure;
use Cake\Http\Exception\NotFoundException;


/**
 * AlbumsExtraartistsFixture
 */
class AlbumsExtraartistsFixture extends TestFixture
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
                'album_id' => 'Lorem ipsum dolor sit amet',
                'extraartist_id' => 1,
                'role' => 'Lorem ipsum dolor sit amet',
                'pos' => 1,
                'visible' => 1,
                'last_used' => '2024-06-06 13:10:58',
                'created' => '2024-06-06 13:10:58',
                'modified' => '2024-06-06 13:10:58',
            ],
        ];
        parent::init();
    }
}
