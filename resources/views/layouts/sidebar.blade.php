<aside class="main-sidebar" id="sidebar-wrapper" style="background: linear-gradient(70deg, blue, black);">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar" >

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
        
            <div class="pull-left info">
                @if (Auth::guest())
                <p>Write</p>
                @else
                    <p>{{ Auth::user()->name}}</p>
                @endif
                <!-- Status -->
            </div>
        </div>

        <!-- Sidebar Menu -->

        <ul class="sidebar-menu">
            @include('layouts.menu')
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>