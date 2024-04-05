<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rese</title>
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css" />
    <link rel="stylesheet" href="{{ asset('css/common.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @yield('css')
</head>

<body>
    <div class="app">
        <header class="header">
            <div class="header__heading">
                <h1 class="header__inner">Rese</h1>
            </div>
            @if(Route::is('index','search'))

            <div class="header-search">
                <form class="search-form" action="/search" method="get">
                    @csrf
                    <div class="search-form__inner">
                        <div class="search-form__group search-form__area">
                            <select class="search-form__group-select" name="area_id">
                                <option value="">All area</option>
                                @foreach ($areas as $area)
                                <option value="{{ $area->id }}">{{ $area->area_name }}</option>
                                @endforeach
                            </select>
                            <i class="fa-sharp fa-solid fa-caret-down" style="color: #b0b0b0;"></i>
                        </div>
                        <div class="search-form__group search-form__genre">
                            <select class="search-form__group-select" name="genre_id">
                                <option value="">All genre</option>
                                @foreach ($genres as $genre)
                                <option value="{{ $genre->id }}">{{ $genre->genre_name }}</option>
                                @endforeach
                            </select>
                            <i class="fa-sharp fa-solid fa-caret-down" style="color: #b0b0b0;"></i>
                        </div>
                        <div class="search-form__actions">
                            <button class="" type="submit">
                                <i class="fa-solid fa-magnifying-glass fa-beat-fade"></i>
                            </button>
                        </div>
                        <input class="search-form__group search-form__keyword-input" type="text" name="keyword" placeholder="Search..." value="">
                        <div class="search-form__actions">
                            <input class="search-form__reset-btn btn" type="reset" value="">
                        </div>
                    </div>
                </form>
            </div>
            @if (Auth::check())
            <p class="user-name">{{ Auth::user()->name }} さん</p>
            @else
            <p class="user-name">ゲストさん</p>
            @endif
            @endif
            @yield('link')
        </header>
        <main class="main">
            @yield('content')
        </main>
    </div>

</body>

</html>