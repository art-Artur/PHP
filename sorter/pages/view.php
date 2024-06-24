<?php
    $sql = 'SELECT * FROM channel';
    $res = mysqli_query($connect, $sql);

    if (mysqli_errno($connect)) echo 'Ошибка запроса: '.mysqli_error($connect);
?>

<ul>
    <?php while ($row = mysqli_fetch_assoc($res)): ?>
        <li scope='row'>
            <a href='index.php?p=sms&o=<?= urlencode($row['id']); ?>' class="btn-primary <?php if (isset($_GET['o']) && $_GET['o'] == $row['id']) echo 'active'; ?>">
                <?= htmlspecialchars($row['name']); ?>
            </a>
        </li>
    <?php endwhile; ?>
</ul>