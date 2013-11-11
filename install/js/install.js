$(function() {
    //  Keep a copy of all our panels
    var panels = $('.wrapper');
    
    //  Used for Zepto easing. Yay for CSS3.
    var easing = 'cubic-bezier(.7,-.5,.25,1.3)';
    
    //  Set a default intro panel
    var activePanel = 'intro';
    
    /**
     *   Stop pesky scrollbars
     */
    $('html, body').css('overflow', 'hidden');
    
    /**
     *   Make sure each panel is vertically aligned
     */
    panels.each(function() {
        //  Store the panel as a variable
        var me = $(this);
        
        //  Set the height right
        me.css('margin-top', -(me.height() / 2));
    });
    
    /**
     *   Slidey slidey!
     */
    var arrow = $('.arrow');
    
    arrow.click(function() {
        var panel = $(this).parents('.wrapper');
        var next = panel.next();
        
        if(!next.length) {
            return true;
        }
        
        next.animate({
            left: ((next.index() + 1 * 50)) + '%'
        }, 1000, easing, function() {
            activePanel = next.attr('id');
            
            listen(activePanel);
        });
        
        setTimeout(function() {
            panel.animate({
                left: ((panel.index() + 1 * 50) - 100) + '%'
            }, 1000, easing);
        }, 150);
        
        return false;
    });
    
    /**
     *   Database checking stuff
     */
    listen('database', function() {
        var fields = $('#database input');
        var passed = {};
        var check = function(field, data) {
            var checks = {
                host: function(data) {
                    $.ajax({
                        url: data, // + ':3306',
                        complete: function(res) {
                            //  Check we're not returning any 400/500 errors
                            if(res.statusText[0] !== 4 || res.statusText[0] !== 5) {
                                return passed['host'] = true;
                            }
                        }
                    });
                },
                
                name: function(data) {
                    if(data.length > 0 && data.length <= 16) {
                        return passed['name'] = true;
                    }
                },
                
                password: function(data) {
                    //  Nothing to validate, they can even be empty.
                    //  Damn passwords.
                    return passed['password'] = true;
                }
            };
            
            if(checks[field] && typeof passed[field] == 'undefined') {
                checks[field](data);
            }
        };
        
        fields.keyup(function() {
            var me = $(this);
            check(me.attr('id'), me.val());
        });
    });
});