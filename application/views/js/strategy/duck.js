/*******************************************************************************
 * Create an abstract Duck class and encapsulate the behaviours of various 
 * duck types. 
 ******************************************************************************/
(function(){
    function Duck( name ){
        if( ! (this instanceof Duck)) return new Duck( name );
        this.name = name;
        this.flyBehavior = null;
        this.quackBehavior = null;
        this.fly = function( flyBehavior ) {
            this.flyBehavior = flyBehavior();
        }
        this.quack = function( quackBehavior ) {
            this.quackBehavior = quackBehavior();
        }
    }



    mallardDuck = new Duck('mallardDuck');
    mallardDuck.fly(function(){
        return 'FlyWithWings';
    });
    mallardDuck.quack(function(){
        return 'squeak';
    });

    // mallardDuck.prototype.
    for( var p in mallardDuck ) document.write( mallardDuck.constructor.name + ' -> ' + mallardDuck.name + ' -> ' + p + ' -> ' + mallardDuck[p] + '<br />');
}());