<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Documentos Model
 *
 * @method \App\Model\Entity\Documento newEmptyEntity()
 * @method \App\Model\Entity\Documento newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Documento[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Documento get($primaryKey, $options = [])
 * @method \App\Model\Entity\Documento findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Documento patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Documento[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Documento|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Documento saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Documento[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Documento[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Documento[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Documento[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class DocumentosTable extends Table
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

        $this->setTable('documentos');
        $this->setDisplayField('DOC_ID');
        $this->setPrimaryKey('DOC_ID');

        
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
            ->integer('DOC_ID')
            ->allowEmptyString('DOC_ID', null, 'create');

        $validator
            ->scalar('DOC_NOMBRE')
            ->maxLength('DOC_NOMBRE', 60)
            ->requirePresence('DOC_NOMBRE', 'create')
            ->notEmptyString('DOC_NOMBRE');

        $validator
            ->integer('DOC_CODIGO')
            ->requirePresence('DOC_CODIGO', 'create')
            ->notEmptyString('DOC_CODIGO');

        $validator
            ->scalar('DOC_CONTENIDO')
            ->maxLength('DOC_CONTENIDO', 4000)
            ->requirePresence('DOC_CONTENIDO', 'create')
            ->notEmptyString('DOC_CONTENIDO');

        $validator
            ->integer('DOC_ID_TIPO')
            ->requirePresence('DOC_ID_TIPO', 'create')
            ->notEmptyString('DOC_ID_TIPO');

        $validator
            ->integer('DOC_ID_PROCESO')
            ->requirePresence('DOC_ID_PROCESO', 'create')
            ->notEmptyString('DOC_ID_PROCESO');

        return $validator;
    }

    
}
