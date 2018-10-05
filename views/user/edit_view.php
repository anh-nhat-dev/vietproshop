<?php include_once("views/layout/header.php"); ?>
<div class="row">
    <div class="col-sm-6">
        <?php 
        if(isset($error)){
            echo $error;
        }
        ?>
        <form method="post">
            <div class="form-group">
                <label>Fullname</label>
                <input type="text" name="full" class="form-control" placeholder="Fullname" value="<?php echo $row["user_full"];?>" required />
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="user" class="form-control" placeholder="Username" value="<?php echo $row["user_name"];?>" required />
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="pass" class="form-control" placeholder="Password" value="<?php echo $row["user_pass"];?>" required />
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="mail" class="form-control" placeholder="Email"  value="<?php echo $row["user_mail"];?>" required />
            </div>
            <div class="form-group">
                <label>Level</label>
                <select name="level" class="form-control">
                    <option <?php if($row["user_level"]== 1)  {echo "selected";} ?> value="1">Admin</option>
                    <option <?php if($row["user_level"]== 2)  {echo "selected";} ?> value="2">Mod</option>
                    <option <?php if($row["user_level"]== 3)  {echo "selected";} ?> value="3" >User</option>
                </select>
            </div>
            <input type="submit" name="submit" value="Sửa" class="btn btn-primary" />
        </form>
    </div>
</div>