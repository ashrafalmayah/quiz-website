<style>
    header{
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 100;
        display: grid;
        grid-template-columns: 1fr auto;
        background-color: #7a7d80;
        padding: 0 2rem;
    }
    .logo{
        text-decoration: none;
        color: white;
        font-size: 2rem;
        font-weight: bold;
    }
    nav ul {
        display: flex;
        justify-content: center;
    }

    nav ul li {
        list-style: none;
    }

    nav ul li a {
        display: block;
        text-decoration: none;
        color: white;
        padding: 1em 1.5em;
        transition: background-color .3s;
    }
    nav ul li a:hover {
        background-color: #494b4d;
    }
</style>
<header>
    <nav>
        <ul>
            <li><a href="/">الرئيسية</a></li>
            <li><a href="/">عن الموقع</a></li>
            <?php if(isset($_SESSION["user"])): ?>
            <li><a href="/dashboard">لوحة التحكم</a></li>
            <li><a href="/logout">تسجيل الخروج</a></li>
            <?php else: ?>
            <li><a href="/login">تسجيل دخول</a></li>
            <li><a href="/register">تسجيل</a></li>
            <?php endif; ?>
        </ul>
    </nav>
    <a class="logo" href="/">Quizly</a>
</header>