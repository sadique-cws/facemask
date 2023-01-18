<?php include_once "include/dbConfig.php"; 
checkAuth("singlelogin.php");
?>
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

    <?php include "include/mainHeader.php"; ?>

    <div class="bg-slate-100 flex flex-1 h-auto px-36 py-5 gap-5">
        <div class="w-1/4">
            <div class="bg-white w-full h-screen rounded-lg border border-slate-300">
                <div class="w-full h-64">
                    <div class="bg-[url('https://social.webestica.com/assets/images/bg/01.jpg')] h-16 w-full bg-cover bg-center"></div>
                    <div class="flex justify-center flex-col items-center">
                        <div class="w-16">
                            <img src="<?= $url;?>" class="w-full h-16 border-2 rounded-lg border-white -mt-8" alt="">
                        </div>

                        <div class="flex flex-col text-center">
                            <h2 class="text-xl font-bold font-sans mt-3 text-slate-900"><?= $user['fname'] . " " . $user['lname'];?></h2>
                            <p class="text-sm">Mentor at Code with sadiQ</p>

                            <form enctype="multipart/form-data" method="post" class=" mt-5">
                                <label for="dp_upload" class="px-3 py-2 bg-sky-600 rounded-lg text-white">
                                <input type="file" id="dp_upload" class="hidden" name="dp" onchange="this.form.submit()">
                                    Change Profile Picture
                                </label>
                            </form>
                            
                            <?php 
                                if(isset($_FILES['dp']['name'])){
                                    $dp = $_FILES['dp']['name'];
                                    $tmp_dp = $_FILES['dp']['tmp_name'];

                                    move_uploaded_file($tmp_dp, "./images/dp/$dp");
                                    $user_id = $user['id'];
                                    $query = mysqli_query($connect, "update accounts SET dp='$dp' where id='$user_id'");
                                    if($query){
                                        redirect();
                                    }
                                }

                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-2/4">
            <div class="bg-white w-full h-screen rounded-lg border border-slate-300"></div>
        </div>
        <div class="w-1/4">
            <div class="bg-white w-full h-screen rounded-lg border border-slate-300"></div>
        </div>
    </div>

</body>
</html>