<!-- the menu -->
<div class="navbar navbar-inverse navbar-static-top">
    <div class="container">
        <!-- text that will appear as the name of the menu -->
        <a href="/tools" class="navbar-brand">Pro-Technic</a>

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
                <li class="active"><a href="#">Test 1</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Test 2 <b class="caret"></b></a>

                    <ul class="dropdown-menu">
                        <li><a href="#">Drop Down 1</a></li>
                        <li><a href="#">Drop Down 2</a></li>
                    </ul>
                </li>
                <li><a href="#">Test 3</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                @if ( ! Auth::user())
                    <li><a href="/auth/login">Login</a></li>
                    <li><a href="/auth/register">Register</a></li>
                @else
                    <li><a href="/auth/logout">Logout</a></li>
                @endif
            </ul>
        </div>
    </div>
</div>