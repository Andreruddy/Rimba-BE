<!-- Left Panel -->
<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="#"><i class
                        ="menu-icon fa fa-laptop"></i>Dashboard </a>
                </li>
                <li class="menu-title">Items</li><!-- /.menu-title -->
                <li class="">
                    <a href="{{route('items.index')}}"> <i class="menu-icon fa fa-list"></i>Lihat Item</a>
                </li>
                <li class="">
                    <a href="{{route('items.create')}}"> <i class="menu-icon fa fa-plus"></i>Tambah Item</a>
                </li>
                <li class="menu-title">Sales</li><!-- /.menu-title -->
                <li class="">
                    <a href="{{route('sales.index')}}"> <i class="menu-icon fa fa-list"></i>Lihat Transaksi</a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>
<!-- /#left-panel -->