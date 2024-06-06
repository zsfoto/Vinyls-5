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
 * Images Model
 *
 * @property \App\Model\Table\AlbumsTable&\Cake\ORM\Association\BelongsTo $Albums
 *
 * @method \App\Model\Entity\Image newEmptyEntity()
 * @method \App\Model\Entity\Image newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Image> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Image get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Image findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Image patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Image> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Image|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Image saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Image>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Image>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Image>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Image> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Image>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Image>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Image>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Image> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ImagesTable extends Table
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

        $this->setTable('images');
        $this->setDisplayField('name');
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
            ->nonNegativeInteger('width')
            ->requirePresence('width', 'create')
            ->notEmptyString('width');

        $validator
            ->nonNegativeInteger('height')
            ->requirePresence('height', 'create')
            ->notEmptyString('height');

        $validator
            ->scalar('resource_url')
            ->maxLength('resource_url', 2000)
            ->requirePresence('resource_url', 'create')
            ->notEmptyString('resource_url');

        $validator
            ->scalar('type')
            ->maxLength('type', 20)
            ->requirePresence('type', 'create')
            ->notEmptyString('type');

        $validator
            ->scalar('uri150')
            ->maxLength('uri150', 2000)
            ->requirePresence('uri150', 'create')
            ->notEmptyString('uri150');

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
