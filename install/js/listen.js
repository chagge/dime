/**
 *   Mini custom event register-er
 *   Allows you to bind and call any named event whenever you want
 *
 *   To set it up, you just call the event name and a callback
 *   function. You can name the event anything, I ain't fussy.
 *
 *   listen('alright stop collaborate and', function() {
 *       alert('ice is back!');
 *   });
 *
 *   To make this actually do something, just call the same event
 *   name without a callback, which will fire off any events
 *   with the same name. This is handy to use with, say, AJAX
 *   callbacks or click functions or something else handy.
 *
 *   listen('alright stop collaborate and'); // -> ice is back!
 */

function listen(panel, callback) {
    //  Add callback to the register
    if(callback) {
        if(!this.callbacks) {
            this.callbacks = [];
        }
        
        return this.callbacks[panel] = callback;
    }
    
    //  And call back when it's "activated"
    $.isFunction(this.callbacks[panel]) && this.callbacks[panel]();
};