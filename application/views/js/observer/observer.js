/*******************************************************************************
 * Create an observer and subject that inherit from their respective interfaces
 * that listen for the DOM changes and respond. 
 *  - allow regsitration with the subject
 *  - allow multiple observers
 *  - give get() methods to the observers so that they can respond to the 
 *    subjects notifications (pull)
 *  - modify this to a push scenario if required. 
 *  ----------------------------------------------------------------------------
 *  - Maybe time to set up the doc ready method? 
 ******************************************************************************/
function documentObserver ( F ) {
    this.state = (function(){
        return document.onreadystatechange = (function(){
            return document.readyState;
        }());
    }());

    if( this.state !== 'complete') {
        setTimeout(function(){ documentObserver( F ); },0); 
    }
    else {
        if( !! F ) F();
    }
    return this;
}

//subject interface   
function Subject () {
    'use strict';
    //instance properties
    this.changed = false;
    this.observers = [];
    this.temperature = 0;
    this.humidity = 0;
    this.pressure = 0;
    this.changed = false;
    //instance methods
    this.measurementsChanged = function(){
        this.changed = true;
        this.notifyObservers();
    };

    this.setMeasurements = function( temp, humidity, pressure ){
        this.temperature = temp;
        this.humidity = humidity;
        this.pressure = pressure;
    };

    this.getTemperature = function() {
        return this.temperature;
    };

    this.getHumidity = function() {
        return this.humidity;
    };

    this.getPressure = function() {
        return this.pressure;
    };

    this.setChanged = function(){
        this.changed = true;
    }; 
}
//shared prototype method that talks to the instance properties
Subject.prototype.registerObserver = function( observer ){
    if( this.observers.indexOf( observer) < 0) this.observers.push( observer );
};
//shared prototype method that talks to the instance properties
Subject.prototype.removeObserver = function( observer ) {
    if( this.observers.indexOf( observer) >= 0) this.observers.pop( observer );
}
//shared prototype method that talks to the instance properties
Subject.prototype.notifyObservers = function(){
    for(var i=0, n=this.observers.length; i<n; n++) {
        this.observers[i].update();
    }
    this.changed = false;
};
  
//subject implementation (WeatherData = instance of Subject) 
var weatherData = new Subject();

//observer interface 
function observer ( weatherData ) {
    this.temperature = null;
    this.humidity = null;
    this.pressure = null;
    this._init = function(){
        weatherData.registerObserver( this );
    };
    this._init();
    this.update = function(){
        this.temperature = weatherData.temperature;
        this.humidity = weatherData.humidity;
        this.pressure = weatherData.pressure;
        return this;
    };
}

//observer implementation (currentConditions)  
currentConditions = new observer( weatherData );
currentConditions.display = function(){
    var output = document.querySelector('#js_output code');
    var element = document.createElement('span');
    var text = document.createTextNode('Current conditions: ' + this.temperature + 'F and ' + this.humidity + '% humidity |');
    element.appendChild(text);
    output.insertBefore(element, null);
};
//observer implementation (statisticsDisplay)
statisticsDisplay = new observer( weatherData );
statisticsDisplay.display = function(){
    var output = document.querySelector('#js_output code');
    var element = document.createElement('span');
    var text = document.createTextNode(' Avg/Max/Min temperature = ' + this.temperature + '/' + this.temperature + '/' + this.temperature + ' |');
    element.appendChild(text);
    output.insertBefore(element, null);
};           
//observer implementation (forecastdisplay)
forecastdisplay = new observer( weatherData );
forecastdisplay.display = function(){
    var output = document.querySelector('#js_output code');
    var element = document.createElement('span');
    var text = document.createTextNode(' Chillin');
    element.appendChild(text);
    output.insertBefore(element, null);
};

documentObserver(function(){
    var 
      temperature = document.querySelector('input[name=temperature]').value,
      humidity = document.querySelector('input[name=humidity]').value,
      pressure = document.querySelector('input[name=pressure]').value;

    weatherData.setMeasurements( temperature, humidity, pressure );

    currentConditions.update().display();
    statisticsDisplay.update().display();
    forecastdisplay.update().display();
});

