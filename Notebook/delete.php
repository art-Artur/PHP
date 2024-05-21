<?php
    if(isset($_GET['id'])){
        $sql = 'DELETE FROM `friends` WHERE `id`='.$_GET['id'];
        $res = mysqli_query($connect, $sql);
        if (mysqli_errno($connect)) echo mysqli_error($connect);
        echo '<div class="alert-success">
                <p>Запись успешно удалена!</p>
                </div>';
}
?>

<?php
    $sql = 'SELECT `id`, `firstname`, LEFT(`name`, 1) name, LEFT(`lastname`,1) lastname FROM `friends`';
    $res = mysqli_query($connect, $sql);
    if (mysqli_errno($connect)) echo mysqli_error($connect);
    while($row = mysqli_fetch_assoc($res)):?>
         <a href="index.php?p=delete&id=<?=$row['id'];?>"><?=$row['firstname'].' '.$row['name'].'.'.$row['lastname'].'.<br>';?></a>
<?php endwhile;?>