<?php
header("Content-Type: application/json");

// 生成随机数（0-21），用于选择塔罗牌
$card_number = rand(0, 21);

// 生成随机数（0或1），用于指示正向或反向
$orientation = rand(0, 1);

// 图片文件名
$image_file = "$card_number.jpg";

// 检查图片是否存在
if (!file_exists($image_file)) {
    echo json_encode(["error" => "Image not found"]);
    exit;
}

// 获取完整 URL
$server_url = "http://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);
$image_url = $orientation === 0 ? "$server_url/flipped_$card_number.jpg" : "$server_url/$image_file";

// 翻转图片（如果需要）
if ($orientation === 0) {
    $img = imagecreatefromjpeg($image_file);
    if ($img) {
        imageflip($img, IMG_FLIP_VERTICAL);
        $flipped_image_file = "flipped_$card_number.jpg";
        imagejpeg($img, $flipped_image_file);
        imagedestroy($img);
    }
}

// 选择解释文本文件（正向或反向）
$text_file = $orientation === 1 ? "1.txt" : "2.txt";

// 读取文本文件
$explanation = "";
if (file_exists($text_file)) {
    $lines = file($text_file, FILE_IGNORE_NEW_LINES);
    $line_number = $card_number + 1; // 使用 card_number + 1 来获取正确的行数
    if (isset($lines[$line_number - 1])) { // 数组索引从 0 开始，所以减去 1
        $explanation = $lines[$line_number - 1];
    } else {
        $explanation = "Explanation not found for card $card_number.";
    }
} else {
    $explanation = "Text file not found.";
}

// 输出 JSON 数据并换行显示
$response = [
    "card_number" => $card_number,
    "orientation" => $orientation === 1 ? "upright" : "reversed",
    "image_url" => $image_url,
    "explanation" => $explanation
];

echo str_replace('\/', '/', json_encode($response, JSON_PRETTY_PRINT));
?>
