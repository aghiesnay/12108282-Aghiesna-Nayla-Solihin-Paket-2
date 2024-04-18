<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/dash.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="#" class="brand"><i class='bx bxs-smile icon'></i>
            {{ Auth::user()->role == 'admin' ? 'Admin Site' : 'Employee Site' }}</a>
        <ul class="side-menu">
            <li><a href="/dashboard" class="active"><i class='bx bxs-dashboard icon'></i> Dashboard</a></li>
            <!-- Product Untuk Admin and Employee -->
            @if (Auth::user()->role == 'admin' || Auth::user()->role == 'employee')
                <li class="divider" data-text="main">Main</li>
                <li>
                    <a href="#"><i class='bx bxs-category icon'></i> Produk <i
                            class='bx bx-chevron-right icon-right'></i></a>
                    <ul class="side-dropdown">
                        <li><a href="/product">Products</a></li>
                        <li><a href="/data-sales">Data Sales</a></li>

                        {{-- Hak akses untuk Employee --}}
                        @if (Auth::user()->role == 'employee')
                            <li><a href="/sale">Sale</a></li>
                        @endif
                    </ul>
                </li>
            @endif
            <!-- Hak Akses Untuk Admin -->
            @if (Auth::user()->role == 'admin')
                <li class="divider" data-text="user">User</li>
                <li>
                    <a href="#"><i class='bx bxs-user icon'></i> User <i
                            class='bx bx-chevron-right icon-right'></i></a>
                    <ul class="side-dropdown">
                        <a href="/user"><i></i> Tambah User <i></i></a>
                        <li><a href="/data-user">Data User</a></li>
                    </ul>
                </li>
            @endif
            <!-- Hak Akses Untuk Employee-->
            @if (Auth::user()->role == 'employee')
                <li class="divider" data-text="customer">Customer</li>
                <li>
                    <a href="#"><i class='bx bxs-user icon'></i> Customer <i
                            class='bx bx-chevron-right icon-right'></i></a>
                    <ul class="side-dropdown">
                        <li><a href="/data-customer">Data Customer</a></li>
                    </ul>
                </li>
            @endif
               
        </ul>
    </section>
    <!-- END SIDEBAR -->

    <!-- CONTENT & NAVBAR -->
    <section id="content">
        <!-- NAVBAR -->
        <nav>
            <i class='bx bx-menu toggle-sidebar'></i>
            <form action="#">
                <div class="form-group">
                    <input type="text" placeholder="Search...">
                    <i class='bx bx-search icon'></i>
                </div>
            </form>
            <span class="divider"></span>
            <div class="profile">
                <img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixid=MnwxMjA3fDB8MHxzZWFyY2h8NHx8cGVvcGxlfGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60"
                    alt="">
                <ul class="profile-link">
                    <li><a href="/logout"><i class='bx bxs-log-out-circle'></i> Logout</a></li>
                </ul>
            </div>
        </nav>
        <!-- END NAVBAR -->

        <!-- CONTENT -->
        @yield('content')
        <!-- END CONTENT -->
    </section>
    <!-- END CONTENT -->

    <!-- Scripts here -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="/assets/js/script.js"></script>
</body>

</html>
