@extends('admin.master')
@section('content')

<div class="row index_container">
    <div class="col-md-12 index_wrapper">
             {{Session::get('send')}}
        <h1>All Contact data:</h1>
        <div class="ibox-body">
                <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
           
                    <thead>  
                               <tr>

                <th>SID</th>
                <th>Subject</th>
                <th>Email</th>
                <th>Message</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
                <?php $i=1 ?>
            @foreach($details as $datas)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $datas->subject }}</td>
                    <td>{{ $datas->email }}</td>
                    <td>{{ $datas->message }}</td>
                   
                     <td>  
                        <a class="btn btn-primary" href="{{ url('/contact/replay/'.$datas->id)  }}"><span class="fa fa-reply font-14"></span></a>
                         <a href="{{  url('/contact/delete/'.$datas->id) }}" class="btn btn-danger" title="Delete"onclick="return confirm('Are you sure to delete this?')">
                                    <span class="fa fa-trash font-14 "></span>
                            </a>
                  
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        </div>
        {{-- <nav aria-label="Page navigation example" class="pagination_link">
            {{ $datas->links() }}
        </nav> --}}
    </div>
</div>



@endsection