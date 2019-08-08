<!-- Widgets -->
<div class="row clearfix">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-pink hover-zoom-effect hover-expand-effect">
            <div class="icon">
                <i class="material-icons">playlist_add_check</i>
            </div>
            <div class="content">
                <div class="text">TOTAL PENDING POST</div>
                <div class="number count-to text-center" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20">{{$countPendingPost}}</div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-cyan hover-zoom-effect hover-expand-effect">
            <div class="icon">
                <i class="material-icons">library_books</i>
            </div>
            <div class="content">
                <div class="text">TOTAL POST</div>
                <div class="number count-to text-center" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20">{{$countPost}}</div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-light-green hover-expand-effect hover-zoom-effect">
            <div class="icon">
                <i class="material-icons">person_add</i>
            </div>
            <div class="content">
                <div class="text text-center">TOTAL USERS</div>
                <div class="number count-to text-center" data-from="0" data-to="243" data-speed="1000" data-fresh-interval="20">{{$totalUsers}}</div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-orange hover-expand-effect hover-zoom-effect">
            <div class="icon">
                <i class="material-icons">person_add</i>
            </div>
            <div class="content">
                <div class="text">TODAY'S USERS</div>
                <div class="number count-to text-center" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20">{{$countTodayUser}}</div>
            </div>
        </div>
    </div>
</div>