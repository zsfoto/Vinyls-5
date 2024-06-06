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
 * AlbumsCompanies Model
 *
 * @property \App\Model\Table\AlbumsTable&\Cake\ORM\Association\BelongsTo $Albums
 * @property \App\Model\Table\CompaniesTable&\Cake\ORM\Association\BelongsTo $Companies
 *
 * @method \App\Model\Entity\AlbumsCompany newEmptyEntity()
 * @method \App\Model\Entity\AlbumsCompany newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\AlbumsCompany> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AlbumsCompany get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\AlbumsCompany findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\AlbumsCompany patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\AlbumsCompany> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\AlbumsCompany|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\AlbumsCompany saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\AlbumsCompany>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\AlbumsCompany>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\AlbumsCompany>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\AlbumsCompany> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\AlbumsCompany>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\AlbumsCompany>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\AlbumsCompany>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\AlbumsCompany> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AlbumsCompaniesTable extends Table
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

        $this->setTable('albums_companies');
        $this->setDisplayField('album_id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
		$this->addBehavior('JeffAdmin5.Datepicker');

        $this->belongsTo('Albums', [
            'foreignKey' => 'album_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Companies', [
            'foreignKey' => 'company_id',
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
            ->nonNegativeInteger('company_id')
            ->notEmptyString('company_id');

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
        $rules->add($rules->existsIn(['company_id'], 'Companies'), ['errorField' => '1']);

        return $rules;
    }
}
