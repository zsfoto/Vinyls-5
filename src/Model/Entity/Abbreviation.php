<?php
declare(strict_types=1);

namespace App\Model\Entity;


use Cake\ORM\Entity;
use Cake\Core\Configure;
use Cake\Http\Exception\NotFoundException;


/**
 * Abbreviation Entity
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property \Cake\I18n\DateTime $last_used
 * @property int $pos
 * @property bool $visible
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 *
 * @property \App\Model\Entity\Album[] $albums
 * @property \App\Model\Entity\AlbumsUser[] $albums_users
 */
class Abbreviation extends Entity
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
        'description' => true,
        'last_used' => true,
        'pos' => true,
        'visible' => true,
        'created' => true,
        'modified' => true,
        'albums' => true,
        'albums_users' => true,
    ];
}