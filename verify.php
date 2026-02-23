<?php
// Khalti Secret Key
$secretKey = "078bb257feef4d1fac9e26f7efadfcf0";

// Get the JSON data from frontend
$data = json_decode(file_get_contents('php://input'), true);

if(isset($data['token']) && isset($data['amount'])) {
    $token = $data['token'];
    $amount = $data['amount'];

    // Verify payment with Khalti
    $url = "https://khalti.com/api/v2/payment/verify/";
    $fields = array(
        'token' => $token,
        'amount' => $amount
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($fields));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Authorization: Key $secretKey"
    ));

    $response = curl_exec($ch);
    curl_close($ch);

    echo $response; // JSON response from Khalti
} else {
    echo json_encode(["error" => "Token or amount missing"]);
}
?>
