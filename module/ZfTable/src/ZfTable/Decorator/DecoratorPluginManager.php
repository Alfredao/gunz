<?php
/**
 * ZfTable ( Module for Zend Framework 2)
 *
 * @copyright Copyright (c) 2013 Piotr Duda dudapiotrek@gmail.com
 * @license   MIT License
 */

namespace ZfTable\Decorator;

use Zend\ServiceManager\AbstractPluginManager;

class DecoratorPluginManager extends AbstractPluginManager
{

    /**
     * Default set of helpers
     *
     * @var array
     */
    protected $invokableClasses = array(

        'cellattr' => '\ZfTable\Decorator\Cell\AttrDecorator',
        'cellvarattr' => '\ZfTable\Decorator\Cell\VarAttrDecorator',
        'cellclass' => '\ZfTable\Decorator\Cell\ClassDecorator',
        'cellicon' => '\ZfTable\Decorator\Cell\Icon',
        'cellmapper' => '\ZfTable\Decorator\Cell\Mapper',
        'celllink' => '\ZfTable\Decorator\Cell\Link',
        'celltemplate' => '\ZfTable\Decorator\Cell\Template',
        'celleditable' => '\ZfTable\Decorator\Cell\Editable',
        'cellcallable' => '\ZfTable\Decorator\Cell\CallableDecorator',
                
        'headercallable' => '\ZfTable\Decorator\Header\CallableDecorator',        
        
        'headerinserir' => '\ZfTable\Decorator\Header\Link\Inserir',
    		
        'cellstatus' => '\ZfTable\Decorator\Cell\Status',
        'celldateformat' => '\ZfTable\Decorator\Cell\DateFormat',
    	'cellvisualizar' => '\ZfTable\Decorator\Cell\Link\Visualizar',
    	'cellatualizar' => '\ZfTable\Decorator\Cell\Link\Atualizar',
    	'cellremover' => '\ZfTable\Decorator\Cell\Link\Remover',
    	'celldocumento' => '\ZfTable\Decorator\Cell\Documento',
    	'celltelefone' => '\ZfTable\Decorator\Cell\Telefone',
    	'celldownload' => '\ZfTable\Decorator\Cell\Link\Download',

        'rowclass' => '\ZfTable\Decorator\Row\ClassDecorator',
        'rowvarattr' => '\ZfTable\Decorator\Row\VarAttr',
        'rowseparatable' => '\ZfTable\Decorator\Row\Separatable',
    );

    /**
     * Don't share header by default
     *
     * @var bool
     */
    protected $shareByDefault = false;

    /**
     * @param mixed $plugin
     */
    public function validatePlugin($plugin)
    {
        if ($plugin instanceof AbstractDecorator) {
            return;
        }
        throw new \DomainException('Invalid Decorator Implementation');
    }
}
