<?php include_once "include/dbConfig.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facemask - Connect with The World</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.2/flowbite.min.css" rel="stylesheet" />
</head>

<body>

    <?php include "include/header.php"; ?>


    <div class="flex justify-center items-stretch bg-white w-full h-[88.8vh]">
        <div class="w-1/3 mt-4">
            <div class="bg-slate-200 shadow-lg w-full h-auto px-10 py-5 rounded-lg">
                <div class="flex">
                    <h2 class="text-slate-800 text-3xl font-semibold capitalize mb-5">Sign In </h2>
                </div>
                <form action="include/dbConfig.php" method="post" autocomplete="false">
                  
                    <div class="mb-3 flex gap-5">
                        <input type="text" name="email" placeholder="Email" class="border border-slate-300 w-full">
                    </div>
                    <div class="mb-3 flex gap-5">
                        <input type="password" name="password" placeholder="Enter Password" class="border border-slate-300 w-full">
                    </div>
                    <div class="mb-3 flex gap-5 mt-5">
                        <input type="submit" name="login" value="Login" class="bg-green-600 w-full  text-white px-3 py-2 rounded-md">
                    </div>
                </form>
            </div>
        </div>
    </div>

    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.2/flowbite.min.js"></script>
</body>

</html>