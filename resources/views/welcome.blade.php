@extends('layouts.follow')
@section('page-title')
    Excel Jewellers Shop Diamond Engagement Rings - Langley &amp; Surrey
@endsection

@section('page-description')
Shop Verragio engagement rings, Malo wedding bands, earrings & bracelets in Surrey/Langley. Buy moissanites, lab & natural GIA diamonds. We offer watch/jewellery repair & ring resizing.
@endsection

@section('include')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/welcome.css?='.time().'') }}">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.6.12/dist/js/splide.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.6.12/dist/css/splide.min.css">
    <script src="https://cdn.scaleflex.it/plugins/js-cloudimage-360-view/3.0.1/js-cloudimage-360-view.min.js"></script>
@endsection

@section('main')
<x-popup-stone></x-popup-stone>
<x-popup-setting></x-popup-setting>
<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">

    <div class="carousel-item active">
      <img class="hidden md:block" alt="Verragio Diamond Bridal Wedding Ring Langley Guildford Mall Town Center Vancouver" src="{{ asset('image/banner/5.jpg?3') }}" class="d-block w-full object-cover">
      <img class="block md:hidden" alt="Verragio Lab Diamond Bridal Wedding Ring Surrey Guildford Town Center North Vancouver" src="{{ asset('image/banner/5_mm.jpg?3') }}" class="d-block w-full object-cover">
    </div>

    <div class="carousel-item">
      <img class="hidden md:block" src="{{ asset('image/banner/6.jpg?3') }}" class="d-block w-full object-cover" alt="Verragio Diamond Bridal Set Unlike Any Other Ring Downtown Vancouver Langley Center">
      <img class="block md:hidden" src="{{ asset('image/banner/6_mm.jpg?3') }}" class="d-block w-full object-cover" alt="Verragio Diamond Bridal Collection Excel Jewellers Guildford Vancouver Langley Center">
    </div>

    <div class="carousel-item">
      <img class="hidden md:block" src="{{ asset('image/banner/3.jpg?3') }}" class="d-block w-full object-cover" alt="Gabriel & Co Diamond Bridal Set Langley Center Surrey Central Mall Vancouver Down Town">
      <img class="block md:hidden" src="{{ asset('image/banner/3_mm.jpg?3') }}" class="d-block w-full object-cover"  alt="Gabriel & Co Diamond Bridal Collection Set South Surrey Delta Abbotsford Victoria">
    </div>

    <div class="carousel-item">
      <img class="hidden md:block" src="{{ asset('image/banner/4.jpg?3') }}" class="d-block w-full object-cover" alt="Verragio Engagement Band & Engagement Ring Bridal Set With Custom Natural Diamonds">
      <img class="block md:hidden" src="{{ asset('image/banner/4_mm.jpg?3') }}" class="d-block w-full object-cover"  alt="Verragio Engagement Band Collection & Engagement Ring Bridal Collection With Custom Natural Gemstone">
    </div>

  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>


    <div class="create-design-container">
        <div class="create-design-inner">
            <img src="{{ asset('storage/image/page_img/rings.jpg') }}" alt="Custom Design Create Your Own Diamond Engagement Ring Yellow White Rose Gold Setting Surrey Canada">
        </div>
        <div class="create-design-text">
            <div class="create-design-text-inner">
                <h1>
                    <div>Create Your Very Own</div>
                    <div>Engagement Ring</div>
                </h1>
                <p class="pt-2 pb-3 px-4">Design your bridal ring the way you want it. Start with either a setting or a stone. Click below to get started!</p>
                <div class="grid grid-cols-2 md:grid-cols-3">

                    <div class="mr-auto md:mr-0 ml-auto py-2">
                        <div data-bs-toggle="modal" data-bs-target="#setting-modal">
                            <div class="setting-starter border-2 cursor-pointer rounded-full border-white w-24 h-24 grid content-center">
                                <div class="icon-Ring-Setting-01 text-2xl duration-300"></div>
                            </div>
                            <div class="text-xs pt-2">Start With Setting</div>
                        </div>
                    </div>

                    <div class="py-2">
                        <div data-bs-toggle="modal" data-bs-target="#stone-modal">
                            <div class="relative">
                                <div class="hidden md:block border border-white absolute top-2/4 left-1/2 -translate-y-2/4 -translate-x-2/4 w-full"></div>
                                <div class="stone-starter m-auto border-2 cursor-pointer rounded-full border-white w-24 h-24 grid content-center relative" style="background:#ca287b;">
                                    <div class="icon-diamond text-2xl duration-300"></div>
                                </div>
                            </div>
                            <div class="text-xs pt-2">Start With Stone</div>
                        </div>
                    </div>

                    <div class="ml-auto md:ml-0 mr-auto py-2 hidden md:block">
                        <div class="border-2 rounded-full border-white w-24 h-24 grid content-center">
                            <div class="icon-diamond-ring text-2xl"></div>
                        </div>
                        <div class="text-xs pt-2">Finished Ring</div>
                    </div>

               </div>
            </div>
        </div>
    </div>

