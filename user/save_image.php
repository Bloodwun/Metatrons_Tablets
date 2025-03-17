<?php
$data = json_decode(file_get_contents("php://input"), true);

if (!empty($data['image']) && !empty($data['name'])) {
    $image = $data['image'];
    $name = preg_replace("/[^a-zA-Z0-9]+/", "_", $data['name']); // Sanitize filename
    $folder = "../uploads/tarot_cards/";

    if (!file_exists($folder)) {
        mkdir($folder, 0777, true);
    }

    // Convert base64 to an image file
    $image = str_replace("data:image/png;base64,", "", $image);
    $image = base64_decode($image);
    $filePath = $folder . $name . ".png";

    if (file_put_contents($filePath, $image)) {
        echo json_encode(["message" => "Image saved successfully!", "path" => $filePath]);
    } else {
        echo json_encode(["message" => "Failed to save image."]);
    }
} else {
    echo json_encode(["message" => "Invalid data received."]);
}
?>