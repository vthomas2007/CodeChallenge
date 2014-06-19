$(document).ready(function() {
    $('#signup-submit-button').click( function () {
        validateCardInformation();
    });
});

function configureSwipe(key) {
    Stripe.setPublishableKey(key);
}

function validateCardInformation() {

    // TODO: Pass this from the server
    Stripe.setPublishableKey('pk_test_Nc0HNVwoeOQS7HGsGaLu6DBv');

    Stripe.card.createToken({
        number: $('#CreditCardCard-number').val(),
        cvc: $('#CreditCardCard-cvc').val(),
        exp_month: parseInt($('#card-expiration-monthMonth').val()), // Cake adds 'Month' to the user defined id
        exp_year: $('#card-expiration-yearYear').val(),              // Cake adds 'Year' to the user defined id
    }, submitFormIfValid);
}

function submitFormIfValid(status, response) {
    if (response.error) {
        displayCreditCardErrors(response.error.message);
    }
    else {
        setTokenField(response['id']);
        submitSignupForm();
    }
}

function displayCreditCardErrors(errors)
{
    $(".payment-errors").text(errors);
}

function setTokenField(token) {
    $('#UserSwipeToken').val(token);
}

function submitSignupForm() {
    $('#UserAddForm').submit();
}