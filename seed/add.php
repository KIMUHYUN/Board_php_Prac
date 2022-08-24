<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/_inc/common.php"; ?>
<?php

$subject = '제목';
$writer = '작성자';
$pwd = '1234';
$content = '내용';
$lastInsertId = $db->lastInsertId();

$stmt = $db->prepare("INSERT INTO " . $_board_options["tableName"] . " (subject, writer, pwd, content, group_id, idx) VALUES (:subject, :writer, :pwd, :content, :group_id, :idx)");
$stmt->bindParam(':subject', $subject);
$stmt->bindParam(':writer', $writer);
$stmt->bindParam(':pwd', $pwd);
$stmt->bindParam(':content', $content);
$stmt->bindParam(':group_id', $lastInsertId);
$stmt->bindParam(':idx', $lastInsertId);
for($i=1; $i <= 155; $i++) {
    $subject = '제목 ' . $i;
    $writer = '작성자 ' . $i;
    $pwd = '1234';
    $content = '내용 ' . $i;
    $lastInsertId += 1;
    $stmt->execute();
}

$db = null;
?>

<script>
    location.href='<?=$_board_options["listPage"]?>';
</script>