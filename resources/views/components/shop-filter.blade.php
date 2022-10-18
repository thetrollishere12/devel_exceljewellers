<div class="filter-case">
   @if($type == "engagement-ring")
   <div class="filter-inner">
      <div class="filter-name first">Designer</div>
      <div class="filter-dropdown-outer">
         <div class="filter-dropdown brand-dropdown">
            <a href="{{ url('/engagement-ring/style/brand-verragio')}}">
               <div class="filter-case-inner brand-case" id="verragio">
                  <img class="w-36 p-2.5 m-auto" src="{{ asset('storage/image/logo/verragio.png') }}">
               </div>
            </a>
            <a href="{{ url('/engagement-ring/style/brand-gabrielco')}}">
               <div class="filter-case-inner brand-case" id="gabrielco">
                  <img class="w-36 p-2.5 m-auto" src="{{ asset('storage/image/logo/gabriel.svg') }}">
               </div>
            </a>

         </div>
      </div>
   </div>
   <div class="filter-inner">
      <div class="filter-name">Style</div>

      

      <div class="filter-dropdown-outer">

         @if(isset($filter['category']))

         <div class="filter-dropdown">
            <a href="{{ url('/engagement-ring/style/category-double halo')}}">
               <div class="filter-case-inner style-case">
                  <span class="icon-Double-Halo-01 text-3xl"></span>
                  <div class="style-text">Double Halo</div>
               </div>
            </a>
            <a href="{{ url('/engagement-ring/style/category-halo')}}">
               <div class="filter-case-inner style-case">
                  <span class="icon-Halo-01 text-3xl"></span>
                  <div class="style-text">Halo</div>
               </div>
            </a>
            <a href="{{ url('/engagement-ring/style/category-free+form')}}">
               <div class="filter-case-inner style-case">
                  <span class="icon-Free-Form-01 text-3xl"></span>
                  <div class="style-text">Free Form</div>
               </div>
            </a>
            <a href="{{ url('/engagement-ring/style/solitaire')}}">
               <div class="filter-case-inner style-case">
                  <span class="icon-Solitare-01 text-3xl"></span>
                  <div class="style-text">Solitaire</div>
               </div>
            </a>
            <a href="{{ url('/engagement-ring/style/category-split+shank')}}">
               <div class="filter-case-inner style-case">
                  <span class="icon-Split-Shank-01 text-3xl"></span>
                  <div class="style-text">Split Shank</div>
               </div>
            </a>
            <a href="{{ url('/engagement-ring/style/category-straight')}}">
               <div class="filter-case-inner style-case">
                  <span class="icon-Straight-01 text-3xl"></span>
                  <div class="style-text">Straight</div>
               </div>
            </a>
            <a href="{{ url('/engagement-ring/style/category-pave')}}">
               <div class="filter-case-inner style-case">
                  <span class="icon-Pave-01 text-3xl"></span>
                  <div class="style-text">Pave</div>
               </div>
            </a>
            <a href="{{ url('/engagement-ring/style/category-three stone')}}">
               <div class="filter-case-inner style-case">
                  <span class="icon-Three-Stone-01 text-3xl"></span>
                  <div class="style-text">Three Stone</div>
               </div>
            </a>
         </div>


         @else

         <div class="filter-dropdown">
            <a param-name="category" param-value="double+halo">
               <div class="filter-case-inner style-case">
                  <span class="icon-Double-Halo-01 text-3xl"></span>
                  <div class="style-text">Double Halo</div>
               </div>
            </a>
            <a param-name="category" param-value="halo">
               <div class="filter-case-inner style-case">
                  <span class="icon-Halo-01 text-3xl"></span>
                  <div class="style-text">Halo</div>
               </div>
            </a>
            <a param-name="category" param-value="free+form">
               <div class="filter-case-inner style-case">
                  <span class="icon-Free-Form-01 text-3xl"></span>
                  <div class="style-text">Free Form</div>
               </div>
            </a>
            <a param-name="category" param-value="solitaire">
               <div class="filter-case-inner style-case">
                  <span class="icon-Solitare-01 text-3xl"></span>
                  <div class="style-text">Solitaire</div>
               </div>
            </a>
            <a param-name="category" param-value="split+shank">
               <div class="filter-case-inner style-case">
                  <span class="icon-Split-Shank-01 text-3xl"></span>
                  <div class="style-text">Split Shank</div>
               </div>
            </a>
            <a param-name="category" param-value="straight">
               <div class="filter-case-inner style-case">
                  <span class="icon-Straight-01 text-3xl"></span>
                  <div class="style-text">Straight</div>
               </div>
            </a>
            <a param-name="category" param-value="pave">
               <div class="filter-case-inner style-case">
                  <span class="icon-Pave-01 text-3xl"></span>
                  <div class="style-text">Pave</div>
               </div>
            </a>
            <a param-name="category" param-value="three stone">
               <div class="filter-case-inner style-case">
                  <span class="icon-Three-Stone-01 text-3xl"></span>
                  <div class="style-text">Three Stone</div>
               </div>
            </a>
         </div>

         @endif


      </div>
   </div>
   <div class="filter-inner">
      <div class="filter-name">Shape</div>
      <div class="filter-dropdown-outer">

         @if(isset($filter['shape']))

         <div class="filter-dropdown">
            <a href="{{ url('/engagement-ring/style/shape-round')}}">
               <div class="filter-case-inner style-case">
                  <span class="icon-round text-base"></span>
                  <div class="style-text">Round</div>
               </div>
            </a>
            <a href="{{ url('/engagement-ring/style/shape-pear')}}">
               <div class="filter-case-inner style-case">
                  <span class="icon-pear text-base"></span>
                  <div class="style-text">Pear</div>
               </div>
            </a>
            <a href="{{ url('/engagement-ring/style/shape-oval')}}">
               <div class="filter-case-inner style-case">
                  <span class="icon-oval text-base"></span>
                  <div class="style-text">Oval</div>
               </div>
            </a>
            <a href="{{ url('/engagement-ring/style/shape-marquise')}}">
               <div class="filter-case-inner style-case">
                  <span class="icon-marquise text-base"></span>
                  <div class="style-text">Marquise</div>
               </div>
            </a>
            <a href="{{ url('/engagement-ring/style/shape-cushion')}}">
               <div class="filter-case-inner style-case">
                  <span class="icon-cushion text-base"></span>
                  <div class="style-text">Cushion</div>
               </div>
            </a>
            <a href="{{ url('/engagement-ring/style/shape-princess')}}">
               <div class="filter-case-inner style-case">
                  <span class="icon-princess text-base"></span>
                  <div class="style-text">Princess</div>
               </div>
            </a>
            <a href="{{ url('/engagement-ring/style/shape-emerald')}}">
               <div class="filter-case-inner style-case">
                  <span class="icon-emerald text-base"></span>
                  <div class="style-text">Emerald</div>
               </div>
            </a>
            <a href="{{ url('/engagement-ring/style/shape-asscher')}}">
               <div class="filter-case-inner style-case">
                  <span class="icon-asscher text-base"></span>
                  <div class="style-text">Asscher</div>
               </div>
            </a>
         </div>

         @else

         <div class="filter-dropdown">
            <a param-name="shape" param-value="round">
               <div class="filter-case-inner style-case">
                  <span class="icon-round text-base"></span>
                  <div class="style-text">Round</div>
               </div>
            </a>
            <a param-name="shape" param-value="pear">
               <div class="filter-case-inner style-case">
                  <span class="icon-pear text-base"></span>
                  <div class="style-text">Pear</div>
               </div>
            </a>
            <a param-name="shape" param-value="Oval">
               <div class="filter-case-inner style-case">
                  <span class="icon-oval text-base"></span>
                  <div class="style-text">Oval</div>
               </div>
            </a>
            <a param-name="shape" param-value="Marquise">
               <div class="filter-case-inner style-case">
                  <span class="icon-marquise text-base"></span>
                  <div class="style-text">Marquise</div>
               </div>
            </a>
            <a param-name="shape" param-value="cushion">
               <div class="filter-case-inner style-case">
                  <span class="icon-cushion text-base"></span>
                  <div class="style-text">Cushion</div>
               </div>
            </a>
            <a param-name="shape" param-value="princess">
               <div class="filter-case-inner style-case">
                  <span class="icon-princess text-base"></span>
                  <div class="style-text">Princess</div>
               </div>
            </a>
            <a param-name="shape" param-value="emerald">
               <div class="filter-case-inner style-case">
                  <span class="icon-emerald text-base"></span>
                  <div class="style-text">Emerald</div>
               </div>
            </a>
            <a param-name="shape" param-value="asscher">
               <div class="filter-case-inner style-case">
                  <span class="icon-asscher text-base"></span>
                  <div class="style-text">Asscher</div>
               </div>
            </a>
         </div>

         @endif

      </div>
   </div>
   @elseif($type == "wedding-band")
   <div class="filter-inner">
      <div class="filter-name first">Designer</div>
      <div class="filter-dropdown-outer">
         <div class="filter-dropdown brand-dropdown">
            <a href="{{ url('/wedding-band/style/brand-verragio')}}">
               <div class="filter-case-inner brand-case" id="verragio">
                  <img class="w-36 p-2.5 m-auto" src="{{ asset('storage/image/logo/verragio.png') }}">
               </div>
            </a>
            <a href="{{ url('/wedding-band/style/brand-gabrielco')}}">
               <div class="filter-case-inner brand-case" id="gabrielco">
                  <img class="w-36 p-2.5 m-auto" src="{{ asset('storage/image/logo/gabriel.svg') }}">
               </div>
            </a>
            <a href="{{ url('/wedding-band/style/brand-malo')}}">
               <div class="filter-case-inner brand-case" id="maloo">
                  <img class="w-36 p-2.5 m-auto" src="{{ asset('storage/image/logo/malo.png') }}">
               </div>
            </a>

         </div>

         <!-- <div class="filter-dropdown brand-dropdown">
            <a href="{{ url('/wedding-band?brand=verragio')}}">
               <div class="filter-case-inner brand-case" id="verragio">
                  <img class="w-36 p-2.5 m-auto" src="{{ asset('storage/image/logo/verragio.png') }}">
               </div>
            </a>
            <a href="{{ url('/wedding-band?brand=gabrielco')}}">
               <div class="filter-case-inner brand-case" id="gabrielco">
                  <img class="w-36 p-2.5 m-auto" src="{{ asset('storage/image/logo/gabriel.svg') }}">
               </div>
            </a>
            <a href="{{ url('/wedding-band?brand=valina')}}">
               <div class="filter-case-inner brand-case" id="valina">
                  <img class="w-36 p-2.5 m-auto" src="{{ asset('storage/image/logo/valina.png') }}">
               </div>
            </a>
            <a href="{{ url('/wedding-band?brand=romance')}}">
               <div class="filter-case-inner brand-case" id="romance">
                  <img class="w-36 p-2.5 m-auto" src="{{ asset('storage/image/logo/romance.png') }}">
               </div>
            </a>
            <a href="{{ url('/wedding-band?brand=malo')}}">
               <div class="filter-case-inner brand-case" id="maloo">
                  <img class="w-36 p-2.5 m-auto" src="{{ asset('storage/image/logo/malo.png') }}">
               </div>
            </a>
            <a href="{{ url('/wedding-band?brand=simong')}}">
               <div class="filter-case-inner brand-case" id="simong">
                  <img class="w-36 p-2.5 m-auto" src="{{ asset('storage/image/logo/simong.png') }}">
               </div>
            </a>
         </div> -->

      </div>
   </div>
   <div class="filter-inner">
      <div class="filter-name">Style</div>
      <div class="filter-dropdown-outer">

         @if(isset($filter['category']))

         <div class="filter-dropdown">
            <a href="{{ url('/wedding-band/style/category-curved')}}">
               <div class="filter-case-inner style-case">
                  <span class="icon-Curved-01 text-3xl"></span>
                  <div class="style-text">curved</div>
               </div>
            </a>
            <a href="{{ url('/wedding-band/style/category-anniversary')}}">
               <div class="filter-case-inner style-case">
                  <span class="icon-Anniversary-01 text-3xl"></span>
                  <div class="style-text">Anniversary</div>
               </div>
            </a>
            <a href="{{ url('/wedding-band/style/category-jacket')}}">
               <div class="filter-case-inner style-case">
                  <span class="icon-Jacket-01 text-3xl"></span>
                  <div class="style-text">Jacket</div>
               </div>
            </a>
            <a href="{{ url('/wedding-band/style/category-eternity')}}">
               <div class="filter-case-inner style-case">
                  <span class="icon-Eternity-01 text-3xl"></span>
                  <div class="style-text">Eternity</div>
               </div>
            </a>
            <a href="{{ url('/wedding-band/style/category-stackable')}}">
               <div class="filter-case-inner style-case">
                  <span class="icon-Stackable-01 text-3xl"></span>
                  <div class="style-text">Stackable</div>
               </div>
            </a>
            <a href="{{ url('/wedding-band/style/category-men classic')}}">
               <div class="filter-case-inner style-case">
                  <span class="icon-Classic-01 text-3xl"></span>
                  <div class="style-text">Men Classic</div>
               </div>
            </a>
            <a href="{{ url('/wedding-band/style/category-alternative')}}">
               <div class="filter-case-inner style-case">
                  <span class="icon-Alternative-01 text-3xl"></span>
                  <div class="style-text">Men Alternative</div>
               </div>
            </a>
            <a href="{{ url('/wedding-band/style/category-lux')}}">
               <div class="filter-case-inner style-case">
                  <span class="icon-Lux-01 text-3xl"></span>
                  <div class="style-text">Men Lux</div>
               </div>
            </a>
            <a href="{{ url('/wedding-band/style/category-men diamond')}}">
               <div class="filter-case-inner style-case">
                  <span class="icon-Diamond-01 text-3xl"></span>
                  <div class="style-text">Men Diamond</div>
               </div>
            </a>
         </div>

         @else

         <div class="filter-dropdown">
            <a param-name="category" param-value="curved">
               <div class="filter-case-inner style-case">
                  <span class="icon-Curved-01 text-3xl"></span>
                  <div class="style-text">curved</div>
               </div>
            </a>
            <a param-name="category" param-value="anniversary">
               <div class="filter-case-inner style-case">
                  <span class="icon-Anniversary-01 text-3xl"></span>
                  <div class="style-text">Anniversary</div>
               </div>
            </a>
            <a param-name="category" param-value="jacket">
               <div class="filter-case-inner style-case">
                  <span class="icon-Jacket-01 text-3xl"></span>
                  <div class="style-text">Jacket</div>
               </div>
            </a>
            <a param-name="category" param-value="eternity">
               <div class="filter-case-inner style-case">
                  <span class="icon-Eternity-01 text-3xl"></span>
                  <div class="style-text">Eternity</div>
               </div>
            </a>
            <a param-name="category" param-value="stackable">
               <div class="filter-case-inner style-case">
                  <span class="icon-Stackable-01 text-3xl"></span>
                  <div class="style-text">Stackable</div>
               </div>
            </a>
            <a param-name="category" param-value="men classic">
               <div class="filter-case-inner style-case">
                  <span class="icon-Classic-01 text-3xl"></span>
                  <div class="style-text">Men Classic</div>
               </div>
            </a>
            <a param-name="category" param-value="alternative">
               <div class="filter-case-inner style-case">
                  <span class="icon-Alternative-01 text-3xl"></span>
                  <div class="style-text">Men Alternative</div>
               </div>
            </a>
            <a param-name="category" param-value="lux">
               <div class="filter-case-inner style-case">
                  <span class="icon-Lux-01 text-3xl"></span>
                  <div class="style-text">Men Lux</div>
               </div>
            </a>
            <a param-name="category" param-value="men diamond">
               <div class="filter-case-inner style-case">
                  <span class="icon-Diamond-01 text-3xl"></span>
                  <div class="style-text">Men Diamond</div>
               </div>
            </a>
         </div>

         @endif

      </div>
   </div>
   @elseif($type == "fine-jewellery")
   <div class="filter-inner">
      <div class="filter-name first">Gemstone</div>
      <div class="filter-dropdown-outer">
         <div class="filter-dropdown">
            @if(isset($filter['gem']))

            <a href="{{ url('/fine-jewellery/style')}}@if(isset($filter['category']))/category-{{ $filter['category'] }}@endif/gem-diamond">
               <div class="filter-case-inner stone-case">
                  <img class="w-6 m-auto py-2" src="{{ asset('storage/image/gemstone/diamond.png') }}">
                  <div class="gem-name">Diamond</div>
               </div>
            </a>
            <a href="{{ url('/fine-jewellery/style')}}@if(isset($filter['category']))/category-{{ $filter['category'] }}@endif/gem-black diamond">
               <div class="filter-case-inner stone-case">
                  <img class="w-6 m-auto py-2" src="{{ asset('storage/image/gemstone/black diamond.png') }}">
                  <div class="gem-name">Black Diamond</div>
               </div>
            </a>
            <a href="{{ url('/fine-jewellery/style')}}@if(isset($filter['category']))/category-{{ $filter['category'] }}@endif/gem-garnet">
               <div class="filter-case-inner stone-case">
                  <img class="w-6 m-auto py-2" src="{{ asset('storage/image/gemstone/garnet.png') }}">
                  <div class="gem-name">Garnet</div>
               </div>
            </a>
            <a href="{{ url('/fine-jewellery/style')}}@if(isset($filter['category']))/category-{{ $filter['category'] }}@endif/gem-pearl">
               <div class="filter-case-inner stone-case">
                  <img class="w-6 m-auto py-2" src="{{ asset('storage/image/gemstone/pearl.png') }}">
                  <div class="gem-name">Pearl</div>
               </div>
            </a>
            <a href="{{ url('/fine-jewellery/style')}}@if(isset($filter['category']))/category-{{ $filter['category'] }}@endif/gem-sapphire">
               <div class="filter-case-inner stone-case">
                  <img class="w-6 m-auto py-2" src="{{ asset('storage/image/gemstone/sapphire.png') }}">
                  <div class="gem-name">Sapphire</div>
               </div>
            </a>
            <a href="{{ url('/fine-jewellery/style')}}@if(isset($filter['category']))/category-{{ $filter['category'] }}@endif/gem-emerald">
               <div class="filter-case-inner stone-case">
                  <img class="w-6 m-auto py-2" src="{{ asset('storage/image/gemstone/emerald.png') }}">
                  <div class="gem-name">Emerald</div>
               </div>
            </a>
            <a href="{{ url('/fine-jewellery/style')}}@if(isset($filter['category']))/category-{{ $filter['category'] }}@endif/gem-ruby">
               <div class="filter-case-inner stone-case">
                  <img class="w-6 m-auto py-2" src="{{ asset('storage/image/gemstone/ruby.png') }}">
                  <div class="gem-name">Ruby</div>
               </div>
            </a>
            <a href="{{ url('/fine-jewellery/style')}}@if(isset($filter['category']))/category-{{ $filter['category'] }}@endif/gem-amethyst">
               <div class="filter-case-inner stone-case">
                  <img class="w-6 m-auto py-2" src="{{ asset('storage/image/gemstone/amethyst.png') }}">
                  <div class="gem-name">Amethyst</div>
               </div>
            </a>
            <a href="{{ url('/fine-jewellery/style')}}@if(isset($filter['category']))/category-{{ $filter['category'] }}@endif/gem-aquamarine">
               <div class="filter-case-inner stone-case">
                  <img class="w-6 m-auto py-2" src="{{ asset('storage/image/gemstone/aquamarine.png') }}">
                  <div class="gem-name">Aquamarine</div>
               </div>
            </a>
            <a href="{{ url('/fine-jewellery/style')}}@if(isset($filter['category']))/category-{{ $filter['category'] }}@endif/gem-citrine">
               <div class="filter-case-inner stone-case">
                  <img class="w-6 m-auto py-2" src="{{ asset('storage/image/gemstone/citrine.png') }}">
                  <div class="gem-name">Citrine</div>
               </div>
            </a>
            <a href="{{ url('/fine-jewellery/style')}}@if(isset($filter['category']))/category-{{ $filter['category'] }}@endif/gem-peridot">
               <div class="filter-case-inner stone-case">
                  <img class="w-6 m-auto py-2" src="{{ asset('storage/image/gemstone/peridot.png') }}">
                  <div class="gem-name">Peridot</div>
               </div>
            </a>
            <a href="{{ url('/fine-jewellery/style')}}@if(isset($filter['category']))/category-{{ $filter['category'] }}@endif/gem-opal">
               <div class="filter-case-inner stone-case">
                  <img class="w-6 m-auto py-2" src="{{ asset('storage/image/gemstone/opal.png') }}">
                  <div class="gem-name">Opal</div>
               </div>
            </a>
            <a href="{{ url('/fine-jewellery/style')}}@if(isset($filter['category']))/category-{{ $filter['category'] }}@endif/gem-blue topaz">
               <div class="filter-case-inner stone-case">
                  <img class="w-6 m-auto py-2" src="{{ asset('storage/image/gemstone/bluetopaz.png') }}">
                  <div class="gem-name">Blue Topaz</div>
               </div>
            </a>

            <a href="{{ url('/fine-jewellery/style')}}@if(isset($filter['category']))/category-{{ $filter['category'] }}@endif/gem-alexandrite">
               <div class="filter-case-inner stone-case">
                  <img class="w-6 m-auto py-2" src="{{ asset('storage/image/gemstone/alexandrite.png') }}">
                  <div class="gem-name">Alexandrite</div>
               </div>
            </a>

            <a href="{{ url('/fine-jewellery/style')}}@if(isset($filter['category']))/category-{{ $filter['category'] }}@endif/gem-onyx">
               <div class="filter-case-inner stone-case">
                  <img class="w-6 m-auto py-2" src="{{ asset('storage/image/gemstone/black diamond.png') }}">
                  <div class="gem-name">Onyx</div>
               </div>
            </a>

            @else
            <a param-name="gem" param-value="diamond">
               <div class="filter-case-inner stone-case">
                  <img class="w-6 m-auto py-2" src="{{ asset('storage/image/gemstone/diamond.png') }}">
                  <div class="gem-name">Diamond</div>
               </div>
            </a>
            <a param-name="gem" param-value="black diamond">
               <div class="filter-case-inner stone-case">
                  <img class="w-6 m-auto py-2" src="{{ asset('storage/image/gemstone/black diamond.png') }}">
                  <div class="gem-name">Black Diamond</div>
               </div>
            </a>
            <a param-name="gem" param-value="garnet">
               <div class="filter-case-inner stone-case">
                  <img class="w-6 m-auto py-2" src="{{ asset('storage/image/gemstone/garnet.png') }}">
                  <div class="gem-name">Garnet</div>
               </div>
            </a>
            <a param-name="gem" param-value="pearl">
               <div class="filter-case-inner stone-case">
                  <img class="w-6 m-auto py-2" src="{{ asset('storage/image/gemstone/pearl.png') }}">
                  <div class="gem-name">Pearl</div>
               </div>
            </a>
            <a param-name="gem" param-value="sapphire">
               <div class="filter-case-inner stone-case">
                  <img class="w-6 m-auto py-2" src="{{ asset('storage/image/gemstone/sapphire.png') }}">
                  <div class="gem-name">Sapphire</div>
               </div>
            </a>
            <a param-name="gem" param-value="emerald">
               <div class="filter-case-inner stone-case">
                  <img class="w-6 m-auto py-2" src="{{ asset('storage/image/gemstone/emerald.png') }}">
                  <div class="gem-name">Emerald</div>
               </div>
            </a>
            <a param-name="gem" param-value="ruby">
               <div class="filter-case-inner stone-case">
                  <img class="w-6 m-auto py-2" src="{{ asset('storage/image/gemstone/ruby.png') }}">
                  <div class="gem-name">Ruby</div>
               </div>
            </a>
            <a param-name="gem" param-value="amethyst">
               <div class="filter-case-inner stone-case">
                  <img class="w-6 m-auto py-2" src="{{ asset('storage/image/gemstone/amethyst.png') }}">
                  <div class="gem-name">Amethyst</div>
               </div>
            </a>
            <a param-name="gem" param-value="aquamarine">
               <div class="filter-case-inner stone-case">
                  <img class="w-6 m-auto py-2" src="{{ asset('storage/image/gemstone/aquamarine.png') }}">
                  <div class="gem-name">Aquamarine</div>
               </div>
            </a>
            <a param-name="gem" param-value="citrine">
               <div class="filter-case-inner stone-case">
                  <img class="w-6 m-auto py-2" src="{{ asset('storage/image/gemstone/citrine.png') }}">
                  <div class="gem-name">Citrine</div>
               </div>
            </a>
            <a param-name="gem" param-value="peridot">
               <div class="filter-case-inner stone-case">
                  <img class="w-6 m-auto py-2" src="{{ asset('storage/image/gemstone/peridot.png') }}">
                  <div class="gem-name">Peridot</div>
               </div>
            </a>
            <a param-name="gem" param-value="opal">
               <div class="filter-case-inner stone-case">
                  <img class="w-6 m-auto py-2" src="{{ asset('storage/image/gemstone/opal.png') }}">
                  <div class="gem-name">Opal</div>
               </div>
            </a>
            <a param-name="gem" param-value="blue topaz">
               <div class="filter-case-inner stone-case">
                  <img class="w-6 m-auto py-2" src="{{ asset('storage/image/gemstone/bluetopaz.png') }}">
                  <div class="gem-name">Blue Topaz</div>
               </div>
            </a>

            <a param-name="gem" param-value="alexandrite">
               <div class="filter-case-inner stone-case">
                  <img class="w-6 m-auto py-2" src="{{ asset('storage/image/gemstone/alexandrite.png') }}">
                  <div class="gem-name">Alexandrite</div>
               </div>
            </a>

            <a param-name="gem" param-value="onyx">
               <div class="filter-case-inner stone-case">
                  <img class="w-6 m-auto py-2" src="{{ asset('storage/image/gemstone/black diamond.png') }}">
                  <div class="gem-name">Onyx</div>
               </div>
            </a>
            @endif
         </div>
      </div>
   </div>
   <div class="filter-inner">
      <div class="filter-name">Category</div>
      <div class="filter-dropdown-outer">
         <div class="filter-dropdown">
            <a href="{{ url('/fine-jewellery?category=bracelets')}}">
               <div class="filter-case-inner category-case">
                  <span class="icon-Tennis-Bracelet-01 text-3xl"></span>
                  <div class="category-text">Bracelets</div>
               </div>
            </a>
            <a href="{{ url('/fine-jewellery?category=earrings')}}">
               <div class="filter-case-inner category-case">
                  <span class="icon-Drops-01 text-3xl"></span>
                  <div class="category-text">Earrings</div>
               </div>
            </a>
            <a href="{{ url('/fine-jewellery?category=necklaces')}}">
               <div class="filter-case-inner category-case">
                  <span class="icon-Bar-01 text-3xl"></span>
                  <div class="category-text">Necklaces</div>
               </div>
            </a>
            <a href="{{ url('/fine-jewellery?category=rings')}}">
               <div class="filter-case-inner category-case">
                  <span class="icon-Diamond-Ring-01 text-3xl"></span>
                  <div class="category-text">Rings</div>
               </div>
            </a>
         </div>

         <!-- <div class="filter-dropdown">
            <a href="{{ url('/fine-jewellery?category=bracelets')}}">
               <div class="filter-case-inner category-case">
                  <span class="icon-Tennis-Bracelet-01 text-3xl"></span>
                  <div class="category-text">Bracelets</div>
               </div>
            </a>
            <a href="{{ url('/fine-jewellery?category=earrings')}}">
               <div class="filter-case-inner category-case">
                  <span class="icon-Drops-01 text-3xl"></span>
                  <div class="category-text">Earrings</div>
               </div>
            </a>
            <a href="{{ url('/fine-jewellery?category=necklaces')}}">
               <div class="filter-case-inner category-case">
                  <span class="icon-Bar-01 text-3xl"></span>
                  <div class="category-text">Necklaces</div>
               </div>
            </a>
            <a href="{{ url('/fine-jewellery?category=rings')}}">
               <div class="filter-case-inner category-case">
                  <span class="icon-Diamond-Ring-01 text-3xl"></span>
                  <div class="category-text">Rings</div>
               </div>
            </a>
         </div> -->
         
      </div>
   </div>

   @if(isset($filter['category']))
   <div class="filter-inner">
      <div class="filter-name">Style</div>
      <div class="filter-dropdown-outer">
         

         @if($filter['category'] == "bracelets")

         <div class="filter-dropdown">
            <a href="{{ url('/fine-jewellery?style=bangle&category=bracelets') }}">
               <div class="filter-case-inner style-case">
                  <span class="icon-Bangle-Bracelet-01 text-3xl"></span> 
                  <div class="style-text">Bangle</div>
               </div>
            </a>
            <a href="{{ url('/fine-jewellery?style=chain&category=bracelets') }}">
               <div class="filter-case-inner style-case">
                  <span class="icon-Chain-bracelet-01 text-3xl"></span> 
                  <div class="style-text">Chain</div>
               </div>
            </a>
            <a href="{{ url('/fine-jewellery?style=charm&category=bracelets') }}">
               <div class="filter-case-inner style-case">
                  <span class="icon-Charm-Bracelet-01 text-3xl"></span> 
                  <div class="style-text">Charm</div>
               </div>
            </a>
            <a href="{{ url('/fine-jewellery?style=cuff&category=bracelets') }}">
               <div class="filter-case-inner style-case">
                  <span class="icon-Cuff-Bracelet-01 text-3xl"></span> 
                  <div class="style-text">Cuff</div>
               </div>
            </a>
            <a href="{{ url('/fine-jewellery?style=heart&category=bracelets') }}">
               <div class="filter-case-inner style-case">
                  <span class="icon-Heart-01 text-3xl"></span> 
                  <div class="style-text">Heart</div>
               </div>
            </a>
            <a href="{{ url('/fine-jewellery?style=tennis&category=bracelets') }}">
               <div class="filter-case-inner style-case">
                  <span class="icon-Tennis-Bracelet-01 text-3xl"></span> 
                  <div class="style-text">Tennis</div>
               </div>
            </a>
         </div>

         @endif


         @if($filter['category'] == "rings")
         <div class="filter-dropdown">
         <a href="{{ url('/fine-jewellery?category=rings&gem=diamond') }}">
            <div class="filter-case-inner style-case">
               <span class="icon-Diamond-Ring-01 text-3xl"></span> 
               <div class="style-text">Diamond</div>
            </div>
         </a>
         <a href="{{ url('/fine-jewellery?category=rings&gem=gemstone') }}">
            <div class="filter-case-inner style-case">
               <span class="icon-Gem-Stone-Ring-01 text-3xl"></span> 
               <div class="style-text">Gemstone</div>
            </div>
         </a>
         <a href="{{ url('/fine-jewellery?category=rings&gem=pearl') }}">
            <div class="filter-case-inner style-case">
               <span class="icon-Pearl-Ring-01 text-3xl"></span> 
               <div class="style-text">Pearl</div>
            </div>
         </a>
      </div>
      @endif




      @if($filter['category'] == "necklaces")
      <div class="filter-dropdown">
         <a href="{{ url('/fine-jewellery?style=bar&category=necklaces') }}">
            <div class="filter-case-inner style-case">
               <span class="icon-Bar-01 text-3xl"></span> 
               <div class="style-text">Bar</div>
            </div>
         </a>
         <a href="{{ url('/fine-jewellery?style=Choker&category=necklaces') }}">
            <div class="filter-case-inner style-case">
               <span class="icon-Choker-01 text-3xl"></span> 
               <div class="style-text">Choker</div>
            </div>
         </a>
         <a href="{{ url('/fine-jewellery?style=fashion&category=necklaces') }}">
            <div class="filter-case-inner style-case">
               <span class="icon-Fashion-01 text-3xl"></span> 
               <div class="style-text">Fashion</div>
            </div>
         </a>
         <a href="{{ url('/fine-jewellery?style=heart&category=necklaces') }}">
            <div class="filter-case-inner style-case">
               <span class="icon-Heart-01 text-3xl"></span> 
               <div class="style-text">Heart</div>
            </div>
         </a>
         <a href="{{ url('/fine-jewellery?style=locket&category=necklaces') }}">
            <div class="filter-case-inner style-case">
               <span class="icon-Locket-01 text-3xl"></span> 
               <div class="style-text">Locket</div>
            </div>
         </a>
         <a href="{{ url('/fine-jewellery?style=y knots&category=necklaces') }}">
            <div class="filter-case-inner style-case">
               <span class="icon-Y-Knots-01 text-3xl"></span> 
               <div class="style-text">Y Knots</div>
            </div>
         </a>
      </div>
      @endif

      @if($filter['category'] == "earrings")
      <div class="filter-dropdown">
         <a href="{{ url('/fine-jewellery?style=drop&category=earrings') }}">
            <div class="filter-case-inner style-case">
               <span class="icon-Drops-01 text-3xl"></span> 
               <div class="style-text">Drop</div>
            </div>
         </a>
         <a href="{{ url('/fine-jewellery?style=huggies&category=earrings') }}">
            <div class="filter-case-inner style-case">
               <span class="icon-Huggies-01 text-3xl"></span> 
               <div class="style-text">Huggies</div>
            </div>
         </a>
         <a href="{{ url('/fine-jewellery?style=hoops&category=earrings') }}">
            <div class="filter-case-inner style-case">
               <span class="icon-Hoops-01 text-3xl"></span> 
               <div class="style-text">Hoops</div>
            </div>
         </a>
         <a href="{{ url('/fine-jewellery?style=stud&category=earrings') }}">
            <div class="filter-case-inner style-case">
               <span class="icon-Studs-01 text-3xl"></span> 
               <div class="style-text">Stud</div>
            </div>
         </a>
      </div>
      @endif




         
      </div>
   </div>

   @endif

   @endif


   <div class="filter-inner">
      <div class="filter-name second">Metal</div>
      <div class="filter-dropdown-outer">


         @if(isset($filter['color']))

         <div class="filter-dropdown">
            <a href="{{ url('/'.$type.'?metal=10k&color=white') }}">
               <div class="filter-case-inner metal-case">
                  <span class="icon-ring white-gold"></span> 
                  <div><span class="metal-carat">10K</span> <span class="metal-color">White</span></div>
               </div>
            </a>
            <a href="{{ url('/'.$type.'?metal=14k&color=white') }}">
               <div class="filter-case-inner metal-case">
                  <span class="icon-ring white-gold"></span> 
                  <div><span class="metal-carat">14K</span> <span class="metal-color">White</span></div>
               </div>
            </a>
            <a href="{{ url('/'.$type.'?metal=18k&color=white') }}">
               <div class="filter-case-inner metal-case">
                  <span class="icon-ring white-gold"></span> 
                  <div><span class="metal-carat">18K</span> <span class="metal-color">White</span></div>
               </div>
            </a>
            <a href="{{ url('/'.$type.'?metal=10k&color=yellow') }}">
               <div class="filter-case-inner metal-case">
                  <span class="icon-ring yellow-gold"></span> 
                  <div><span class="metal-carat">10K</span> <span class="metal-color">Yellow</span></div>
               </div>
            </a>
            <a href="{{ url('/'.$type.'?metal=14k&color=yellow') }}">
               <div class="filter-case-inner metal-case">
                  <span class="icon-ring yellow-gold"></span> 
                  <div><span class="metal-carat">14K</span> <span class="metal-color">Yellow</span></div>
               </div>
            </a>
            <a href="{{ url('/'.$type.'?metal=18k&color=yellow') }}">
               <div class="filter-case-inner metal-case">
                  <span class="icon-ring yellow-gold"></span> 
                  <div><span class="metal-carat">18K</span> <span class="metal-color">Yellow</span></div>
               </div>
            </a>
            <a href="{{ url('/'.$type.'?metal=10k&color=rose') }}">
               <div class="filter-case-inner metal-case">
                  <span class="icon-ring rose-gold"></span> 
                  <div><span class="metal-carat">10K</span> <span class="metal-color">Rose</span></div>
               </div>
            </a>
            <a href="{{ url('/'.$type.'?metal=14k&color=rose') }}">
               <div class="filter-case-inner metal-case">
                  <span class="icon-ring rose-gold"></span> 
                  <div><span class="metal-carat">14K</span> <span class="metal-color">Rose</span></div>
               </div>
            </a>
            <a href="{{ url('/'.$type.'?metal=18k&color=rose') }}">
               <div class="filter-case-inner metal-case">
                  <span class="icon-ring rose-gold"></span> 
                  <div><span class="metal-carat">18K</span> <span class="metal-color">Rose</span></div>
               </div>
            </a>
            <a href="{{ url('/'.$type.'?metal=platinum&color=platinum') }}">
               <div class="filter-case-inner metal-case">
                  <span class="icon-ring platinum"></span> 
                  <div><span class="metal-carat metal-color">Platinum</span></div>
               </div>
            </a>
         </div>

         @else

         <div class="filter-dropdown">
            <a param-name="metal{}color" param-value="10k{}white">
               <div class="filter-case-inner metal-case">
                  <span class="icon-ring white-gold"></span> 
                  <div><span class="metal-carat">10K</span> <span class="metal-color">White</span></div>
               </div>
            </a>
            <a param-name="metal{}color" param-value="14k{}white">
               <div class="filter-case-inner metal-case">
                  <span class="icon-ring white-gold"></span> 
                  <div><span class="metal-carat">14K</span> <span class="metal-color">White</span></div>
               </div>
            </a>
            <a param-name="metal{}color" param-value="18k{}white">
               <div class="filter-case-inner metal-case">
                  <span class="icon-ring white-gold"></span> 
                  <div><span class="metal-carat">18K</span> <span class="metal-color">White</span></div>
               </div>
            </a>
            <a param-name="metal{}color" param-value="10k{}yellow">
               <div class="filter-case-inner metal-case">
                  <span class="icon-ring yellow-gold"></span> 
                  <div><span class="metal-carat">10K</span> <span class="metal-color">Yellow</span></div>
               </div>
            </a>
            <a param-name="metal{}color" param-value="14k{}yellow">
               <div class="filter-case-inner metal-case">
                  <span class="icon-ring yellow-gold"></span> 
                  <div><span class="metal-carat">14K</span> <span class="metal-color">Yellow</span></div>
               </div>
            </a>
            <a param-name="metal{}color" param-value="18k{}yellow">
               <div class="filter-case-inner metal-case">
                  <span class="icon-ring yellow-gold"></span> 
                  <div><span class="metal-carat">18K</span> <span class="metal-color">Yellow</span></div>
               </div>
            </a>
            <a param-name="metal{}color" param-value="10k{}rose">
               <div class="filter-case-inner metal-case">
                  <span class="icon-ring rose-gold"></span> 
                  <div><span class="metal-carat">10K</span> <span class="metal-color">Rose</span></div>
               </div>
            </a>
            <a param-name="metal{}color" param-value="14k{}rose">
               <div class="filter-case-inner metal-case">
                  <span class="icon-ring rose-gold"></span> 
                  <div><span class="metal-carat">14K</span> <span class="metal-color">Rose</span></div>
               </div>
            </a>
            <a param-name="metal{}color" param-value="18k{}rose">
               <div class="filter-case-inner metal-case">
                  <span class="icon-ring rose-gold"></span> 
                  <div><span class="metal-carat">18K</span> <span class="metal-color">Rose</span></div>
               </div>
            </a>
            <a param-name="metal{}color" param-value="platinum{}platinum">
               <div class="filter-case-inner metal-case">
                  <span class="icon-ring platinum"></span> 
                  <div><span class="metal-carat metal-color">Platinum</span></div>
               </div>
            </a>
         </div>

         @endif


      </div>
   </div>
   <div class="filter-inner">
      <div class="filter-name">Sort By</div>
      <div class="filter-dropdown-outer">
         <div class="filter-dropdown sort-by-dropdown">
            <a param-name="sort" param-value="">
               <div class="filter-case-inner sort-by-case">
                  <div class="sort-by" id="best">Best Seller <span class="icon-star-empty"></span></div>
               </div>
            </a>
            <a param-name="sort" param-value="low">
               <div class="filter-case-inner sort-by-case">
                  <div class="sort-by" id="low">Price: Low To High <span class="icon-keyboard_arrow_down"></span></div>
               </div>
            </a>
            <a param-name="sort" param-value="high">
               <div class="filter-case-inner sort-by-case">
                  <div class="sort-by" id="high">Price: High To Low <span class="icon-keyboard_arrow_up"></span></div>
               </div>
            </a>
         </div>
      </div>
   </div>
   <div class="filter-inner filter-inner-dropdown">
      <a param-name="video" param-value="image_360">
         <div id="image_360" class="filter-name">360° Video</div>
      </a>
   </div>
