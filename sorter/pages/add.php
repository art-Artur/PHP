<?php
if (isset($_POST['add'])) {
    $channel_id = $_POST['channel_id'];
    $hash_id = $_POST['#_id'];
    $data = $_POST['data'];

    echo $_POST['#_id'];

    $stmt = $connect->prepare("INSERT INTO `sms`(`#_id`, `user_name`, `channel_id`, `data`) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $hash_id, $_SESSION["user_name"], $channel_id, $data);
    $stmt->execute();
}
?>

<form method='post' class="w-75 d-flex-column m-auto">
                <input type="hidden" name='add'>
                <div class="mb-3 mt-3">
                    <label for="#_id" class="form-label">#_id:</label>
                    <input type="text" class="form-control" id="#_id" placeholder="Enter #_id" name="#_id">
                </div>

                <div class="mb-3 mt-3">
                    <label for="channel_id" class="form-label">Channel_id:</label>
                    <input type="text" class="form-control" id="channel_id" placeholder="Enter channel_id" name="channel_id">
                </div>

                <div class="mb-3">
                    <label for="data" class="form-label">Data:</label>
                    <input type="text" class="form-control" id="data" placeholder="Enter data" name="data">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
</form>