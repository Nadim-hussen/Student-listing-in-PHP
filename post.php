<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body>
     <!-- navbar design with tailwindcss -->
     <div class="mb-24">
        <div class="md:mx-8 flex justify-between  p-2  bg-cyan-200">
            <!-- logo  -->
            <div class="md:ml-8 ml-2 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 space-x-8" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                </svg>
                <span class="font-bold">
                    NadimCodeGallery
                </span>

                <!-- page link  -->
                <div class="ml-8 md:block hidden">
                    <a class="mx-2 transition duration-300 hover:underline" href="index.php">Stu-list</a>
                    <a class="mx-2 transition duration-300 hover:underline" href="post.php">Post</a>
                </div>
            </div>
             <!-- mobile design -->
             <div class="flex md:hidden block ">
                <button onclick="toggle()" class="transition duration-1000">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>

        </div>
        <div id="buttons"
            class="transition duration-500 flex flex-col items-center bg-cyan-200 md:hidden hidden pb-2">
            <a class="mx-8 mb-1 transition duration-300 hover:underline" href="index.php">Stu-list</a>
            <a class="mx-8 mb-1 transition duration-300 hover:underline" href="post.php">Post</a>
            
        </div>
    </div>

    <!-- End of Navber  -->

    <!-- form started  -->
    <div class="flex justify-center items-center">
    <form class="bg-gray-300 p-8 rounded-xl" action="" method="POST">
        <div class="flex justify-between items-center gap-4 mx-auto my-4">
            <label for="firstname">FirstName &nbsp;:</label>
        <input class="border-2 border-gray-500" id="firstname" type="text" name="firstname" placeholder="Enter your FirstName">
        </div>
        <div class="flex justify-between items-center gap-4 mx-auto my-4">
            <label for="lastname">LastName &nbsp;:</label>
        <input class="border-2 border-gray-500" id="lastname" type="text" name="lastname" placeholder="Enter your LastName">
        </div>
        <div class="flex justify-between items-center gap-4 mx-auto my-4">
            <label for="education">Education &nbsp;:</label>
        <input class="border-2 border-gray-500" id="education" type="text" name="education" placeholder="Education Qualification">
        </div>
        <div class="flex justify-start items-center gap-4 mx-auto my-4">
            <label for="address">Address &nbsp;:</label>
            <select name="address" id="address">
                <option value="1">Barisal</option>
                <option value="2">Chittagong</option>
                <option value="3">Dhaka</option>
                <option value="4">Khulna</option>
                <option value="5">Mymensingh</option>
                <option value="6">Rajshahi</option>
                <option value="7">Rangpur</option>
                <option value="8">Sylhet</option>
            </select>
        </div>
        <button class="py-2 px-1 rounded bg-cyan-400" type="submit" name="submit">Submit</button>
    </form>
    </div>
   
    <?php
    include 'conn.php';
        if(isset($_POST['submit'])){
           $firstname=  $_POST['firstname'];
           $lastname = $_POST['lastname'];
           $education = $_POST['education'];
           $address = $_POST['address'];
           if($firstname === "" || $lastname==="" || $education==="" || $address ===""){
            echo'<h1 class="bg-red-600 mt-4 text-red-300 p-4"> Please fill the data properly </h1>';
           }else{

            $sql = "INSERT INTO `student_list`( `FirstName`, `LastName`, `Education`, `Address`) VALUES ('$firstname','$lastname','$education','$address')";
            $result = mysqli_query($con,$sql);
            if($result){
                echo'<h1 class="bg-green-600 mt-4 text-green-300 p-4"> Data inserted Successfully </h1>';
                redirect("/index.php");
            }else{
                echo '<h1 class="bg-red-600 mt-4 text-red-300 p-4"> Failed to  insert  </h1>';
            }

           }
          
        }
    ?>

    <script>
        let btn = document.getElementById('buttons')
        function toggle() {
            btn.classList.toggle('hidden')
        }
    </script>
</body>
</html>