<li><a ><i data-food-id={{ $food->id }} class="fa fa-heart"></i></a></li>
                                                    
@if (Session::has('food_ids') && in_array($food->id, Session::get('food_ids',[])))

    <li><a style="background-color: #58D68D !important" title="Already added to cart"><i data-food-id={{ $food->id }} class="fa fa fa-check"></i></a></li>
    
@else

    <li><a><i data-food-id={{ $food->id }} class="fa fa-shopping-cart cart add_to_cart_ajax"></i></a></li>

@endif
