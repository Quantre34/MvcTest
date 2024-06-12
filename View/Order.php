<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Hello <?= $_SESSION['User']['Name'] ?? '' ?></title>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" ></script>
<link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="Public/css/register.css">
</head>
<body>
	<div class="container mt-5">
		
		<div class="row mt-5">
    <div class="col-md-12">
      <form action="ajax" method="post" target="Order">
        <h1> Order </h1>
        
        <fieldset>
          
          <legend>Basic Info</legend>
        

          <label >Girft to :</label>
          <input type="text" id="Search" placeholder="search user">
          <select class="list" name="UserId">
              
          </select>
        
          <label>note</label>
          <textarea name="Note"></textarea>
          

        </fieldset>
        <fieldset>  
        
        <input type="text" name="Cost" hidden value="100">

         <label >Product:</label>
          <select  name="Product">
              <option value="freelance">Freelance work</option>
              <option value="frontend">Front-Endr</option>
              <option value="php_development">PHP Development</option>
              <option value="python_development">Python Development</option>
              <option value="Api">Api</option>
          </select>
          
         </fieldset>
       
        <button type="submit">Sign Up</button>
        
       </form>
        </div>
      </div>
	</div>

      <script type="text/javascript">
        $(document).ready(function(){

          $('#Search').on('keydown',function(){
            $.ajax({
              type: 'POST',
              url: '/ajax',
              data: {
                action: 'GetUsers',
                param : $(this).val()
              },
              success: function(data){
                $('.list').empty();
                data = JSON.parse(data);
                if (data) {
                    $('.list').append(`<option disabled selected value="null"> Select </option>`);
                    data.forEach(function(Item){
                      console.log(Item);
                      $('.list').append(`<option value="${Item['Id']}"> ${Item['Name']} </option>`);
                    });
                }
              }
            });
          });

        });
      </script>

</body>
</html>