</div>

<style type="text/css">
    
@media only screen and (min-width: 0) {

    .metal-type {
        transform: translate(-65%, 0);
    }
    .filter-dropdown {
        grid-template-columns: 1fr 1fr;
        -ms-grid-columns: 1fr 1fr;
    }
    .filter-case {
        display: block;
    }
    .filter-dropdown-outer {
        position: relative;
    }
    .filter-name {
        padding: 0 5px;
        margin-right: 0;
    }
    .first:first-child {
        border-top: solid 1px #ededed;
    }
}
@media only screen and (min-width: 480px) {
    .metal-type {
        transform: translate(0, 0);
    }
}
@media only screen and (min-width: 695px) {
    .filter-case {
        display: flex;
    }
    .filter-dropdown-outer {
        position: absolute;
        border-top: solid 1px #ededed;
    }
    .filter-name {
        padding: 1px 40px !important;
        border-top: solid 1px #ededed;
        margin-right: 5px;
    }
}
@media only screen and (min-width: 1024px) {

    .filter-dropdown {
        grid-template-columns: 1fr 1fr 1fr;
        -ms-grid-columns: 1fr 1fr 1fr;
    }
}
.brand-dropdown,
.sort-by-dropdown {
    grid-template-columns: 1fr !important;
}
.sort-by-case {
    padding: 5px 17px !important;
}



