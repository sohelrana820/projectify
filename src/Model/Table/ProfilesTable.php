<?php
namespace App\Model\Table;

use App\Model\Entity\Profile;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Profiles Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 */
class ProfilesTable extends Table
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

        $this->table('profiles');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo(
            'Users',
            [
                'foreignKey' => 'user_id',
                'joinType' => 'INNER'
            ]
        );
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
            ->requirePresence('first_name', 'create')
            ->notEmpty('first_name', 'First name must be required!');

        $validator
            ->requirePresence('last_name', 'create')
            ->notEmpty('last_name', 'Last name must be required!');

        $validator
            ->requirePresence('company_name', 'create')
            ->notEmpty('company_name', 'Company name must be required!');

        $validator
            ->requirePresence('phone', 'create')
            ->notEmpty('phone', 'Phone must be required!');

        $validator
            ->requirePresence('gender', 'create')
            ->notEmpty('gender', 'Phone must be required!');

        $validator
            ->requirePresence('birthday', 'create')
            ->notEmpty('birthday', 'Birthday must be required!')
            ->add('birthday', 'birthday', [
                'rule' => ['date' , 'mdy'],
                'message' => 'Invalid date format',
            ]);

        $validator
            ->requirePresence('street_1', 'create')
            ->notEmpty('street_1', 'Street Address must be required!');

        $validator
            ->requirePresence('city', 'create')
            ->notEmpty('city', 'City must be required!');

        $validator
            ->requirePresence('country', 'create')
            ->notEmpty('city', 'Country must be required!');

        $validator
            ->requirePresence('state', 'create')
            ->notEmpty('state', 'State must be required!');

        $validator
            ->requirePresence('postal_code', 'create')
            ->notEmpty('postal_code', 'Postal code must be required!');



        return $validator;
    }

    public function validationSeller(Validator $validator){
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('first_name', 'create')
            ->notEmpty('first_name', 'First name must be required!');

        $validator
            ->requirePresence('last_name', 'create')
            ->notEmpty('last_name', 'Last name must be required!');

        $validator
            ->requirePresence('company_name', 'create')
            ->notEmpty('company_name', 'Company name must be required!');

        $validator
            ->requirePresence('phone', 'create')
            ->notEmpty('phone', 'Phone must be required!');

        /*$validator
            ->requirePresence('birthday', 'create')
            ->notEmpty('birthday', 'Birthday must be required!')
            ->add('birthday', 'birthday', [
                'rule' => ['date' , 'mdy'],
                'message' => 'Invalid date format',
            ]);*/

        $validator
            ->requirePresence('street_1', 'create')
            ->notEmpty('street_1', 'Street Address must be required!');


        $validator
            ->notEmpty('owned_properties', 'No. of own properties must be required!')
            ->requirePresence('owned_properties', 'create')

            ->add(
                'owned_properties',
                'owned_properties',
                [
                    'rule' => 'numeric',
                    'message' => 'Owned Properties must be Number',
                ]
            );
        return $validator;

    }
    public function validationInvestor(Validator $validator){
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('first_name', 'create')
            ->notEmpty('first_name', 'First name must be required!');

        $validator
            ->requirePresence('last_name', 'create')
            ->notEmpty('last_name', 'Last name must be required!');

        $validator
            ->requirePresence('company_name', 'create')
            ->notEmpty('company_name', 'Company name must be required!');

        $validator
            ->requirePresence('phone', 'create')
            ->notEmpty('phone', 'Phone must be required!');

        /*$validator
            ->requirePresence('birthday', 'create')
            ->notEmpty('birthday', 'Birthday must be required!')
            ->add('birthday', 'birthday', [
                'rule' => ['date' , 'mdy'],
                'message' => 'Invalid date format',
            ]);*/

        $validator
            ->requirePresence('street_1', 'create')
            ->notEmpty('street_1', 'Street Address must be required!');


        $validator
            ->notEmpty(
                'investment_dollars',
                'Investment Dollars must be required!'
            )
            ->requirePresence('investment_dollars', 'create')

            ->add(
                'investment_dollars',
                'investment_dollars',
                [
                    'rule' => 'numeric',
                    'message' => 'Investment Dollars must be Number',
                ]
            );
        $validator
            ->requirePresence('year_inventing_type', 'create')
            ->notEmpty('year_inventing_type', 'Inventing type must be required!');


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
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        return $rules;
    }


    public function getProfileByUserID($id)
    {
        $result = $this->find()
            ->select()
            ->where(['Profiles.user_id' => $id])
            ->first();

        if ($result) {
            return $result;
        }
        return null;
    }
}
