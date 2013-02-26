//Setup Page
$(document).ready(function () {
    /* smooth-scroll */
    $("ul#navigation a").smoothScroll({
        afterScroll: function () {
            $('ul#navigation a.active').removeClass('active');
            $(this).addClass('active');
        }
    });

    /* Menu - Highlight Active */
    $('div.page').waypoint(function () {
        var id = $(this).attr('id');

        $('ul#navigation a.active').removeClass('active');
        $('ul#navigation a[href="#' + id + '"]').addClass('active');
    });

    // Fix for first menu item
    $(window).scroll(function () {
        if ($(window).scrollTop() === 0) {
            $('ul#navigation a.active').removeClass('active');
            $('ul#navigation a[href="#about"]').addClass('active');
        } else if ($(window).height() + $(window).scrollTop() === $('#container').height()) {
            $('ul#navigation a.active').removeClass('active');
            $('ul#navigation a[href^="#"]:last').addClass('active');
        }
    });

    // Portfolio Tabs
    $(function () {
        $("#tabs").tabs();
    });

    //      First Selector
    $('.tab').each(function () {
        $(this).find('ul > li:first').addClass('active');
        $(this).find('div.tab_container > div:first').addClass('active');
    });


    //      Data Filter
    var $container = $('div#works').isotope({
        itemSelector: 'img.work',
        layoutMode: 'fitRows'
    });

    $('#works_filter a').click(function () {
        var selector = $(this).attr('data-filter');
        $('#works').isotope({
            filter: selector,
            itemSelector: '.work',
            layoutMode: 'fitRows'
        });

        $('#works_filter').find('a.selected').removeClass('selected');
        $(this).addClass('selected');

        return false;
    });

    // Smooth Scroll - gototop link
    $('.gotop').addClass('hidden');
    $("a.gotop").smoothScroll();

    $('#wrap').waypoint(function (event, direction) {
        $('.gotop').toggleClass('hidden', direction === "up");
    }, {
        offset: '-10%'
    });

    // websnapr + qtip
    var apiKey = '490r4B2iA2C0';
    $('#tab-detail a').each(function () {
        // Grab the URL from our link
        var url = encodeURIComponent($(this).attr('href')),

        // Create image thumbnail using Websnapr thumbnail service
        thumbnail = $('<img />').attr({
            src: 'http://images.websnapr.com/?url=' + url + '&key=' + apiKey + '&hash=' + encodeURIComponent(websnapr_hash),
            alt: 'Loading thumbnail...',
            width: 202,
            height: 152
        });

        // Setup the tooltip with the content
        $(this).qtip(
        {
            content: thumbnail,
            position: {
                corner: {
                    tooltip: 'bottomMiddle',
                    target: 'topMiddle'
                }
            },
            style: {
                tip: true, 
                name: 'light',
            }
        });
    });
});
