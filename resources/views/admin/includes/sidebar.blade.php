<div class="sidebar" data-color="azure" data-background-color="white"
    data-image="{{asset('backend')}}/img/sidebar-1.jpg">
    <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
    <div class="logo">
        <a href="{{route('admin.dashboard')}}" class="simple-text logo-normal">
            {{auth()->user()->name}}
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="{{Request::is('admin/dashboard*') ? 'active' : '' }}">
                <a class="nav-link" href="{{route('admin.dashboard')}}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>

            <li class="{{Request::is('admin/slider*') ? 'active' : '' }}">
                <a class="nav-link" href="{{route('slider.index')}}">
                    <i class="material-icons">
                        slideshow
                    </i>
                    <p>Sliders</p>
                </a>
            </li>

            <li class="{{Request::is('admin/categories*') ? 'active' : '' }}">
                <a class="nav-link" href="{{route('categories.index')}}">
                    <i class="material-icons">
                        category
                    </i>
                    <p>Categories</p>
                </a>
            </li>
            <li class="{{Request::is('admin/items*') ? 'active' : '' }}">
                <a class="nav-link" href="{{route('items.index')}}">
                    <i class="material-icons">
                        library_books
                    </i>
                    <p>Items</p>
                </a>
            </li>

             <li class="{{Request::is('admin/reservation*') ? 'active' : '' }}">
                <a class="nav-link" href="{{route('reservation.index')}}">
                    <i class="material-icons">
                        chrome_reader_mode
                    </i>
                    <p>Reservations</p>
                </a>
            </li>

             <li class="{{Request::is('admin/contact*') ? 'active' : '' }}">
                <a class="nav-link" href="{{route('contact.index')}}">
                    <i class="material-icons">
                        message
                    </i>
                    <p>contact message</p>
                </a>
            </li>

        </ul>
    </div>
</div>
