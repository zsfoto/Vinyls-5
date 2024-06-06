<?php
declare(strict_types=1);

namespace App\Model\Entity;


use Cake\ORM\Entity;
use Cake\Core\Configure;
use Cake\Http\Exception\NotFoundException;


/**
 * AlbumsArtist Entity
 *
 * @property int $id
 * @property string $album_id
 * @property int $artist_id
 * @property int $pos
 * @property bool $visible
 * @property \Cake\I18n\DateTime $last_used
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 *
 * @property \App\Model\Entity\Album $album
 * @property \App\Model\Entity\Artist $artist
 */
class AlbumsArtist extends Entity
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
        'artist_id' => true,
        'pos' => true,
        'visible' => true,
        'last_used' => true,
        'created' => true,
        'modified' => true,
        'album' => true,
        'artist' => true,
    ];
}
