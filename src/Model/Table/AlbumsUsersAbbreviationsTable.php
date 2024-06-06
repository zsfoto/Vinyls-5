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
 * AlbumsUsersAbbreviations Model
 *
 * @property \App\Model\Table\AlbumsUsersTable&\Cake\ORM\Association\BelongsTo $AlbumsUsers
 * @property \App\Model\Table\AbbreviationsTable&\Cake\ORM\Association\BelongsTo $Abbreviations
 *
 * @method \App\Model\Entity\AlbumsUsersAbbreviation newEmptyEntity()
 * @method \App\Model\Entity\AlbumsUsersAbbreviation newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\AlbumsUsersAbbreviation> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AlbumsUsersAbbreviation get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\AlbumsUsersAbbreviation findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\AlbumsUsersAbbreviation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\AlbumsUsersAbbreviation> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\AlbumsUsersAbbreviation|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\AlbumsUsersAbbreviation saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\AlbumsUsersAbbreviation>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\AlbumsUsersAbbreviation>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\AlbumsUsersAbbreviation>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\AlbumsUsersAbbreviation> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\AlbumsUsersAbbreviation>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\AlbumsUsersAbbreviation>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\AlbumsUsersAbbreviation>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\AlbumsUsersAbbreviation> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AlbumsUsersAbbreviationsTable extends Table
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

        $this->setTable('albums_users_abbreviations');
        $this->setDisplayField('albums_user_id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
		$this->addBehavior('JeffAdmin5.Datepicker');

        $this->belongsTo('AlbumsUsers', [
            'foreignKey' => 'albums_user_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Abbreviations', [
            'foreignKey' => 'abbreviation_id',
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
            ->scalar('albums_user_id')
            ->maxLength('albums_user_id', 64)
            ->notEmptyString('albums_user_id');

        $validator
            ->nonNegativeInteger('abbreviation_id')
            ->notEmptyString('abbreviation_id');

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
        $rules->add($rules->existsIn(['albums_user_id'], 'AlbumsUsers'), ['errorField' => '0']);
        $rules->add($rules->existsIn(['abbreviation_id'], 'Abbreviations'), ['errorField' => '1']);

        return $rules;
    }
}
