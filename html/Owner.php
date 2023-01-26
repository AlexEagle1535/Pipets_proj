<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Система управления "Личный кабинет"</title>
    <link rel="stylesheet" href="../styles/global.css">
    <link rel="stylesheet" href="../styles/Owner.css">
    <link rel="stylesheet" href="../styles/Navbar.css">
</head>

<script>
    function addItem() {
        var field = document.getElementById("text").value;
        if (field === "") {
            return;
        }
        else {
            var li = document.createElement("li");
            li.innerHTML = field;
            document.getElementById("ol").appendChild(li);
            document.getElementById("text").value = "";
        }
    }
</script>

<body>
    <?php
    require 'C:\OSPanel\domains\bareproj\connect.php';
    $user=$_COOKIE['user'];
    $result = $mysql->query("SELECT `status` from `employers` WHERE `mail`='$user'");
    $row = $result->fetch_array();
    $mysql->close();
    if ($_COOKIE['user']=='' || $row['status'] != 1){
        header('Location: LoginPage.html');
    }
    ?>

    <input type="checkbox" id="drawer-toggle" name="drawer-toggle" />
    <label for="drawer-toggle" id="drawer-toggle-label"></label>
    <header>
        <h3>СИСТЕМА УПРАВЛЕНИЯ "ЛИЧНЫЙ КАБИНЕТ"</h3>
        <a href="Owner.php">
            <img class='icon' alt="icon" src="../assets/Main_icon.png"></img>
        </a>
    </header>
    <nav id="drawer">
        <ul>
            <li><a href="../assets/obrazec-zapolneniya-T-7.pdf">График отпусков</a></li>
            <li><a href="../assets/obrazec-raschetnyj-listok.pdf">Расчётный лист</a></li>
            <li><a href="./DI.html">Должностная инструкция</a></li>
            <li><a href="/exit.php">Выйти из аккаунта</a></li>
        </ul>
    </nav>
    <div class='flex-container'>
        <div class='profile-container'>
            <img src="../assets/owner_profile.jpg" alt="text" class='profile-photo'></img>
            <div class='profile-data'>
                <p>
                <?php
                    require 'C:\OSPanel\domains\bareproj\connect.php';
                    $user=$_COOKIE['user'];
                    $result = $mysql->query("SELECT `fio` from `employers` WHERE `mail`='$user'");
                    $row = $result->fetch_array();
                    print($row['fio']);
                    $mysql->close();
                ?>
                </p>
                <div class='underline'></div>
                <p>Руководитель</p>
                <div class='underline'></div>
                <p>Станок "Феррера"</p>
                <div class='underline'></div>
                <div class='button'>Рабочий состав</div>
                <div class='button'>Потратить пряники</div>
            </div>
        </div>
        <div class='taskBar-container'>
            <div class='plan'>
                <h2>План моих сотрудников</h2>
                <select class="list">
                    <option hidden selected>
                        Выберите вашего подчинённого
                    </option>
                    <option>
                        Зубенко Михаил Петрович
                    </option>
                </select>
                <div class='list'>
                    <ol id='ol'>
                        <li>Заполнить регистрационную форму</li>
                        <li>Настроить станок</li>
                        <li>Почитсить штекер</li>
                        <li>Профильровать жидкость</li>
                    </ol>
                </div>
                <form class='to-do'>
                    <input type="text" name='text' id="text" placeholder='Вводите текст'></input>
                    <div class='button' id="button" onclick="addItem()">Добавить задачу</div>
                </form>
            </div>
            <div class='.additionalInfo-container'>

            </div>
        </div>
        <footer>
            <div class="social-icon">
                <a href="https://www.google.ru/"><img src="../assets/icons8-google-50 (1).png" alt="text"></a>
            </div>
            <div class="social-icon">
                <a href="https://vk.company/ru/"><img src="../assets/icons8-вконтакте-50.png" alt="text"></a>
            </div>
            <div class="social-icon">
                <a href="https://telegram.org/"><img src="../assets/icons8-телеграмма-app-50 (1).png" alt="text"></a>
            </div>
        </footer>
    </div>
</body>

</html>