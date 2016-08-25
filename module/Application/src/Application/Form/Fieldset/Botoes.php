<?php
namespace Application\Form\Fieldset;

use Zend\Form\Fieldset;

class Botoes extends Fieldset
{

    public function __construct()
    {
        parent::__construct('botoes');
        
        $this->add(array(
            'type' => 'button',
            'name' => 'button-enviar',
            'attributes' => array(
                'type' => 'submit',
                'class' => 'btn btn-success btn-condensed form-submit'
            ),
            'options' => array(
                'glyphicon' => 'ok',
                'label' => 'Confirmar',
                'column-size' => 'sm-12'
            )
        ));
        
        $this->add(array(
            'type' => 'button',
            'name' => 'button-cancelar',
            'attributes' => array(
                'type' => 'submit',
                'class' => 'btn btn-default btn-condensed form-cancel',
                'formnovalidate' => 'formnovalidate'
            ),
            'options' => array(
                'glyphicon' => 'remove',
                'label' => 'Cancelar',
                'column-size' => 'sm-12'
            )
        ));     
        
    }
}
