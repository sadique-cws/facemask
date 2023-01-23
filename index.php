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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <style>
        textarea {
            resize: none !important;
        }
    </style>
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
                            <img src="<?= $user['dp']; ?>" class="w-full h-16 border-2 rounded-lg border-white -mt-8" alt="">
                        </div>

                        <div class="flex flex-col text-center">
                            <h2 class="text-xl font-bold font-sans mt-3 text-slate-900"><?= $user['fname'] . " " . $user['lname']; ?></h2>
                            <p class="text-sm">Mentor at Code with sadiQ</p>

                            <form enctype="multipart/form-data" method="post" class=" mt-5">
                                <label for="dp_upload" class="px-3 py-2 bg-sky-600 rounded-lg text-white">
                                    <input type="file" id="dp_upload" class="hidden" name="dp" onchange="this.form.submit()">
                                    Change Profile Picture
                                </label>
                            </form>

                            <?php
                            if (isset($_FILES['dp']['name'])) {
                                $dp = $_FILES['dp']['name'];
                                $tmp_dp = $_FILES['dp']['tmp_name'];

                                move_uploaded_file($tmp_dp, "./images/dp/$dp");
                                $user_id = $user['id'];
                                $query = mysqli_query($connect, "update accounts SET dp='$dp' where id='$user_id'");
                                if ($query) {
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
            <!-- post insert area -->
            <div class="bg-white w-full h-auto rounded-lg border border-slate-300 mb-5">
                <div class="flex justify-center gap-5 p-4">
                    <div class="w-1/12">
                        <img src="<?= $url; ?>" class="w-12 h-auto rounded-full flex-0" alt="">
                    </div>
                    <form action="include/dbConfig.php" class="w-11/12 flex justify-end flex-col items-end" method="post" enctype="multipart/form-data">
                        <textarea name="post_caption" id="" rows="3" class="w-full outline-0 border-0 focus:outline-none focus:border-0" placeholder="Whats in your Mind?"></textarea>
                        <div class="flex gap-3">
                            <label for="post_image" class="px-2 py-1 cursor-pointer bg-slate-300 text-xs rounded text-slate-800">
                                <input type="file" id="post_image" class="hidden" name="post_image">
                                Image
                            </label>

                            <input type="submit" value="Send Post" name="create_post" class="bg-blue-500 hover:bg-blue-700 cursor-pointer self-end text-white text-sm  px-2 py-1 rounded">

                        </div>
                    </form>
                </div>
            </div>
            <!-- end of post area -->

            <!-- calling post -->
            <?php
            $query = mysqli_query($connect, "select * from posts Join accounts ON posts.post_by = accounts.id order by posts.id DESC");
            while ($post = mysqli_fetch_array($query)) :
            ?>
                <div class="bg-white w-full h-auto rounded-lg border border-slate-300 my-3">
                    <div class="flex justify-between gap-4 p-4">
                        <div>
                            <div class="flex gap-4">
                                <img src="./images/dp/<?= $post['dp']; ?>" class="w-12 h-auto rounded-full flex-0" alt="">
                                <div class="flex flex-col">
                                    <h4 class="text-lg font-semibold text-slate-800 capitalize"><?= $post['fname'] . " " . $post['lname']; ?></h4>
                                    <p class="text-xs text-slate-600"><?= date("H:i A D d M Y", strtotime($post['created_at'])); ?></p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <i class="bi bi-three-dots"></i>
                        </div>
                    </div>
                    <div class="flex flex-col">
                        <p class="text-xl text-slate-600 p-3"><?= $post['caption']; ?></p>

                        <?php if ($post['image'] != null) : ?>
                            <img src="./images/post/<?= $post['image']; ?>" class="w-full" alt="">
                        <?php endif; ?>
                    </div>
                </div>
            <?php endwhile; ?>
            <!-- end calling post -->
        </div>
        <div class="w-1/4">
            <div class="bg-white w-full h-screen rounded-lg border border-slate-300">

                <?php
                $callingAccounts = mysqli_query($connect, "select * from accounts");
                while ($account = mysqli_fetch_array($callingAccounts)) :
                ?>
                    <a href='profile.php?id=<?= $account['id'];?>' class="flex px-5 py-2 justify-center items-center hover:bg-slate-100 cursor-pointer">
                        <div class="w-3/12">
                            <img src="<?= ($account['dp'] == null)? (($account['gender'] == "f")? "./images/female_default_dp.png": "./images/male_default_dp.jpg") : "./images/dp/".$account['dp']; ?>" class="w-10 h-10 rounded-full" alt="">
                        </div>
                        <div class="w-9/12">
                            <h2 class="captilize text-slate-800"><?= ($user['id'] == $account['id'])? "Me" : $account['fname'] . " " . $account['lname'];?></h2>
                        </div>
                </a>
                <?php endwhile; ?>

            </div>
        </div>
    </div>

</body>

</html>