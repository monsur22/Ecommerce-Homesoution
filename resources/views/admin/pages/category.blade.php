@extends('admin.master')
@section('content')

<div class="page-content fade-in-up">
{{-- Add Company Modal --}}
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Add Category</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
        </div>
        <form method="POST" action="{{ url('/category') }}" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="modal-body">

                    <div class="row">

                         <div class="col-sm-12 form-group">
                            <label>Category Name</label>
                            <input class="form-control" type="text" id="" name="category_name">
                        </div>
                        
                        <div class="col-sm-12 form-group">
                            <label>Category Image</label>
                            <input class="form-control" type="file" id="" name="image">
                        </div>
                    </div>
           
           
           
           
                </div>

            <div class="modal-footer">
                    <button type="reset" class="btn btn-default" >Clear</button>

                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
</div>
{{-- Edit Company Modal --}}
<div class="modal fade" id="edit" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Update Category Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                </div>
                <form method="POST" action="{{ url('/category-update') }}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="modal-body">
      
                            <div class="row">
                                    
                                    <div class="col-sm-12 form-group">
                                        <label>Category Name</label>
                                        <input class="form-control category_name" type="text" id="" name="category_name">
                                        <input type="hidden" name="id" class="cId">

                                    </div>
                                    <div class="col-sm-12 form-group">
                                        <label>Category Image</label>
                                        <input class="form-control" type="file" id="" name="image">
                                    </div>
                            
                            </div>
                   
                   
                   
                   
                        </div>

                    <div class="modal-footer">
              

                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

{{--Table Start--}}
    <div class="ibox">
            <div class="ibox-head">
                    <div class="ibox-title">Category List</div>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter"
                            style="margin-right: 60px;">
                        New Category
                    </button>
                </div>
            <div class="ibox-body">
                    <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                        <thead>
                                <tr>
                                        <th>SL</th>
                                        <th>Category</th>
                                        <th>Image</th>
                                        <th>Action</th>
                
                                </tr>
                        </thead>
                      
                        <tbody>
                                <?php $i=1 ?>
                            @foreach($data as $datas)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$datas->category_name}}</td>
                                <td><img src="{{ asset($datas->image) }}" height="50" width="50" ></td>
                                
                            
                                <td>
                                  
                                    <button onclick='edit({{$datas->id}})' data-toggle="modal" id="edit" data-target="#edit" class="btn btn-success" ><span class="fa fa-pencil font-14"></span></button>   
                                    @if($datas->status==1)
                                        <a href="{{route('category_status_update',['id'=>$datas->id])}}" class="btn btn-success" title="Active">
                                            <span class="fa fa-arrow-up"></span>
                                        </a>
                                        @elseif($datas->branch_status==0)
                                        <a href="{{route('category_status_update',['id'=>$datas->id])}}" class="btn btn-danger" title="Inactive">
                                                <span class="fa fa-arrow-down"></span>
                                            </a>
                                        @endif
        
                                    <a href="{{  url('/category/delete/'.$datas->id) }}" class="btn btn-danger" title="Delete"onclick="return confirm('Are you sure to delete this?')">
                                        <span class="fa fa-trash font-14  "></span>
                                    </a>
        
                                </td>
                            </tr>
        
                            @endforeach
        
                        </tbody>
                    </table>
                </div>
        </div>
        
</div>

<script>
        function edit(id) {
                var x =id;
                
                $.ajax({
                    type:'GET',
                    url:"{{url('/category-info')}}/"+x,
                    success:function(response){
                        console.log(response);
                        $('.category_name').val(response.category_name);
                        $('.cId').val(response.id);
                       
                       
                       
        
                    },
                    error:function(xhr,status,error){
                        console.log(error);
                        
                    }
        
              });
            }
        
        
        $(document).ready(function(){
           
        
        });   
             
        </script>



@endsection
