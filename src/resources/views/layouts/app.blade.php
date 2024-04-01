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
            <h1 class="header__heading">Rese</h1>
            <div class="header-search">
                @if (Auth::check())
                <form class="search-form" action="/search" method="get">
                    @csrf
                    <div class="search-form__inner">
                        <div class="search-form__group search-form__area">
                            <select class="search-form__group-select" name="area_name">
                                <option value="All area" selected>All area</option>
                                <option value="東京">東京</option>
                                <option value="大阪">大阪</option>
                                <option value="福岡">福岡</option>
                            </select>
                            <i class="fa-sharp fa-solid fa-sort-down"></i>
                        </div>
                        <div class="search-form__group search-form__genre">
                            <select class="search-form__group-select" name="genre_name">
                                <option value="All genre" selected>All genre</option>
                                <option value="寿司">寿司</option>
                                <option value="焼き肉">焼き肉</option>
                                <option value="居酒屋">居酒屋</option>
                                <option value="イタリアン">イタリアン</option>
                                <option value="ラーメン">ラーメン</option>
                            </select>
                            <i class="fa-sharp fa-solid fa-sort-down"></i>
                        </div>
                        <div class="search-form__actions">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </div>
                        <input class="search-form__group search-form__keyword-input" type="text" name="keyword" placeholder="Search..." value="">
                        <div class="search-form__actions">
                            <input class="search-form__search-btn btn" type="submit" value="検索">
                            <input class="search-form__reset-btn btn" type="submit" value="リセット" name="reset">
                        </div>
                    </div>
                </form>
                @endif
            </div>
            @yield('link')
        </header>
        <main class="main">
            @yield('content')
        </main>
    </div>

</body>

</html>