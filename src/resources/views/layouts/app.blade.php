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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <div class="app">
        <header class="header">
            <div class="header-left">
                <div class="header__heading">
                    <div class="header-left__logo1"></div>
                    <h1 class="header-left__logo2">Rese</h1>
                    <div class="hamburger-menu" onclick="toggleMenu()">
                        <i class="fa-solid fa-bars fa-lg" style="color: #0d09fb;"></i>
                    </div>
                    @if (Auth::check())
                    @include('modal1')
                    @else
                    @include('modal2')
                    @endif
                </div>
                <div class="header-right">
                    @if(Route::is('index'))
                    @if (Auth::check())
                    <p class="header-left__user-name">{{ Auth::user()->name }} さん</p>
                    @else
                    <p class="header-left__user-name">ゲストさん</p>
                    @endif
                    @endif
                </div>
            </div>

            @if(Route::is('index','search'))
            <div class="header-search">
                <form class="search-form" action="/search" method="get">
                    @csrf
                    <div class="search-form__inner">
                        <div class="search-form__group">
                            <div class="search-form__group__item search-form__area">
                                <select class="search-form__group__item-select" name="area_id" onChange="myFunction()">
                                    <option value="">All area</option>
                                    @foreach ($areas as $area)
                                    <option value="{{ $area->id }}">{{ $area->area_name }}</option>
                                    @endforeach
                                </select>
                                <i class="fa-sharp fa-solid fa-caret-down" style="color: #b0b0b0;"></i>
                            </div>
                            <div class="search-form__group__item search-form__genre">
                                <select class="search-form__group__item-select" name="genre_id">
                                    <option value="">All genre</option>
                                    @foreach ($genres as $genre)
                                    <option value="{{ $genre->id }}">{{ $genre->genre_name }}</option>
                                    @endforeach
                                </select>
                                <i class="fa-sharp fa-solid fa-caret-down" style="color: #b0b0b0;"></i>
                            </div>
                        </div>
                        <div class="search-form__group">
                            <div class="search-form__group-item-keyword">
                                <div class="search-form__group-actions">
                                    <button class="" type="submit">
                                        <i class="fa-solid fa-magnifying-glass fa-beat-fade"></i>
                                    </button>
                                    <input class="search-form__group-item-input search-form__keyword-input" type="text" name="keyword" placeholder="Search..." value="">
                                </div>
                                <div class="search-form__actions">
                                    <input class="search-form__reset-btn btn" type="reset" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            @endif
            @yield('link')
        </header>

        <main class="main">
            @yield('content')
        </main>
    </div>


    <script>
        $(document).ready(function() {
            $('.search-form__group-select').change(function() {
                // フォームデータを取得
                var formData = $('.search-form').serialize();

                // Ajaxリクエストを送信
                $.ajax({
                    type: 'GET',
                    url: '/search', // フォームの送信先URLを適切に変更してください
                    data: formData,
                    success: function(response) {
                        // Ajaxリクエストが成功した場合の処理
                        // ここに検索結果を表示するなどの処理を記述してください
                        console.log(response);
                    },
                    error: function(xhr, status, error) {
                        // Ajaxリクエストが失敗した場合の処理
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>
</body>

</html>