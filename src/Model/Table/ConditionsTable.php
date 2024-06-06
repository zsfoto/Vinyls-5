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
 * Conditions Model
 *
 * @property \App\Model\Table\AlbumsUsersTable&\Cake\ORM\Association\HasMany $AlbumsUsers
 * @property \App\Model\Table\TracklistsTable&\Cake\ORM\Association\HasMany $Tracklists
 *
 * @method \App\Model\Entity\Condition newEmptyEntity()
 * @method \App\Model\Entity\Condition newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Condition> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Condition get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Condition findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Condition patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Condition> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Condition|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Condition saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Condition>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Condition>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Condition>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Condition> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Condition>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Condition>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Condition>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Condition> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ConditionsTable extends Table
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

        $this->setTable('conditions');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
		$this->addBehavior('JeffAdmin5.Datepicker');

        $this->hasMany('AlbumsUsers', [
            'foreignKey' => 'condition_id',
        ]);
        $this->hasMany('Tracklists', [
            'foreignKey' => 'condition_id',
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
            ->scalar('name')
            ->maxLength('name', 20)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('long_name')
            ->maxLength('long_name', 200)
            ->requirePresence('long_name', 'create')
            ->notEmptyString('long_name');

        $validator
            ->scalar('description')
            ->maxLength('description', 16777215)
            ->requirePresence('description', 'create')
            ->notEmptyString('description');

        $validator
            ->dateTime('last_used')
            ->requirePresence('last_used', 'create')
            ->notEmptyDateTime('last_used');

        $validator
            ->integer('pos')
            ->requirePresence('pos', 'create')
            ->notEmptyString('pos');

        $validator
            ->boolean('visible')
            ->requirePresence('visible', 'create')
            ->notEmptyString('visible');

        return $validator;
    }
}
