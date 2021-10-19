$(document).ready(function() {
    $('.check-price-form').on('submit', function(e){
        e.preventDefault();

        $.ajax({
            url: '/stoq/check-price',
            type: "post",
            data: {symbol: 'AMZN'},
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function(response){
                $('.stock-price-details').text(response.msg);
            }
        });
    });
});