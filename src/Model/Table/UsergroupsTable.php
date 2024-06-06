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
 * Usergroups Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\HasMany $Users
 *
 * @method \App\Model\Entity\Usergroup newEmptyEntity()
 * @method \App\Model\Entity\Usergroup newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Usergroup> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Usergroup get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Usergroup findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Usergroup patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Usergroup> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Usergroup|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Usergroup saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Usergroup>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Usergroup>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Usergroup>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Usergroup> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Usergroup>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Usergroup>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Usergroup>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Usergroup> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsergroupsTable extends Table
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

        $this->setTable('usergroups');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Users', [
            'foreignKey' => 'usergroup_id',
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
            ->maxLength('name', 100)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('description')
            ->maxLength('description', 16777215)
            ->requirePresence('description', 'create')
            ->notEmptyString('description');

        $validator
            ->boolean('visible')
            ->requirePresence('visible', 'create')
            ->notEmptyString('visible');

        $validator
            ->integer('pos')
            ->requirePresence('pos', 'create')
            ->notEmptyString('pos');

        return $validator;
    }
}
