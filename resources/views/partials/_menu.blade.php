<!-- the menu -->
<div class="navbar navbar-inverse navbar-static-top">
    <div class="container">
        <!-- text that will appear as the name of the menu -->
        <a href="/tools" class="navbar-brand">
            <img src="{{ url('/img/navbar1.png') }}"
                 alt="Pro-Technic" class="img-responsive" />
        </a>

        <!-- this will create a button when the menu is collapsed and it will take all  -->
        <!-- the items from the collapseMenu -->
        <button class="navbar-toggle" data-toggle="collapse" data-target="#collapseMenu">
            <!-- this will add the icon to the collapsed menu -->
            <span class="glyphicon glyphicon-menu-hamburger"></span>
        </button>

        <!-- this part will collapse when the resolution is small (i.e. on a mobile) -->
        <!-- the name of the collapsible menu is: collapseMenu -->
        <div class="collapse navbar-collapse" id="collapseMenu">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Test 2 <b class="caret"></b></a>

                    <ul class="dropdown-menu">
                        <li><a href="#">Drop Down 1</a></li>
                        <li><a href="#">Drop Down 2</a></li>
                    </ul>
                </li>
                <li class="{{ set_active('tools') }}"><a href="/tools">Tools</a></li>
                @if (Auth::user() != null && Auth::user()->role_id == 1)
                    <li class="{{ set_active('roles') }}"><a href="/roles">User Permissions</a></li>
                @endif
            </ul>

            <ul class="nav navbar-nav navbar-right">
                @if ( ! Auth::user())
                    <li class="{{ set_active('auth/login') }}"><a href="/auth/login">Login</a></li>
                    <li class="{{ set_active('auth/register') }}"><a href="/auth/register">Register</a></li>
                @else
                    <li class="{{ set_active('auth/logout') }}"><a href="/auth/logout">Logout</a></li>
                @endif
            </ul>
        </div>
    </div>
</div>