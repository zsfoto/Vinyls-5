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
 * Genres Model
 *
 * @property \App\Model\Table\AlbumsTable&\Cake\ORM\Association\BelongsToMany $Albums
 *
 * @method \App\Model\Entity\Genre newEmptyEntity()
 * @method \App\Model\Entity\Genre newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Genre> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Genre get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Genre findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Genre patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Genre> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Genre|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Genre saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Genre>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Genre>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Genre>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Genre> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Genre>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Genre>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Genre>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Genre> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class GenresTable extends Table
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

        $this->setTable('genres');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
		$this->addBehavior('JeffAdmin5.Datepicker');

        $this->belongsToMany('Albums', [
            'foreignKey' => 'genre_id',
            'targetForeignKey' => 'album_id',
            'joinTable' => 'albums_genres',
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
            ->maxLength('name', 200)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

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
}
