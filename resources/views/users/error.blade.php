@if ($_SESSION['error'])
        <div class="col-xs-6 col-sm-2 form-control alert-danger" style="text-align:center;">
        <li style="color:red">
            {{ $_SESSION['error'] }}
        </li>           
    </div>   
@endif
