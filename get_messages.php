<?php
include('db.php');

$sql = "SELECT messages.id, messages.message, users.username, messages.created_at FROM messages JOIN users ON messages.user_id = users.id ORDER BY messages.created_at DESC";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    echo '<div><strong>' . htmlspecialchars($row['username']) . ':</strong> ' . htmlspecialchars($row['message']) . ' <small>(' . $row['created_at'] . ')</small></div>';
}
?>
