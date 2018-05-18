<!doctype html>
<html lang="en">
<head>
<!-- Meta tags -->
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSS and font links-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">



 <link rel="stylesheet" href="{{ asset('css/my.css') }}" >


<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

<link href=" {{asset('css/homepage.css') }}" rel="stylesheet" type="text/css">
<link href=" {{asset('css/slicknav.min.css') }}" rel="stylesheet" type="text/css">


<!-- Java Script links-->
<script type="text/javascript" src="{{ asset('js/jquery-3.2.1.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.carouFredSel-6.2.1-packed.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.slicknav.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/homepage.js') }}"></script>


</head>
 
<body>
  

    <nav>
        <div id="navbar-summerhouse">
            <ul class="sticky-nav">
                <li><a href="/"><i class="fa fa-home" style="font-size:14px"></i>Home</a></li>
                <li class="dropdown"><a><i class="fa fa-align-left" style="font-size:14px"></i>Categories<i class="fa fa-caret-down" style="font-size:14px"></i></a>
                    <div class="dropdown-content">
                        <a class="active" href="/summerhouse">Summer cottage</a>
                        <a href="/recreationareas">Recreation areas</a>
                        <a href="/sanatoriums">Sanatoriums</a>
                    </div>
                </li>
                <li><a href="/about"><i class="fa fa-group" style="font-size:14px"></i>About</a></li>
                <li><a href="/contact"><i class="fa fa-address-book" style="font-size:14px"></i>Contact Us</a></li>
                <li><a href="/register"><i class="fa fa-sign-in" style="font-size:14px"></i>Sign Up</a></li>
                <form action="/search" class="form-inline my-2 my-lg-0" method="POST" enctype="multipart/form-data" >
                    {{ csrf_field() }}
                    <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" name="search_input">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </ul>
        </div>
    </nav>
    
<!--<header class="parallax-item-page">
    <div class="back-obj">
        <img src=" {{ asset('images/for-rent3.png') }} " alt="">
    </div>
    <div class="logo">
    <img src=" {{ asset('images/thehouse5.png') }} " alt=""> 
    </div>
    <div class="front-obj">
        <img src=" {{ asset('images/hhouse.jpg') }} " alt="">
    </div>
</header>-->
     @if(!empty($products[0]))
<section class="title-item-page">
    <article class="text-center">
        <div class="content">
         
            <h1> {{$products[0]->category}}</h1>
            <hr>
   
            <hr>
        </div>
        </article>  
    </section>
    <section class="announcements">
        
        
        @endif
        
        
         <form action="{{route('rate')}}" method="post" enctype="multipart/form-data">
            @if(!empty($products[0]))
    @foreach($products as $product)
        @php
            $image = $images->where("id", "=" , "$product->id");
        @endphp
        
        @foreach($image as $img)

        
        
        
        
        <div class="row items">
            <div class="col-md-4 col-md-offset-1 text-center">
            <a href="{{ route('announcement', ["id"=>$product->id]) }}"><img  src="/images/{{$product->id}}/{{$img->image_1}}" alt=""></a>
            </div>
            <div class="col-md-4 col-md-offset-1 content">
            <h3><a href="{{ route('announcement', ["id"=>$product->id]) }}">{{$product->title}}</a></h3>
            <hr>
            <p>{{substr($product->description, 0, 500)}} ...</p>

                <div class="location">
                    <h6>Location: </h6>
                    <span>{{$product->address}} </span>
                </div>

                <div class="price text-center">
                   <a href="{{ route('announcement', ["id"=>$product->id]) }}"> <h6>Read more</h6></a>
                    <h5>{{$product->price}} {{$product->price_type}}</h5>  
                </div>
                <div class="rating">
                    <div class="views">
                        <p> Views:</p> <i class="fa fa-eye" style="font-size:14px"></i> <p>{{$product->views}}</p>
                    </div>
                   
                   
                 
                    {{csrf_field()}}

                    <fieldset class="rating">
                        <input type="radio" id="star5" name="ratings{{$product->id}}" value="5"  onclick="submit(this);"/><label for="star5"  title="Rocks!">5 stars</label>
                        <input type="radio" id="star4" name="ratings{{$product->id}}" value="4"  onclick="submit(this);"/><label for="star4"  title="Pretty good">4 stars</label>
                        <input type="radio" id="star3" name="ratings{{$product->id}}" value="3"  onclick="submit(this);" /><label for="star3"  title="Meh">3 stars</label>
                        <input type="radio" id="star2" name="ratings{{$product->id}}" value="2"  onclick="submit(this);" /><label for="star2"  title="Kinda bad">2 stars</label>
                        <input type="radio" id="star1" name="ratings{{$product->id}}" value="1"  onclick="submit(this);" /><label for="star1"  title="Sucks big time">1 star</label>
                    </fieldset>
                    <input type="hidden" name="id" value="{{$product->id}}" />

                </div>
            </div>
        </div>





  @endforeach
    @endforeach

            </form>
