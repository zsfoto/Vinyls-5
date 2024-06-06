<?php
declare(strict_types=1);

namespace App\Test\Fixture;


use Cake\TestSuite\Fixture\TestFixture;
use Cake\Core\Configure;
use Cake\Http\Exception\NotFoundException;


/**
 * CountriesFixture
 */
class CountriesFixture extends TestFixture
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
                'name' => 'Lorem ipsum dolor sit amet',
                'name_hu' => 'Lorem ipsum dolor sit amet',
                'short_name' => 'Lorem ip',
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
