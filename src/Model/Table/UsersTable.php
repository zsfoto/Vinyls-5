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
 * Users Model
 *
 * @property \App\Model\Table\UsergroupsTable&\Cake\ORM\Association\BelongsTo $Usergroups
 * @property \App\Model\Table\ClientsTable&\Cake\ORM\Association\HasMany $Clients
 * @property \App\Model\Table\ShelvesTable&\Cake\ORM\Association\HasMany $Shelves
 * @property \App\Model\Table\AlbumsTable&\Cake\ORM\Association\BelongsToMany $Albums
 *
 * @method \App\Model\Entity\User newEmptyEntity()
 * @method \App\Model\Entity\User newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\User> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\User findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\User> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\User|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\User>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\User>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\User>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\User> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\User>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\User>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\User>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\User> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
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

        $this->setTable('users');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
		$this->addBehavior('JeffAdmin5.Datepicker');

        $this->belongsTo('Usergroups', [
            'foreignKey' => 'usergroup_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Clients', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('Shelves', [
            'foreignKey' => 'user_id',
        ]);
        $this->belongsToMany('Albums', [
            'foreignKey' => 'user_id',
            'targetForeignKey' => 'album_id',
            'joinTable' => 'albums_users',
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
            ->nonNegativeInteger('usergroup_id')
            ->notEmptyString('usergroup_id');

        $validator
            ->scalar('name')
            ->maxLength('name', 100)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email');

        $validator
            ->scalar('password')
            ->maxLength('password', 250)
            ->requirePresence('password', 'create')
            ->notEmptyString('password');

        $validator
            ->scalar('comment')
            ->maxLength('comment', 16777215)
            ->requirePresence('comment', 'create')
            ->notEmptyString('comment');

        $validator
            ->boolean('enabled')
            ->requirePresence('enabled', 'create')
            ->notEmptyString('enabled');

        $validator
            ->boolean('visible')
            ->requirePresence('visible', 'create')
            ->notEmptyString('visible');

        $validator
            ->integer('pos')
            ->requirePresence('pos', 'create')
            ->notEmptyString('pos');

        $validator
            ->scalar('token')
            ->maxLength('token', 64)
            ->requirePresence('token', 'create')
            ->notEmptyString('token');

        $validator
            ->dateTime('token_expire')
            ->requirePresence('token_expire', 'create')
            ->notEmptyDateTime('token_expire');

        $validator
            ->nonNegativeInteger('album_count')
            ->requirePresence('album_count', 'create')
            ->notEmptyString('album_count');

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
        $rules->add($rules->isUnique(['email']), ['errorField' => '0']);
        $rules->add($rules->existsIn(['usergroup_id'], 'Usergroups'), ['errorField' => '1']);

        return $rules;
    }
}
