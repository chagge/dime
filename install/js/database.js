/**
 *   Database checking stuff
 */
listen('database', function() {
    var fields = $('#database input');
    var button = $('#database button');
    
    var passed = {};
    var check = function() {
        var me = $(this);
        var field = me.attr('id');
        var data = me.val();
        
        var checks = {
            db_host: function(data) {
                $.ajax({
                    url: data, // + ':3306',
                    complete: function(res) {
                        if(res.statusText.toLowerCase() == 'ok') {
                            return passed['db_host'] = data;
                        }
                        
                        return passed['db_host'] = false;
                    }
                });
            },
            
            username: function(data) {
                if(data.length > 0 && data.length <= 16) {
                    return passed['username'] = data;
                }
                
                passed['username'] = false;
            },
            
            password: function(data) {
                //  Nothing to validate, they can even be empty.
                //  Damn passwords.
                return passed['password'] = data;
            },
            
            name: function(data) {
                if(data.length > 0) {
                    return passed['name'] = data;
                }
            }
        };
        
        if(checks[field]) {
            checks[field](data);
        }
    };
    
    fields.each(check).keyup(check);
    
    var pass = function() {
        button.removeClass('secondary').removeAttr('disabled')
              .prev().removeClass('spinner failure').addClass('success').text('All good!');
    };
    
    var fail = function(msg) {
        //  Remove quotes
        msg = msg.substr(1);
        msg = msg.substr(msg.length - 1);
        
        button.addClass('secondary').attr('disabled', 'disabled')
              .prev().removeClass('spinner success').addClass('failure').text(msg);
    };
    
    //  Check every second for working database
    var interval = setInterval(function() {
        var good = 0;
        $.each(passed, function(a,b,c) {
            if(b !== false) good++;
        });
        
        if(good > 3) {
            $.ajax({
                url: '?checkDatabase',
                data: passed,
                complete: function(data) {
                    //  Stupid JSON
                    if(data.response == 'true') {
                        return pass();
                    }
                    
                    return fail(data.response);
                }
            });
        }
    }, 2000);
});