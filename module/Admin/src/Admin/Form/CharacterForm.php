<?php
namespace Admin\Form;

use Zend\Form\Form;
use Zend\InputFilter\InputFilterProviderInterface;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject;

class CharacterForm extends Form implements InputFilterProviderInterface
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
        
        parent::__construct('character');
        
        $this->setHydrator(new DoctrineObject($objectManager))->setObject(new \Gunz\Entity\Character());
        
        $this->add(array(
            'type' => 'Zend\Form\Element\Hidden',
            'name' => 'id'
        ));
        
		$this->add(array(
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'name' => 'account',
            'options' => array(
                'label' => 'Usuário',
                'label_attributes' => array(
                    'class' => 'col-sm-2 label-required'
                ),
                'column-size' => 'sm-3',
                'object_manager' => $objectManager,
                'target_class' => 'Gunz\Entity\Account',
                'display_empty_item' => true,
                'label_generator' => function ($object)
                {
                    return $object->getUser() . ' - ' . $object->getName();
                },
                'is_method' => true,
                'find_method' => array(
                    'name' => 'findBy',
                    'params' => array(
                        'criteria' => array(),
                        'orderBy' => array(
                            'user' => 'ASC'
                        )
                    )
                )
            ),
            'attributes' => array(
                'id' => 'encargo',
                'placeholder' => 'Selecione o encargo',
                'required' => true
            )
        ));
		
        $this->add(array(
            'type' => 'Zend\Form\Element\Text',
            'name' => 'name',
            'attributes' => array(
                'maxlength' => 100,
                'required' => true,
                'type' => 'text',
                'placeholder' => 'Informe o nome'
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
            'name' => 'level',
            'attributes' => array(
                'maxlength' => 2,
                'required' => true,
                'type' => 'text',
                'placeholder' => 'Informe o level'
            ),
            'options' => array(
                'label' => 'Level',
                'column-size' => 'sm-4',
                'label_attributes' => array(
                    'class' => 'col-sm-2 label-required'
                )
            )
        ));		
		
        $this->add(array(
            'type' => 'Zend\Form\Element\Text',
            'name' => 'xp',
            'attributes' => array(
                'maxlength' => 11,
                'required' => true,
                'type' => 'text',
                'placeholder' => 'Informe a XP'
            ),
            'options' => array(
                'label' => 'XP',
                'column-size' => 'sm-4',
                'label_attributes' => array(
                    'class' => 'col-sm-2 label-required'
                )
            )
        ));
        
        $this->add(array(
            'type' => 'Application\Form\Fieldset\Botoes',
            'name' => 'botoes',
            'options' => array(
                'column-size' => 'sm-12',
                'label_attributes' => array(
                    'class' => 'col-sm-12'
                ),
                'twb-layout' => \TwbBundle\Form\View\Helper\TwbBundleForm::LAYOUT_INLINE,
            ),
            'attributes' => array(
                'class' => 'botoes col-sm-offset-2 col-sm-10'
            ),
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
                    array('name' => 'StringTrim'),
                    array('name' => 'StripTags')
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
                    ),
                    array(
                        'name' => 'DoctrineModule\Validator\UniqueObject',
                        'options' => array(
                            'object_repository' => $this->objectManager->getRepository('Gunz\Entity\Character'),
                            'object_manager' => $this->objectManager,
                            'fields' => 'name',
                            'messages' => array(
                                \DoctrineModule\Validator\UniqueObject::ERROR_OBJECT_NOT_UNIQUE => \Application\Common\Message::NOT_UNIQUE('um personagem', 'esse nome')
                            ),
							'use_context' => true
                        )
                    )					
                )
            ),
        );
    }
}

