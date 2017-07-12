    @if(count($errors))
    <div class="div-center-min-100">
        <div class="alert alert-danger" role="alert">
            <button class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <ul class="custom-ul">
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach    
            </ul>
        </div>
    </div>
    @endif
    @if(Session::has('message'))
    <div class="div-center-min-100">
        <div class="alert alert-success" role='alert'>
            <button class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            {{Session::get('message')}}
        </div>
    </div>
    @endif
   
    @if(Session::has('error'))
    <div class="div-center-min-100">
        <div class="alert alert-danger" role='alert'>
            <button class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            {{Session::get('error')}}
        </div>
    </div>
    @endif