<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <meta name="csrf-token" content="<?= csrf_token(); ?>">
    <title>Document</title>
</head>

<img>
    <form id="form1" enctype="multipart/form-data">

        <label>Image</label>
        <input name="image" type="file" />
        <label>Name</label>
        <input name="name" placeholder="Enter your name" />
        <button type="submit" class="btn btn-success">Submit</button>
    </form>

    <img src="/storage/uploads/0353d67dd60e28b0ecc7b2eb495280ce.jpg"></img>
<script>
     $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    $(document).ready(function(){
      $("#form1").on("submit",function(e){
        e.preventDefault();
        var formdata=new FormData(this);

        $.ajax({
            url:"{{ route('submit') }}",
            method:"post",
            data:formdata,
            contentType:false,
            processData:false,
            success:function(response){
                   
            }

        })
         
 


      });


    })
  </script>
</script>
</body>

</html>