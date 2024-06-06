<?php
declare(strict_types=1);

namespace App\Model\Table;


use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Core\Configure;
use Cake\Http\Exception\NotFoundException;


/**
 * AlbumsUsers Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\AlbumsTable&\Cake\ORM\Association\BelongsTo $Albums
 * @property \App\Model\Table\ConditionsTable&\Cake\ORM\Association\BelongsTo $Conditions
 * @property \App\Model\Table\ShelvesTable&\Cake\ORM\Association\BelongsTo $Shelves
 * @property \App\Model\Table\AbbreviationsTable&\Cake\ORM\Association\BelongsToMany $Abbreviations
 *
 * @method \App\Model\Entity\AlbumsUser newEmptyEntity()
 * @method \App\Model\Entity\AlbumsUser newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\AlbumsUser> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AlbumsUser get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\AlbumsUser findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\AlbumsUser patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\AlbumsUser> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\AlbumsUser|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\AlbumsUser saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\AlbumsUser>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\AlbumsUser>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\AlbumsUser>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\AlbumsUser> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\AlbumsUser>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\AlbumsUser>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\AlbumsUser>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\AlbumsUser> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AlbumsUsersTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('albums_users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
		$this->addBehavior('JeffAdmin5.Datepicker');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Albums', [
            'foreignKey' => 'album_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Conditions', [
            'foreignKey' => 'condition_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Shelves', [
            'foreignKey' => 'shelf_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsToMany('Abbreviations', [
            'foreignKey' => 'albums_user_id',
            'targetForeignKey' => 'abbreviation_id',
            'joinTable' => 'albums_users_abbreviations',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('user_id')
            ->maxLength('user_id', 64)
            ->notEmptyString('user_id');

        $validator
            ->scalar('album_id')
            ->maxLength('album_id', 64)
            ->notEmptyString('album_id');

        $validator
            ->nonNegativeInteger('condition_id')
            ->notEmptyString('condition_id');

        $validator
            ->nonNegativeInteger('shelf_id')
            ->notEmptyString('shelf_id');

        $validator
            ->nonNegativeInteger('custom_serial_number')
            ->requirePresence('custom_serial_number', 'create')
            ->notEmptyString('custom_serial_number');

        $validator
            ->date('last_play')
            ->allowEmptyDate('last_play');

        $validator
            ->nonNegativeInteger('disk_A_condition_id')
            ->requirePresence('disk_A_condition_id', 'create')
            ->notEmptyString('disk_A_condition_id');

        $validator
            ->nonNegativeInteger('disk_B_condition_id')
            ->requirePresence('disk_B_condition_id', 'create')
            ->notEmptyString('disk_B_condition_id');

        $validator
            ->nonNegativeInteger('disk_C_condition_id')
            ->requirePresence('disk_C_condition_id', 'create')
            ->notEmptyString('disk_C_condition_id');

        $validator
            ->nonNegativeInteger('disk_D_condition_id')
            ->requirePresence('disk_D_condition_id', 'create')
            ->notEmptyString('disk_D_condition_id');

        $validator
            ->nonNegativeInteger('disk_E_condition_id')
            ->requirePresence('disk_E_condition_id', 'create')
            ->notEmptyString('disk_E_condition_id');

        $validator
            ->nonNegativeInteger('disk_F_condition_id')
            ->requirePresence('disk_F_condition_id', 'create')
            ->notEmptyString('disk_F_condition_id');

        $validator
            ->nonNegativeInteger('disk_G_condition_id')
            ->requirePresence('disk_G_condition_id', 'create')
            ->notEmptyString('disk_G_condition_id');

        $validator
            ->nonNegativeInteger('disk_H_condition_id')
            ->requirePresence('disk_H_condition_id', 'create')
            ->notEmptyString('disk_H_condition_id');

        $validator
            ->boolean('generic')
            ->requirePresence('generic', 'create')
            ->notEmptyString('generic');

        $validator
            ->scalar('name_from')
            ->maxLength('name_from', 100)
            ->requirePresence('name_from', 'create')
            ->notEmptyString('name_from');

        $validator
            ->scalar('address_from')
            ->maxLength('address_from', 200)
            ->requirePresence('address_from', 'create')
            ->notEmptyString('address_from');

        $validator
            ->scalar('phone_from')
            ->maxLength('phone_from', 50)
            ->requirePresence('phone_from', 'create')
            ->notEmptyString('phone_from');

        $validator
            ->scalar('email_from')
            ->maxLength('email_from', 100)
            ->requirePresence('email_from', 'create')
            ->notEmptyString('email_from');

        $validator
            ->nonNegativeInteger('price_from')
            ->requirePresence('price_from', 'create')
            ->notEmptyString('price_from');

        $validator
            ->scalar('name_sold')
            ->maxLength('name_sold', 100)
            ->requirePresence('name_sold', 'create')
            ->notEmptyString('name_sold');

        $validator
            ->scalar('address_sold')
            ->maxLength('address_sold', 200)
            ->requirePresence('address_sold', 'create')
            ->notEmptyString('address_sold');

        $validator
            ->scalar('phone_sold')
            ->maxLength('phone_sold', 50)
            ->requirePresence('phone_sold', 'create')
            ->notEmptyString('phone_sold');

        $validator
            ->scalar('email_sold')
            ->maxLength('email_sold', 100)
            ->requirePresence('email_sold', 'create')
            ->notEmptyString('email_sold');

        $validator
            ->nonNegativeInteger('price_sold')
            ->requirePresence('price_sold', 'create')
            ->notEmptyString('price_sold');

        $validator
            ->scalar('comment')
            ->maxLength('comment', 16777215)
            ->requirePresence('comment', 'create')
            ->notEmptyString('comment');

        $validator
            ->integer('pos')
            ->requirePresence('pos', 'create')
            ->notEmptyString('pos');

        $validator
            ->boolean('visible')
            ->requirePresence('visible', 'create')
            ->notEmptyString('visible');

        $validator
            ->dateTime('last_used')
            ->requirePresence('last_used', 'create')
            ->notEmptyDateTime('last_used');

        $validator
            ->nonNegativeInteger('play_count')
            ->requirePresence('play_count', 'create')
            ->notEmptyString('play_count');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['user_id'], 'Users'), ['errorField' => '0']);
        $rules->add($rules->existsIn(['album_id'], 'Albums'), ['errorField' => '1']);
        $rules->add($rules->existsIn(['condition_id'], 'Conditions'), ['errorField' => '2']);
        $rules->add($rules->existsIn(['shelf_id'], 'Shelves'), ['errorField' => '3']);

        return $rules;
    }
}
