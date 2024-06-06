<?php
declare(strict_types=1);

namespace App\Model\Entity;


use Cake\ORM\Entity;
use Cake\Core\Configure;
use Cake\Http\Exception\NotFoundException;


/**
 * User Entity
 *
 * @property string $id
 * @property int $usergroup_id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $comment
 * @property bool $enabled
 * @property bool $visible
 * @property int $pos
 * @property string $token
 * @property \Cake\I18n\DateTime $token_expire
 * @property int $album_count
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 *
 * @property \App\Model\Entity\Usergroup $usergroup
 * @property \App\Model\Entity\Client[] $clients
 * @property \App\Model\Entity\Shelf[] $shelves
 * @property \App\Model\Entity\Album[] $albums
 */
class User extends Entity
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
        'usergroup_id' => true,
        'name' => true,
        'email' => true,
        'password' => true,
        'comment' => true,
        'enabled' => true,
        'visible' => true,
        'pos' => true,
        'token' => true,
        'token_expire' => true,
        'album_count' => true,
        'created' => true,
        'modified' => true,
        'usergroup' => true,
        'clients' => true,
        'shelves' => true,
        'albums' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var list<string>
     */
    protected array $_hidden = [
        'password',
        'token',
    ];
}
