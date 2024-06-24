<?php
if (isset($_GET['o'])) {
    $channel_id = $_GET['o'];
    $sql = "SELECT * FROM `sms` WHERE `channel_id`= '$channel_id'";
    
}elseif (isset($_POST['sms'])) {
    $channel_id = $_POST['channel_id'];
    $hash_id = $_POST['#_id'];
    $sql = "SELECT * FROM `sms` WHERE `channel_id`= '$channel_id' AND `#_id`= '$hash_id' ";
} else {
    $sql = 'SELECT * FROM sms';
}
$res = mysqli_query($connect, $sql);
?>

<form method='post'>
    <input type="hidden" name='sms'>
    <input type="text" name='channel_id' id='channel_id' placeholder='Id канала'>
    <input type="text" name='#_id' id='hash_id' placeholder='Хэштег записи'>
    <button type="submit">Submit</button>
</form>

<ul>
    <?php while ($row = mysqli_fetch_assoc($res)): ?>
        <li scope='row'>
            <p>
                <span><?= htmlspecialchars($row['#_id']); ?></span>
                <span><?= htmlspecialchars($row['user_name']); ?></span>
                <span><?= htmlspecialchars($row['channel_id']); ?></span>
                <span><?= htmlspecialchars($row['data']); ?></span>

            </p>
        </li>
    <?php endwhile; ?>
</ul>