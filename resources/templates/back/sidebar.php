<input type="checkbox" id="sidebar-toggle">
<nav class="sidebar">
    <div class="sidebar-brand">
        <h1>Admin</h1>
    </div>
    <div class="sidebar-menu">
        <ul>
            <li>
                <a href="" class="<?php if(basename($_SERVER['PHP_SELF']) == "index.php" || basename($_SERVER['PHP_SELF']) == "dashboard.php"){echo "admin-active";} else {echo "";} ?>"><i class="fas fa-chart-line"></i><span>Dashboard</span></a>
            </li>
            <li>
                <a href="" class="<?php if(basename($_SERVER['PHP_SELF']) == "post.php" || basename($_SERVER['PHP_SELF']) == "p.php"){echo "admin-active";} else {echo "";} ?>"><i class="far fa-newspaper"></i><span>Post</span></a>
            </li>
            <li>
                <a href="" class="<?php if(basename($_SERVER['PHP_SELF']) == "consulenze.php" || basename($_SERVER['PHP_SELF']) == "c.php"){echo "admin-active";} else {echo "";} ?>"><i class="fas fa-balance-scale"></i><span>Consulenze</span></a>
            </li>
            <li>
                <a href="" class="<?php if(basename($_SERVER['PHP_SELF']) == "utenti.php" || basename($_SERVER['PHP_SELF']) == "u.php"){echo "admin-active";} else {echo "";} ?>"><i class="fas fa-users"></i><span>Utenti</span></a>
            </li>
        </ul>
    </div>
</nav>