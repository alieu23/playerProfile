<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>
 
</head>
<body>
    <div class="container">
      <br>
      <h3 align="center">Larave 5.8 DataTable server side processing using ajax</h3>
        <br>
     <div class="table-responsive">
        <table class="table table-bordered table-striped" id="user_table">
        <thead>
        <tr>
          <th width="10%">Image</th>
          <th width="30%">First Name</th>
          <th width="30%">Last Name</th>
          <th width="30%">Action</th>
        </tr>
        </thead>


        </table>
     </div>
    </div>
</body>
</html>
<script>
$(document).ready(function(){
    $('#user_table').DataTable({
        processing:true,
        serverSide:true,
        ajax:{
            url:"{{route('ajax_crud.index')}}",
        },
        columns:[
            {
                data:'image',
                name:'image',
                render:function(data,type,full,meta){
                    return "<img src={{URL::to('/')}}/images/"+data+" width='70' class='img-thumbnail'>";
                },
                orderable:false
            },
            {
                data:'firstname',
                name:'firstname'
            },
            {
                data:'lastname',
                name:'lastname'
            },
            {
                data:'action',
                name:'action',
                orderable:false
            }
        ]
    });
});
</script>