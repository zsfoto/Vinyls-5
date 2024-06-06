<?php
declare(strict_types=1);

namespace App\Test\Fixture;


use Cake\TestSuite\Fixture\TestFixture;
use Cake\Core\Configure;
use Cake\Http\Exception\NotFoundException;


/**
 * LabelsFixture
 */
class LabelsFixture extends TestFixture
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
                'ext_id' => 1,
                'entity_type_name' => 'Lorem ipsum dolor sit amet',
                'pos' => 1,
                'visible' => 1,
                'last_used' => '2024-06-06 13:11:00',
                'json' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'created' => '2024-06-06 13:11:00',
                'modified' => '2024-06-06 13:11:00',
            ],
        ];
        parent::init();
    }
}
