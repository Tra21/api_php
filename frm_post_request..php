<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POST Request</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>
<body>
   <div class="container pt-5">
        <div class="text-center">
            POST Request form
        </div>
        <div class="row">
            <div class="col-12">
                <select class="form-select" id="select_field" aria-label="Default select example">
                    <option value="id">id</option>
                    <option value="name">name</option>
                    <option value="email">email</option>
                </select>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="query">Query:</label>
                    <input type="text" class="form-control" id="query">
                </div>
            </div>
        </div>
        <div class="col-12 text-center">
            <button type="button" class="btn btn-primary get">Get</button>
        </div>
       <div class="row pt-5">
            <div class="col-6">
                <div class="form-group">
                  <label for="exampleFormControlTextarea2">Small textarea</label>
                  <textarea class="form-control rounded-0" id="exampleFormControlTextarea2" rows="3"></textarea>
                </div>
            </div>
            <div class="col-6">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">Name</th>
                      <th scope="col">Email</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
            </div>
       </div>
   </div>

   <script>
      $(document).ready(function () {
        $('.get').on('click',function(){
          let select_field = $('#select_field').val();
          let query = $('#query').val();
          if(query!=''){
            let get_data = select_field + '="' + query+'"';
            $.ajax({
                url: "https://tra21.000webhostapp.com/POST_request.php",
                type: 'POST',
                data: {get_data :   get_data},//I sent data as object
                success: function(res) {
                    $('table tbody tr').remove();
                    $('#exampleFormControlTextarea2').val(JSON.stringify(res));
                    $('table tbody').append(html(res));
                }
            });
          }else{
            alert('query should has some data!')
          }
        })
      });

      function html(json_data){
        let html='';
        let data= json_data;
        if(typeof(data.success)=='undefined'){
          html+='<tr>';
          html+=' <td>'+data[0].id+'</td>'
          html+=' <td>'+data[0].name+'</td>'
          html+=' <td>'+data[0].email+'</td>'
          html+='</tr>';
          return html;
        }
      }
   </script>
</body>
</html>