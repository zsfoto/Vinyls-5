<?php
declare(strict_types=1);

namespace App\Model\Entity;


use Cake\ORM\Entity;
use Cake\Core\Configure;
use Cake\Http\Exception\NotFoundException;


/**
 * AlbumsUsersAbbreviation Entity
 *
 * @property int $id
 * @property string $albums_user_id
 * @property int $abbreviation_id
 * @property int $pos
 * @property bool $visible
 * @property \Cake\I18n\DateTime $last_used
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 *
 * @property \App\Model\Entity\AlbumsUser $albums_user
 * @property \App\Model\Entity\Abbreviation $abbreviation
 */
class AlbumsUsersAbbreviation extends Entity
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
        'albums_user_id' => true,
        'abbreviation_id' => true,
        'pos' => true,
        'visible' => true,
        'last_used' => true,
        'created' => true,
        'modified' => true,
        'albums_user' => true,
        'abbreviation' => true,
    ];
}
