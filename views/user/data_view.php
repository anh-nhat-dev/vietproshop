<?php include_once("views/layout/header.php"); ?>

<div class="row">
    	<div class="col-sm-12">
        	<div class="alert alert-success">Added user success!</div>
        	<table class="table table-striped">
            	<tr id="tbl-first-row">
                	<td width="5%">#</td>
                    <td width="30%">Fullname</td>
                    <td width="25%">Username</td>
                    <td width="25%">Email</td>
                    <td width="5%">Level</td>
                    <td width="5%">Edit</td>
                    <td width="5%">Delete</td>
                </tr>
                <?php while($row = $paginate->fetch()){ ?>
                    <tr>
                        <td><?= $row['user_id'] ?></td>
                        <td><?= $row['user_full'] ?></td>
                        <td><?= $row['user_name'] ?></td>
                        <td><?= $row['user_mail'] ?></td>
                        <td><?= $row['user_level'] ?></td>
                        <td><a href="index.php?controller=user&act=edit&id=<?= $row["user_id"];?>">Edit</a></td>
                        <td><a href="#">Delete</a></td>
                    </tr>
                <?php } ?>
                
                
			</table>
            <div aria-label="Page navigation">
            	<ul class="pagination">
                	<?= $paginate->getListPages(); ?>
                </ul>
            </div>
        </div>
    </div>
<?php include_once("views/layout/footer.php"); ?>