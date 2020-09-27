'use strict';

var perfEntries = performance.getEntriesByType("navigation");

if (perfEntries[0].type === "back_forward") {
    location.reload(true);
}

$(function () {
    ///////////////////////
    $('.minus').click(function () {
        var $input = $(this).parent().find('input');
        if ($input.val() <= 1) {
            return false;
        }
        var count = parseInt($input.val()) - 1;
        count = count < 1 ? 1 : count;
        $input.val(count);
        $input.change();
        return false;
    });
    /////////////////////////////
    $('.plus').click(function () {
        var $input = $(this).parent().find('input');
        $input.val(parseInt($input.val()) + 1);
        $input.change();
        return false;
    });
    ////////////////////////////////////
    $('a.add-to-cart').on('click', function (e) {
        e.preventDefault();
        var that = $(this);
        var url = that.attr('href');
        $.ajax({
            url: url,
            method: 'get',
            success: function (response) {
                if (Number(response)) {
                    $('#mini-cart span').text(response);
                    $("#alert").slideDown().removeClass().addClass('alert alert-success').text('The product was added successfully');
                } else {
                    $("#alert").slideDown().removeClass().addClass('alert alert-danger').text('The action could not be copmlated');
                }
            }

        }).fail(function () {
            $("#alert").slideDown().removeClass().addClass('alert alert-danger').text('The action could not be completed.');
        }).always(function () {
            window.setTimeout(function () {
                $("#alert").slideUp();
            }, 3000);
        });
    });
    //////////////////////////////////////////////////

    $('#add-to-cart').on('submit', function (e) {

        e.preventDefault();
        var that = $(this),
            url = that.attr('action'),
            data = that.serialize();
        $.post(url, data, function (response) {


            if (Number(response)) {
                $('#mini-cart span').text(response);
                $("#alert").slideDown().removeClass().addClass('alert alert-success').text('The product was added successfully');
            } else {
                $("#alert").slideDown().removeClass().addClass('alert alert-success').text('The action could not be copmlated');
            }

        }).fail(function () {
            $("#alert").slideDown().removeClass().addClass('alert alert-danger').text('the action culd not complated');
        }).always(function () {
            window.setTimeout(function () {
                $("#alert").slideUp();
            }, 3000);
        });
    });
    //////////////////////////

    $('.cart').on('click', function () {
        var that = $(this);
        var miniCart = that.find('mini-cart');
        if (that.hasClass('open')) {
            that.removeClass('open');
            miniCart.slideUp();
            return;
        }

        $.get('func/process-cart.php?mini_cart', function (response) {
            that.addClass('open');
            miniCart.slideDown();
            if (response) {
                var miniCartDOM = createMiniCart(JSON.parse(response));
                miniCart.html(miniCartDOM);
            } else {
                miniCart.html('<p>Your cart is empty</p>');
            }

        });
    });

    $('.product-quantity').on('change', debounce(function () {
        var that = $(this),
            parent = that.parents('.update-cart'),
            url = parent.attr('action'),
            data = parent.serialize();

        $.post(url, data, function (response) {
            // JSON.parse(response);

            if (Number(response.cart_count)) {
                $('#mini-cart span').text(response.cart_count);
                $("#alert").slideDown().removeClass().addClass('alert alert-success').text('The cart was updated successfully');
                that.parents('tr').find('.product-total').text(response.product_total);
                $('.cart-total').text(response.cart_total);

            } else {
                $("#alert").slideDown().removeClass().addClass('alert alert-success').text('The action could not be copmlated');
            }

        }, 'json').fail(function () {
            $("#alert").slideDown().removeClass().addClass('alert alert-danger').text('the action could not complated');
        }).always(function () {
            window.setTimeout(function () {
                $("#alert").slideUp();
            }, 3000);
        });
    }, 500));

    $('a.delete-product').on('click', function () {
        return confirm('Are sure you want to delet this product');

    });
    $('a.delete-cart').on('click', function () {
        return confirm('Are sure do  you want to delet cart content');

    });

    $('.open-modal').on('click', function () {
        var that = $(this),
            id = that.data('id');
        var form = $('#delete-form'),
            name = that.data('name'),
            route = form.data('route');
        form.attr('action', route + '/' + id);
        $('#confirmModal .modal-body').text('Are you sure that you want to delete ' + name);
    });

    /*  $('body').on('keyup', '#serachpro', function () {
         var searchPro = $(this).val()
         console.log(searchPro);
         $.ajax({
             method: 'post',
             url: "{{route('autocomplete')}}",
             data: {
                 '_token': '{{ csrf_token() }}',
                 searchPro: searchPro,

                 success: function (res) {
                     console.log(res);
                 }
             }


         }); */
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('body').on('keyup', '#searchp', function () {
        var searchPro = $("#serachpro").val();
        console.log(searchPro);
        $.ajax({
            type: "POST",
            url: "autocomplete",
            data: {searchPro:searchPro} ,

            success: function (res) {
                console.log(res);
                $('#list-search').html(res);
            }
        });
       $(document).on('click', 'li', function(){
            // declare the value in the input field to a variable
            var value = $(this).text();
            console.log(value);
            // assign the value to the search box
            $('#searchp').val('value');
            // after click is done, search results segment is made empty
            $('#list-search').html("");
        });
        /*  $.post('autocomplete', {searchPro : searchPro}, function (data) {
             console.log(data);
             $("#printsearc").html(data);
         }); */
    })

    function debounce(func, wait, immediate) {
        var timeout;
        return function () {
            var context = this, args = arguments;
            var later = function () {
                timeout = null;
                if (!immediate)
                    func.apply(context, args);
            };
            var callNow = immediate && !timeout;
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
            if (callNow)
                func.apply(context, args);
        };
    }
});
