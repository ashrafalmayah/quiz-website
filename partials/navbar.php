<style>
    /* header {
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 100;
        display: grid;
        grid-template-columns: 1fr auto;
        align-items: center;
        padding: 0 2rem;
        background-color: #0b61c1;
        box-shadow: 3px 3px 5px #5e687949;
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
        background-color: #0b61c150;
    } */
    .sidebar {
        position: fixed;
        top: 0;
        width: 60px;
        height: 100%;
        box-sizing: border-box;
        padding: 10px;
        background-color: #fff;
        transition: ease-in-out 0.3s;
        z-index: 99;
        box-shadow: -2px 0px 5px #00000030;
        overflow: hidden;
    }

    .logo {
        color: unset;
        text-decoration: none;
        font-size: 2rem;
        font-weight: bold;
        padding: 0.5rem;
    }

    .sidebar:hover {
        width: 200px;
    }

    .sidebar:hover .item .text {
        opacity: 1;
    }

    hr {
        height: 1px;
        color: #919191;
        margin: 15px 0;
    }

    .sidebar .item {
        display: flex;
        align-items: center;
        gap: 20px;
        margin: 20px 0;
        text-decoration: none;
        color: unset;
        border-radius: 5px;
        padding: .5rem;
        box-shadow: -3px -3px 7px #ffffff73, 3px 3px 5px #538aff49;
    }

    .sidebar .item:hover {
        box-shadow: inset -3px -3px 7px #ffffff73, inset 3px 3px 5px #538aff49;
    }

    .sidebar .item .icon {
        flex-shrink: 0;
        fill: #424242;
    }

    .sidebar .item .text {
        opacity: 0;
        transition: ease-in-out 0.3s;
        transition-delay: .2s;
        margin-left: 15px;
        white-space: nowrap;
    }

    .icon svg {
        fill: #2b69dd;
    }

    .toggle-mobile {
        display: none;
    }

    @media screen and (max-width: 768px) {
        .sidebar {
            transform: translate(200px);
            width: 200px;
            overflow: visible;
        }

        .sidebar .item .text {
            opacity: 1;
        }

        .toggle-mobile {
            border: none;
            display: block;
            position: absolute;
            top: 0;
            left: -50px;
            width: 50px;
            background: #fff;
            aspect-ratio: 1;
            border-radius: 10px;
            padding: 5px;
        }

        .sidebar.active {
            transform: translate(0px);
        }
    }
</style>

<aside class="sidebar">
    <button class="toggle-mobile" onclick="toggleNav()">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path d="M2 5L2 7L22 7L22 5L2 5 z M 2 11L2 13L22 13L22 11L2 11 z M 2 17L2 19L22 19L22 17L2 17 z" fill="#306CDE" />
        </svg>
    </button>
    <a class="logo" href="/">Q</a>
    <ul>
        <li>
            <a class="item" href="/">
                <span class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" width="20" height="20">
                        <path d="M25 1.0507812C24.7825 1.0507812 24.565859 1.1197656 24.380859 1.2597656L1.3808594 19.210938C0.95085938 19.550938 0.8709375 20.179141 1.2109375 20.619141C1.5509375 21.049141 2.1791406 21.129062 2.6191406 20.789062L4 19.710938L4 46C4 46.55 4.45 47 5 47L19 47L19 29L31 29L31 47L45 47C45.55 47 46 46.55 46 46L46 19.710938L47.380859 20.789062C47.570859 20.929063 47.78 21 48 21C48.3 21 48.589063 20.869141 48.789062 20.619141C49.129063 20.179141 49.049141 19.550938 48.619141 19.210938L25.619141 1.2597656C25.434141 1.1197656 25.2175 1.0507812 25 1.0507812 z M 35 5L35 6.0507812L41 10.730469L41 5L35 5 z" />
                    </svg>
                </span>
                <div class="text">الرئيسية</div>
            </a>
        </li>
        <?php if (isset($_SESSION["user"])) : ?>
            <li>
                <a class="item" href="/dashboard">
                    <span class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20">
                            <path d="M9 2H4C2.897 2 2 2.897 2 4v7c0 1.103.897 2 2 2h5c1.103 0 2-.897 2-2V4C11 2.897 10.103 2 9 2zM20 2h-5c-1.103 0-2 .897-2 2v3c0 1.103.897 2 2 2h5c1.103 0 2-.897 2-2V4C22 2.897 21.103 2 20 2zM9 15H4c-1.103 0-2 .897-2 2v3c0 1.103.897 2 2 2h5c1.103 0 2-.897 2-2v-3C11 15.897 10.103 15 9 15zM20 11h-5c-1.103 0-2 .897-2 2v7c0 1.103.897 2 2 2h5c1.103 0 2-.897 2-2v-7C22 11.897 21.103 11 20 11z" />
                        </svg>
                    </span>
                    <div class="text">لوحة التحكم</div>
                </a>
            </li>
            <li>
                <a class="item" href="/logout">
                    <span class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20">
                            <path d="M6 2C4.897 2 4 2.897 4 4L4 20C4 21.103 4.897 22 6 22L18 22C19.103 22 20 21.103 20 20L20 15.25L18.001953 16.748047L18.001953 20L6 20L6 4L18 4L18 7.25L20 8.75L20 4C20 2.897 19.103 2 18 2L6 2 z M 16 8.25L16 11L11 11L11 13L16 13L16 15.75L21 12L16 8.25 z" />
                        </svg>
                    </span>
                    <div class="text">تسجيل الخروج</div>
                </a>
            </li>
        <?php else : ?>
            <li>
                <a class="item" href="/register">
                    <span class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="20" height="20">
                            <path d="M16 4C10.421875 4 5.742188 7.832031 4.40625 13L6.46875 13C7.746094 8.945313 11.53125 6 16 6C21.515625 6 26 10.484375 26 16C26 21.515625 21.515625 26 16 26C11.53125 26 7.746094 23.054688 6.46875 19L4.40625 19C5.742188 24.167969 10.421875 28 16 28C22.617188 28 28 22.617188 28 16C28 9.382813 22.617188 4 16 4 Z M 15.34375 11.28125L13.90625 12.71875L16.1875 15L4 15L4 17L16.1875 17L13.90625 19.28125L15.34375 20.71875L19.34375 16.71875L20.03125 16L19.34375 15.28125Z" />
                        </svg>
                    </span>
                    <div class="text">تسجيل</div>
                </a>
            </li>
        <?php endif; ?>
    </ul>
    <script>
        const nav = document.querySelector(".sidebar");

        function toggleNav() {
            nav.classList.toggle("active");
        }
    </script>
</aside>