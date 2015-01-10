<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

abstract class Duck 
{
    private $_flyBehavior = NULL;
    private $_flyBehaviorInstance = NULL;
    private $_quackBehavior = NULL;
    private $_quackBehaviorInstance = NULL;
    protected $_pattern = 'strategy/';
    private $_flyBehaviors = array(
        'flyWithWings',
        'flyNoWay',
        'flyRocketPowered'
    );
    private $_quackBehaviors = array(
        'muteQuack',
        'quack',
        'squeak'
    );

    public function __construct( Array $set_runtime_behavior = NULL )
    {
        if( ! is_null( $set_runtime_behavior ))
        {
            foreach( $set_runtime_behavior as $k => $c )
                if ( array_key_exists($k, get_class_vars( get_class( $this ))))
                    $this->{$k} = $c;
        }

        if( ! is_null( $this->_flyBehavior ) && file_exists( LIBPATH . $this->_pattern . $this->_flyBehavior . EXT ))
        {
            require_once( LIBPATH . $this->_pattern . $this->_flyBehavior . EXT );
            $this->_flyBehaviorInstance = new $this->_flyBehavior;
        }

        if( ! is_null( $this->_quackBehavior) && file_exists( LIBPATH . $this->_pattern . $this->_quackBehavior . EXT ))
        {
            require_once( LIBPATH . $this->_pattern . $this->_quackBehavior . EXT );
            $this->_quackBehaviorInstance = new $this->_quackBehavior;
        }

    }

    public function performFly()
    {
        if(is_object($this->_flyBehaviorInstance))
            echo $this->_flyBehaviorInstance->fly();
        else
            echo 'not sure - no implementation!';
    }

    public function performQuack()
    {
        if(is_object($this->_quackBehaviorInstance))
            echo $this->_quackBehaviorInstance->quack();
        else
            echo 'not sure - no implementation!';
    }

    public function setFlyBehavior( $behavior )
    {
        if( in_array($behavior, $this->_flyBehaviors))
        {
            $this->_flyBehavior = $behavior;

            if( ! class_exists($this->_flyBehavior))
                require_once( LIBPATH . $this->_pattern . $this->_flyBehavior . EXT );

            $this->_flyBehaviorInstance = new $this->_flyBehavior;
        }
    }
    
    public function setQuackBehavior( $behavior )
    {
        if( in_array($behavior, $this->_quackBehaviors))
        {
            $this->_quackBehavior = $behavior;

            if( ! class_exists($this->_quackBehavior))
                require_once( LIBPATH . $this->_pattern . $this->_quackBehavior . EXT );

            $this->_quackBehaviorInstance = new $this->_quackBehavior;
        }
    }
}