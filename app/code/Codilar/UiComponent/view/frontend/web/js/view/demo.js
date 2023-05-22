define([
    'uiComponent',
    'ko'
],function(uiComponent,ko){
    return uiComponent.extend({
        _currentTime:ko.observable("Loading..."), //set initial time value
        initialize:function(){
            this._super();
            setInterval(this.updateTime.bind(this),1000); // update time every second
        },
        getTime:function(){
            return this._currentTime;
        },
        updateTime:function (){
            this._currentTime(new Date());
        }
     });
    });
