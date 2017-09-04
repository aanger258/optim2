<!-- Navigation -->
<aside id="menu">
    <div id="navigation">
        <ul class="nav" id="side-menu">
            <li>
                <a href="{{ URL::to('/admin/home') }}"> <span class="nav-label">Dashboard</span> <span class="label label-success pull-right">v.1</span> </a>
            </li>
            <li>
                <a href="#"><span class="nav-label">Utilizatori</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                    <li><a href="{{ URL::to('/admin/user-groups') }}">Grupuri de utilizatori</a></li>
                    <li><a href="{{ URL::to('/admin/accounts') }}">Manager de conturi</a></li>
                </ul>
            </li>
            <li>
                <li><a href="{{ URL::to('/admin/zone') }}">Zone</a></li>
            </li>
        </ul>
    </div>
</aside>