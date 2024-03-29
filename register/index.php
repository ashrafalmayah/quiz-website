<?php
require("../functions.php");

$errors = $_SESSION['errors'] ?? '';
$registerType = $_SESSION["registerType"] ?? '';
$_SESSION['errors'] = '';
$_SESSION["registerType"] = '';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php require("../partials/navbar.php"); ?>
    <div class="section">
        <div class="container">
            <div class="row full-height justify-content-center">
                <div class="col-12 text-center align-self-center py-5">
                    <div class="section pb-5 pt-5 pt-sm-2 text-center">
                        <h6 class="mb-0 pb-0"> <span>تسجيل </span><span>تسجيل الدخول</span></h6>
                        <input class="checkbox" <?= $registerType == 'register' ? 'checked' : '' ?> type="checkbox" id="reg-log" name="reg-log">
                        <label for="reg-log"></label>
                        <svg width="0" height="0" viewBox="0 0 10 10" version="1.1" xmlns="http://www.w3.org/2000/svg" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;">
                            <clipPath id="slice1" clipPathUnits="objectBoundingBox">
                                <path transform="scale(0.03, 0.03)" style='translate: -0.2px -0.2px' d="M9.858,9.858C6.08,13.636,4,18.658,4,24s2.08,10.364,5.858,14.142C13.636,41.92,18.658,44,24,44s10.364-2.08,14.142-5.858 C41.92,34.364,44,29.342,44,24s-2.08-10.364-5.858-14.142C34.364,6.08,29.342,4,24,4S13.636,6.08,9.858,9.858z M29,19.5 c0,0.828-0.672,1.5-1.5,1.5h-4.379l7.439,7.439c0.586,0.586,0.586,1.535,0,2.121C30.268,30.854,29.884,31,29.5,31 s-0.768-0.146-1.061-0.439L21,23.121V27.5c0,0.828-0.672,1.5-1.5,1.5S18,28.328,18,27.5v-8c0-0.193,0.04-0.377,0.106-0.547 c0.003-0.008,0.004-0.016,0.007-0.023c0.152-0.369,0.447-0.664,0.816-0.816c0.008-0.003,0.016-0.004,0.023-0.007 C19.123,18.04,19.307,18,19.5,18h8C28.328,18,29,18.672,29,19.5z" style="fill:none;" />
                            </clipPath>
                        </svg>
                        <div class="card-3d-wrap mx-auto">
                            <div class="card-3d-wrapper">
                                <div class="card-front">
                                    <div class="center-wrap">
                                        <form method="post" action="login-db.php" id="login" class="section text-center">
                                            <h4 class="mb-4 pb-3">تسجيل الدخول</h4>
                                            <span class="error emailError"></span>
                                            <div class="form-group">
                                                <input name="email" class="form-style" placeholder="البريد الالكتروني" autocomplete="on">
                                                <span class="input-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 26 26" width="20" height="20">
                                                        <path d="M15.203125 17.136719L15.109375 17.136719C14.390625 19.15625 13.089844 20.164063 11.199219 20.164063C9.78125 20.164063 8.640625 19.636719 7.773438 18.578125C6.902344 17.523438 6.46875 16.058594 6.46875 14.1875C6.46875 11.769531 7.070313 9.800781 8.273438 8.28125C9.472656 6.765625 10.921875 6.007813 12.613281 6.007813C14.144531 6.007813 15.105469 6.625 15.496094 7.863281L15.558594 7.863281L15.710938 6.292969L19.175781 6.292969C18.714844 10.796875 18.480469 13.738281 18.480469 15.125C18.480469 16.605469 18.871094 17.34375 19.652344 17.34375C20.476563 17.34375 21.152344 16.78125 21.6875 15.664063C22.21875 14.542969 22.488281 13.078125 22.488281 11.273438C22.488281 8.800781 21.722656 6.773438 20.191406 5.191406C18.660156 3.613281 16.527344 2.820313 13.785156 2.820313C10.847656 2.820313 8.40625 3.875 6.460938 5.984375C4.515625 8.09375 3.542969 10.664063 3.542969 13.699219C3.542969 16.636719 4.402344 18.949219 6.121094 20.640625C7.84375 22.332031 10.214844 23.179688 13.246094 23.179688C15.558594 23.179688 17.671875 22.726563 19.59375 21.816406L19.59375 24.84375C17.835938 25.613281 15.578125 26 12.816406 26C9.023438 26 5.941406 24.882813 3.566406 22.648438C1.1875 20.410156 0 17.40625 0 13.632813C0 9.785156 1.269531 6.554688 3.804688 3.933594C6.339844 1.3125 9.605469 0 13.601563 0C17.296875 0 20.289063 1.015625 22.574219 3.050781C24.859375 5.085938 26 7.769531 26 11.097656C26 13.835938 25.300781 16.03125 23.90625 17.6875C22.507813 19.339844 20.777344 20.167969 18.714844 20.167969C17.699219 20.167969 16.871094 19.886719 16.234375 19.328125C15.597656 18.765625 15.253906 18.035156 15.203125 17.136719 Z M 13.152344 8.765625C12.230469 8.765625 11.476563 9.308594 10.898438 10.390625C10.316406 11.476563 10.027344 12.730469 10.027344 14.15625C10.027344 15.171875 10.226563 15.960938 10.621094 16.527344C11.015625 17.09375 11.523438 17.375 12.152344 17.375C13.117188 17.375 13.878906 16.84375 14.433594 15.773438C14.984375 14.707031 15.261719 13.28125 15.261719 11.496094C15.261719 10.648438 15.070313 9.984375 14.683594 9.496094C14.300781 9.011719 13.789063 8.765625 13.152344 8.765625Z" fill="#306CDE" />
                                                    </svg>
                                                </span>
                                            </div>
                                            <div class="form-group mt-2">
                                                <input type="password" name="password" class="form-style" placeholder="كلمة المرور">
                                                <span class="input-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 26 26" width="20" height="20">
                                                        <path d="M13 0C10.320313 0 8.195313 0.832031 6.84375 2.34375C5.492188 3.855469 5 5.839844 5 7.90625L5 9L8 9L8 7.90625C8 6.3125 8.359375 5.128906 9.0625 4.34375C9.765625 3.558594 10.898438 3 13 3C15.105469 3 16.238281 3.535156 16.9375 4.3125C17.636719 5.089844 18 6.296875 18 7.90625L18 9L21 9L21 7.90625C21 5.828125 20.511719 3.820313 19.15625 2.3125C17.800781 0.804688 15.675781 0 13 0 Z M 5 10C3.34375 10 2 11.34375 2 13L2 23C2 24.65625 3.34375 26 5 26L21 26C22.65625 26 24 24.65625 24 23L24 13C24 11.34375 22.65625 10 21 10 Z M 7 16C8.105469 16 9 16.894531 9 18C9 19.105469 8.105469 20 7 20C5.894531 20 5 19.105469 5 18C5 16.894531 5.894531 16 7 16 Z M 13 16C14.105469 16 15 16.894531 15 18C15 19.105469 14.105469 20 13 20C11.894531 20 11 19.105469 11 18C11 16.894531 11.894531 16 13 16 Z M 19 16C20.105469 16 21 16.894531 21 18C21 19.105469 20.105469 20 19 20C17.894531 20 17 19.105469 17 18C17 16.894531 17.894531 16 19 16Z" fill="#306CDE" />
                                                    </svg>
                                                </span>
                                            </div>
                                            <div class="error loginError"><?= $errors["login"] ?? '' ?></div>
                                            <input type="submit" class="btn mt-4" value="تسجيل الدخول">
                                        </form>
                                    </div>
                                </div>
                                <div class="card-back">
                                    <div class="center-wrap">
                                        <form method="post" action="register-db.php" id="register" class="section text-center">
                                            <h4 class="mb-4 pd-3">تسجيل</h4>
                                            <span class="error usernameError"><?= $errors["username"] ?? '' ?></span>
                                            <div class="form-group">
                                                <input type="text" name="username" class="form-style" placeholder="اسم المستخدم" autocomplete="on">
                                                <i class="input-icon uil uil-user"></i>
                                            </div>
                                            <span class="error emailError"><?= $errors["email"] ?? '' ?></span>
                                            <div class="form-group mt-2">
                                                <input type="email" name="email" class="form-style" placeholder="البريد الالكتروني" autocomplete="on">
                                                <span class="input-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 26 26" width="20" height="20">
                                                        <path d="M15.203125 17.136719L15.109375 17.136719C14.390625 19.15625 13.089844 20.164063 11.199219 20.164063C9.78125 20.164063 8.640625 19.636719 7.773438 18.578125C6.902344 17.523438 6.46875 16.058594 6.46875 14.1875C6.46875 11.769531 7.070313 9.800781 8.273438 8.28125C9.472656 6.765625 10.921875 6.007813 12.613281 6.007813C14.144531 6.007813 15.105469 6.625 15.496094 7.863281L15.558594 7.863281L15.710938 6.292969L19.175781 6.292969C18.714844 10.796875 18.480469 13.738281 18.480469 15.125C18.480469 16.605469 18.871094 17.34375 19.652344 17.34375C20.476563 17.34375 21.152344 16.78125 21.6875 15.664063C22.21875 14.542969 22.488281 13.078125 22.488281 11.273438C22.488281 8.800781 21.722656 6.773438 20.191406 5.191406C18.660156 3.613281 16.527344 2.820313 13.785156 2.820313C10.847656 2.820313 8.40625 3.875 6.460938 5.984375C4.515625 8.09375 3.542969 10.664063 3.542969 13.699219C3.542969 16.636719 4.402344 18.949219 6.121094 20.640625C7.84375 22.332031 10.214844 23.179688 13.246094 23.179688C15.558594 23.179688 17.671875 22.726563 19.59375 21.816406L19.59375 24.84375C17.835938 25.613281 15.578125 26 12.816406 26C9.023438 26 5.941406 24.882813 3.566406 22.648438C1.1875 20.410156 0 17.40625 0 13.632813C0 9.785156 1.269531 6.554688 3.804688 3.933594C6.339844 1.3125 9.605469 0 13.601563 0C17.296875 0 20.289063 1.015625 22.574219 3.050781C24.859375 5.085938 26 7.769531 26 11.097656C26 13.835938 25.300781 16.03125 23.90625 17.6875C22.507813 19.339844 20.777344 20.167969 18.714844 20.167969C17.699219 20.167969 16.871094 19.886719 16.234375 19.328125C15.597656 18.765625 15.253906 18.035156 15.203125 17.136719 Z M 13.152344 8.765625C12.230469 8.765625 11.476563 9.308594 10.898438 10.390625C10.316406 11.476563 10.027344 12.730469 10.027344 14.15625C10.027344 15.171875 10.226563 15.960938 10.621094 16.527344C11.015625 17.09375 11.523438 17.375 12.152344 17.375C13.117188 17.375 13.878906 16.84375 14.433594 15.773438C14.984375 14.707031 15.261719 13.28125 15.261719 11.496094C15.261719 10.648438 15.070313 9.984375 14.683594 9.496094C14.300781 9.011719 13.789063 8.765625 13.152344 8.765625Z" fill="#306CDE" />
                                                    </svg>
                                                </span>
                                            </div>
                                            <div class="form-group mt-2">
                                                <input type="password" name="password" class="form-style" placeholder="كلمة المرور">
                                                <span class="input-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 26 26" width="20" height="20">
                                                        <path d="M13 0C10.320313 0 8.195313 0.832031 6.84375 2.34375C5.492188 3.855469 5 5.839844 5 7.90625L5 9L8 9L8 7.90625C8 6.3125 8.359375 5.128906 9.0625 4.34375C9.765625 3.558594 10.898438 3 13 3C15.105469 3 16.238281 3.535156 16.9375 4.3125C17.636719 5.089844 18 6.296875 18 7.90625L18 9L21 9L21 7.90625C21 5.828125 20.511719 3.820313 19.15625 2.3125C17.800781 0.804688 15.675781 0 13 0 Z M 5 10C3.34375 10 2 11.34375 2 13L2 23C2 24.65625 3.34375 26 5 26L21 26C22.65625 26 24 24.65625 24 23L24 13C24 11.34375 22.65625 10 21 10 Z M 7 16C8.105469 16 9 16.894531 9 18C9 19.105469 8.105469 20 7 20C5.894531 20 5 19.105469 5 18C5 16.894531 5.894531 16 7 16 Z M 13 16C14.105469 16 15 16.894531 15 18C15 19.105469 14.105469 20 13 20C11.894531 20 11 19.105469 11 18C11 16.894531 11.894531 16 13 16 Z M 19 16C20.105469 16 21 16.894531 21 18C21 19.105469 20.105469 20 19 20C17.894531 20 17 19.105469 17 18C17 16.894531 17.894531 16 19 16Z" fill="#306CDE" />
                                                    </svg>
                                                </span>
                                            </div>
                                            <span class="error confirmPasswordError"></span>
                                            <div class="form-group mt-2">
                                                <input type="password" name="confirmPassword" class="form-style" placeholder="تأكيد كلمة المرور">
                                                <span class="input-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 26 26" width="20" height="20">
                                                        <path d="M13 0C10.320313 0 8.195313 0.832031 6.84375 2.34375C5.492188 3.855469 5 5.839844 5 7.90625L5 9L8 9L8 7.90625C8 6.3125 8.359375 5.128906 9.0625 4.34375C9.765625 3.558594 10.898438 3 13 3C15.105469 3 16.238281 3.535156 16.9375 4.3125C17.636719 5.089844 18 6.296875 18 7.90625L18 9L21 9L21 7.90625C21 5.828125 20.511719 3.820313 19.15625 2.3125C17.800781 0.804688 15.675781 0 13 0 Z M 5 10C3.34375 10 2 11.34375 2 13L2 23C2 24.65625 3.34375 26 5 26L21 26C22.65625 26 24 24.65625 24 23L24 13C24 11.34375 22.65625 10 21 10 Z M 7 16C8.105469 16 9 16.894531 9 18C9 19.105469 8.105469 20 7 20C5.894531 20 5 19.105469 5 18C5 16.894531 5.894531 16 7 16 Z M 13 16C14.105469 16 15 16.894531 15 18C15 19.105469 14.105469 20 13 20C11.894531 20 11 19.105469 11 18C11 16.894531 11.894531 16 13 16 Z M 19 16C20.105469 16 21 16.894531 21 18C21 19.105469 20.105469 20 19 20C17.894531 20 17 19.105469 17 18C17 16.894531 17.894531 16 19 16Z" fill="#306CDE" />
                                                    </svg>
                                                </span>
                                            </div>
                                            <input type="submit" class="btn mt-4" value="تسجيل">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="register.js"></script>
</body>

</html>