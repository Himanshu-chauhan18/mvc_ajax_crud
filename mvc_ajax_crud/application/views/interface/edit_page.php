<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  </head>
  <body>
	  <h1>Edit Form</h1>
  <div class="container mt-5">
    <div class="row">
        <div class="col-sm-6">
        <form id="editForm">
				<div class="row">
					<div class="col-md-3">
						<label class="control-label" style="position:relative; top:7px;">Email:</label>
					</div>
					<div class="col-md-9">
						<input type="text" class="form-control" name="email" id="email">
					</div>
				</div>
				<div style="height:10px;"></div>
				<div class="row">
					<div class="col-md-3">
						<label class="control-label" style="position:relative; top:7px;">Password:</label>
					</div>
					<div class="col-md-9">
						<input type="text" class="form-control" name="password" id="password">
					</div>
				</div>
				<div style="height:10px;"></div>
				<div class="row">
					
					<div class="col-md-9">
						<input type="hidden" class="form-control" value="<?= $_GET['id'] ?>" id="id">
					</div>
				</div>
				<div style="height:10px;"></div>
				<div class="row">
					<div class="col-md-3">
						<label class="control-label" style="position:relative; top:7px;">Full Name:</label>
					</div>
					<div class="col-md-9">
						<input type="text" class="form-control" name="fname" id="fname">
					</div>
				</div>
				<input type="hidden" name="id" id="userid">
				<div style="height:10px;"></div>
				<div class="row">
					<div class="col-md-3">
						<label class="control-label" style="position:relative; top:7px;">Hobbies</label>
					</div>
					<div class="col-md-9">
						Cricket<input type="checkbox"  name="hobbies[]" value="cricket" id="c">
						Football<input type="checkbox"  name="hobbies[]" value="football" id="f">
						<!-- Tennis<input type="checkbox"  name="hobbies[]" value="tennis" id="t"> -->
					</div>
				</div>
				<div style="height:10px;"></div>
				<div class="row">
					<div class="col-md-3">
						<label class="control-label" style="position:relative; top:7px;">Gender</label>
					</div>
					<div class="col-md-9">
						Male<input type="radio"  name="gender" value="male" id="male">
						Female<input type="radio"  name="gender" value="female" id="female">
					</div>
				</div>
				<div style="height:10px;"></div>
				<div class="row">
					<div class="col-md-3">
						<label class="control-label" style="position:relative; top:7px;">Role</label>
					</div>
					<div class="col-md-9">
					<select name="role" class="form-control" id="role">
                       <option value="employee"  id="role1">Employee</option>
                       <option value="admin" id="role2">Admin</option>
                     </select>
					</div>
				</div>
            </div> 
			</div>
      
               <div class="container mt-5">
               <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="button" onclick="update()" class="btn btn-warning"><span class="glyphicon glyphicon-check"></span> Update</a>
               </div>
			</form>
        </div>
    </div>
  </div>

  <script type="text/javascript">
    var url='http://localhost/mvc_ajax_crud/'

getRole();
    
		// var id = $(this).data('id');
     function getRole() {
        var id = parseInt(document.getElementById('id').value);
		console.log(id);
     $.ajax({
         type: 'POST',
         url: url + 'welcome/getuser',
         data: {id: id},
         dataType: 'Json',
         success:function(data){
             console.log(data);
			 $('#email').val(data[0].email);
             $('#password').val(data[0].password);
             $('#fname').val(data[0].fname);
             if((data[0].gender)=='male')
             {
                 $("#male").attr("checked", "checked");
             
             }else{	
                 $("#female").attr("checked", "checked");
             }
             ((data[0].role) ==  'admin') ?  $("#role2").attr("selected", "selected") : '';
             ((data[0].role) ==  'employee') ?  $("#role1").attr("selected", "selected") : '';
             
           
             $('#userid').val(data[0].id);
            //  $('#editmodal').modal('show');
             
         }
     });
     }


//update selected user


	function update()
	{
		var user = $('#editForm').serialize();   
			$.ajax({
				type: 'POST',
				url: url + 'welcome/update1',
				data: user,
				success:function(){
					location.href='http://localhost/mvc_ajax_crud/welcome/editshow'
				}
			});
	}
	

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


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>