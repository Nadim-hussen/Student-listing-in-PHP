<?php
        include 'conn.php';
    ?>
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
                    <a class="mx-2 transition duration-300 hover:underline" href="">Stu-list</a>
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
            class="transition duration-500 flex flex-col items-center bg-cyan-200  md:hidden hidden pb-2">
            <a class="mx-8 mb-1 transition duration-300 hover:underline" href="">Stu-list</a>
            <a class="mx-8 mb-1 transition duration-300 hover:underline" href="post.php">Post</a>
            
        </div>
    </div>

    <!-- End of Navber  -->

    <!-- Student List in table  -->
    <div class="flex justify-center">
        <table class=" border-collapse">
            <thead class="border-2 border-gray-500">
                <tr class="border-2 border-gray-500">
                    <th class="py-3 px-3 mx-2">Id</th>
                    <th class="py-3 px-3 mx-2">Name</th>
                    <th class="py-3 px-3 mx-2">Education</th>
                    <th class="py-3 px-3 mx-2">Address</th>
                </tr>
            </thead>
            <tbody class="border-2 border-gray-500">
                <!-- <tr class="text-center">
                    <td class="py-3 px-3">1</td>
                    <td class="py-3 px-3">Nadim </td>
                    <td class="py-3 px-3">SSC</td>
                    <td class="py-3 px-3">Sylhet</td>
                </tr> -->
                <?php
                $sql = "SELECT s.id, s.FirstName, s.Education, c.city FROM `student_list` s INNER JOIN `city_name` c ON s.Address = c.cid";
                $result = mysqli_query($con,$sql);
                while($row = mysqli_fetch_assoc($result)){
                    $id = $row['id'];
                    $firstname = $row['FirstName'];
                    $education = $row['Education'];
                    $address = $row['city'];
                    echo'
                    <tr class="text-center">
                    <td class="py-3 px-3">'.$id.'</td>
                    <td class="py-3 px-3">'.$firstname.' </td>
                    <td class="py-3 px-3">'.$education.'</td>
                    <td class="py-3 px-3">'.$address.'</td>
                </tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
  
    <script>
        let btn = document.getElementById('buttons')
        function toggle() {
            btn.classList.toggle('hidden')
        }
    </script>
   
 
</body>
</html>
<?php


?>
