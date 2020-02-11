@extends('user.master')
@section('content')

<div class="page-content fade-in-up">

{{--Table Start--}}
    <div class="ibox">
            <div class="ibox-head">
                    <div class="ibox-title">Request List</div>
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
                                        <th>Post ID</th>
                                        <th>Image</th>
                                        <th>Address</th>
                                        {{-- <th>Action</th> --}}
                
                                </tr>
                        </thead>
                      
                        <tbody>
                                <?php $i=1 ?>
                            @foreach($RequestPost as $datas)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$datas->title}}</td>
                                <td>
                                    {{-- @foreach ($category as $item)
                                        @if($datas->category==$item->id)
                                        {{$item->category_name}}
                                    @endif
                                    @endforeach --}}
                                    {{$datas->post_id}}
                                </td>
                                <td><img src="{{ asset($datas->post_image) }}" height="50" width="50" >
                                </td>
                                
                                <td>{{$datas->post_address}}</td>
                            
                            
        
        
                                {{-- <td>
                                  
                                    <button onclick='edit({{$datas->id}})' data-toggle="modal" id="edit" data-target="#edit" class="btn btn-success" ><span class="fa fa-pencil font-14"></span></button> 
                                        
                                    @if($datas->status==1)
                                    <a href="{{route('mypost_status_update',['id'=>$datas->id])}}" class="btn btn-success" title="Active">
                                        <span class="fa fa-arrow-up"></span>
                                    </a>
                                    @elseif($datas->branch_status==0)
                                    <a href="{{route('mypost_status_update',['id'=>$datas->id])}}" class="btn btn-danger" title="Inactive">
                                            <span class="fa fa-arrow-down"></span>
                                        </a>
                                    @endif
                                    <a href="{{  url('/mypost/delete/'.$datas->id) }}" class="btn btn-danger" title="Delete"onclick="return confirm('Are you sure to delete this?')">
                                        <span class="fa fa-trash font-14  "></span>
                                    </a>
        
                                </td> --}}
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
                        $('.title').val(response.title);
                        $('.cId').val(response.id);
                        $('.gender').val(response.gender);
                        $('.address').val(response.address);
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
