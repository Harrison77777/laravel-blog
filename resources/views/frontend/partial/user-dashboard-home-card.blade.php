<!-- Widgets -->
<div class="row clearfix">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-pink hover-expand-effect hover-zoom-effect">
            <div class="icon">
                <i class="material-icons">playlist_add_check</i>
            </div>
            <div class="content">
                <div class="text">PANDING POST</div>
                <div class="number count-to text-center" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20">{{$pendingPost}}</div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-cyan hover-expand-effect hover-zoom-effect">
            <div class="icon">
                <i class="material-icons">help</i>
            </div>
            <div class="content">
                <div class="text">TOTAL POST</div>
                <div class="number count-to text-center" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20">{{$postCount}}</div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-light-green hover-expand-effect hover-zoom-effect">
            <div class="icon">
                <i class="material-icons">forum</i>
            </div>
            <div class="content">
                <div class="text">NEW COMMENTS</div>
                <div class="number count-to" data-from="0" data-to="243" data-speed="1000" data-fresh-interval="20">11</div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-orange hover-expand-effect hover-zoom-effect">
            <div class="icon">
                 <i class="material-icons">favorite</i>  
                {{--  <i class="ion-heart"></i> person_add --}}
            </div>
            <div class="content">
                <div class="text">FAVORITE POST</div>
                <div class="number count-to text-center" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20">{{Auth::user('web')->favorite_posts->count()}}</div>
            </div>
        </div>
    </div>
</div>