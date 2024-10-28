<header>
    <div class="header_wrapper">
        <div class="header-col-L">
            <a href="/" class="header-logo">
                <img src="{{ asset('images/logo.png') }}" alt="">
            </a>

        </div>
        <div class="header-col-R">
            <!-- <div class="header-mobile"> -->
                <div class="header-group-btn">
                    <div class="logo-mobile"><img src="{{ asset('images/logo.png') }}" alt=""></div>
                    <div class="heeader-btn_item" id="user-name"></div>
                    <div class="heeader-btn_item">
                        Xu <span class="ml-1" id="coin"></span>
                    </div>
                    <div class="heeader-btn_item btn-coin">
                        Nạp xu
                    </div>
                    <div class="heeader-btn_item btn-help">
                        Hỗ trợ
                    </div>
                    <script>
                        window.telegramLink = "https://t.me/{{ env('SUPPORT') }}";
                    </script>
                    <div class="heeader-btn_item btn-logout1">
                        Đăng xuất
                    </div>
                </div>
            <!-- </div> -->

            <div class="hamburger">
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
                <div class="bar4"></div>
            </div>
        </div>
    </div>
</header>
