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
        number: $('#card-number').val(),
        cvc: $('#card-cvc').val(),
        exp_month: parseInt($('#card-expiration-month').val()),
        exp_year: $('#card-expiration-yearYear').val(), // For some reason, the 'month' id changes, but not 'year'
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