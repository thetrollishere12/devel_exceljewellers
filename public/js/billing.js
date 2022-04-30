$('.shopping-cart-container').delay(150).slideDown();

$('main h2').delay(150).fadeIn();

var elements = stripe.elements();

var style = {
    base: {
        fontWeight: 400,
        fontFamily: 'Roboto, Open Sans, Segoe UI, sans-serif',
        fontSize: '13px',
        lineHeight: '1.4',
        color: '#555',
        backgroundColor: '#fff',
        '::placeholder': {
            color: '#888',
        },
    },
    invalid: {
        color: '#eb1c26',
    }
};

var cardElement = elements.create('cardNumber', {
    style: style
});
cardElement.mount('#card_number');

var exp = elements.create('cardExpiry', {
    'style': style
});
exp.mount('#card_expiry');

var cvc = elements.create('cardCvc', {
    'style': style
});
cvc.mount('#card_cvc');

// Validate input of the card elements
var resultContainer = document.getElementById('paymentResponse');
cardElement.addEventListener('change', function(event) {
    if (event.error) {
        resultContainer.innerHTML = '<p>'+event.error.message+'</p>';
    } else {
        resultContainer.innerHTML = '';
    }
});

// Get payment form element
var form = document.getElementById('paymentFrm');

// Create a token when the form is submitted.
form.addEventListener('submit', function(e) {
    e.preventDefault();
    createToken();
});

// Create single-use token to charge the user
function createToken() {

    stripe.createToken(cardElement).then(function(result) {
        if (result.error) {
            // Inform the user if there was an error
            resultContainer.innerHTML = '<p>'+result.error.message+'</p>';
 
        } else {
            // Send the token to your server
            if ($('input[name=billing_checkbox]').not(':checked').length) {
                if ($('input[name=billing-name]').val().trim() == '' || $('input[name=billing_address_line_1]').val().trim() == '' || $('input[name=billing_city]').val().trim() == '' || $('input[name=billing_postal_zipcode]').val().trim() == '') {
                    resultContainer.innerHTML = '<p>Billing Address Input Is Empty.</p>';

                }else{
                    stripeTokenHandler(result.token);
                }

            }else{
                if ($('input[name=billing_checkbox]').is(':checked') || $('input[name=billing_input]').val() == "pickup_billing_checkbox") {
                    stripeTokenHandler(result.token);
                }else{
                    resultContainer.innerHTML = '<p>There was an error. Please Try Again.</p>';

                }
            }
        }
    });
}

// Callback to handle the response from stripe
function stripeTokenHandler(token) {
    processing_show();
    // Insert the token ID into the form so it gets submitted to the server
    var hiddenInput = document.createElement('input');
    hiddenInput.setAttribute('type', 'hidden');
    hiddenInput.setAttribute('name', 'stripeToken');
    hiddenInput.setAttribute('value', token.id);
    form.appendChild(hiddenInput);
	
    // Submit the form
    form.submit();
}

	

$('.summary-tab').click(function(){
	$('.cart-product-container').slideToggle();
});

$('input[name=billing_checkbox]').click(function(){
	if($(this).is(':checked')){
        $('.billing-address-container').slideUp(200);
        $('.billing-address-container :input').removeAttr('required');
    }else{
        $('.billing-address-container').slideDown(200);
        $('.billing-address-container :input').not($('input[name=billing_address_line_2]')).attr('required','required');
    }
});

function processing_show(){
    $('#processing-modal').modal('show');
}

function processing_hide(){
    $('#processing-modal').modal('hide');
}