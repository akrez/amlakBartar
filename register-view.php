<?php require("header.php");?>


<section style="display:flex; justify-content:center;">

<div class="form col-xs-8 col-sm-3" style="margin-top:100px; background-color:lightgrey;">
            
     {$message}
     
    <form action="" method="POST">

        <h4><p  style="text-align:center;">عضویت</p></h4><br>

        <div class="form-group"  >
            <input type="text" class="form-control"  placeholder="نام" name="name"  maxlength="30" >
        </div>

        <div class="form-group">
            <input type="email" class="form-control" placeholder="ایمیل" name="email"  maxlength="30">
        </div>

        <div class="form-group">
            <input type="password" class="form-control" placeholder="کلمه عبور" name="password"  maxlength="30">
        </div>

        <div class="form-group">
            <input type="password" class="form-control" placeholder="تکرار کلمه عبور" name="password_again"  maxlength="30">
        </div>
    
        <div class="form-group" style="text-align:center;">
            <button  type="submit" name="submit" class="btn btn-success">ثبت</button>

        </div>
      
    </form>
    
</div>

</section><br /><br /><br />
<?php require("footer.php");?>

