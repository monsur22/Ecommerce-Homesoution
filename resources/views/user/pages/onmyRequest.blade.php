@extends('user.master')
@section('content')

<div class="page-content fade-in-up">

{{--Table Start--}}
    <div class="ibox">
            <div class="ibox-head">
                    <div class="ibox-title">Request List On My Post</div>
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
                                        <th>Request User</th>
                                        <th> User Email</th>
                                        <th>Action</th>
                
                                </tr>
                        </thead>
                      
                        <tbody>
                                <?php $i=1 ?>
                            @foreach($RequestPost as $datas)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$datas->title}}</td>
                                <td>
                                    
                                    {{$datas->post_id}}
                                </td>
                                <td><img src="{{ asset($datas->post_image) }}" height="50" width="50" >
                                </td>
                                
                                <td>{{$datas->post_address}}</td>
                            <td>
                                @foreach ($user as $item)
                                @if($datas->request_user_id==$item->id)
                                {{$item->name}}
                            @endif
                            @endforeach
                        </td>
                            
                        <td>{{$datas->request_user_email}}</td>
        
        
                                <td>
                                  
                                   
                                        
                                    @if($datas->status==1)
                                    <a href="{{route('request_my_post_status_update',['id'=>$datas->id])}}" class="btn btn-success" title=" Confirm">
                                        <span class="fa fa-arrow-up"></span>
                                    </a>
                                    @elseif($datas->status==0)
                                    <a href="{{route('request_my_post_status_update',['id'=>$datas->id])}}" class="btn btn-danger" title="Not Confirm">
                                            <span class="fa fa-arrow-down"></span>
                                        </a>
                                    @endif
                                    {{-- <a href="{{  url('/mypost/delete/'.$datas->id) }}" class="btn btn-danger" title="Delete"onclick="return confirm('Are you sure to delete this?')">
                                        <span class="fa fa-trash font-14  "></span>
                                    </a> --}}
        
                                </td>
                            </tr>
        
                            @endforeach
        
                        </tbody>
                    </table>
                </div>
        </div>
        
</div>





@endsection
