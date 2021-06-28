<script>
    $(document).ready(function()
    {
        // ajax loading effect
        $(document).on({
            ajaxStart: function() { $("body").addClass("loading");    },
            ajaxStop: function() { $("body").removeClass("loading"); }    
        });

        // ajax call
        $('.add_to_cart_ajax').on('click', function()
        {
            // $("#loading").show();

            clickedElemet = $(this); 

            food_id = $(this).data('food-id');

            url = '/add_to_cart/'+food_id;

            $.get(url, function(data){

                console.log(data);

                clickedElemet.off('click');

                clickedElemet.attr("class", "fa fa-check");

                clickedElemet.parent().css("background-color" , "#58D68D");

                clickedElemet.parent().attr("title" , "Already added to cart");

                $('.food-count').html(data.food_count);

                $('.food-total-price').html('$'+data.food_total_price);

                // $("#loader-gif").hide();
            });  
        });
    });
</script>