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
 * AlbumsArtists Model
 *
 * @property \App\Model\Table\AlbumsTable&\Cake\ORM\Association\BelongsTo $Albums
 * @property \App\Model\Table\ArtistsTable&\Cake\ORM\Association\BelongsTo $Artists
 *
 * @method \App\Model\Entity\AlbumsArtist newEmptyEntity()
 * @method \App\Model\Entity\AlbumsArtist newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\AlbumsArtist> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AlbumsArtist get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\AlbumsArtist findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\AlbumsArtist patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\AlbumsArtist> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\AlbumsArtist|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\AlbumsArtist saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\AlbumsArtist>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\AlbumsArtist>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\AlbumsArtist>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\AlbumsArtist> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\AlbumsArtist>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\AlbumsArtist>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\AlbumsArtist>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\AlbumsArtist> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AlbumsArtistsTable extends Table
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

        $this->setTable('albums_artists');
        $this->setDisplayField('album_id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
		$this->addBehavior('JeffAdmin5.Datepicker');

        $this->belongsTo('Albums', [
            'foreignKey' => 'album_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Artists', [
            'foreignKey' => 'artist_id',
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
            ->nonNegativeInteger('artist_id')
            ->notEmptyString('artist_id');

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
        $rules->add($rules->existsIn(['artist_id'], 'Artists'), ['errorField' => '1']);

        return $rules;
    }
}
