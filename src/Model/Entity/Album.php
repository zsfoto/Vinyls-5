<?php
declare(strict_types=1);

namespace App\Model\Entity;


use Cake\ORM\Entity;
use Cake\Core\Configure;
use Cake\Http\Exception\NotFoundException;


/**
 * Album Entity
 *
 * @property string $id
 * @property string $ext_id
 * @property int $country_id
 * @property string $artists_sort
 * @property string $name
 * @property int $year
 * @property string $lowest_price
 * @property string $laci_price
 * @property string $released_formatted
 * @property string $estimated_weight
 * @property string $released
 * @property string $notes
 * @property string $url
 * @property string $resource_url
 * @property string $master_url
 * @property string $master_id
 * @property string $url_src
 * @property string $uri
 * @property string $thumb
 * @property int $user_count
 * @property int $pos
 * @property bool $visible
 * @property \Cake\I18n\DateTime $last_used
 * @property string $json
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 *
 * @property \App\Model\Entity\Country $country
 * @property \App\Model\Entity\AlbumsExtraartist[] $albums_extraartists
 * @property \App\Model\Entity\Identifier[] $identifiers
 * @property \App\Model\Entity\Image[] $images
 * @property \App\Model\Entity\Tracklist[] $tracklists
 * @property \App\Model\Entity\Video[] $videos
 * @property \App\Model\Entity\Abbreviation[] $abbreviations
 * @property \App\Model\Entity\Artist[] $artists
 * @property \App\Model\Entity\Company[] $companies
 * @property \App\Model\Entity\Format[] $formats
 * @property \App\Model\Entity\Genre[] $genres
 * @property \App\Model\Entity\Label[] $labels
 * @property \App\Model\Entity\Language[] $languages
 * @property \App\Model\Entity\Style[] $styles
 * @property \App\Model\Entity\User[] $users
 */
class Album extends Entity
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
        'ext_id' => true,
        'country_id' => true,
        'artists_sort' => true,
        'name' => true,
        'year' => true,
        'lowest_price' => true,
        'laci_price' => true,
        'released_formatted' => true,
        'estimated_weight' => true,
        'released' => true,
        'notes' => true,
        'url' => true,
        'resource_url' => true,
        'master_url' => true,
        'master_id' => true,
        'url_src' => true,
        'uri' => true,
        'thumb' => true,
        'user_count' => true,
        'pos' => true,
        'visible' => true,
        'last_used' => true,
        'json' => true,
        'created' => true,
        'modified' => true,
        'country' => true,
        'albums_extraartists' => true,
        'identifiers' => true,
        'images' => true,
        'tracklists' => true,
        'videos' => true,
        'abbreviations' => true,
        'artists' => true,
        'companies' => true,
        'formats' => true,
        'genres' => true,
        'labels' => true,
        'languages' => true,
        'styles' => true,
        'users' => true,
    ];
}
