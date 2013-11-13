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
        me.css({
            marginTop: -(me.height() / 2 - 30),
            left: (me.index() * 100 - 150) + '%'
        });
    });
    
    /**
     *   Slidey slidey!
     */
    var arrow = $('.arrow');
    var header = $('#global').addClass('hidden');
        
    arrow.click(function() {
        var panel = $(this).parents('.wrapper');
        var next = panel.next();
        var id = next.attr('id');
        
        if(!next.length) {
            return true;
        }
        
        header.removeClass('hidden')
              .find('.' + next.attr('id')).addClass('current')
              .prev().removeClass('current').addClass('elapsed');
        
        next.animate({left: '50%'}, 1000, easing, function() {
            next.find('input').first().focus();
            listen(id);
        });
        
        setTimeout(function() {
            panel.animate({left: '-50%'}, 1000, easing);
        }, 150);
        
        return false;
    });
});