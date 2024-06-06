<?php
declare(strict_types=1);

namespace App\Model\Entity;


use Cake\ORM\Entity;
use Cake\Core\Configure;
use Cake\Http\Exception\NotFoundException;


/**
 * Artist Entity
 *
 * @property int $id
 * @property string $name
 * @property string $artistJoin
 * @property string $anv
 * @property string $tracks
 * @property string $resource_url
 * @property int $resourceId
 * @property int $pos
 * @property bool $visible
 * @property \Cake\I18n\DateTime $last_used
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 *
 * @property \App\Model\Entity\Album[] $albums
 */
class Artist extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'name' => true,
        'artistJoin' => true,
        'anv' => true,
        'tracks' => true,
        'resource_url' => true,
        'resourceId' => true,
        'pos' => true,
        'visible' => true,
        'last_used' => true,
        'created' => true,
        'modified' => true,
        'albums' => true,
    ];
}
