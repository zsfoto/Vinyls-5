<?php
declare(strict_types=1);

namespace App\Model\Entity;


use Cake\ORM\Entity;
use Cake\Core\Configure;
use Cake\Http\Exception\NotFoundException;


/**
 * Image Entity
 *
 * @property string $id
 * @property string $album_id
 * @property string $name
 * @property string $url
 * @property int $width
 * @property int $height
 * @property string $resource_url
 * @property string $type
 * @property string $uri150
 * @property int $pos
 * @property bool $visible
 * @property \Cake\I18n\DateTime $last_used
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 *
 * @property \App\Model\Entity\Album $album
 */
class Image extends Entity
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
        'album_id' => true,
        'name' => true,
        'url' => true,
        'width' => true,
        'height' => true,
        'resource_url' => true,
        'type' => true,
        'uri150' => true,
        'pos' => true,
        'visible' => true,
        'last_used' => true,
        'created' => true,
        'modified' => true,
        'album' => true,
    ];
}
