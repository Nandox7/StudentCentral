<?php
namespace App\Model\Table;

use App\Model\Entity\Course;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Courses Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Colleges
 * @property \Cake\ORM\Association\HasMany $Groups
 * @property \Cake\ORM\Association\HasMany $Students
 */
class CoursesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('courses');
        $this->displayField('course_name');
        $this->primaryKey('id');

        $this->belongsTo('Colleges', [
            'foreignKey' => 'college_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Groups', [
            'foreignKey' => 'course_id'
        ]);
        $this->hasMany('Students', [
            'foreignKey' => 'course_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('course_name', 'create')
            ->notEmpty('course_name')
            ->add('course_name', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->requirePresence('course_code', 'create')
            ->notEmpty('course_code');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['college_id'], 'Colleges'));
        return $rules;
    }
}