<style type="text/css">
    .setting-starter:hover .text-2xl{transform: rotateY(180deg);}
    .stone-starter:hover .text-2xl{transform: rotateY(180deg);}
</style>

    <h2 class="ring-title">Shop Our Best Sellers</h2>

    <div class="splide splide_products">
        <div class="splide__track">
            <ul class="splide__list">
                <li class="splide__slide px-20 py-14">
                    <a href="{{url('/engagement-ring?category=Solitaire')}}">
                        <img class="m-auto"alt="Solitaire Diamond Engagement Gold Ring Surrey Langley Canada Burnaby Abbotsford Vancouver Richmond" src="{{ asset('storage/image/page_img/solitaire.jpg') }}" />
                    </a>
                    <h3 class="seller-title">Solitaire</h3>
                </li>
                <li class="splide__slide px-20 py-14">
                    <a href="{{url('/engagement-ring?category=three stone')}}">
                        <img class="m-auto"alt="Three Stone Diamond Engagement Gold Ring Surrey Langley Canada Burnaby Abbotsford Vancouver Richmond" src="{{ asset('storage/image/page_img/three-stone.jpg') }}" />
                    </a>
                    <h3 class="seller-title">Three Stone</h3>
                </li>
                <li class="splide__slide px-20 py-14">
                    <a href="{{url('/engagement-ring?category=double halo')}}">
                        <img class="m-auto"alt="Double Halo Diamond Engagement Gold Ring Surrey Langley Canada Burnaby Abbotsford Vancouver Richmond" src="{{ asset('storage/image/page_img/doublehalo.jpg') }}" />
                    </a>
                    <h3 class="seller-title">Double Halo</h3>
                </li>
                <li class="splide__slide px-20 py-14">
                    <a href="{{url('/engagement-ring?category=straight')}}">
                        <img class="m-auto"alt="Straight Diamond Engagement Gold Ring Surrey Langley Canada Burnaby Abbotsford Vancouver Richmond" src="{{ asset('storage/image/page_img/straight.jpg') }}" />
                    </a>
                    <h3 class="seller-title">Straight</h3>
                </li>
                <li class="splide__slide px-20 py-14">
                    <a href="{{url('/engagement-ring?category=halo')}}">
                        <img class="m-auto"alt="Halo Diamond Engagement Gold Ring Surrey Langley Canada Burnaby Abbotsford Vancouver Richmond" src="{{ asset('storage/image/page_img/halo.jpg') }}" />
                    </a>
                    <h3 class="seller-title">Halo</h3>
                </li>
                <li class="splide__slide px-20 py-14">
                    <a href="{{url('/engagement-ring?category=split shank')}}">
                        <img class="m-auto"alt="Split Shank Diamond Engagement Gold Ring Surrey Langley Canada Burnaby Abbotsford Vancouver Richmond" src="{{ asset('storage/image/page_img/splitshank.jpg') }}" />
                    </a>
                    <h3 class="seller-title">Split Shank</h3>
                </li>
                <li class="splide__slide px-20 py-14">
                    <a href="{{url('/wedding-band')}}">
                        <img class="m-auto"alt="Women Diamond Wedding Band Gold Ring Surrey Langley Canada Burnaby Abbotsford Vancouver Richmond" src="{{ asset('storage/image/page_img/wedding.jpg') }}" />
                    </a>
                    <h3 class="seller-title">Wedding Band</h3>
                </li>
                <li class="splide__slide px-20 py-14">
                    <a href="{{url('/wedding-band?category=eternity')}}">
                        <img class="m-auto"alt="Women Diamond Eternity Band Gold Ring Surrey Langley Canada Burnaby Abbotsford Vancouver Richmond" src="{{ asset('storage/image/page_img/eternity.jpg') }}" />
                    </a>
                    <h3 class="seller-title">Eternity Band</h3>
                </li>
                <li class="splide__slide px-20 py-14">
                    <a href="{{url('/fine-jewellery?style=stud')}}">
                        <img class="m-auto"alt="Diamond Stud Gold Earrings Surrey Langley Canada Burnaby Abbotsford Vancouver Richmond Coquitlam" src="{{ asset('storage/image/page_img/stud.jpg') }}" />
                    </a>
                    <h3 class="seller-title">Studs</h3>
                </li>
                <li class="splide__slide px-20 py-14">
                    <a href="{{url('/fine-jewellery?category=bracelets')}}">
                        <img class="m-auto"alt="Diamond Bracelet Gold Necklace Surrey Langley Canada Burnaby Abbotsford Vancouver Richmond Coquitlam" src="{{ asset('storage/image/page_img/bracelet1.jpg') }}" />
                    </a>
                    <h3 class="seller-title">Bracelet</h3>
                </li>
            </ul>
        </div>
    </div>


    <div class="custom-design-container custom-design-full">

        <div class="custom-design-inner">
            <div class="main-image cloudimage-360 brightness-95" style="z-index: 0 !important;" data-folder="{{ url('storage/image/media_assets/PARISIAN-100R') }}/" data-filename="{index}.jpg?1" data-amount="66" data-spin-reverse autoplay data-speed="300" data-drag-speed="300" data-autoplay></div>
        </div>

        <div class="custom-design-text">
            <div class="custom-design-text-inner">
                <h2>
                    <div>EXPERIENCE THE TOUCH OF 360°</div>
                </h2>
                <p class="pt-2 pb-3 px-4">Spin our jewelry products & diamonds presented in 360° at the ends of your fingertips.</p>
                <div>
                    <a href="{{ url('/engagement-ring?video=image_360') }}">
                        <button class="text-sm">Engagement Rings</button>
                    </a>

                    <a href="{{ url('/wedding-band?video=image_360') }}">
                        <button class="text-sm">Wedding Bands</button>
                    </a>

                    <a href="{{ url('/fine-jewellery?video=image_360') }}">
                        <button class="text-sm">Fine Jewellery</button>
                    </a>

                    <a href="{{ url('/lab-grown-diamond') }}">
                        <button class="text-sm">Lab Diamond</button>
                    </a>

                    <a href="{{ url('/diamonds') }}">
                        <button class="text-sm">Natural Diamond</button>
                    </a>

                    <a href="{{ url('/moissanite') }}">
                        <button class="text-sm">Moissanite</button>
                    </a>

                </div>
            </div>
        </div>

    </div>

    <div class="display-container">
        <div class="display-inner">
            <a href="{{url('/diamonds')}}">
                <div class="display-overflow">
                    <h3 class="m-auto">SHOP MINED DIAMONDS</h3>
                    <div class="hover-bkg"></div>
                    <img alt="Shop Our Mined Diamond Loose Gemstone GIA Certified Presented In 360° HD. Create Your Own Engagement Ring With Our Gemstones"
                         src="{{ asset('storage/image/page_img/diamonds.jpg') }}">
                </div>
            </a>
        </div>
        <div class="display-inner">
            <a href="{{url('/lab-grown-diamond')}}">
                <div class="display-overflow">
                    <h3 class="m-auto">SHOP LAB GROWN DIAMONDS</h3>
                    <div class="hover-bkg"></div>
                    <img alt="Shop Our Lab Grown Diamond Loose Gemstone Certified Presented In 360° HD. Create Your Own Engagement Ring With Our Gemstones"
                         src="{{ asset('storage/image/page_img/lab-diamond.jpg') }}">
                </div>
            </a>
        </div>
        <div class="display-inner">
            <a href="{{url('/moissanite')}}">
                <div class="display-overflow">
                    <h3 class="m-auto">SHOP MOISSANITE</h3>
                    <div class="hover-bkg"></div>
                    <img alt="Shop Our Brilliant Cut Moissanite Loose Gemstone Presented In 360° HD. Create Your Own Engagement Ring With Our Gemstones"
                         src="{{ asset('storage/image/page_img/moissanite.jpg') }}">
                </div>
            </a>
        </div>
    </div>


    <h2 class="diamond-title">Shop Diamonds By Shape</h2>


