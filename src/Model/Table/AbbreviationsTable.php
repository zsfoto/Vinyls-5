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
 * Abbreviations Model
 *
 * @property \App\Model\Table\AlbumsTable&\Cake\ORM\Association\BelongsToMany $Albums
 * @property \App\Model\Table\AlbumsUsersTable&\Cake\ORM\Association\BelongsToMany $AlbumsUsers
 *
 * @method \App\Model\Entity\Abbreviation newEmptyEntity()
 * @method \App\Model\Entity\Abbreviation newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Abbreviation> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Abbreviation get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Abbreviation findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Abbreviation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Abbreviation> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Abbreviation|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Abbreviation saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Abbreviation>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Abbreviation>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Abbreviation>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Abbreviation> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Abbreviation>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Abbreviation>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Abbreviation>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Abbreviation> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AbbreviationsTable extends Table
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

        $this->setTable('abbreviations');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
		$this->addBehavior('JeffAdmin5.Datepicker');

        $this->belongsToMany('Albums', [
            'foreignKey' => 'abbreviation_id',
            'targetForeignKey' => 'album_id',
            'joinTable' => 'albums_abbreviations',
        ]);
        $this->belongsToMany('AlbumsUsers', [
            'foreignKey' => 'abbreviation_id',
            'targetForeignKey' => 'albums_user_id',
            'joinTable' => 'albums_users_abbreviations',
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
