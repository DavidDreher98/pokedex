<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}" type="image/x-icon">    

        <meta name="mobile-web-app-capable" content="yes">  
        <meta name="apple-mobile-web-app-capable" content="yes">  
        <meta name="theme-color" content="#383738">
        <meta name="msapplication-TileColor" content="#383738">
        <meta name="msapplication-navbutton-color" content="#383738">
        <meta name="apple-mobile-web-app-status-bar-style" content="#383738">
        <meta name="robots" content="index, follow"/>
        
        <meta itemprop="name" content="Pokédex - David Dreher Developer"/>

        <meta itemprop="description" content="Explore meu portfólio e descubra como posso ajudá-lo a alcançar seus objetivos digitais, desde websites elegantes até soluções personalizadas. Vamos começar juntos!">

        <meta itemprop="image" content="{{ asset('img/favicon.png') }}"/>
        <meta itemprop="url" content="{{ request()->fullUrl() }}"/>
        
        <meta property="og:type" content="article" />
        <meta property="og:title" content="Pokédex - David Dreher Developer"/>
        <meta property="og:description" content="Explore meu portfólio e descubra como posso ajudá-lo a alcançar seus objetivos digitais, desde websites elegantes até soluções personalizadas. Vamos começar juntos!" />
        <meta property="og:image:width" content="300">
        <meta property="og:image" content="{{ asset('img/favicon.png') }}" />
        <meta property="og:url" content="{{ request()->fullUrl() }}" />
        <meta property="og:site_name" content="Pokédex - David Dreher Developer" />
        <meta property="og:locale" content="{{ app()->getLocale() }}" />    
        <meta property="article:author" content="https://www.facebook.com/daviddreher.dev" />
        <meta property="article:publisher" content="https://www.facebook.com/daviddreher.dev" />    
        
        <meta property="twitter:card" content="summary_large_image" />
        <meta property="twitter:domain" content="{{ request()->getHost() }}" />   
        <meta property="twitter:title" content="Pokédex - David Dreher Developer"/>
        <meta property="twitter:description" content="Explore meu portfólio e descubra como posso ajudá-lo a alcançar seus objetivos digitais, desde websites elegantes até soluções personalizadas. Vamos começar juntos!">
        <meta property="twitter:image" content="{{ asset('img/favicon.png') }}" />
        <meta property="twitter:url" content="{{ request()->fullUrl() }}" />    

        <title>@yield('tituloPagina')</title>
        @include('includes.head')
    </head>
    <body>
        <header>
            <a href="https://github.com/DavidDreher98/pokedex" target="_blank" class="flex-ac">
                <span class="mt-025 mr-05">DavidDreher98/pokedex</span>
                <svg width="20px" height="20px" viewBox="0 0 512.000000 512.000000">
                    <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="#d9d9d9">
                        <path d="M2384 5060 c-1012 -69 -1891 -738 -2235 -1703 -53 -146 -102 -349 -125 -512 -23 -157 -25 -496 -5 -655 102 -816 575 -1526 1287 -1932 164 -94 418 -200 483 -202 51 -1 94 20 116 57 18 30 19 50 16 267 -1 129 -3 236 -4 236 -1 1 -38 -4 -82 -12 -263 -43 -497 16 -646 165 -58 58 -76 86 -134 206 -94 196 -149 271 -255 348 -78 56 -120 98 -120 119 0 50 121 67 217 30 125 -47 208 -119 299 -258 126 -191 284 -276 485 -261 77 6 233 49 245 68 3 6 13 38 20 71 19 80 68 181 110 228 40 45 44 42 -86 60 -103 14 -282 60 -368 94 -362 143 -571 410 -649 829 -25 134 -25 463 0 567 36 149 103 285 195 398 l43 53 -15 47 c-52 161 -46 370 16 564 20 61 24 67 54 73 107 20 352 -68 576 -206 l98 -61 87 20 c204 47 298 57 553 57 256 0 349 -10 553 -57 l88 -20 77 48 c153 96 304 167 407 193 85 21 159 31 191 25 28 -5 33 -12 52 -72 57 -178 67 -404 23 -542 l-21 -65 20 -25 c98 -121 175 -269 212 -409 26 -98 36 -348 19 -488 -74 -608 -407 -935 -1041 -1023 -120 -16 -118 -15 -83 -53 46 -48 90 -134 115 -223 20 -74 22 -106 27 -529 7 -492 5 -482 66 -507 47 -20 102 -13 200 26 348 135 622 311 884 569 417 410 679 942 752 1527 20 159 18 498 -5 655 -173 1219 -1151 2131 -2373 2215 -161 11 -175 11 -339 0z"/>
                    </g>
                </svg>
            </a>
        </header>
        <main id="app">
            @include('includes.header')
            @yield('conteudo')
        </main>
        @include('includes.footer')
    </body>
    @stack('script')
</html>
