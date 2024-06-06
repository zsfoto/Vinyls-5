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
 * Albums Model
 *
 * @property \App\Model\Table\CountriesTable&\Cake\ORM\Association\BelongsTo $Countries
 * @property \App\Model\Table\AlbumsExtraartistsTable&\Cake\ORM\Association\HasMany $AlbumsExtraartists
 * @property \App\Model\Table\IdentifiersTable&\Cake\ORM\Association\HasMany $Identifiers
 * @property \App\Model\Table\ImagesTable&\Cake\ORM\Association\HasMany $Images
 * @property \App\Model\Table\TracklistsTable&\Cake\ORM\Association\HasMany $Tracklists
 * @property \App\Model\Table\VideosTable&\Cake\ORM\Association\HasMany $Videos
 * @property \App\Model\Table\AbbreviationsTable&\Cake\ORM\Association\BelongsToMany $Abbreviations
 * @property \App\Model\Table\ArtistsTable&\Cake\ORM\Association\BelongsToMany $Artists
 * @property \App\Model\Table\CompaniesTable&\Cake\ORM\Association\BelongsToMany $Companies
 * @property \App\Model\Table\FormatsTable&\Cake\ORM\Association\BelongsToMany $Formats
 * @property \App\Model\Table\GenresTable&\Cake\ORM\Association\BelongsToMany $Genres
 * @property \App\Model\Table\LabelsTable&\Cake\ORM\Association\BelongsToMany $Labels
 * @property \App\Model\Table\LanguagesTable&\Cake\ORM\Association\BelongsToMany $Languages
 * @property \App\Model\Table\StylesTable&\Cake\ORM\Association\BelongsToMany $Styles
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsToMany $Users
 *
 * @method \App\Model\Entity\Album newEmptyEntity()
 * @method \App\Model\Entity\Album newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Album> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Album get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Album findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Album patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Album> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Album|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Album saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Album>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Album>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Album>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Album> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Album>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Album>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Album>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Album> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AlbumsTable extends Table
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

        $this->setTable('albums');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
		$this->addBehavior('JeffAdmin5.Datepicker');

        $this->belongsTo('Countries', [
            'foreignKey' => 'country_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('AlbumsExtraartists', [
            'foreignKey' => 'album_id',
        ]);
        $this->hasMany('Identifiers', [
            'foreignKey' => 'album_id',
        ]);
        $this->hasMany('Images', [
            'foreignKey' => 'album_id',
        ]);
        $this->hasMany('Tracklists', [
            'foreignKey' => 'album_id',
        ]);
        $this->hasMany('Videos', [
            'foreignKey' => 'album_id',
        ]);
        $this->belongsToMany('Abbreviations', [
            'foreignKey' => 'album_id',
            'targetForeignKey' => 'abbreviation_id',
            'joinTable' => 'albums_abbreviations',
        ]);
        $this->belongsToMany('Artists', [
            'foreignKey' => 'album_id',
            'targetForeignKey' => 'artist_id',
            'joinTable' => 'albums_artists',
        ]);
        $this->belongsToMany('Companies', [
            'foreignKey' => 'album_id',
            'targetForeignKey' => 'company_id',
            'joinTable' => 'albums_companies',
        ]);
        $this->belongsToMany('Formats', [
            'foreignKey' => 'album_id',
            'targetForeignKey' => 'format_id',
            'joinTable' => 'albums_formats',
        ]);
        $this->belongsToMany('Genres', [
            'foreignKey' => 'album_id',
            'targetForeignKey' => 'genre_id',
            'joinTable' => 'albums_genres',
        ]);
        $this->belongsToMany('Labels', [
            'foreignKey' => 'album_id',
            'targetForeignKey' => 'label_id',
            'joinTable' => 'albums_labels',
        ]);
        $this->belongsToMany('Languages', [
            'foreignKey' => 'album_id',
            'targetForeignKey' => 'language_id',
            'joinTable' => 'albums_languages',
        ]);
        $this->belongsToMany('Styles', [
            'foreignKey' => 'album_id',
            'targetForeignKey' => 'style_id',
            'joinTable' => 'albums_styles',
        ]);
        $this->belongsToMany('Users', [
            'foreignKey' => 'album_id',
            'targetForeignKey' => 'user_id',
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
            ->scalar('ext_id')
            ->maxLength('ext_id', 20)
            ->requirePresence('ext_id', 'create')
            ->notEmptyString('ext_id');

        $validator
            ->nonNegativeInteger('country_id')
            ->notEmptyString('country_id');

        $validator
            ->scalar('artists_sort')
            ->maxLength('artists_sort', 200)
            ->requirePresence('artists_sort', 'create')
            ->notEmptyString('artists_sort');

        $validator
            ->scalar('name')
            ->maxLength('name', 200)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->nonNegativeInteger('year')
            ->notEmptyString('year');

        $validator
            ->scalar('lowest_price')
            ->maxLength('lowest_price', 20)
            ->requirePresence('lowest_price', 'create')
            ->notEmptyString('lowest_price');

        $validator
            ->scalar('laci_price')
            ->maxLength('laci_price', 100)
            ->requirePresence('laci_price', 'create')
            ->notEmptyString('laci_price');

        $validator
            ->scalar('released_formatted')
            ->maxLength('released_formatted', 20)
            ->requirePresence('released_formatted', 'create')
            ->notEmptyString('released_formatted');

        $validator
            ->scalar('estimated_weight')
            ->maxLength('estimated_weight', 20)
            ->requirePresence('estimated_weight', 'create')
            ->notEmptyString('estimated_weight');

        $validator
            ->scalar('released')
            ->maxLength('released', 20)
            ->requirePresence('released', 'create')
            ->notEmptyString('released');

        $validator
            ->scalar('notes')
            ->maxLength('notes', 16777215)
            ->requirePresence('notes', 'create')
            ->notEmptyString('notes');

        $validator
            ->scalar('url')
            ->maxLength('url', 2000)
            ->requirePresence('url', 'create')
            ->notEmptyString('url');

        $validator
            ->scalar('resource_url')
            ->maxLength('resource_url', 2000)
            ->requirePresence('resource_url', 'create')
            ->notEmptyString('resource_url');

        $validator
            ->scalar('master_url')
            ->maxLength('master_url', 2000)
            ->requirePresence('master_url', 'create')
            ->notEmptyString('master_url');

        $validator
            ->scalar('master_id')
            ->maxLength('master_id', 20)
            ->requirePresence('master_id', 'create')
            ->notEmptyString('master_id');

        $validator
            ->scalar('url_src')
            ->maxLength('url_src', 2000)
            ->requirePresence('url_src', 'create')
            ->notEmptyString('url_src');

        $validator
            ->scalar('uri')
            ->maxLength('uri', 2000)
            ->requirePresence('uri', 'create')
            ->notEmptyString('uri');

        $validator
            ->scalar('thumb')
            ->maxLength('thumb', 2000)
            ->requirePresence('thumb', 'create')
            ->notEmptyString('thumb');

        $validator
            ->nonNegativeInteger('user_count')
            ->requirePresence('user_count', 'create')
            ->notEmptyString('user_count');

        $validator
            ->integer('pos')
            ->notEmptyString('pos');

        $validator
            ->boolean('visible')
            ->notEmptyString('visible');

        $validator
            ->dateTime('last_used')
            ->requirePresence('last_used', 'create')
            ->notEmptyDateTime('last_used');

        $validator
            ->scalar('json')
            ->maxLength('json', 4294967295)
            ->requirePresence('json', 'create')
            ->notEmptyString('json');

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
        $rules->add($rules->existsIn(['country_id'], 'Countries'), ['errorField' => '0']);

        return $rules;
    }
}
