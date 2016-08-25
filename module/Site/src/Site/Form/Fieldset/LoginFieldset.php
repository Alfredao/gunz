<?php
namespace Site\Form\Fieldset;

use Zend\Form\Fieldset;
use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject;
use Zend\InputFilter\InputFilterProviderInterface;

class LoginFieldset extends Fieldset implements InputFilterProviderInterface
{

    public function __construct(ObjectManager $objectManager)
    {
        parent::__construct('login');

        $this->setHydrator(new DoctrineObject($objectManager))->setObject(new \Gunz\Entity\Login());

        $this->add(array(
            'type' => 'Zend\Form\Element\Password',
            'name' => 'password',
            'attributes' => array(
                'maxlength' => 20,
                'required' => true,
                'type' => 'password',
                'placeholder' => 'Informe sua senha'
            ),
            'options' => array(
                'label' => 'Senha',
                'column-size' => 'sm-4',
                'label_attributes' => array(
                    'class' => 'col-sm-2 label-required'
                )
            )
        ));

        $this->add(array(
            'type' => 'Zend\Form\Element\Password',
            'name' => 'passwordCheck',
            'attributes' => array(
                'maxlength' => 20,
                'required' => true,
                'type' => 'password',
                'placeholder' => 'Confirme sua senha'
            ),
            'options' => array(
                'label' => 'Confirmação de senha',
                'column-size' => 'sm-4',
                'label_attributes' => array(
                    'class' => 'col-sm-2 label-required'
                )
            )
        ));
    }

    /**
     * (non-PHPdoc)
     *
     * @see \Zend\InputFilter\InputFilterProviderInterface::getInputFilterSpecification()
     */
    public function getInputFilterSpecification()
    {
        return array(
            'password' => array(
                'required' => true,
                'filters' => array(
                    array(
                        'name' => 'StringTrim'
                    ),
                    array(
                        'name' => 'StripTags'
                    )
                ),
                'validators' => array(
                    array(
                        'name' => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min' => 5,
                            'max' => 20,
                            'messages' => array(
                                \Zend\Validator\StringLength::TOO_SHORT => \Application\Common\Message::TOO_SHORT('Sua senha'),
                                \Zend\Validator\StringLength::TOO_LONG => \Application\Common\Message::TOO_LONG('Sua senha')
                            )
                        )
                    )
                )
            ),
            'passwordCheck' => array(
                'required' => true,
                'filters' => array(
                    array(
                        'name' => 'StringTrim'
                    ),
                    array(
                        'name' => 'StripTags'
                    )
                ),
                'validators' => array(
                    array(
                        'name' => 'Identical',
                        'options' => array(
                            'token' => 'password'
                        )
                    )
                )
            )
        );
    }
}