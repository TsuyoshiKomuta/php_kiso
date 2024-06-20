<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // フォームデータを取得
    $land_percentage = $_POST['land_percentage'];
    $land_recipient = $_POST['land_recipient'];
    $building_percentage = $_POST['building_percentage'];
    $building_recipient = $_POST['building_recipient'];

    // CSVファイルのパス
    $file = 'asset_distribution.csv';

    // ファイルが存在しない場合はヘッダーを書き込む
    if (!file_exists($file)) {
        $header = array('Asset Name', 'Percentage', 'Recipient');
        $fileHandle = fopen($file, 'w');
        fputcsv($fileHandle, $header);
    } else {
        $fileHandle = fopen($file, 'a');
    }

    // データを書き込む
    fputcsv($fileHandle, array('土地', $land_percentage, $land_recipient));
    fputcsv($fileHandle, array('建物', $building_percentage, $building_recipient));
    fclose($fileHandle);

    echo "分配が保存されました。";
}
?>
