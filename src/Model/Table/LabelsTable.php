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
 * Labels Model
 *
 * @property \App\Model\Table\AlbumsTable&\Cake\ORM\Association\BelongsToMany $Albums
 *
 * @method \App\Model\Entity\Label newEmptyEntity()
 * @method \App\Model\Entity\Label newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Label> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Label get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Label findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Label patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Label> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Label|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Label saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Label>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Label>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Label>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Label> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Label>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Label>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Label>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Label> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class LabelsTable extends Table
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

        $this->setTable('labels');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
		$this->addBehavior('JeffAdmin5.Datepicker');

        $this->belongsToMany('Albums', [
            'foreignKey' => 'label_id',
            'targetForeignKey' => 'album_id',
            'joinTable' => 'albums_labels',
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
            ->scalar('entity_type')
            ->maxLength('entity_type', 20)
            ->requirePresence('entity_type', 'create')
            ->notEmptyString('entity_type');

        $validator
            ->scalar('catno')
            ->maxLength('catno', 100)
            ->requirePresence('catno', 'create')
            ->notEmptyString('catno');

        $validator
            ->scalar('resource_url')
            ->maxLength('resource_url', 2000)
            ->requirePresence('resource_url', 'create')
            ->notEmptyString('resource_url');

        $validator
            ->nonNegativeInteger('ext_id')
            ->requirePresence('ext_id', 'create')
            ->notEmptyString('ext_id');

        $validator
            ->scalar('entity_type_name')
            ->maxLength('entity_type_name', 200)
            ->requirePresence('entity_type_name', 'create')
            ->notEmptyString('entity_type_name');

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

        $validator
            ->scalar('json')
            ->maxLength('json', 16777215)
            ->requirePresence('json', 'create')
            ->notEmptyString('json');

        return $validator;
    }
}