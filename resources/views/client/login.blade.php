<!DOCTYPE html>
<!-- saved from url=(0025)http://hackslot.win/login -->
<html lang="en" style="height: 100%;">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <meta name="api-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link type="text/css" rel="stylesheet" charset="UTF-8" href="https://www.gstatic.com/_/translate_http/_/ss/k=translate_http.tr.26tY-h6gH9w.L.W.O/am=BgM/d=0/rs=AN8SPfowrRiAotkQD9r4k3ANeQYGsCLZ7g/m=el_main_css">
    <script type="text/javascript" charset="UTF-8" src="https://translate.googleapis.com/_/translate_http/_/js/k=translate_http.tr.vi.sLjgQWtgXww.O/am=ABA/d=1/exm=el_conf/ed=1/rs=AN8SPfoFmdt6kQRZzMVuF1nZmGEydlZucw/m=el_main"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="api-token"]').attr('content')
            }
        });
    </script>
</head>
<body style="position: relative; min-height: 100%; top: 0px;">
<div id="app" data-v-app="">
    <!---->
    <div class="index-page bg-type1">
        <div class="bg-main">
            <img src="{{ asset('images/banner-desktop.jpeg') }}" alt="" class="bg-main-1">
            <img src="{{ asset('images/banner-mobile.png') }}" alt="" class="bg-main-1 mobile">
        </div>
        <div class="index-page_wrapper">
            <div class="group-img">
                <div class="welcome">
                    <img src="{{ asset('images/welcome-to.png') }}" alt="">
                </div>
                <div class="name-site">
                    <img src="{{ asset('images/logo-big.png') }}" alt="">
                    <img src="{{ asset('images/light-1.png') }}" alt="" class="light-1">
                    <img src="{{ asset('images/light-2.png') }}" alt="" class="light-2">
                </div>
            </div>
            <div class="gruop-btn">
                <div class="btn-item btn-login">
                    <p>Đăng nhập</p>
                </div>
                <div class="btn-item btn-register">
                    <p>Đăng ký</p>
                </div>
            </div>
            <div id="google_translate_element">
                <div class="skiptranslate goog-te-gadget" dir="ltr" style="">
                    <div id=":0.targetLanguage">
                        <select class="goog-te-combo" aria-label="Tiện ích dịch ngôn ngữ">
                            <option value="">Chọn Ngôn ngữ</option>
                            <option value="ar">Ả Rập</option>
                            <option value="sq">Albania</option>
                            <option value="am">Amharic</option>
                            <option value="en">Anh</option>
                            <option value="hy">Armenia</option>
                            <option value="as">Assam</option>
                            <option value="ay">Aymara</option>
                            <option value="az">Azerbaijan</option>
                            <option value="pl">Ba Lan</option>
                            <option value="fa">Ba Tư</option>
                            <option value="bm">Bambara</option>
                            <option value="xh">Bantu</option>
                            <option value="eu">Basque</option>
                            <option value="be">Belarus</option>
                            <option value="bn">Bengal</option>
                            <option value="bho">Bhojpuri</option>
                            <option value="bs">Bosnia</option>
                            <option value="pt">Bồ Đào Nha</option>
                            <option value="bg">Bulgaria</option>
                            <option value="ca">Catalan</option>
                            <option value="ceb">Cebuano</option>
                            <option value="ny">Chichewa</option>
                            <option value="co">Corsi</option>
                            <option value="ht">Creole (Haiti)</option>
                            <option value="hr">Croatia</option>
                            <option value="dv">Dhivehi</option>
                            <option value="iw">Do Thái</option>
                            <option value="doi">Dogri</option>
                            <option value="da">Đan Mạch</option>
                            <option value="de">Đức</option>
                            <option value="et">Estonia</option>
                            <option value="ee">Ewe</option>
                            <option value="tl">Filipino</option>
                            <option value="fy">Frisia</option>
                            <option value="gd">Gael Scotland</option>
                            <option value="gl">Galicia</option>
                            <option value="ka">George</option>
                            <option value="gn">Guarani</option>
                            <option value="gu">Gujarat</option>
                            <option value="nl">Hà Lan</option>
                            <option value="af">Hà Lan (Nam Phi)</option>
                            <option value="ko">Hàn</option>
                            <option value="ha">Hausa</option>
                            <option value="haw">Hawaii</option>
                            <option value="hi">Hindi</option>
                            <option value="hmn">Hmong</option>
                            <option value="hu">Hungary</option>
                            <option value="el">Hy Lạp</option>
                            <option value="is">Iceland</option>
                            <option value="ig">Igbo</option>
                            <option value="ilo">Ilocano</option>
                            <option value="id">Indonesia</option>
                            <option value="ga">Ireland</option>
                            <option value="jw">Java</option>
                            <option value="kn">Kannada</option>
                            <option value="kk">Kazakh</option>
                            <option value="km">Khmer</option>
                            <option value="rw">Kinyarwanda</option>
                            <option value="gom">Konkani</option>
                            <option value="kri">Krio</option>
                            <option value="ku">Kurd (Kurmanji)</option>
                            <option value="ckb">Kurd (Sorani)</option>
                            <option value="ky">Kyrgyz</option>
                            <option value="lo">Lào</option>
                            <option value="la">Latinh</option>
                            <option value="lv">Latvia</option><option value="ln">Lingala</option><option value="lt">Litva</option><option value="lg">Luganda</option><option value="lb">Luxembourg</option><option value="ms">Mã Lai</option><option value="mk">Macedonia</option><option value="mai">Maithili</option><option value="mg">Malagasy</option><option value="ml">Malayalam</option><option value="mt">Malta</option><option value="mi">Maori</option><option value="mr">Marathi</option><option value="mni-Mtei">Meiteilon (Manipuri)</option><option value="lus">Mizo</option><option value="mn">Mông Cổ</option><option value="my">Myanmar</option><option value="no">Na Uy</option><option value="ne">Nepal</option><option value="ru">Nga</option><option value="ja">Nhật</option><option value="or">Odia (Oriya)</option><option value="om">Oromo</option><option value="ps">Pashto</option><option value="sa">Phạn</option><option value="fr">Pháp</option><option value="fi">Phần Lan</option><option value="pa">Punjab</option><option value="qu">Quechua</option><option value="eo">Quốc tế ngữ</option><option value="ro">Rumani</option><option value="sm">Samoa</option><option value="cs">Séc</option><option value="nso">Sepedi</option><option value="sr">Serbia</option><option value="st">Sesotho</option><option value="sn">Shona</option><option value="sd">Sindhi</option><option value="si">Sinhala</option><option value="sk">Slovak</option><option value="sl">Slovenia</option><option value="so">Somali</option><option value="su">Sunda</option><option value="sw">Swahili</option><option value="tg">Tajik</option><option value="ta">Tamil</option><option value="tt">Tatar</option><option value="es">Tây Ban Nha</option><option value="te">Telugu</option><option value="th">Thái</option><option value="tr">Thổ Nhĩ Kỳ</option><option value="sv">Thụy Điển</option><option value="ti">Tigrinya</option><option value="zh-CN">Trung (Giản thể)</option><option value="zh-TW">Trung (Phồn thể)</option><option value="ts">Tsonga</option><option value="tk">Turkmen</option><option value="ak">Twi</option><option value="uk">Ukraina</option><option value="ur">Urdu</option><option value="ug">Uyghur</option><option value="uz">Uzbek</option><option value="cy">Xứ Wales</option><option value="it">Ý</option><option value="yi">Yiddish</option><option value="yo">Yoruba</option><option value="zu">Zulu</option>
                        </select>
                    </div>
                    Được hỗ trợ bởi <span style="white-space:nowrap">
                        <a class="VIpgJd-ZVi9od-l4eHX-hSRGPd" href="https://translate.google.com/" target="_blank">
                            <img src="{{ asset('images/googlelogo_color_42x16dp.png') }}" width="37px" height="14px" style="padding-right: 3px" alt="Google Dịch">Dịch
                        </a>
                    </span>
                </div>
            </div>
        </div>
        <!----><!---->
    </div>
