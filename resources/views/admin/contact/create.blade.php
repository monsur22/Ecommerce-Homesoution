@include('templates/backend_header')
@include('templates/backend_sidebar')
<div class="row create_container">
    <div class="col-md-8 col-md-offset-2 create_wrapper">
        <h1>Create Menu Item:<a class="btn btn-link create_index_link pull-right" href="{{ route('menus.index') }}"><strong>Show All</strong></a></h1>
        <br>
        @yield('create_content')

        @if (count($errors) > 0)
            <!-- Form Error List -->
            <div class="alert alert-danger">
                <strong>Whoops!</strong> Something went wrong!.<br><br>

                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="form_create" name="create_form" action="{{ route('storeMenu') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form_create_div row">
                <label class="edit_form_label col-sm-2 col-form-label" for="menu_item_name">Menu Item:</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="menu_item_name" placeholder="Enter Menu Item" size="40">
                </div>
            </div>
            </br></br>

            <div class="form-group row mb-0">
                <div class="col-md-6 col-md-offset-4">
                    <input class="btn btn-primary button_submit" type="submit" name="submit" value="Save">
                </div>
            </div>
            <a class="btn btn-link pull-right" href="{{ route('menus.index') }}">Back</a>
        </form>
    </div>
</div>

<script>
    ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
        console.error( error );
    } );
</script>