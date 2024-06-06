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
 * Shelves Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\AlbumsUsersTable&\Cake\ORM\Association\HasMany $AlbumsUsers
 *
 * @method \App\Model\Entity\Shelf newEmptyEntity()
 * @method \App\Model\Entity\Shelf newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Shelf> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Shelf get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Shelf findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Shelf patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Shelf> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Shelf|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Shelf saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Shelf>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Shelf>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Shelf>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Shelf> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Shelf>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Shelf>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Shelf>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Shelf> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ShelvesTable extends Table
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

        $this->setTable('shelves');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
		$this->addBehavior('JeffAdmin5.Datepicker');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('AlbumsUsers', [
            'foreignKey' => 'shelf_id',
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
            ->scalar('name')
            ->maxLength('name', 50)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->nonNegativeInteger('album_count')
            ->requirePresence('album_count', 'create')
            ->notEmptyString('album_count');

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

        return $rules;
    }
}
