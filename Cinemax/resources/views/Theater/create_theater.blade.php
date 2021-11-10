<!DOCTYPE html>
<html>
<head>
    <title>Add/remove multiple input fields dynamically with Jquery Laravel 5.8</title> 
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>
<body>
<form action="{{ route('theater.create') }}" method="POST">
    @csrf
  
     <div>
        <div>
            <div>
                <strong>Theater Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="Theater 1" required>
                <strong>Address:</strong>
                <input type="text" name="address" class="form-control" placeholder="Yangon" required>
            </div><br>
            <div>
                <table class="table table-bordered" id="dynamicTable">
                <tr>  
                    <td><input type="text" name="addmore[0][roll]" placeholder="A" class="form-control" required/></td>  
                    <td><input type="text" name="addmore[0][number]" placeholder="1" class="form-control" required /></td>
                    <td><input type="text" name="addmore[0][price]" placeholder="3000" class="form-control" required /></td>
                    <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>  
                </tr>  
                </table>
            </div><br>
        </div>
        <div>
                <button type="submit">Submit</button>
        </div>
    </div>
   
</form>
<script type="text/javascript">
   
    var i = 0;
       
    $("#add").click(function(){
   
        ++i;
   
        $("#dynamicTable").append('<tr><td><input type="text" name="addmore['+i+'][roll]" placeholder="A" class="form-control" required /></td><td><input type="text" name="addmore['+i+'][number]" placeholder="1" class="form-control" required /></td><td><input type="text" name="addmore['+i+'][price]" placeholder="3000" class="form-control" required /></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');
    });
   
    $(document).on('click', '.remove-tr', function(){  
         $(this).parents('tr').remove();
    });  
   
</script>
</body>
</html>