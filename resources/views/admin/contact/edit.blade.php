@extends('admin.master')
@section('content')
<div class="row index_container">
    <div class="col-md-12 index_wrapper">
      
    
        <div class="ibox-body">
        <h1>Replay The Message<a class="btn btn-link edit_index_link pull-right" href="{{ url('/contact') }}"><strong>Show All</strong></a></h1>


      
            <form role="form_create" method="post" action="{{ url('/contact/replay-message') }}">
            {{ csrf_field() }}
        
                 <div class="form_create_div row">
                        <label class="edit_form_label col-sm-2 col-form-label" for="menu_item_name">Email</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="email" name="email"  size="40"value="{{$details->email}}"readonly>
                            <input type="hidden" value="{{$details->id}}" class="form-control" name="id">
                            {{-- <input type="hidden" name="id" > --}}
                        </div>
                    </div><br>
                    <div class="form_create_div row">
                        <label class="edit_form_label col-sm-2 col-form-label" for="menu_item_name">Subject</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="subject" name="subject"  size="40"value="{{$details->subject}}"readonly>
                    
                            {{-- <input type="hidden" name="id" > --}}
                        </div>
                    </div><br>
                    <div class="form_create_div row">
                            <label class="edit_form_label col-sm-2 col-form-label" for="menu_item_name">Message</label>
                            <div class="col-sm-10">
                            <textarea class="form-control" type="text" name="message" placeholder="Enter Title" size="40"readonly >{{$details->message}}</textarea>
                               
                            </div>
                        </div><br>
                    <div class="form_create_div row">
                        <label class="edit_form_label col-sm-2 col-form-label" for="menu_item_name">Replay Message</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" type="text" name="replay_message" placeholder="Enter Replay" size="40"></textarea>
                           
                        </div>
                    </div><br>
                   
                   
                <br>

                <div class="form-group row mb-0">
                    <div class="col-md-6 col-md-offset-0">
                        <input class="btn btn-primary button_submit" type="submit" name="submit" value="Send">
                    </div>
                </div>
             
               
            </form>
    </div>
</div>
</div>

<script>
    ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
        console.error( error );
    } );
</script>
@endsection