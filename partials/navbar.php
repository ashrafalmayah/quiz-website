<style>
    header{
        position: fixed;
        top: 0;
        width: 100%;
    }
    nav ul {
        display: flex;
        background-color: #7a7d80;
        justify-content: center;
    }

    nav ul li {
        list-style: none;
    }

    nav ul li a {
        display: block;
        text-decoration: none;
        color: white;
        padding: .75em 1.5em;
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
            <?php if(isset($_SESSION["username"])): ?>
            <li><a href="/dashboard">لوحة التحكم</a></li>
            <?php else: ?>
            <li><a href="/login">تسجيل دخول</a></li>
            <li><a href="/register">تسجيل</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>