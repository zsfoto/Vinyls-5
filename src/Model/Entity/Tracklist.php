<?php
declare(strict_types=1);

namespace App\Model\Entity;


use Cake\ORM\Entity;
use Cake\Core\Configure;
use Cake\Http\Exception\NotFoundException;


/**
 * Tracklist Entity
 *
 * @property string $id
 * @property string $album_id
 * @property int $condition_id
 * @property string $title
 * @property string $position
 * @property string $duration
 * @property string $type
 * @property string $lyrics_checked_user_id
 * @property int $pos
 * @property bool $visible
 * @property \Cake\I18n\DateTime $last_used
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 *
 * @property \App\Model\Entity\Lyric[] $lyrics
 * @property \App\Model\Entity\Album $album
 * @property \App\Model\Entity\Condition $condition
 * @property \App\Model\Entity\ExtraartistsTracklist[] $extraartists_tracklists
 */
class Tracklist extends Entity
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
        'condition_id' => true,
        'title' => true,
        'position' => true,
        'duration' => true,
        'type' => true,
        'lyrics' => true,
        'lyrics_checked_user_id' => true,
        'pos' => true,
        'visible' => true,
        'last_used' => true,
        'created' => true,
        'modified' => true,
        'album' => true,
        'condition' => true,
        'extraartists_tracklists' => true,
    ];
}
