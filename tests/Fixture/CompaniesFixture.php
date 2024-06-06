<?php
declare(strict_types=1);

namespace App\Test\Fixture;


use Cake\TestSuite\Fixture\TestFixture;
use Cake\Core\Configure;
use Cake\Http\Exception\NotFoundException;


/**
 * CompaniesFixture
 */
class CompaniesFixture extends TestFixture
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
                'entity_type' => 'Lorem ipsum dolor ',
                'catno' => 'Lorem ipsum dolor sit amet',
                'resource_url' => 'Lorem ipsum dolor sit amet',
                'ext_id' => 'Lorem ipsum dolor ',
                'entity_type_name' => 'Lorem ipsum dolor sit amet',
                'pos' => 1,
                'visible' => 1,
                'last_used' => '2024-06-06 13:10:59',
                'created' => '2024-06-06 13:10:59',
                'modified' => '2024-06-06 13:10:59',
            ],
        ];
        parent::init();
    }
}
