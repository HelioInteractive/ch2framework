document.body.classList.add('js');

jQuery(document).ready(function () {
    var grid = '\n' +
        '\n' +
        '<div class="ch2-grid container">\n' +
        '    <div class="row">\n' +
        '\n' +
        '        <div class="col col-sm-1">\n' +
        '            <div class="the-stuff">\n' +
        '            </div>\n' +
        '        </div>\n' +
        '        <div class="col col-sm-1">\n' +
        '            <div class="the-stuff">\n' +
        '            </div>\n' +
        '        </div>\n' +
        '        <div class="col col-sm-1">\n' +
        '            <div class="the-stuff">\n' +
        '            </div>\n' +
        '        </div>\n' +
        '        <div class="col col-sm-1">\n' +
        '            <div class="the-stuff">\n' +
        '            </div>\n' +
        '        </div>\n' +
        '        <div class="col col-sm-1">\n' +
        '            <div class="the-stuff">\n' +
        '            </div>\n' +
        '        </div>\n' +
        '        <div class="col col-sm-1">\n' +
        '            <div class="the-stuff">\n' +
        '            </div>\n' +
        '        </div>\n' +
        '        <div class="col col-sm-1">\n' +
        '            <div class="the-stuff">\n' +
        '            </div>\n' +
        '        </div>\n' +
        '        <div class="col col-sm-1">\n' +
        '            <div class="the-stuff">\n' +
        '            </div>\n' +
        '        </div>\n' +
        '        <div class="col col-sm-1">\n' +
        '            <div class="the-stuff">\n' +
        '            </div>\n' +
        '        </div>\n' +
        '        <div class="col col-sm-1">\n' +
        '            <div class="the-stuff">\n' +
        '            </div>\n' +
        '        </div>\n' +
        '        <div class="col col-sm-1">\n' +
        '            <div class="the-stuff">\n' +
        '            </div>\n' +
        '        </div>\n' +
        '        <div class="col col-sm-1">\n' +
        '            <div class="the-stuff">\n' +
        '            </div>\n' +
        '        </div>\n' +
        '\n' +
        '    </div>\n' +
        '</div>\n' +
        '<div class="grid-debug-button"></div>';
    jQuery("body").append(jQuery(grid));
    //jQuery('body').addClass('grid-on');
    jQuery('.grid-debug-button').click(function () {
        jQuery('body').toggleClass('grid-on');
    });
});