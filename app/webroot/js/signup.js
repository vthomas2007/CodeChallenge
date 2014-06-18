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
        exp_month: $('#card-expiry-month').val(),
        exp_year: $('#card-year').val(),
    }, submitFormIfValid);
}

function submitFormIfValid(status, response) {
    if (response.error) {
        displayCreditCardErrors(response.error.messages);
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