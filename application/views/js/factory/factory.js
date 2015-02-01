(function(){
    //constructor (abstract) PizzaStore
    function PizzaStore ( name ) {
        if( ! (this instanceof PizzaStore)) return new PizzaStore( name );
        this.name = name;
        this.explanation = [];

        this.createPizza = function( type ){
            this.pizza = new Pizza( type );        
        };
        this.orderPizza = function( type ){
            this.createPizza( type );
            this.explanation.push( this.pizza.prepare() );
            this.explanation.push( this.pizza.bake() );
            this.explanation.push( this.pizza.cut() );
            this.explanation.push( this.pizza.box() );
        };
    }

    //constructor (abstract) Pizza
    function Pizza( name ) {
        if( ! (this instanceof Pizza)) return new Pizza();
        this.name = name || 'NYStyleCheesePizza';
        this.dough;
        this.sauce;
        this.toppings = [];
        //restrict types
        this.types = [
            'NYStyleCheesePizza',
            'NYStylePepperoniPizza',
            'ChicagoStyleCheesePizza'
        ];

        this.prepare = function() {
            return 'who am I? I\'m a ' + this.name + ' Pizza';
        };
        this.bake = function() {
            return this.name + ' pizza\'s need to be baked for around 20 mins on high';
        };
        this.cut = function() {
            return 'Always cut a ' + this.name + ' Pizza into diagonal slices';
        };
        this.box = function() {
            return 'Boxes for all Pizzas world-wide are the same - so just box me!';
        };
    }
    //grab data for instantiating our factory etc.
    var store = document.querySelector('[data-store]').getAttribute('data-store');
    var PStore = new PizzaStore(store);
    var choice = document.querySelector('select[name=data]').value;
    PStore.orderPizza( choice );
    for( var i=0, l=PStore.explanation.length; i<l; i++)  document.write( PStore.explanation[i] + '<br />');
}());