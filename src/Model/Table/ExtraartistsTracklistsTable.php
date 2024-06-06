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
 * ExtraartistsTracklists Model
 *
 * @property \App\Model\Table\TracklistsTable&\Cake\ORM\Association\BelongsTo $Tracklists
 *
 * @method \App\Model\Entity\ExtraartistsTracklist newEmptyEntity()
 * @method \App\Model\Entity\ExtraartistsTracklist newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\ExtraartistsTracklist> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ExtraartistsTracklist get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\ExtraartistsTracklist findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\ExtraartistsTracklist patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\ExtraartistsTracklist> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ExtraartistsTracklist|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\ExtraartistsTracklist saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\ExtraartistsTracklist>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ExtraartistsTracklist>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ExtraartistsTracklist>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ExtraartistsTracklist> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ExtraartistsTracklist>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ExtraartistsTracklist>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ExtraartistsTracklist>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ExtraartistsTracklist> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ExtraartistsTracklistsTable extends Table
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

        $this->setTable('extraartists_tracklists');
        $this->setDisplayField('tracklist_id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
		$this->addBehavior('JeffAdmin5.Datepicker');

        $this->belongsTo('Tracklists', [
            'foreignKey' => 'tracklist_id',
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
            ->scalar('tracklist_id')
            ->maxLength('tracklist_id', 64)
            ->notEmptyString('tracklist_id');

        $validator
            ->nonNegativeInteger('extraartist_id')
            ->requirePresence('extraartist_id', 'create')
            ->notEmptyString('extraartist_id');

        $validator
            ->scalar('role')
            ->maxLength('role', 100)
            ->requirePresence('role', 'create')
            ->notEmptyString('role');

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
        $rules->add($rules->existsIn(['tracklist_id'], 'Tracklists'), ['errorField' => '0']);

        return $rules;
    }
}
