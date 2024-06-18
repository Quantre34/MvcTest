<style type="text/css">
  body{   
  padding: 0;
  margin: 10px;
  background: rgb(247,249,251); 
  background: -moz-linear-gradient(45deg, rgba(247,249,251,1) 0%, rgba(224,228,230,1) 100%); /* FF3.6-15 */
  background: -webkit-linear-gradient(45deg,  rgba(247,249,251,1) 0%,rgba(224,228,230,1) 100%); /* Chrome10-25,Safari5.1-6 */
  background: linear-gradient(45deg,  rgba(247,249,251,1) 0%,rgba(224,228,230,.6) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#a90329', endColorstr='#6d0019',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */
  font-size:18px
}

form{width:780px;}

fieldset{margin:40px auto}

h1{
  text-align: center;
  border: 2px groove #0B0B0B;
  font-family: Tahoma;
  text-transform : uppercase;
  font-size: 35px;
  padding: 10px;
  color: #FFF;
  background: #a90329; /* Old browsers */
  background: -moz-radial-gradient(center, ellipse cover,  #a90329 0%, #8f0222 44%, #6d0019 100%); /* FF3.6-15 */
  background: -webkit-radial-gradient(center, ellipse cover,  #a90329 0%,#8f0222 44%,#6d0019 100%); /* Chrome10-25,Safari5.1-6 */
  background-image: radial-gradient(ellipse at center center , #fefeff 0%, #cf6c83 44%, #6d0019 100%);
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#a90329', endColorstr='#6d0019',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */
  text-shadow: 1px 2px 2px #030303
}
      
label{
  padding: 0;
  display: block;
  padding :10px;
  font-family: tahoma;
  border: 4px
}
      
input[type="text"],
input[type="email"]{
  width: 350px;
  height: 30px
}

input[type="radio"]{
  display: inline;
  color: #000;
}

input[type="submit"],
input[type="reset"]
{
  background: none;
  padding: 5px 15px;
  border: 2px solid #8f0222;
  font-weight: bold
}
select{
  width: 200px;
  height: 20px
}
.content{
  width:780px;
  margin:auto
}
</style>
<div class="content">
    <h1>User Detail</h1>
    <form action="ajax" method="post" target="UpdateUser">
      <fieldset >
        <legend>Personal information :</legend>
        <input type="text" name="Id" hidden value="<?= $User['Id'] ?>">

        <label>Your first name* : </label>
        <input type="text" name="Name" required value="<?= $User['Name'] ?>">


        <label>Your e-mail* : </label>
        <input type="email" name="Mail" required value="<?= $User['Mail'] ?>">

        <label>Your job : </label>
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


        <label>Your Age *: </label>
        <input type="number" name="Age" required value="<?= $User['Age'] ?>">
        <br>
        <button class="mt-2"style="margin-top: 15px;">Update</button>
      </fieldset> 

      </form>
    
    </div>
    <script type="text/javascript">
      $(document).ready(function(){
        $('option[value=<?= $User['Job'] ?>]').attr('selected','selected');
      });
      
    </script>