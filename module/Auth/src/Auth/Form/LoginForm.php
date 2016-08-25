<?php
namespace Auth\Form;

use Zend\Form\Form;
use Zend\InputFilter\InputFilterProviderInterface;

class LoginForm extends Form implements InputFilterProviderInterface
{
    public function __construct($objectManager)
    {
        parent::__construct('post');

        $this->add(array(
            'type' => 'Zend\Form\Element\Text',
            'name' => 'login',
            'options' => array(),
            // 'label' => 'Login'
            'attributes' => array(
                'autofocus' => true,
                'required' => true,
                'class' => 'form-control',
                'placeholder' => 'Informe seu usuário'
            )
        ));

        $this->add(array(
            'type' => 'Zend\Form\Element\Password',
            'name' => 'password',
            'options' => array(),
            // 'label' => 'Senha'
            'attributes' => array(
                'required' => true,
                'class' => 'form-control',
                'placeholder' => 'Informe sua senha'
            )
        ));
    }

    public function getInputFilterSpecification()
    {
        return array(
            'login' => array(
                'required' => true,
                'filters' => array(
                    array(
                        'name' => 'StripTags'
                    ),
                    array(
                        'name' => 'StringTrim'
                    )
                )
            ),
            'password' => array(
                'required' => true,
                'filters' => array(
                    array(
                        'name' => 'StripTags'
                    ),
                    array(
                        'name' => 'StringTrim'
                    )
                )
            )
        );
    }
}
