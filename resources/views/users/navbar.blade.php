<nav class="navbar navbar-inverse" style="border-radius:5px;">
    <ul class="list-inline">
        <div class="navbar-header">
            <a class="navbar-brand" href="#" style="padding: 5px 15px;"><img src="assets/images/house.jpg"
                    style="border-radius:3px ;" width="60px" height="40px"></a>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li class="col-sx-3" style="color: bisque;"><br>{{ $_SESSION['name'] }} به املاک برتر خوش آمدید &nbsp
                    <button class="btn btn-danger btn-xs" onclick="location.href='{{'logOut'}}'; ">خروج</button>
                </li>
                <li class="dropdown">
                    <a data-toggle="dropdown" href="#">کارهای ملکی<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{'melk'}}">ثبت ملک جدید</a></li>
                            <li><a href="{{'melkList'}}" >ویرایش ملک</a></li>
                        </ul>
                </li>
                <li class="col-sx-2"><a href="{{'profile'}}">ویرایش پروفایل</a></li>
            </ul>
            <form class="navbar-form navbar-left" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="آدرس ملک">
                    <button type="submit" class="btn btn-primary">جستجو</button>
                </div>
            </form>
        </div>
    </ul>

</nav>