<?php
     echo $products->links();
?>

@endif





    </section>
<!--********************************************Footer****************************-->
 <footer class=" footer-sec">
        <div class="row">
            <div class="col-md-4 fot-col-1">
              <div class="content footer-title">
                <h5>e-rent</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis deleniti eos aut recusandae quam perferendis soluta cumque, ratione ad repudiandae!<hr></p>
              </div>
              <div class="icon">
                      <p class="follow"> Follow Us:</p>
                      <ul>
                        <li><a href="#"><i class="fa fa-facebook" style="font-size:14px"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram" style="font-size:14px"></i></a></li>
                        <li><a href="#"><i class="fa fa-envelope" style="font-size:14px"></i></a></li>
                      </ul>
                    </div>
            </div>
            <div class="col-md-4 fot-col-2">
                <h5>FEATURED POSTS</h5>
                <div class="posts">
                    <div class="post-item">
                        <div class="image">
                            <a href="#"><img src="{{ asset('images/recentlyadded5.jpg')}}" alt="image"></a>
                        </div>
                        <div class="post-content">
                            <p><a href="#">TITLE OF POST №1</a></p>
                            <span>APRIL, 2018</span>
                        </div>
                    </div>
                    <div class="post-item">
                        <div class="image">
                            <a href="blog-post-detail.html"><img src="{{ asset('images/recentlyadded5.jpg')}}" alt="image"></a>
                        </div>
                        <div class="post-content">
                            <p><a href="blog-post-detail.html">TITLE OF POST №2</a></p>
                            <span>APRIL, 2018</span>
                        </div>
                    </div>
                     <div class="post-item">
                        <div class="image">
                            <a href="blog-post-detail.html"><img src="{{ asset('images/recentlyadded5.jpg')}}" alt="image"></a>
                        </div>
                        <div class="post-content">
                            <p><a href="blog-post-detail.html">TITLE OF POST №3</a></p>
                            <span>APRIL, 2018</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 fot-col-3">
                <h5>SUPPORT SERVICE</h6>
                <div class="content ">
                    <div class="contact-phone">
                        <h6><i class="fa fa-phone" style="font-size:14px"></i>PHONE NUMBER:</h6><p> +99897 700 70 24</p>
                    </div>
                    <div class="contact-adress">
                        <h6><i class="fa fa-map-marker" style="font-size:14px"></i>ADDRESS:</h6><p> Uzbekistan, Tashkent city, Mirzo Ulugbek dist., Olcha Bog str., 118</p>
                    </div>
                    <div class="contact-mail">
                        <h6><i class="fa fa-envelope" style="font-size:14px"></i>EMAIL:</h6><p> juraeva-malika@mail.ru</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-foot text-center">
            <p>© 2018 e-rent CORPORATION. ALL RIGHTS RESERVED.</p>
        </div>
    </footer>


  </body>
</html>


