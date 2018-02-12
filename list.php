<?php
/*
      Author  : Suresh Pokharel
      Email   : suresh.wrc@gmail.com
      GitHub  : github.com/suresh021
      URL     : psuresh.com.np
*/ 
?>

<?php
/*Database Connection*/
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'dm';
Global $dbconfig; // to use globally
$dbconfig = mysqli_connect($host,$username,$password,$database) or die("An Error occured while connecting to the database");
?>

<?php 
$result=mysqli_query($dbconfig,"SELECT * FROM todo");

?>
<table class="table" id=todoListTable>
	<thead>
		<th class="col-md-1">ID</th>
		<th class="col-md-9">Title</th>
		<th class="col-md-2"> <div class="pull-right">Action</div></th>
	</thead>
	<tbody>
		<?php $i=1;?>
		<?php while($res = mysqli_fetch_assoc($result)){?>
		<tr>
			<td class="col-md-1"><?=$i;$i++;?></td>
			<td class="col-md-9"><?=$res['description']?></td>
			<td class="col-md-2">
				<div class="btn-group pull-right">
				<a title="Delete" class="btn btn-danger btn-xs delete-button" id="delete_<?=$res['id']?>" onclick="DeleteItem(<?=$res['id']?>);"><span class='glyphicon glyphicon-trash'></span></a>
				<a style="margin-left: 2px" title="Edit" class="btn btn-info btn-xs edit-button" id="edit_<?=$res['id']?>" onclick="checks(<?=$res['id']?>,'<?=$res['description']?>');"><span class='glyphicon glyphicon-edit'></span></a>
				</div>
			</td>
		</tr>
		<?php }?>
	</tbody>
</table>
