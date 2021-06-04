
<!DOCTYPE html>
<html>
<head>
    <title>
    Sign Up Form
    </title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="display.css">
</head>
<body>
<div>
   Click <a href="index.php"> here</a> to see already registered
</div>
<div>
    <form action="registration.php" method="post">
       <div class="container">
           <div class="row">
           <!-- Learn Bootstrap to know more about bootstrap objects and application in html -->
               <!-- class ="form-control is added from bootstrap library -->
               <div class="col-sm-3">
                <h1>Registration Page</h1>
                <p>Please Enter Companies information.</p>
                <!-- For bootstrap spacing -->
                <hr class="mb-3">
                <label for="firstname"><b>User First Name</b></label>
                <input class="form-control" type="text" id="firstname" name="firstname" required>

                <label for="lastname"><b>User Last Name</b></label>
                <input class="form-control" type="text" id="lastname" name="lastname" required>

                <label for="companyname"><b>Company Name</b></label>
                <input class="form-control" type="text" id="companyname" name="companyname" required>

                <label for="email"><b>Email Address</b></label>
                <input class="form-control" type="email" id="email" name="email" required>

                <label for="phonenumber"><b>Phone Number</b></label>
                <input class="form-control" type="text" id="phonenumber" name="phonenumber" required>

                <label for="password"><b>Password</b></label>
                <input class="form-control" type="password" id="password" name="password" required>
                <hr class="mb-3">
                <input class="btn btn-primary" type="submit" id="registered" name="submit" value="Sign Up">
              </div>
            </div>
       </div>
    </form>
</div>
<!--This jquery snippet script was coppied from google jquery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- This script is from sweetalert2 -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!--To know if it is working well, do this below -->
<script type="text/javascript">
      $(function(){
       // This alert --- alert("Hello"); --- is from jquery
       //This type is from sweetalert
      // Swal.fire({
        //   'title': 'Your Company is registered',
          // 'text': 'Registration is successful',
           //'type': 'Thank you'
       //})
// This sweetalert function is called by passing the id of the submit button
       $('#registered').click(function(e){
           var valid = this.form.checkValidity();
           if(valid){
               e.preventDefault();

           var firstname   = $('#firstname').val();
           var lastname    = $('#lastname').val();
           var companyname = $('#companyname').val();
           var email       = $('#email').val();
           var phonenumber = $('#phonenumber').val();
           var password    = $('#password').val();
           var checking    = ' ';

           // using ajax to define some jquery variables that we'll pass into our sweetalert
           $.ajax({
               type: 'POST',
               url:  'process.php',
               data: {firstname: firstname, lastname: lastname, companyname: companyname, 
                email: email, phonenumber: phonenumber, password: password, checking: checking},
               success: function(data){
                Swal.fire({
                           title: 'Do you want to save the informations for',
                           text: data,
                          showDenyButton: true,
                          showCancelButton: true,
                          confirmButtonText: 'Save',
                          denyButtonText: 'Don"t save',
                          }).then((checking) => {
                            if (checking.isConfirmed) {
                                  var checking = 'true'
                               $.ajax({
                                    type: 'POST',
                                    url:  'process.php',
                                    data: {firstname: firstname, lastname: lastname, companyname: companyname, 
                                    email: email, phonenumber: phonenumber, password: password, checking: checking},
                                      success: function(data){
                                      Swal.fire({
                                      title: 'Saved!', 
                                      text: data,
                                      confirmButtonText: 'Done'
                                      },
                                      function(isConfirm) {
                                        if (isConfirm){
                                          window.location.href = "localhost:81/FormRegistry/index.php";
                                        }
                                        })
                                      },
                                      error: function(data){
                                 // Alert to fire if there is a problem to connect to process.php
                                        Swal.fire({
                                title: 'There is a problem in registering',
                                text: data
                                       })
                                                           }
                                        });
                            } else if (checking.isDenied) {
                             var checking = 'false'
                             $.ajax({
                                    type: 'POST',
                                    url:  'process.php',
                                    data: {firstname: firstname, lastname: lastname, companyname: companyname, 
                                    email: email, phonenumber: phonenumber, password: password, checking: checking},
                                      success: function(data){
                                      Swal.fire({
                                      title: 'Changes are not saved', 
                                      text: data
                                        })
                                      },
                                      error: function(data){
                                 // Alert to fire if there is a problem to connect to process.php
                                        Swal.fire({
                                title: 'There is a problem in registering',
                                text: data
                                       })
                                                           }
                                        });
                            }
                            footer: '<a href="">Why do I have this issue?</a>'
                         })

               },
               error: function(data){
                   // Alert to fire if there is a problem to connect to process.php
                Swal.fire({
                           title: 'There is a problem in registering',
                           text: data
                         })

               }
            });

           }else{
               // Alert to display if a field is empty
               alert('Some fields are empty');
           }
           
        
       });

      });
</script>
</body>
</html>