<?php
declare(strict_types=1);

namespace App\Model\Entity;


use Cake\ORM\Entity;
use Cake\Core\Configure;
use Cake\Http\Exception\NotFoundException;


/**
 * Lyric Entity
 *
 * @property string $id
 * @property string $tracklist_id
 * @property string $httpGetUrl
 * @property string $TrackId
 * @property string $LyricChecksum
 * @property string $LyricId
 * @property string $LyricSong
 * @property string $LyricArtist
 * @property string $LyricUrl
 * @property string $LyricCovertArtUrl
 * @property string $LyricRank
 * @property string $LyricCorrectUrl
 * @property string $Lyric
 * @property int $pos
 * @property bool $visible
 * @property \Cake\I18n\DateTime $last_used
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 *
 * @property \App\Model\Entity\Tracklist $tracklist
 */
class Lyric extends Entity
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
        'tracklist_id' => true,
        'httpGetUrl' => true,
        'TrackId' => true,
        'LyricChecksum' => true,
        'LyricId' => true,
        'LyricSong' => true,
        'LyricArtist' => true,
        'LyricUrl' => true,
        'LyricCovertArtUrl' => true,
        'LyricRank' => true,
        'LyricCorrectUrl' => true,
        'Lyric' => true,
        'pos' => true,
        'visible' => true,
        'last_used' => true,
        'created' => true,
        'modified' => true,
        'tracklist' => true,
    ];
}
