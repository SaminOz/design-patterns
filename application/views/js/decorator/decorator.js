(function(){
    
    /**
     * Decorator Pattern
     *  - abstract base class is extended by a concrete class
     *  - same abstract base class is extended by an abstract decorator class
     *  - abstract decorator classes are extended by concrete decorator classes. 
     */
    
    var prices = {
        'Espresso': 1.99,
        'House Blend': .89,
        'Dark Roast': .99,
        'Decaf': 1.05,
        'Mocha': .20,
        'Soy': .15,
        'Steamed Milk': .10,
        'Whip': .10
    };

    //prototype (abstract) of beverage
    function Beverage( type, price ) {
        if( !(this instanceof Beverage)) return new Beverage(type);
        this.description = [];
        this.description.push(type);
        this.price = [];
        this.price.push(price);
        this.getDescription = function(){
            return this.description.join('*');
        };
        this.cost = function(){
            return this.price.reduce(function(p,c){ return p+c});
        };
    }

    //prototype (abstract) of condiment
    function Decorator ( condiment, beverage, price ) {
        if( !(this instanceof Decorator)) return new Decorator(condiment, beverage, price);
        this.description = beverage.description || [];
        this.price = beverage.price || [];
        this.beverage = beverage || null;
        this.description.push(condiment);
        this.price.push(price);
        this.getDescription = function (){
            return this.description.join('*') + ' ' + this.cost();
        };
        this.cost = function(){
            return this.price.reduce(function(p,c){ return p+c});
        };
    }

    var selected = document.querySelector('[data-beverage]').getAttribute('data-beverage');
    var espresso = new Beverage( selected, prices[selected] ); //+price!
    var mocha = new Decorator( 'Mocha', espresso, .20 );
    var mocha2 = new Decorator( 'Mocha', mocha, .20 );    
    var soy = new Decorator('Soy', mocha2, .15);
    var steamedMilk = new Decorator('Steamed Milk', soy, .10);
    var whip = new Decorator('Whip', steamedMilk, .10);


    document.write('<code>' + whip.getDescription() + '</code>');

}());