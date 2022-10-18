<link rel="canonical" href="{{url()->full()}}">
<meta property="og:url" content="{{url()->full()}}">
@if(isset($title))
<title>{{ $title }}</title>
<meta property="og:title" content="{{ $title }}">
<meta name="twitter:title" content="{{ $title }}">
@endif

@if(isset($description))
<meta name="description" content="{{ $description }}">
<meta property="og:description" content="{{ $description }}">
<meta name="twitter:description" content="{{ $description }}">
@endif

<meta name="author" content="Brandon Huynh">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="content-language" content="en-us">
<meta http-equiv="Cache-control" content="public">
<!-- Styles -->
<link href="{{ asset('css/app.css?2') }}" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link href="{{ asset('css/general.css?2') }}" rel="stylesheet">
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- logo -->
<link rel='shortcut icon' type='image/x-icon' href="{{ asset('storage/image/page_img/icon.png') }}" />
<meta property="og:image" content="{{ asset('storage/image/page_img/icon.png') }}">
<meta name="twitter:url" content="{{ asset('storage/image/page_img/icon.png') }}">
<!-- font -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-123725715-3"></script>

<!-- Google Merchant HTML Verify Tag -->
<meta name="google-site-verification" content="p8H2W8F0MsWySvV2_6AM-UizQbe2mN2Y11fGCKFOuRU" />

<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());

gtag('config', 'UA-123725715-3');
</script>
<!-- End Google Analytics Tag -->

<!-- Podium Tag -->

<script defer src="https://connect.podium.com/widget.js#API_TOKEN=a8f93567-4a3e-4b10-b7f1-4002da972e4b" id="podium-widget" data-api-token="a8f93567-4a3e-4b10-b7f1-4002da972e4b"></script>

<!-- end Podium Tag -->

<!-- Pinterest Tag -->
<script>
!function(e){if(!window.pintrk){window.pintrk = function () {
window.pintrk.queue.push(Array.prototype.slice.call(arguments))};var
  n=window.pintrk;n.queue=[],n.version="3.0";var
  t=document.createElement("script");t.async=!0,t.src=e;var
  r=document.getElementsByTagName("script")[0];
  r.parentNode.insertBefore(t,r)}}("https://s.pinimg.com/ct/core.js");
pintrk('load', '2614076105532', {em: '<user_email_address>'});
pintrk('page');
</script>


<!-- BEGIN GCR Badge Code -->
<!-- <script src="https://apis.google.com/js/platform.js?onload=renderBadge"
  async defer>
</script> -->

<!-- <script>
  window.renderBadge = function() {
    var ratingBadgeContainer = document.createElement("div");
      document.body.appendChild(ratingBadgeContainer);
      window.gapi.load('ratingbadge', function() {
        window.gapi.ratingbadge.render(
          ratingBadgeContainer, {
            // REQUIRED
            "merchant_id": 514029506,
            // OPTIONAL
            "position": "BOTTOM_LEFT"
          });           
     });
  }

  window.___gcfg = {
    lang: 'en_US'
  };
</script> -->

<!-- <noscript>
  <img height="1" width="1" style="display:none;" alt="" src="https://ct.pinterest.com/v3/?event=init&tid=2614076105532&pd[em]=<hashed_email_address>&noscript=1" />
</noscript> -->
<!-- end Pinterest Tag -->