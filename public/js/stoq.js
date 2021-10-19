$(document).ready(function() {
    var $checkPriceButton = $('.check-price-button');
    var $resultContainer = $('.result-container');
    var $priceDetails = $('.stock-price-details');
    var $loadingContainer = $('.loading-container');

    $('.check-price-form').on('submit', function(e){
        e.preventDefault();
        
        $checkPriceButton.attr("disabled", true);
        $loadingContainer.removeClass('hidden');
    
        $.ajax({
            url: '/stoq/check-price',
            type: "post",
            data: {symbol: 'AMZN'},
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function(response){
                $priceDetails.text(response.price);
                $resultContainer.removeClass('hidden');
                $checkPriceButton.removeAttr("disabled");
                $loadingContainer.addClass('hidden');
            }
        });
    });
});