<div class="splide splide_stones">
  <div class="splide__track">
        <ul class="splide__list">
            <li class="splide__slide px-20 py-14">
                <a href="{{url('/diamonds?shape=round')}}">
                <img class="m-auto" alt="High Quality Round Diamond Gemstone SI2 SI1 VS2 VS1 VVS2 VVS1 IF FL Clarity D E F G H I J K Color"
                     src="{{ asset('storage/image/gemstone/Round-cut.png') }}">
            </a>
            <h3 class="seller-title">Round</h3>
            </li>
            <li class="splide__slide px-20 py-14">
                <a href="{{url('/diamonds?shape=princess')}}">
                <img class="m-auto" alt="High Quality Square Diamond Gemstone SI2 SI1 VS2 VS1 VVS2 VVS1 IF FL Clarity D E F G H I J K Color"
                     src="{{ asset('storage/image/gemstone/Princess-cut.png') }}">
            </a>
            <h3 class="seller-title">Princess</h3>
            </li>
            <li class="splide__slide px-20 py-14">
                <a href="{{url('/diamonds?shape=emerald')}}">
                <img class="m-auto" alt="High Quality Emerald Diamond Gemstone SI2 SI1 VS2 VS1 VVS2 VVS1 IF FL Clarity D E F G H I J K Color"
                     src="{{ asset('storage/image/gemstone/Emerald-cut.png') }}">
            </a>
            <h3 class="seller-title">Emerald</h3>
            </li>
            <li class="splide__slide px-20 py-14">
                <a href="{{url('/diamonds?shape=oval')}}">
                <img class="m-auto" alt="High Quality Oval Diamond Gemstone SI2 SI1 VS2 VS1 VVS2 VVS1 IF FL Clarity D E F G H I J K Color"
                     src="{{ asset('storage/image/gemstone/Oval-cut.png') }}">
            </a>
            <h3 class="seller-title">Oval</h3>
            </li>
            <li class="splide__slide px-20 py-14">
                <a href="{{url('/diamonds?shape=pear')}}">
                <img class="m-auto" alt="High Quality Pear Diamond Gemstone SI2 SI1 VS2 VS1 VVS2 VVS1 IF FL Clarity D E F G H I J K Color"
                     src="{{ asset('storage/image/gemstone/Pear-cut.png') }}">
            </a>
            <h3 class="seller-title">Pear</h3>
            </li>
            <li class="splide__slide px-20 py-14">
                <a href="{{url('/diamonds?shape=marquise')}}">
                <img class="m-auto" alt="High Quality Marquise Diamond Gemstone SI2 SI1 VS2 VS1 VVS2 VVS1 IF FL Clarity D E F G H I J K Color"
                     src="{{ asset('storage/image/gemstone/Marquise-cut.png') }}">
            </a>
            <h3 class="seller-title">Marquise</h3>
            </li>
            <li class="splide__slide px-20 py-14">
                <a href="{{url('/diamonds?shape=cushion')}}">
                <img class="m-auto" alt="High Quality Cushion Diamond Gemstone SI2 SI1 VS2 VS1 VVS2 VVS1 IF FL Clarity D E F G H I J K Color"
                     src="{{ asset('storage/image/gemstone/Cushion-cut.png') }}">
            </a>
            <h3 class="seller-title">Cushion</h3>
            </li>
            <li class="splide__slide px-20 py-14">
                <a href="{{url('/diamonds?shape=asscher')}}">
                <img class="m-auto" alt="High Quality Asscher Diamond Gemstone SI2 SI1 VS2 VS1 VVS2 VVS1 IF FL Clarity D E F G H I J K Color"
                     src="{{ asset('storage/image/gemstone/Asscher-cut.png') }}">
            </a>
            <h3 class="seller-title">Asscher</h3>
            </li>
            <li class="splide__slide px-20 py-14">
                <a href="{{url('/diamonds?shape=heart')}}">
                <img class="m-auto" alt="High Quality Asscher Diamond Gemstone SI2 SI1 VS2 VS1 VVS2 VVS1 IF FL Clarity D E F G H I J K Color"
                     src="{{ asset('storage/image/gemstone/Heart-cut.png') }}">
            </a>
            <h3 class="seller-title">Heart</h3>
            </li>
            <li class="splide__slide px-20 py-14">
                <a href="{{url('/diamonds?shape=trillion')}}">
                <img class="m-auto" alt="High Quality Trillion Diamond Gemstone SI2 SI1 VS2 VS1 VVS2 VVS1 IF FL Clarity D E F G H I J K Color"
                     src="{{ asset('storage/image/gemstone/Trillion-cut.png') }}">
            </a>
            <h3 class="seller-title">Trillion</h3>
            </li>
            <li class="splide__slide px-20 py-14">
                <a href="{{url('/diamonds?shape=radiant')}}">
                <img class="m-auto" alt="High Quality Radiant Diamond Gemstone SI2 SI1 VS2 VS1 VVS2 VVS1 IF FL Clarity D E F G H I J K Color"
                     src="{{ asset('storage/image/gemstone/Radiant-cut.png') }}">
            </a>
            <h3 class="seller-title">Radiant</h3>
            </li>
        </ul>
  </div>
