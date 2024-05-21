<?php 
    $sql = 'SELECT * FROM `friends` WHERE `id`='.$_GET['id'];
    $res = mysqli_query($connect,$sql);
    if (mysqli_errno($connect)) echo mysqli_error($connect);

    $row = mysqli_fetch_assoc($res);
?>
<h3 class="text-center">Update</h3>
<form method="POST" action="index.php">
    <input type="hidden" name="update">
    <input type="hidden" name="id" value="<?=$_GET['id'];?>">
<div class="form-group">
    <label for="firstName">Firstname</label>
    <input type="text" class="form-control" id="firstName" name="firstname" required value="<?=$row['firstname'];?>">
  </div>
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" name="name" required value="<?=$row['name'];?>">
  </div>
  <div class="form-group">
    <label for="lastname">Lastname</label>
    <input type="text" class="form-control" id="lastname" name="lastname" required value="<?=$row['lastname'];?>">
  </div>
  <div class="form-group">
    <label for="date">Date</label>
    <input type="date" class="form-control" id="date" name="date" required value="<?=$row['date'];?>">
  </div>
  <div class="form-group">
    <label for="gender">Gender</label>
    <select class="form-control" id="gender" name="gender">
      <option <?php if($row['gender'] == 'Female') echo 'selected';?>>Female</option>
      <option <?php if($row['gender'] == 'Male') echo 'selected';?>>Male</option>
    </select>
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" id="email" name="email" value="<?=$row['email'];?>" placeholder="name@example.com" required>
  </div>
  <div class="form-group">
    <label for="phone">Phone</label>
    <input type="tel" class="form-control" id="phone" name="phone" required value="<?=$row['phone'];?>">
  </div>  
  <div class="form-group">
    <label for="address">Address</label>
    <textarea class="form-control" id="address" rows="3" name="address" required><?=$row['address'];?></textarea>
  </div>
  <div class="form-group">
    <label for="comment">Comment</label>
    <textarea class="form-control" id="comment" rows="3" name="comment"><?=$row['comment'];?></textarea>
  </div>
  <button type="submit" class="btn btn-primary mt-3">Update</button>
</form>