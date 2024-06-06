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
 * Tracklists Model
 *
 * @property \App\Model\Table\AlbumsTable&\Cake\ORM\Association\BelongsTo $Albums
 * @property \App\Model\Table\ConditionsTable&\Cake\ORM\Association\BelongsTo $Conditions
 * @property \App\Model\Table\ExtraartistsTracklistsTable&\Cake\ORM\Association\HasMany $ExtraartistsTracklists
 * @property \App\Model\Table\LyricsTable&\Cake\ORM\Association\HasMany $Lyrics
 *
 * @method \App\Model\Entity\Tracklist newEmptyEntity()
 * @method \App\Model\Entity\Tracklist newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Tracklist> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Tracklist get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Tracklist findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Tracklist patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Tracklist> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Tracklist|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Tracklist saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Tracklist>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Tracklist>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Tracklist>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Tracklist> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Tracklist>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Tracklist>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Tracklist>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Tracklist> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TracklistsTable extends Table
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

        $this->setTable('tracklists');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
		$this->addBehavior('JeffAdmin5.Datepicker');

        $this->belongsTo('Albums', [
            'foreignKey' => 'album_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Conditions', [
            'foreignKey' => 'condition_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('ExtraartistsTracklists', [
            'foreignKey' => 'tracklist_id',
        ]);
        $this->hasMany('Lyrics', [
            'foreignKey' => 'tracklist_id',
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
            ->nonNegativeInteger('condition_id')
            ->notEmptyString('condition_id');

        $validator
            ->scalar('title')
            ->maxLength('title', 500)
            ->requirePresence('title', 'create')
            ->notEmptyString('title');

        $validator
            ->scalar('position')
            ->maxLength('position', 20)
            ->requirePresence('position', 'create')
            ->notEmptyString('position');

        $validator
            ->scalar('duration')
            ->maxLength('duration', 20)
            ->requirePresence('duration', 'create')
            ->notEmptyString('duration');

        $validator
            ->scalar('type')
            ->maxLength('type', 20)
            ->requirePresence('type', 'create')
            ->notEmptyString('type');

        $validator
            ->scalar('lyrics')
            ->maxLength('lyrics', 16777215)
            ->requirePresence('lyrics', 'create')
            ->notEmptyString('lyrics');

        $validator
            ->scalar('lyrics_checked_user_id')
            ->maxLength('lyrics_checked_user_id', 64)
            ->requirePresence('lyrics_checked_user_id', 'create')
            ->notEmptyString('lyrics_checked_user_id');

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
        $rules->add($rules->existsIn(['condition_id'], 'Conditions'), ['errorField' => '1']);

        return $rules;
    }
}