</div>
<script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

<script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({pageLanguage: 'vi'}, 'google_translate_element');
    }
</script>
<script src="{{ asset('js/login.js') }}"></script>
<div id="goog-gt-tt" class="VIpgJd-yAWNEb-L7lbkb skiptranslate" style="border-radius: 12px; margin: 0 0 0 -23px; padding: 0; font-family: &#39;Google Sans&#39;, Arial, sans-serif;" data-id="">
    <div id="goog-gt-vt" class="VIpgJd-yAWNEb-hvhgNd">
        <div class=" VIpgJd-yAWNEb-hvhgNd-l4eHX-i3jM8c">
            <img src="{{ asset('images/24px.svg') }}" width="24" height="24" alt="">
        </div>
        <div class=" VIpgJd-yAWNEb-hvhgNd-k77Iif-i3jM8c">
            <div class="VIpgJd-yAWNEb-hvhgNd-IuizWc" dir="ltr">Văn bản gốc</div>
            <div id="goog-gt-original-text" class="VIpgJd-yAWNEb-nVMfcd-fmcmS VIpgJd-yAWNEb-hvhgNd-axAV1"></div>
        </div>
        <div class="VIpgJd-yAWNEb-hvhgNd-N7Eqid ltr">
            <div class="VIpgJd-yAWNEb-hvhgNd-N7Eqid-B7I4Od ltr" dir="ltr">
                <div class="VIpgJd-yAWNEb-hvhgNd-UTujCb">Đánh giá bản dịch này</div>
                <div class="VIpgJd-yAWNEb-hvhgNd-eO9mKe">Ý kiến phản hồi của bạn sẽ được dùng để góp phần cải thiện Google Dịch</div>
            </div><div class="VIpgJd-yAWNEb-hvhgNd-xgov5 ltr">
                <button id="goog-gt-thumbUpButton" type="button" class="VIpgJd-yAWNEb-hvhgNd-bgm6sf" title="Bản dịch tốt" aria-label="Bản dịch tốt" aria-pressed="false">
                    <span id="goog-gt-thumbUpIcon">
                        <svg width="24" height="24" viewBox="0 0 24 24" focusable="false" class="VIpgJd-yAWNEb-hvhgNd-THI6Vb NMm5M">
                            <path d="M21 7h-6.31l.95-4.57.03-.32c0-.41-.17-.79-.44-1.06L14.17 0S7.08 6.85 7 7H2v13h16c.83 0 1.54-.5 1.84-1.22l3.02-7.05c.09-.23.14-.47.14-.73V9c0-1.1-.9-2-2-2zM7 18H4V9h3v9zm14-7l-3 7H9V8l4.34-4.34L12 9h9v2z"></path>
                        </svg>
                    </span>
                    <span id="goog-gt-thumbUpIconFilled">
                        <svg width="24" height="24" viewBox="0 0 24 24" focusable="false" class="VIpgJd-yAWNEb-hvhgNd-THI6Vb NMm5M">
                            <path d="M21 7h-6.31l.95-4.57.03-.32c0-.41-.17-.79-.44-1.06L14.17 0S7.08 6.85 7 7v13h11c.83 0 1.54-.5 1.84-1.22l3.02-7.05c.09-.23.14-.47.14-.73V9c0-1.1-.9-2-2-2zM5 7H1v13h4V7z"></path>
                        </svg>
                    </span>
                </button>
                <button id="goog-gt-thumbDownButton" type="button" class="VIpgJd-yAWNEb-hvhgNd-bgm6sf" title="Bản dịch kém" aria-label="Bản dịch kém" aria-pressed="false">
                    <span id="goog-gt-thumbDownIcon">
                        <svg width="24" height="24" viewBox="0 0 24 24" focusable="false" class="VIpgJd-yAWNEb-hvhgNd-THI6Vb NMm5M">
                            <path d="M3 17h6.31l-.95 4.57-.03.32c0 .41.17.79.44 1.06L9.83 24s7.09-6.85 7.17-7h5V4H6c-.83 0-1.54.5-1.84 1.22l-3.02 7.05c-.09.23-.14.47-.14.73v2c0 1.1.9 2 2 2zM17 6h3v9h-3V6zM3 13l3-7h9v10l-4.34 4.34L12 15H3v-2z"></path>
                        </svg>
                    </span>
                    <span id="goog-gt-thumbDownIconFilled">
                        <svg width="24" height="24" viewBox="0 0 24 24" focusable="false" class="VIpgJd-yAWNEb-hvhgNd-THI6Vb NMm5M">
                            <path d="M3 17h6.31l-.95 4.57-.03.32c0 .41.17.79.44 1.06L9.83 24s7.09-6.85 7.17-7V4H6c-.83 0-1.54.5-1.84 1.22l-3.02 7.05c-.09.23-.14.47-.14.73v2c0 1.1.9 2 2 2zm16 0h4V4h-4v13z"></path>
                        </svg>
                    </span>
                </button>
            </div>
        </div>
        <div id="goog-gt-votingHiddenPane" class="VIpgJd-yAWNEb-hvhgNd-aXYTce">
            <form id="goog-gt-votingForm" action="http://translate.googleapis.com/translate_voting?client=te" method="post" target="votingFrame" class="VIpgJd-yAWNEb-hvhgNd-aXYTce">
                <input type="text" name="sl" id="goog-gt-votingInputSrcLang">
                <input type="text" name="tl" id="goog-gt-votingInputTrgLang">
                <input type="text" name="query" id="goog-gt-votingInputSrcText">
                <input type="text" name="gtrans" id="goog-gt-votingInputTrgText">
                <input type="text" name="vote" id="goog-gt-votingInputVote">
            </form>
{{--            <iframe name="votingFrame" frameborder="0" src="./login_files/saved_resource.html"></iframe>--}}
        </div>
    </div>
</div>

<div class="VIpgJd-ZVi9od-aZ2wEe-wOHMyf"><div class="VIpgJd-ZVi9od-aZ2wEe-OiiCO"><svg xmlns="http://www.w3.org/2000/svg" class="VIpgJd-ZVi9od-aZ2wEe" width="96px" height="96px" viewBox="0 0 66 66"><circle class="VIpgJd-ZVi9od-aZ2wEe-Jt5cK" fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="30"></circle></svg></div></div></body></html>
