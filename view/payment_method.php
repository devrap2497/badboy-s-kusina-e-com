<?php

$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://api.paymongo.com/v1/payment_methods",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_HTTPHEADER => [
    "Accept: application/json",
    "Authorization: Basic cGtfdGVzdF9pV3ZHemhHQnJUWEI5OXdOb1NURmduOE46c2tfdGVzdF9pQWluU2c5M0VGNnFTcWZBclJTUktycDM=",
    "Content-Type: application/json"
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}

?>

<script>
  {
    "data": {
        "id": "sk_test_iAinSg93EF6qSqfArRSRKrp3",
        "type": "payment_method",
        "attributes": {
            "billing": {
                "address": {
                    "city": "Taguig",
                    "country": "PH",
                    "line1": "Unit 3308, High St South Corp Plaza",
                    "line2": "26th Street & 11th Avenue",
                    "postal_code": "1634",
                    "state": "Metro Manila"
                },
                "email": "juan@paymongo.com",
                "name": "Juan Dela Cruz",
                "phone": "63288881111"
            },
            "details": {
                "last4": "4242",
                "exp_month": 1,
                "exp_year": 24
            },
            "livemode": false,
            "type": "card",
            "metadata": {
                "sample": "123"
            },
            "created_at": 1586097138,
            "updated_at": 1586097138
        }
    }
}
</script>