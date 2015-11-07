<?php
namespace App\Model\Table;

use App\Model\Entity\College;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Colleges Model
 *
 * @property \Cake\ORM\Association\HasMany $Courses
 */
class CollegesTable extends Table
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

        $this->table('colleges');
        $this->displayField('college_name');
        $this->primaryKey('id');

        $this->hasMany('Courses', [
            'foreignKey' => 'college_id'
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
            ->allowEmpty('college_name')
            ->add('college_name', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        return $validator;
    }
}
