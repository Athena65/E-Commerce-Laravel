<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Braintree Payment</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://js.braintreegateway.com/web/dropin/1.31.2/js/dropin.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 mt-5">
                <div id="dropin-container"></div>
                <button id="submit-button" class="btn btn-primary mt-3">Pay Now</button>
            </div>
        </div>
    </div>
    <script>
        var button = document.querySelector('#submit-button');

        braintree.dropin.create({
            authorization: "{{ Braintree_ClientToken::generate() }}",
            container: '#dropin-container'
        }, function (createErr, instance) {
            button.addEventListener('click', function () {
                instance.requestPaymentMethod(function (err, payload) {
                    if (err) {
                        console.log('Error:', err);
                        return;
                    }
                    $.ajax({
                        url: '/payment/process',
                        type: 'POST',
                        data: {
                            nonce: payload.nonce
                        },
                        success: function (response) {
                            console.log(response);
                            // Handle success response
                        },
                        error: function (error) {
                            console.log(error);
                            // Handle error response
                        }
                    });
                });
            });
        });
    </script>
</body>
</html>