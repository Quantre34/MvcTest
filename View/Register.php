<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Register</title>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" ></script>
<link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="Public/css/register.css">
</head>
<body>
	<div class="container mt-5">
		
		<div class="row mt-5">
    <div class="col-md-12">
      <form action="ajax" method="post" target="Register">
        <h1> Sign Up </h1>
        
        <fieldset>
          
          <legend><span class="number">1</span> Your Basic Info</legend>
        
          <label >*FirstName/LastName:</label>
          <input type="text" id="name" name="Name">
        
          <label >*Email:</label>
          <input type="email"  name="Mail">
       
          <label >*Password:</label>
          <input type="password" name="Password">
        
          <label>Age:</label>
          <input type="text" name="Age">
          
          <label>*Address</label>
          <textarea name="Address"></textarea>
        </fieldset>
        <fieldset>  
                
         <label >Job:</label>
          <select  name="Job">
            <optgroup label="Web">
              <option value="frontend_developer">Front-End Developer</option>
              <option value="php_developer">PHP Developer</option>
              <option value="python_developer">Python Developer</option>
              <option value="rails_developer">Rails Developer</option>
              <option value="web_designer">Web Designer</option>
              <option value="wordpress_developer">Wordpress Developer</option>
            </optgroup>
            <optgroup label="Mobile">
              <option value="android_developer">Android Developer</option>
              <option value="ios_developer">IOS Developer</option>
              <option value="mobile_designer">Mobile Designer</option>
            </optgroup>
            <optgroup label="Business">
              <option value="business_owner">Business Owner</option>
              <option value="freelancer">Freelancer</option>
            </optgroup>
          </select>
          
         </fieldset>
       
        <button type="submit">Sign Up</button>
        
       </form>
        </div>
      </div>
	</div>

      
</body>
</html>