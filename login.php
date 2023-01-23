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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

</head>

<body>

    <?php include "include/header.php"; ?>


    <div class="flex justify-between items-stretch bg-[url('images/loginPageConnection.jpg')] w-full h-[88.8vh] relative">
        <div class="bg-black absolute w-full h-full opacity-75"></div>
        <div class="absolute w-full h-full px-10">
            <h1 class="flex justify-center items-center h-full px-16 gap-10"> 
                <div class="w-5/8 ">
                    <h1 class="text-white text-6xl font-black">Welcome in Facemask</h1>
                    <h2 class="text-white text-4xl">Connecting Together</h2>
                </div>
                <div class="w-3/8">
                    <div class="bg-white w-full h-auto px-10 py-5 rounded-lg">
                        <div class="flex">
                            <h2 class="text-slate-800 text-3xl font-semibold capitalize mb-5">Create An Account</h2>
                        </div>
                        <form action="include/dbConfig.php" method="post" autocomplete="false">
                            <div class="mb-3 flex gap-5">
                                <input type="text" name="fname" placeholder="First name" class="border border-slate-300 w-full">
                                <input type="text" name="lname" placeholder="Last name" class="border border-slate-300 w-full">
                            </div>
                            <div class="mb-3 flex gap-5">
                                <input type="email" name="email" placeholder="Email" class="border border-slate-300 w-full">
                            </div>
                            <div class="mb-3 flex gap-5">
                                <input type="number" name="contact" placeholder="Contact" class="border border-slate-300 w-full">
                            </div>
                            <div class="mb-3 flex gap-1 flex-col text-slate-500">
                                <label for="" class="text-slate-500">Date of Birth</label>
                                <input type="date" name="dob"  class="border border-slate-300 w-full">
                            </div>
                            <div class="mb-3 flex gap-1 flex-col text-slate-500">
                                <select name="gender"  class="border border-slate-300 w-full p-2">
                                        <option value="" selected disabled>Select Gender</option>
                                        <option value="m">Male</option>
                                        <option value="f">Female</option>
                                        <option value="o">Other</option>
                                </select>
                            </div>
                            <div class="mb-3 flex gap-5">
                                <input type="password" name="password" placeholder="Enter Password" class="border border-slate-300 w-full">
                                <input type="password" name="cnf_password" placeholder="Confirm Password" class="border border-slate-300 w-full">
                            </div>
                            <div class="mb-3 flex gap-5 mt-5">
                                <input type="submit" name="create" value="Create an Account" class="bg-green-600 w-full  text-white px-3 py-2 rounded-md">
                            </div>
                        </form>
                    </div>
                </div>
            </h1>
        </div>

    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.2/flowbite.min.js"></script>
</body>

</html>