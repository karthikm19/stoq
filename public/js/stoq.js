$(document).ready(function() {
    var $checkPriceButton = $('.check-price-button');
    var $resultContainer = $('.result-container');
    var $priceDetails = $('.stock-price-details');
    var $loadingContainer = $('.loading-container');

    $('.check-price-form').on('submit', function(e){
        e.preventDefault();
        
        $checkPriceButton.attr("disabled", true);
        $resultContainer.addClass('hidden');
        $loadingContainer.removeClass('hidden');
    
        $.ajax({
            url: '/stoq/check-price',
            type: "post",
            data: {symbol: $('.check-price-form #StockSymbol').val()},
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function(response){

                $table = $('<table>');

                $.each(response, function(i, item) {
                    $table.append(
                        $('<tr>').append(
                            $('<td>').text(i),
                            $('<td>').text(item)
                        )
                    );
                });

                $priceDetails.html($table);


                $resultContainer.removeClass('hidden');
                $checkPriceButton.removeAttr("disabled");
                $loadingContainer.addClass('hidden');
            },
            error: function() {
                $priceDetails.text("An error occured while processing your request. Please try again!");
                $checkPriceButton.removeAttr("disabled");
                $loadingContainer.addClass('hidden');
            }
        });
    });
});