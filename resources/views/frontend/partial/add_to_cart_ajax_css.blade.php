<style>
        /* Start by setting display:none to make this hidden.
    Then we position it in relation to the viewport window
    with position:fixed. Width, height, top and left speak
    for themselves. Background we set to 80% white with
    our animation centered, and no-repeating */
    .modal {
        display:    none;
        position:   fixed;
        z-index:    1000;
        top:        0;
        left:       0;
        height:     100%;
        width:      100%;
        background: rgba( 255, 255, 255, .8 ) 
                    url("{{ asset('ui/frontend/img/cart.gif') }}") 
                    50% 50% 
                    no-repeat;
    }

    /* When the body has the loading class, we turn
    the scrollbar off with overflow:hidden */
    body.loading .modal {
        overflow: hidden;   
    }

    /* Anytime the body has the loading class, our
    modal element will be visible */
    body.loading .modal {
        display: block;
    }
</style>