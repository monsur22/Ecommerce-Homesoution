@include('templates/backend_header')
@include('templates/backend_sidebar')
<div class="row show_container">
    <div class="col-md-12 show_wrapper">
        <h1>Menu Item: {{ $menu->menu_item_name }}</h1>
        <table class="table table-bordered table_show">
            <tr>
                <th>Menu Item Name</th>
            </tr>
            <tr>
                <td><h4>{{ $menu->menu_item_name }}</h4></td>
            </tr>
        </table>
        <a class="btn btn-inverse button_back pull-right" href="{{ route('menus.index') }}">Back</a>
    </div>
    <!-- /#page-wrapper -->
</div>
</div>
<!-- /#wrapper -->
</div>
