@extends('user.master')
@section('content')

<div class="page-content fade-in-up">
{{-- Add Company Modal --}}
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Add Post</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
        </div>
        {{-- <form method="POST" action="{{ url('/mypost') }}"enctype="multipart/form-data">
            {{csrf_field()}} --}}
            <form class="form_create" name="create_form" action="{{ url('/mypost') }}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="modal-body">

                    <div class="row">

                            <div class="col-sm-6 form-group">
                            <label>Category</label>
                            <select class="form-control" name="category">
                                <option value=""selected disabled>Select Category</option>
           
                                    @foreach ($category as $item)
                                    <option value="{{$item->id}}">{{$item->category_name}}</option>
                                        
                                    @endforeach
                      
                                
                            </select>
                        </div>
                    
                         <div class="col-sm-6 form-group">
                            <label>Title</label>
                            <input class="form-control" type="text"  name="Name" >
                        </div>
                        <div class="col-sm-6 form-group">
                            
                            <label>Product Id</label>
                            <input class="form-control" type="text"  name="productuniq_id"value="<?php echo rand();?>"readonly >
                        </div>
                        <div class="col-sm-6 form-group">
                            <label>Image</label>
                            <input class="form-control" type="file"  name="image">
                        </div>
                      
                        <div class="col-sm-6 form-group">
                            <label>Price</label>
                            <input class="form-control" type="text"  name="Price">
            
                          
                        </div>
                        <div class="col-sm-12 form-group">
                            <label>Description</label>
                            <textarea class="form-control"name="description" ></textarea>
                        
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
                    <h5 class="modal-title" id="exampleModalLongTitle">Update Post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                </div>
                <form method="POST" action="{{ url('/mypost-update') }}"method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="modal-body">
      
                            <div class="row">

                                <div class="col-sm-6 form-group">
                                    <label>Category</label>
                                    <select class="form-control category" name="category">
                                <option value="">Select Category</option>

                                        @foreach ($category as $item)
                                        <option value="{{$item->id}}">{{$item->category_name}}</option>
                                            
                                        @endforeach
                                       
                                        
                                    </select>
                                </div>
                            
                                 <div class="col-sm-6 form-group">
                                    <label>Title</label>
                                    <input class="form-control Name" type="text"  name="Name" >
                                    <input type="hidden" name="id" class="cId">

                                </div>
                                <div class="col-sm-6 form-group">
                            
                                    <label>Product Id</label>
                                    <input class="form-control productuniq_id" type="text"  name="productuniq_id"readonly >
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label>Image</label>
                                    <input class="form-control image" type="file"  name="image">
                                </div>
                             
                                <div class="col-sm-6 form-group">
                                    <label>Price</label>
                                    <input class="form-control Price" type="text"  name="Price">
                           
                            
                                </div>
                                <div class="col-sm-12 form-group">
                                    <label>Description</label>
                                    <textarea class="form-control description"name="description" ></textarea>
                             
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
                    <div class="ibox-title">Post List</div>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter"
                            style="margin-right: 60px;">
                        Create Post
                    </button>
                </div>
            <div class="ibox-body">
                    <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                        <thead>
                                <tr>
                                        <th>SL</th>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Image</th>
                                        <th>Price</th>
                                        <th>Status</th>
                                        <th>Action</th>
                
                                </tr>
                        </thead>
                      
                        <tbody>
                                <?php $i=1 ?>
                            @foreach($data as $datas)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$datas->Name}}</td>
                                <td>
                                    @foreach ($category as $item)
                                        @if($datas->category==$item->id)
                                        {{$item->category_name}}
                                    @endif
                                    @endforeach
                                    {{-- {{$datas->category}} --}}
                                </td>
                                <td><img src="{{ asset($datas->image) }}" height="50" width="50" >
                                </td>
                                
                                <td>{{$datas->Price}}</td>
                            
                                <td>
                                    @if($datas->status==1)
                                    <p class="btn-success">Publish</p>
                                    @elseif($datas->branch_status==0)
                                    <p class="btn-danger">Not Publish</p>

                                    @endif
                                </td>
                            
        
        
                                <td>
                                  
                                    <button onclick='edit({{$datas->id}})' data-toggle="modal" id="edit" data-target="#edit" class="btn btn-success" ><span class="fa fa-pencil font-14"></span></button> 
                                        
                                    <!-- @if($datas->status==1)
                                    <a href="{{route('mypost_status_update',['id'=>$datas->id])}}" class="btn btn-success" title="Active">
                                        <span class="fa fa-arrow-up"></span>
                                    </a>
                                    @elseif($datas->branch_status==0)
                                    <a href="{{route('mypost_status_update',['id'=>$datas->id])}}" class="btn btn-danger" title="Inactive">
                                            <span class="fa fa-arrow-down"></span>
                                        </a>
                                    @endif -->
                                    <a href="{{  url('/mypost/delete/'.$datas->id) }}" class="btn btn-danger" title="Delete"onclick="return confirm('Are you sure to delete this?')">
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
                    url:"{{url('/mypost-info')}}/"+x,
                    success:function(response){
                        console.log(response);
                        $('.category').val(response.category);
                        $('.Name').val(response.Name);
                        $('.productuniq_id').val(response.productuniq_id);
                        $('.cId').val(response.id);
                        $('.Price').val(response.Price);
              
                        $('.description').val(response.description);
                      
                       
                       
        
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
