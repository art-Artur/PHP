<form method="POST" action="index.php">
    <input type="hidden" name="save">
<div class="form-group">
    <label for="firstName">Firstname</label>
    <input type="text" class="form-control" id="firstName" name="firstname" required>
  </div>
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" name="name" required>
  </div>
  <div class="form-group">
    <label for="lastname">Lastname</label>
    <input type="text" class="form-control" id="lastname" name="lastname" required>
  </div>
  <div class="form-group">
    <label for="date">Date</label>
    <input type="date" class="form-control" id="date" name="date" value="<?=date("Y-m-d");?>" required>
  </div>
  <div class="form-group">
    <label for="gender">Gender</label>
    <select class="form-control" id="gender" name="gender">
      <option>Female</option>
      <option>Male</option>
    </select>
  </div>
  <div class="form-group">
    <label for="phone">Phone</label>
    <input type="tel" class="form-control" id="phone" name="phone" required>
  </div>  
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
  </div>
  <div class="form-group">
    <label for="address">Address</label>
    <textarea class="form-control" id="address" rows="3" name="address" required></textarea>
  </div>
  <div class="form-group">
    <label for="comment">Comment</label>
    <textarea class="form-control" id="comment" rows="3" name="comment"></textarea>
  </div>
  <button type="submit" class="btn btn-primary mt-3">Save</button>
</form>