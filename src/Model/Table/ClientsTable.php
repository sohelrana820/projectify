<?php
namespace App\Model\Table;

use App\Model\Entity\Client;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Clients Model
 *
 */
class ClientsTable extends Table
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

        $this->table('clients');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

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
            ->requirePresence('name', 'create')
            ->notEmpty('name', 'Client name must be required!');

        $validator->add(
        'email',
        [
            'validEmail' => [
                'rule' => ['email'],
                'message' => 'Please provide valid email address!'
            ],
            'unique' => [
                'message' => 'Sorry, this email address is already taken!',
                'provider' => 'table',
                'rule' => 'validateUnique'
            ]
        ]
    )
        ->requirePresence('email', 'create', 'Email address must be required!')
        ->notEmpty('email', 'Email address must be required!');

        $validator
            ->add(
                'password',
                [
                    'minLength' => [
                        'rule' => ['minLength', 6],
                        'message' => 'Password must contain at least 6 character'
                    ],
                ]
            )
            ->requirePresence('password', 'create', 'Password must be required!')
            ->notEmpty('password', 'Password must be required!');

        $validator
            ->requirePresence('cPassword', 'create', 'Password must be required!')
            ->notEmpty('cPassword', 'Confirm password must be required!', 'create')
            ->add(
                'cPassword',
                'custom',
                [
                    'rule' => function ($value, $context) {

                        if (isset($context['data']['password']) && $value == $context['data']['password']) {
                            return true;
                        }
                        return false;
                    },
                    'message' => 'Sorry, password and confirm password does not matched'
                ]
            );

        return $validator;
    }

    /**
     * @param $uuid
     * @return null
     */
    public function getIDbyUUID($uuid)
    {
        $result = $this->find()
            ->where(['Clients.uuid' => $uuid])
            ->first();

        if($result)
        {
            return $result->id;
        }
        return null;
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
        $rules->add($rules->isUnique(['email']));
        return $rules;
    }
}
