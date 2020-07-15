'use strict';
;

$(document).ready(function () {
    $('.minus').click(function () {
        var $input = $(this).parent().find('input');
        var count = parseInt($input.val()) - 1;
        count = count < 1 ? 1 : count;
        $input.val(count);
        $input.change();
        return false;
    });

    $('.plus').click(function () {
        var $input = $(this).parent().find('input');
        $input.val(parseInt($input.val()) + 1);
        $input.change();
        return false;
    });

    $('a.add-to-cart').on('click', function (e) {
        e.preventDefault(e);
        var that = $(this);
        var url = that.attr('href');
        
        $.ajax({
            url: url,
            method: 'get',
            success: function (response) {
                if (Number(response)){
                    $('#mini-cart span').text(response);
                }
            }
            
        });
    });

});