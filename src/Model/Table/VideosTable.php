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
 * Videos Model
 *
 * @property \App\Model\Table\AlbumsTable&\Cake\ORM\Association\BelongsTo $Albums
 *
 * @method \App\Model\Entity\Video newEmptyEntity()
 * @method \App\Model\Entity\Video newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Video> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Video get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Video findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Video patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Video> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Video|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Video saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Video>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Video>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Video>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Video> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Video>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Video>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Video>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Video> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class VideosTable extends Table
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

        $this->setTable('videos');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
		$this->addBehavior('JeffAdmin5.Datepicker');

        $this->belongsTo('Albums', [
            'foreignKey' => 'album_id',
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
            ->scalar('album_id')
            ->maxLength('album_id', 64)
            ->notEmptyString('album_id');

        $validator
            ->scalar('name')
            ->maxLength('name', 200)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('url')
            ->maxLength('url', 2000)
            ->requirePresence('url', 'create')
            ->notEmptyString('url');

        $validator
            ->boolean('embed')
            ->requirePresence('embed', 'create')
            ->notEmptyString('embed');

        $validator
            ->scalar('title')
            ->maxLength('title', 2000)
            ->requirePresence('title', 'create')
            ->notEmptyString('title');

        $validator
            ->scalar('description')
            ->maxLength('description', 16777215)
            ->requirePresence('description', 'create')
            ->notEmptyString('description');

        $validator
            ->scalar('duration')
            ->maxLength('duration', 20)
            ->requirePresence('duration', 'create')
            ->notEmptyString('duration');

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
        $rules->add($rules->existsIn(['album_id'], 'Albums'), ['errorField' => '0']);

        return $rules;
    }
}
