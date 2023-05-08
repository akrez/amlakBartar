    @if ($errors)
    <div class="alert alert-danger">
        <ul>
            @foreach($errors as $error)
            <li style="color:red">
                {{$error}}
            </li>
            @endforeach
        </ul>
    </div>
    @endif


    @if ($message)
    <div class="alert alert-success">
        {{$message}}
    </div><br>
    @endif