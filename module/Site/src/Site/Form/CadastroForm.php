<?php
namespace Site\Form;

use Zend\Form\Form;
use Zend\InputFilter\InputFilterProviderInterface;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject;
use Zend\Form\Element;

class CadastroForm extends Form implements InputFilterProviderInterface
{

    /**
     *
     * @var \Doctrine\Common\Persistence\ObjectManager
     */
    protected $objectManager;

    /**
     *
     * @param \Doctrine\Common\Persistence\ObjectManager $objectManager
     */
    public function __construct(\Doctrine\Common\Persistence\ObjectManager $objectManager)
    {
        $this->objectManager = $objectManager;

        parent::__construct('account');

        $this->setHydrator(new DoctrineObject($objectManager))->setObject(new \Gunz\Entity\Account());

        $this->add(array(
            'type' => 'Zend\Form\Element\Hidden',
            'name' => 'id'
        ));

        $this->add(array(
            'type' => 'Zend\Form\Element\Text',
            'name' => 'name',
            'attributes' => array(
                'maxlength' => 100,
                'required' => true,
                'type' => 'text',
                'placeholder' => 'Informe seu o nome'
            ),
            'options' => array(
                'label' => 'Nome',
                'column-size' => 'sm-4',
                'label_attributes' => array(
                    'class' => 'col-sm-2 label-required'
                )
            )
        ));

        $this->add(array(
            'type' => 'Zend\Form\Element\Text',
            'name' => 'user',
            'attributes' => array(
                'maxlength' => 20,
                'required' => true,
                'type' => 'text',
                'placeholder' => 'Informe o usuário'
            ),
            'options' => array(
                'label' => 'Usuário',
                'column-size' => 'sm-4',
                'label_attributes' => array(
                    'class' => 'col-sm-2 label-required'
                )
            )
        ));

        $this->add(array(
            'type' => 'Zend\Form\Element\Text',
            'name' => 'email',
            'attributes' => array(
                'maxlength' => 150,
                'required' => true,
                'type' => 'email',
                'placeholder' => 'Informe o e-mail'
            ),
            'options' => array(
                'label' => 'E-mail',
                'column-size' => 'sm-4',
                'label_attributes' => array(
                    'class' => 'col-sm-2 label-required'
                )
            )
        ));

        $login = new Fieldset\LoginFieldset($objectManager);
        $login->setLabel('Dados de login');
        $this->add($login);

        $captcha = new Fieldset\CaptchaFieldset();
        $captcha->setLabel('Segurança');
        $this->add($captcha);

        $this->add(array(
            'type' => 'Application\Form\Fieldset\Botoes',
            'name' => 'botoes',
            'options' => array(
                'column-size' => 'sm-12',
                'label_attributes' => array(
                    'class' => 'col-sm-12'
                ),
                'twb-layout' => \TwbBundle\Form\View\Helper\TwbBundleForm::LAYOUT_INLINE
            ),
            'attributes' => array(
                'class' => 'botoes col-sm-offset-2 col-sm-10'
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
            'name' => array(
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
                            'max' => 150,
                            'messages' => array(
                                \Zend\Validator\StringLength::TOO_SHORT => \Application\Common\Message::TOO_SHORT('O nome'),
                                \Zend\Validator\StringLength::TOO_LONG => \Application\Common\Message::TOO_LONG('O nome')
                            )
                        )
                    )
                )
            ),
            'user' => array(
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
                                \Zend\Validator\StringLength::TOO_SHORT => \Application\Common\Message::TOO_SHORT('O usuário'),
                                \Zend\Validator\StringLength::TOO_LONG => \Application\Common\Message::TOO_LONG('O usuário')
                            )
                        )
                    ),
                    array(
                        'name' => 'DoctrineModule\Validator\UniqueObject',
                        'options' => array(
                            'object_repository' => $this->objectManager->getRepository('Gunz\Entity\Account'),
                            'object_manager' => $this->objectManager,
                            'fields' => 'user',
                            'messages' => array(
                                \DoctrineModule\Validator\UniqueObject::ERROR_OBJECT_NOT_UNIQUE => \Application\Common\Message::NOT_UNIQUE('uma conta', 'esse usuário')
                            ),
                            'use_context' => true
                        )
                    )
                )
            ),
            'email' => array(
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
                        'name' => 'EmailAddress'
                    ),
                    array(
                        'name' => 'DoctrineModule\Validator\UniqueObject',
                        'options' => array(
                            'object_repository' => $this->objectManager->getRepository('Gunz\Entity\Account'),
                            'object_manager' => $this->objectManager,
                            'fields' => 'email',
                            'messages' => array(
                                \DoctrineModule\Validator\UniqueObject::ERROR_OBJECT_NOT_UNIQUE => \Application\Common\Message::NOT_UNIQUE('uma conta', 'esse e-mail')
                            ),
                            'use_context' => true
                        )
                    )
                )
            )
        );
    }
}

