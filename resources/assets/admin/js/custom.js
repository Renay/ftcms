$(function() {

    $('#side-menu').metisMenu();
    $('nav').niceScroll({
        cursorcolor: "#e0e0e0",
        cursorborder: "0px solid",
        cursoropacitymax: 0.8,
        cursorwidth: '7px',
        cursorborderradius: '0%'
    });

});

//Loads the correct sidebar on window load,
//collapses the sidebar on window resize.
// Sets the min-height of #page-wrapper to window size
$(function() {
        $(window).bind('load resize', function() {
            topOffset = 50;
            width = (this.window.innerWidth > 0) ? this.window.innerWidth : this.screen.width;
            if (width < 940) {
                $('body').removeClass('cbp-spmenu-push');
                $('nav.cbp-spmenu').addClass('cbp-spmenu-open');
                if (width < 768) {
                    $('nav.cbp-spmenu').removeClass('cbp-spmenu-open');
                    $('div.navbar-collapse').addClass('collapse');
                    topOffset = 100; // 2-row-menu
                } else {
                    $('div.navbar-collapse').removeClass('collapse');
                }
            } else {
                $('body').addClass('cbp-spmenu-push');
                $('nav.cbp-spmenu').removeClass('cbp-spmenu-open')
            }

            height = ((this.window.innerHeight > 0) ? this.window.innerHeight : this.screen.height) - 1;
            height = height - topOffset;
            if (height < 1) height = 1;
            if (height > topOffset) {
                $("#page-wrapper").css("min-height", (height) + "px");
            }
    });

    $('ul.nav a').on('click', function(e) {
        e.preventDefault();

        if ($(this).parent().find('ul').length > 0) {
            return false;
        }

        return window.location.href = $(this).attr('href');
    });

    var url = window.location.href.toString();
    var element = $('ul.nav a').filter(function() {
        return this.href === url;
    }).addClass('active').parent().parent().addClass('in').parent();

    if (element.is('li')) {
        element.addClass('active');
    }
});
