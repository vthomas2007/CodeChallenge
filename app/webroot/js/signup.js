$(document).ready(function() {
    $('#signup-submit-button').click( function () {
        validateCardInformation();
    });
});

function configureSwipe(key) {
    Stripe.setPublishableKey(key);
}

function validateCardInformation() {

    Stripe.setPublishableKey('pk_test_Nc0HNVwoeOQS7HGsGaLu6DBv');

    Stripe.card.createToken({
        number: $('#UserCard-number').val(),
        cvc: $('#UserCard-cvc').val(),
        exp_month: $('#UserCard-expiry-month').val(),
        exp_year: $('#UserCard-year').val(),
    }, submitFormIfValid);
}

function submitFormIfValid(status, response) {
    if (response.error) {
        displayCreditCardErrors(response.error.messages);
    }
    else {
        setTokenField(response['id']);
        submitSignupForm();
        alert("Success!  Token: " + response['id']);
    }
}

function displayCreditCardErrors(errors)
{
    $(".payment-errors").text(errors);
}

function setTokenField(token) {

}

function submitSignupForm() {

}