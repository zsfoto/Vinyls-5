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
 * Lyrics Model
 *
 * @property \App\Model\Table\TracklistsTable&\Cake\ORM\Association\BelongsTo $Tracklists
 *
 * @method \App\Model\Entity\Lyric newEmptyEntity()
 * @method \App\Model\Entity\Lyric newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Lyric> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Lyric get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Lyric findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Lyric patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Lyric> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Lyric|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Lyric saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Lyric>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Lyric>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Lyric>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Lyric> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Lyric>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Lyric>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Lyric>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Lyric> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class LyricsTable extends Table
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

        $this->setTable('lyrics');
        $this->setDisplayField('id');
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
            ->scalar('httpGetUrl')
            ->maxLength('httpGetUrl', 2000)
            ->requirePresence('httpGetUrl', 'create')
            ->notEmptyString('httpGetUrl');

        $validator
            ->scalar('TrackId')
            ->maxLength('TrackId', 100)
            ->requirePresence('TrackId', 'create')
            ->notEmptyString('TrackId');

        $validator
            ->scalar('LyricChecksum')
            ->maxLength('LyricChecksum', 100)
            ->requirePresence('LyricChecksum', 'create')
            ->notEmptyString('LyricChecksum');

        $validator
            ->scalar('LyricId')
            ->maxLength('LyricId', 20)
            ->requirePresence('LyricId', 'create')
            ->notEmptyString('LyricId');

        $validator
            ->scalar('LyricSong')
            ->maxLength('LyricSong', 200)
            ->requirePresence('LyricSong', 'create')
            ->notEmptyString('LyricSong');

        $validator
            ->scalar('LyricArtist')
            ->maxLength('LyricArtist', 200)
            ->requirePresence('LyricArtist', 'create')
            ->notEmptyString('LyricArtist');

        $validator
            ->scalar('LyricUrl')
            ->maxLength('LyricUrl', 2000)
            ->requirePresence('LyricUrl', 'create')
            ->notEmptyString('LyricUrl');

        $validator
            ->scalar('LyricCovertArtUrl')
            ->maxLength('LyricCovertArtUrl', 2000)
            ->requirePresence('LyricCovertArtUrl', 'create')
            ->notEmptyString('LyricCovertArtUrl');

        $validator
            ->scalar('LyricRank')
            ->maxLength('LyricRank', 10)
            ->requirePresence('LyricRank', 'create')
            ->notEmptyString('LyricRank');

        $validator
            ->scalar('LyricCorrectUrl')
            ->maxLength('LyricCorrectUrl', 2000)
            ->requirePresence('LyricCorrectUrl', 'create')
            ->notEmptyString('LyricCorrectUrl');

        $validator
            ->scalar('Lyric')
            ->maxLength('Lyric', 16777215)
            ->requirePresence('Lyric', 'create')
            ->notEmptyString('Lyric');

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
