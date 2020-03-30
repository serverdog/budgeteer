
      <div class="container cta-100 ">
        <div class="container">
          <div class="row blog">
            <div class="col-md-12">
              <div id="blogCarousel" class="carousel slide container-blog" data-ride="carousel">
                <!-- Carousel items -->
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <div class="row">


                        @foreach ($articles as $article)
        



                        <div class="col-md-4" >
                            <div class="item-box-blog">
                            <div class="item-box-blog-image">
                                <!--Date-->
                                <div class="item-box-blog-date bg-blue-ui white"> <span class="mon">{!! $article->created_at->format('d M');!!}</span> </div>
                                <!--Image-->
                                <figure> <img alt="" src="/img/articles/{!! file_exists("img/articles/{$article->id}.png") ? "{$article->id}.png" : "{$article->id}.jpg"  !!}"> </figure>
                            </div>
                            <div class="item-box-blog-body">
                                <!--Heading-->
                                <div class="item-box-blog-heading">
                                <a href="{{ $article->url }}" tabindex="0" target="_">
                                    <h5>{{ $article->title }}</h5>
                                </a>
                                </div>
                                <!--Text-->
                                <div class="item-box-blog-text">
                                <p>{{ $article->publisher }}</p>
                                </div>
                                
                            </div>
                            </div>
                        </div>
                      @endforeach


                    </div>
                    <!--.row-->
                  </div>
                  <!--.item-->
               
                  <!--.item-->
                </div>
                <!--.carousel-inner-->
              </div>
              <!--.Carousel-->
            </div>
          </div>
        </div>
      </div>
   
<style>

.cta-100 {
  padding-left: 8%;
  padding-top: 10px;
}
.col-md-4{
    padding-bottom:20px;
}

.white {
  color: #fff !important;
}
.mt{float: left;margin-top: -20px;padding-top: 20px;}
.bg-blue-ui {
  background-color: #4e73df !important;
}
figure {
    min-height:170px;
}
figure img{width:300px;}


.blog .carousel-indicators {
  left: 0;
  top: -50px;
  height: 50%;
}


/* The colour of the indicators */

.blog .carousel-indicators li {
  background: #708198;
  border-radius: 50%;
  width: 8px;
  height: 8px;
}

.blog .carousel-indicators .active {
  background: #0fc9af;
}




.item-carousel-blog-block {
  outline: medium none;
  padding: 15px;
}

.item-box-blog {
  border: 1px solid #dadada;
  text-align: center;
  z-index: 4;
  padding: 20px;
  min-height:370px;
}

.item-box-blog-image {
  position: relative;
}

.item-box-blog-image figure img {
  width: 100%;
  height: auto;
}

.item-box-blog-date {
  position: absolute;
  z-index: 5;
  padding: 4px 20px;
  top: -20px;
  right: 8px;
  background-color: #4e73df;
}

.item-box-blog-date span {
  color: #fff;
  display: block;
  text-align: center;
  line-height: 1.2;
}

.item-box-blog-date span.mon {
  font-size: 18px;
}

.item-box-blog-date span.day {
  font-size: 16px;
}

.item-box-blog-body {
  padding: 10px;
}

.item-heading-blog a h5 {
  margin: 0;
  line-height: 1;
  text-decoration:none;
  transition: color 0.3s;
}

.item-box-blog-heading a {
    text-decoration: none;
}

.item-box-blog-data p {
  font-size: 13px;
}

.item-box-blog-data p i {
  font-size: 12px;
}

.item-box-blog-text {
  max-height: 100px;
  overflow: hidden;
}

.mt-10 {
  float: left;
  margin-top: -10px;
  padding-top: 10px;
}

.btn.bg-blue-ui.white.read {
  cursor: pointer;
  padding: 4px 20px;
  float: left;
  margin-top: 10px;
}

.btn.bg-blue-ui.white.read:hover {
  box-shadow: 0px 5px 15px inset #4d5f77;
}

</style>