<?php
require "connect.php";
if(isset($_POST["submit"]))
{
  $imgname = $_FILES["image_str"]["name"];
  $Username =$_POST["username"];
  $Email =$_POST["email"];
  $Password =$_POST["password"];
  $conpassword =$_POST["confirm"];

  if($Password == $conpassword)
  {
    $query = mysqli_query($connect,"insert into registration(image,name,email,password) 
    values('$imgname','$Username','$Email','$Password')");
  }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="register.css">
</head>

<body>
    <div id="panel">
        <section class="form_container">
            <form action="" method="POST" enctype="multipart/form-data">
                <h3>Register Now</h3>
                <div class="doctor_image">
                    <div class="doctor_image1">
                        <input type="file" id="image-input" class="image_file" accept="image/jpeg, image/png, image/jpg"
                            name="image_str">
                        <label for="image-input" class="im_inp_dis">
                            <div id="display-image"></div>
                            <div>
                                <i class="fa fa-camera cam" for="up_im"></i>
                            </div>
                        </label>
                    </div>
                    <input type="text" name="username" class="box" placeholder="Enter your username" required>
                    <input type="email" name="email" class="box" placeholder="Enter your email" required>
                    <input type="password" name="password" class="box" placeholder="Enter your password" required>
                    <input type="password" name="confirm" class="box" placeholder="Confirm your password" required>
                </div>
                <input type="submit" value="register now" class="btn" name="submit">
            </form>
        </section>
    </div>

    <script>
        const image_input = document.querySelector("#image-input");



        image_input.addEventListener("change", function () {

            const reader = new FileReader();

            reader.addEventListener("load", () => {

                const uploaded_image = reader.result;

                document.querySelector("#display-image").style.backgroundImage = `url(${uploaded_image})`;

            });

            reader.readAsDataURL(this.files[0]);

        });
    </script>
</body>

</html>