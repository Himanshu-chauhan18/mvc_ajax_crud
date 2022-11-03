
		<div class="col-sm-8 ">
			<button class="btn btn-primary" id="add"><span class="glyphicon glyphicon-plus"></span> Add New</button>
			<table class="table table-bordered table-striped" style="margin-top:20px;">
			<thead>
					<tr>
						<th>ID</th>
						<th>Email</th>
						<th>Password</th>
						<th>FullName</th>
						<th>Hobbies</th>
						<th>Gender</th>
						<th>Role</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody id="tbody">
				</tbody>
			</table>
		</div>
	</div>
<!-- Add New -->
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Add New Member</h4></center>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form id="addForm">
				<div class="row">
					<div class="col-md-3">
						<label class="control-label" style="position:relative; top:7px;">Email:</label>
					</div>
					<div class="col-md-9">
						<input type="email" class="form-control" name="email" required>
					</div>
				</div>
				<div style="height:10px;"></div>
				<div class="row">
					<div class="col-md-3">
						<label class="control-label" style="position:relative; top:7px;">Password:</label>
					</div>
					<div class="col-md-9">
						<input type="password" class="form-control" name="password" required>
					</div>
				</div>
				<div style="height:10px;"></div>
				<div class="row">
					<div class="col-md-3">
						<label class="control-label" style="position:relative; top:7px;">Full Name:</label>
					</div>
					<div class="col-md-9">
						<input type="text" class="form-control" name="fname" required>
					</div>
				</div>
				<div style="height:10px;"></div>
				<div class="row">
					<div class="col-md-3">
						<label class="control-label" style="position:relative; top:7px;">Hobbies</label>
					</div>
					<div class="col-md-9">
						Cricket<input type="checkbox"  name="hobbies[]" value="cricket">
						Football<input type="checkbox"  name="hobbies[]" value="football">
						Tennis<input type="checkbox"  name="hobbies[]" value="tennis">
					</div>
				</div>
				<div style="height:10px;"></div>
				<div class="row">
					<div class="col-md-3">
						<label class="control-label" style="position:relative; top:7px;">Gender</label>
					</div>
					<div class="col-md-9">
						Male<input type="radio"  name="gender" value="male">
						Female<input type="radio"  name="gender" value="female">
					</div>
				</div>
				<div style="height:10px;"></div>
				<div class="row">
					<div class="col-md-3">
						<label class="control-label" style="position:relative; top:7px;">Role</label>
					</div>
					<div class="col-md-9">
					<select name="role" class="form-control">
                       <option value="employee">Employee</option>
                       <option value="admin">Admin</option>
                     </select>
					</div>
				</div>
            </div> 
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</a>
			</form>
            </div>
			
        </div>
    </div>
</div>


<!-- Delete -->
<div class="modal fade" id="delmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Delete Member</h4></center>
            </div>
            <div class="modal-body">
				<h4 class="text-center">Are you sure you want to delete</h4>
				<h2 id="delfname" class="text-center"></h2>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="button" id="delid" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Yes</button>
            </div>
			
        </div>
    </div>
</div>


<script type="text/javascript">
    var url='http://localhost/mvc_ajax_crud/'
$(document).ready(function(){
showTable();
$('#add').click(function(){
		$('#addnew').modal('show');
		$('#addForm')[0].reset();
	});
    //submit add form
	$('#addForm').submit(function(e){
		e.preventDefault();
		var user = $('#addForm').serialize();   
			$.ajax({
				type: 'POST',
				url: url + 'welcome/insert',
				data: user,
				success:function(){
					$('#addnew').modal('hide');
					showTable();
				}
			});
	});

    

    
	//show delete modal
	$(document).on('click', '.delete', function(){
		var id = $(this).data('id');
		$.ajax({
			type: 'POST',
			url: url + 'welcome/getuser',
			dataType: 'json',
			data: {id: id},
			success:function(response){
				console.log(response);
				$('#delfname').html(response[0].fname);
				$('#delid').val(response[0].id);
				$('#delmodal').modal('show');
			}
		});
	});

	$('#delid').click(function(){
		var id = $(this).val();
        $.ajax({
				type: 'POST',
				url: url + 'welcome/delete',
				data: {id: id},
				success:function(){
					$('#delmodal').modal('hide');
					showTable();
				}
			});
	});

});

function showTable(){
	var url = '';
	$.ajax({
		type: 'POST',
		url: url + 'welcome/read',
		success:function(response){
			$('#tbody').html(response);
		}
	});
}
</script>

