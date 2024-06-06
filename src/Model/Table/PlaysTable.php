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
 * Plays Model
 *
 * @property \App\Model\Table\AlbumsUsersTable&\Cake\ORM\Association\BelongsTo $AlbumsUsers
 *
 * @method \App\Model\Entity\Play newEmptyEntity()
 * @method \App\Model\Entity\Play newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Play> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Play get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Play findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Play patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Play> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Play|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Play saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Play>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Play>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Play>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Play> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Play>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Play>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Play>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Play> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 * @mixin \Cake\ORM\Behavior\CounterCacheBehavior
 */
class PlaysTable extends Table
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

        $this->setTable('plays');
        $this->setDisplayField('albums_users_id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('CounterCache', [
            'AlbumsUsers' => ['play_count'],
        ]);

        $this->belongsTo('AlbumsUsers', [
            'foreignKey' => 'albums_users_id',
            'joinType' => 'INNER',
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
            ->scalar('albums_users_id')
            ->maxLength('albums_users_id', 64)
            ->notEmptyString('albums_users_id');

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
        $rules->add($rules->existsIn(['albums_users_id'], 'AlbumsUsers'), ['errorField' => '0']);

        return $rules;
    }
}