</div>

    <div class="display-container">
        <div class="display-inner">
            <a href="{{url('/engagement-ring')}}">
                <div class="display-overflow">
                    <h3 class="m-auto">ENGAGEMENT RINGS</h3>
                    <div class="hover-bkg"></div>
                    <img alt="Diamond engagement gold rings Surrey Langley Canada Burnaby Abbotsford Vancouver Richmond Coquitlam"
                         src="{{ asset('storage/image/page_img/ring6.jpg') }}">
                </div>
            </a>
        </div>
        <div class="display-inner">
            <a href="{{url('/wedding-band')}}">
                <div class="display-overflow">
                    <h3 class="m-auto">WEDDING BANDS</h3>
                    <div class="hover-bkg"></div>
                    <img alt="Women/Mens diamond wedding bands Surrey Langley Canada Burnaby Abbotsford Vancouver Richmond Kelowna"
                         src="{{ asset('storage/image/page_img/rings3.jpg') }}">
                </div>
            </a>
        </div>
        <div class="display-inner">
            <a href="{{url('/fine-jewellery')}}">
                <div class="display-overflow">
                    <h3 class="m-auto">FINE JEWELLERY</h3>
                    <div class="hover-bkg"></div>
                    <img alt="Fine Diamond Jewellery rings, earrings, bracelets and necklaces Surrey Langley Canada Vancouver"
                         src="{{ asset('storage/image/page_img/fine-jewellery2.jpg') }}">
                </div>
            </a>
        </div>
    </div>

    <h2 class="diamond-title">Shop By Brand Names</h2>

    <div class="splide splide_brand">
      <div class="splide__track">
            <ul class="splide__list">
                <li class="splide__slide px-20 py-14"><a href="{{url('/engagement-ring?brand=verragio')}}">
                <img class="m-auto w-56" alt="Verragio Diamond Classic Engagement Gold Ring Wedding Band Jewellery Surrey Langley Vancouver Canada"
                     src="{{asset('storage/image/logo/verragio.png')}}">
            </a></li>
                <li class="splide__slide px-20 py-14"><a href="{{url('/engagement-ring?brand=gabrielco')}}">
                <img class="m-auto w-56" alt="Gabriel & Co. Diamond Classic Engagement Ring Wedding Band Jewellery Surrey Langley Vancouver Canada"
                     src="{{asset('storage/image/logo/gabriel.svg')}}">
            </a></li>
                <li class="splide__slide px-20 py-14"><a href="{{url('/moissanite')}}">
                <img class="m-auto w-56" alt="Charles & Colvard Diamond Moissanite Classic Engagement Gold Ring Wedding Band Jewellery Surrey Langley Vancouver"
                     src="{{asset('storage/image/logo/charlescolvard.svg')}}">
            </a></li>
                <li class="splide__slide px-20 py-14"><a href="{{url('/wedding-band?brand=malo')}}">
                <img class="m-auto w-56" alt="Malo Diamond Wedding Satin Gold Yellow White Rose Band Jewellery Surrey Langley Vancouver Canada"
                     src="{{asset('storage/image/logo/malo.png')}}">
            </a></li>
            </ul>
      </div>
    </div>

    <div class="category-container">
        <div class="display-inner">
            <a href="{{url('/fine-jewellery?category=rings')}}">
                <div class="display-overflow">
                    <h3 class="m-auto">RINGS</h3>
                    <div class="hover-bkg"></div>
                    <img alt="Diamond color gemstone pearl 10k 14k 18k yellow white rose fashion engagement rings bands Surrey"
                         src="{{ asset('storage/image/page_img/ring9.jpg') }}">
                </div>
            </a>

        </div>
        <div class="display-inner">
            <a href="{{url('/fine-jewellery?category=earrings')}}">
                <div class="display-overflow">
                    <h3 class="m-auto">EARRINGS</h3>
                    <div class="hover-bkg"></div>
                    <img alt="Diamond color gemstone pearl 10k 14k 18k yellow white rose earrings Surrey Langley Canada Burnaby"
                         src="{{ asset('storage/image/page_img/earring2.jpg') }}">
                </div>
            </a>
        </div>
        <div class="display-inner">
            <a href="{{url('/fine-jewellery?category=bracelets')}}">
                <div class="display-overflow">
                    <h3 class="m-auto">BRACELETS</h3>
                    <div class="hover-bkg"></div>
                    <img alt="Diamond color gemstone pearl 10k 14k 18k yellow white rose bracelet Surrey Langley Canada Burnaby"
                         src="{{ asset('storage/image/page_img/bracelet3.jpg') }}">
                </div>
            </a>
        </div>
        <div class="display-inner">
            <a href="{{url('/fine-jewellery?category=necklaces')}}">
                <div class="display-overflow">
                    <h3 class="m-auto">NECKLACES</h3>
                    <div class="hover-bkg"></div>
                    <img alt="Diamond color gemstone pearl 10k 14k 18k yellow white rose necklaces Surrey Langley Canada Burnaby"
                         src="{{ asset('storage/image/page_img/chain4.jpg') }}">
                </div>
            </a>
        </div>
    </div>

    <h2 class="diamond-title">Our Stores</h2>

    <div class="display-container grid grid-cols-1 md:grid-cols-2 gap-2 mb-2">
        
        <div class="rounded drop-shadow-md bg-white p-4">
            <h3 class="main-t-c">Surrey Guildford Mall Town Center <span class="text-amber-400">★★★★★(4.9)</span></h3>
            <a href="https://www.google.com/maps/place/Excel+Jewellers/@49.1903229,-122.8073424,16z/data=!4m19!1m13!4m12!1m4!2m2!1d-122.7085906!2d49.104961!4e1!1m6!1m2!1s0x5485d76d2d03fa2d:0x2930d208f23b3948!2sExcel+Jewellers,+upper+level,+10355+152+St+%232203,+Surrey,+BC+V3R+7C1!2m2!1d-122.803713!2d49.1904168!3m4!1s0x5485d76d2d03fa2d:0x2930d208f23b3948!8m2!3d49.1904168!4d-122.803713"><img class="w-full rounded" src="{{ asset('storage/image/page_img/guildford_compress.jpg') }}"></a>
            <ul class="p-0">
                <a href="https://www.google.com/maps/place/Excel+Jewellers/@49.1903229,-122.8073424,16z/data=!4m19!1m13!4m12!1m4!2m2!1d-122.7085906!2d49.104961!4e1!1m6!1m2!1s0x5485d76d2d03fa2d:0x2930d208f23b3948!2sExcel+Jewellers,+upper+level,+10355+152+St+%232203,+Surrey,+BC+V3R+7C1!2m2!1d-122.803713!2d49.1904168!3m4!1s0x5485d76d2d03fa2d:0x2930d208f23b3948!8m2!3d49.1904168!4d-122.803713">
                    <li class="text-sm pb-1 pt-3">
                        <span class="icon-compass main-text-c text-xs pr-2"></span>Upper Level 2203 - 10355 - 152nd St Surrey, BC V3R 7C1
                    </li>
                </a>
                <a href="tel:604-588-0085"><li class="text-sm py-1"><span class="icon-phone main-text-c text-xs pr-2"></span>604-588-0085</li></a>
                <a href="{{url('/contact')}}"><li class="text-sm py-1"><span class="icon-mail-envelope-closed main-text-c text-xs pr-2"></span>sales@exceljewellers.com</li></a>

                <a href="https://calendly.com/exceljewelersappointment/60-minute-guildford_consultation/?month=2022-10"><button class="main-bg-c px-3 py-2 mt-2 text-sm rounded text-white">Book Appointment</button></a>

            </ul>
        </div>

        <div class="rounded drop-shadow-md bg-white p-4">
            <h3 class="main-t-c">Smart Centres Langley <span class="text-amber-400">★★★★★(4.8)</span></h3>
            <a href="https://www.google.com/maps/place/Excel+Jewellers/@49.1121903,-122.7208622,13z/data=!3m1!5s0x5485d1d22f139b31:0xad0170a79366ca3c!4m19!1m13!4m12!1m4!2m2!1d-122.7085906!2d49.104961!4e1!1m6!1m2!1s0x5485d1d1c3457215:0x2ae11da4380fea15!2sExcel+Jewellers,+20202+66+Ave+%23370,+Langley+City,+BC+V2Y+1P3!2m2!1d-122.6641683!2d49.1200775!3m4!1s0x5485d1d1c3457215:0x2ae11da4380fea15!8m2!3d49.1200775!4d-122.6641683"><img class="w-full rounded" src="{{ asset('storage/image/page_img/langley_compress.jpg') }}"></a>
            <ul class="p-0">
                <a href="https://www.google.com/maps/place/Excel+Jewellers/@49.1121903,-122.7208622,13z/data=!3m1!5s0x5485d1d22f139b31:0xad0170a79366ca3c!4m19!1m13!4m12!1m4!2m2!1d-122.7085906!2d49.104961!4e1!1m6!1m2!1s0x5485d1d1c3457215:0x2ae11da4380fea15!2sExcel+Jewellers,+20202+66+Ave+%23370,+Langley+City,+BC+V2Y+1P3!2m2!1d-122.6641683!2d49.1200775!3m4!1s0x5485d1d1c3457215:0x2ae11da4380fea15!8m2!3d49.1200775!4d-122.6641683"><li class="text-sm pb-1 pt-3"><span class="icon-compass main-text-c text-xs pr-2"></span>Suite 370-20202 - 66 Ave Langley BC V2Y 1P3</li></a>
                <a href="tel:604-539-7720"><li class="text-sm py-1"><span class="icon-phone main-text-c text-xs pr-2"></span>604-539-7720</li></a>
                <a href="{{url('/contact')}}"><li class="text-sm py-1"><span class="icon-mail-envelope-closed main-text-c text-xs pr-2"></span>info@exceljewellers.com</li></a>

                <a href="https://calendly.com/exceljewelrylangley/60min?month=2022-10"><button class="main-bg-c px-3 py-2 mt-2 text-sm rounded text-white">Book Appointment</button></a>

            </ul>
        </div>

    </div>

<script type="text/javascript">
    
window.CI360.init();
var splide=new Splide(".splide_products",{type:"loop",perPage:5,perMove:1,focus:"center",breakpoints:{1500:{perPage:4},1200:{perPage:3},1e3:{perPage:2},700:{perPage:1}},updateOnMove:!0});splide.mount();var splide=new Splide(".splide_stones",{type:"loop",perPage:5,perMove:1,focus:"center",breakpoints:{1500:{perPage:4},1200:{perPage:3},1e3:{perPage:2},700:{perPage:1}},updateOnMove:!0});splide.mount();var splide=new Splide(".splide_brand",{type:"loop",perPage:4,perMove:1,focus:"center",breakpoints:{1200:{perPage:3},1e3:{perPage:2},700:{perPage:1}},updateOnMove:!0});splide.mount()

</script>

<style type="text/css">
   
.splide__pagination{display:none!important}.splide__slide.is-active h3{display:block}.splide__track{cursor:-webkit-grab;cursor:grab}

</style>


@endsection
