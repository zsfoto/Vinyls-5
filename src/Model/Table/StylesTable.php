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
 * Styles Model
 *
 * @property \App\Model\Table\AlbumsTable&\Cake\ORM\Association\BelongsToMany $Albums
 *
 * @method \App\Model\Entity\Style newEmptyEntity()
 * @method \App\Model\Entity\Style newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Style> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Style get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Style findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Style patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Style> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Style|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Style saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Style>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Style>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Style>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Style> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Style>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Style>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Style>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Style> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class StylesTable extends Table
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

        $this->setTable('styles');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
		$this->addBehavior('JeffAdmin5.Datepicker');

        $this->belongsToMany('Albums', [
            'foreignKey' => 'style_id',
            'targetForeignKey' => 'album_id',
            'joinTable' => 'albums_styles',
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
