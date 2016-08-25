<?php
namespace Admin\Form;

use Zend\Form\Form;
use Zend\InputFilter\InputFilterProviderInterface;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject;

class ShopCategoryForm extends Form implements InputFilterProviderInterface
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

        parent::__construct('shop-category');

        $this->setHydrator(new DoctrineObject($objectManager))->setObject(new \Gunz\Entity\ShopCategory());

        $this->add(array(
            'type' => 'Zend\Form\Element\Hidden',
            'name' => 'id'
        ));

        $this->add(array(
            'type' => 'Zend\Form\Element\Text',
            'name' => 'nome',
            'attributes' => array(
                'maxlength' => 30,
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
            'name' => 'ordem',
            'attributes' => array(
                'maxlength' => 2,
                'required' => true,
                'type' => 'text',
                'placeholder' => 'Informe a ordem'
            ),
            'options' => array(
                'label' => 'Ordem',
                'column-size' => 'sm-2',
                'label_attributes' => array(
                    'class' => 'col-sm-2 label-required'
                )
            )
        ));

		$this->add(array(
            'type' => 'Zend\Form\Element\Select',
            'name' => 'status',
            'attributes' => array(
                'required' => true,
                'type' => 'select',
                'placeholder' => 'Selecione o status da categoria'
            ),
            'options' => array(
                'display_empty_item' => true,
                'value_options' => array(
                    '' => '',
                    \Gunz\Entity\ShopCategory::STATUS_INACTIVE => 'Inativa',
                    \Gunz\Entity\ShopCategory::STATUS_ACTIVE => 'Ativa',
                ),
                'label' => 'Status',
                'column-size' => 'sm-2',
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
            'nome' => array(
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
                            'min' => 3,
                            'max' => 30,
                            'messages' => array(
                                \Zend\Validator\StringLength::TOO_SHORT => \Application\Common\Message::TOO_SHORT('O nome'),
                                \Zend\Validator\StringLength::TOO_LONG => \Application\Common\Message::TOO_LONG('O nome')
                            )
                        )
                    ),
                    array(
                        'name' => 'DoctrineModule\Validator\UniqueObject',
                        'options' => array(
                            'object_repository' => $this->objectManager->getRepository('Gunz\Entity\ShopCategory'),
                            'object_manager' => $this->objectManager,
                            'fields' => 'nome',
                            'messages' => array(
                                \DoctrineModule\Validator\UniqueObject::ERROR_OBJECT_NOT_UNIQUE => \Application\Common\Message::NOT_UNIQUE('um servidor', 'esse nome')
                            ),
							'use_context' => true
                        )
                    )
                )
            ),
        );
    }
}