.metal-case .yellow-gold {
    color: #ffe957;
}
.metal-case .white-gold {
    color: #dedede;
}
.metal-case .rose-gold {
    color: #fc656f;
}
.metal-case .platinum {
    color: #adc7c3;
}
.selected-metal {
    color: #d60d8c;
}
.icon-chevron-down {
    line-height: 24px !important;
    padding-left: 8px;
}
.mobile-dropdown {
    display: none;
}
.filter-name {
    border-bottom: solid 1px #ededed;
    border-left: solid 1px #ededed;
    border-right: solid 1px #ededed;
    padding: 3px;
    cursor: pointer;
}
.filter-case {
    margin: 5px 0;
}
.filter-case-inner {
    padding: 5px;
    transition: 0.2s;
}
.filter-case-inner:hover {
    background: #ededed;
    cursor: pointer;
}
.selected {
    background: #ededed;
}
.filter-dropdown-outer {
    display: none;
    background: #fff;
    z-index: 1;
    font-size: 11px;
    text-align: center;
}
.filter-dropdown-outer .icon-ring {
    font-size: 11px;
    padding: 3.5px 0 0 3px;
}
.filter-dropdown {
    display: grid;
    width: 100%;
    border-left: solid 1px #ededed;
    border-right: solid 1px #ededed;
    border-bottom: solid 1px #ededed;
}

</style>