;(function($) {

    $(document).ready(function() {

        // Tell our app the selected plan.
        var $btn = $('.btn-plan.lightbox'),
            $plan_input = $('input[name="plan"]');
        $btn.click(function() {
            $plan_input.val( $(this).parents('.column').data('plan') );
        });


        // Before any kind of submission, combine form data and make a call.
        $('.billing-form').submit(function(e) {

            var $form = $(this),
                action = $(this).attr('action');

            $form.find('.payment-errors').text('');

            // Disable the submit button to prevent repeated clicks
            $form.find('input[type="submit"]').prop('disabled', true);

            e.preventDefault();

            var data = $form;
            Stripe.card.createToken(data, stripeResponseHandler);

        });

        var stripeResponseHandler = function(status, response) {

            var $form = $('.billing-form');

            if (response.error) {
                // Show the errors on the form
                $form.find('.payment-errors').text(response.error.message).show();
                $form.find('input[type="submit"]').prop('disabled', false);
            } else {
                // token contains id, last4, and card type
                var token = response.id;
                // Insert the token into the form so it gets submitted to the server
                $form.append($('<input type="hidden" name="stripeToken" />').val(token));
                // and submit
                $('.shipping-info :input').not(':submit').clone().hide().attr('isacopy','y').appendTo($form)
                $form.get(0).submit();
            }
        };

    });
    
    // See if user exists by email
    // using an AJAX call
    var EmailCheck = {
        init: function() {
            this.checked = false;
            this.$field = $('.required-email');
            this.bindEvents();
        },
        bindEvents: function() {
            var _self = this;
            this.$field.blur(function() {
                if ( ! _self.checked && this.value !== '') {
                    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                    if(re.test(this.value)) {
                        $.ajax('/email', {
                            data: {
                                'email' : this.value
                            },
                            dataType: 'json',
                            success: function(response) {
                                if(response.count) {
                                    $msg = $('<div class="field-error-message">The email address is taken.</div>');
                                    $msg.insertBefore(_self.$field);
                                }
                            }
                        });
                    }
                }
            });
            this.$field.focus(function() {
                $(this).prevAll('.field-error-message').remove();
            });
        }
    };
    EmailCheck.init();


    if($('.billing-form').length > 0)
    {
        // Shipping and Billing Name Field
        var $stripeShippingName = $('.shipping-form [name="name"]'),
            $fname = $('[name="f-name"]'),
            $lname = $('[name="l-name"]');
        // Populate the visible fields if we have them
        var firstName = $stripeShippingName.val().substring(0, $stripeShippingName.val().search(' '));
        var lastName = $stripeShippingName.val().substring( $stripeShippingName.val().search(' ') + 1 );
        $fname.val(firstName);
        $lname.val(lastName);
        // Listen for blur events
        $fname.add($lname).blur(function() {
            $stripeShippingName.val( $fname.val() + ' ' + $lname.val() );
        });

        // Setup vars for billing name
        var $stripeBillingName = $('.billing-form [name="name"], .billing-form [name="stripeBillingName"]'),
            $fname1 = $('[name="f-name1"]'),
            $lname1 = $('[name="l-name1"]');
        // Populate the visible fields if we have them
        var firstName = $stripeBillingName.val().substring(0, $stripeBillingName.val().search(' '));
        var lastName = $stripeBillingName.val().substring( $stripeBillingName.val().search(' ') + 1 );
        $fname1.val(firstName);
        $lname1.val(lastName);
        // Listen for blur events
        $fname1.add($lname1).blur(function() {
            $stripeBillingName.val( $fname1.val() + ' ' + $lname1.val() );
        });
    }

    $('.update').click(function() {
        $(this).next('form').show(250);
        $(this).hide();
    });

    $('.close').click(function() {
        $(this).parents('form').hide(250);
        $(this).parents('form').siblings('.update').show();
    });

    $('.fancybox').fancybox({ showCloseButton: true });

    $('.go-back').click(function(e) {
        $.fancybox.close();
        e.preventDefault();
    });

})(jQuery);