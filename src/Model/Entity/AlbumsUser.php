<?php
declare(strict_types=1);

namespace App\Model\Entity;


use Cake\ORM\Entity;
use Cake\Core\Configure;
use Cake\Http\Exception\NotFoundException;


/**
 * AlbumsUser Entity
 *
 * @property string $id
 * @property string $user_id
 * @property string $album_id
 * @property int $condition_id
 * @property int $shelf_id
 * @property int $custom_serial_number
 * @property \Cake\I18n\Date|null $last_play
 * @property int $disk_A_condition_id
 * @property int $disk_B_condition_id
 * @property int $disk_C_condition_id
 * @property int $disk_D_condition_id
 * @property int $disk_E_condition_id
 * @property int $disk_F_condition_id
 * @property int $disk_G_condition_id
 * @property int $disk_H_condition_id
 * @property bool $generic
 * @property string $name_from
 * @property string $address_from
 * @property string $phone_from
 * @property string $email_from
 * @property int $price_from
 * @property string $name_sold
 * @property string $address_sold
 * @property string $phone_sold
 * @property string $email_sold
 * @property int $price_sold
 * @property string $comment
 * @property int $pos
 * @property bool $visible
 * @property \Cake\I18n\DateTime $last_used
 * @property int $play_count
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Album $album
 * @property \App\Model\Entity\Condition $condition
 * @property \App\Model\Entity\Shelf $shelf
 * @property \App\Model\Entity\Abbreviation[] $abbreviations
 */
class AlbumsUser extends Entity
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
        'user_id' => true,
        'album_id' => true,
        'condition_id' => true,
        'shelf_id' => true,
        'custom_serial_number' => true,
        'last_play' => true,
        'disk_A_condition_id' => true,
        'disk_B_condition_id' => true,
        'disk_C_condition_id' => true,
        'disk_D_condition_id' => true,
        'disk_E_condition_id' => true,
        'disk_F_condition_id' => true,
        'disk_G_condition_id' => true,
        'disk_H_condition_id' => true,
        'generic' => true,
        'name_from' => true,
        'address_from' => true,
        'phone_from' => true,
        'email_from' => true,
        'price_from' => true,
        'name_sold' => true,
        'address_sold' => true,
        'phone_sold' => true,
        'email_sold' => true,
        'price_sold' => true,
        'comment' => true,
        'pos' => true,
        'visible' => true,
        'last_used' => true,
        'play_count' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'album' => true,
        'condition' => true,
        'shelf' => true,
        'abbreviations' => true,
    ];
}
