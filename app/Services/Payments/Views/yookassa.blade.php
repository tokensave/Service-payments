<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Оплата....</title>
</head>

<body>
    Redirect for payment..........

    <script>
        window.location.href = "{{ $response->getConfirmation()->getConfirmationUrl() }}"
    </script>
</body>

</html>
