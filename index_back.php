<!DOCTYPE HTML>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title></title>

    <!-- CSS -->
    <link rel="stylesheet" href="/html/css/normalize.css"/>
    <link rel="stylesheet" href="/html/css/main.css"/>
    <link rel="stylesheet" href="/html/css/scroll.css"/>

    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>

    <script type="text/javascript" src="/html/js/translate.js"></script>

    <!-- JQuery -->
    <script src="/html/js/jquery.min.js"></script>
    <script src="/html/js/gmaps.js"></script>
    <script src="/html/js/lib.jquery.js"></script>

    <!--[if (gte IE 6)&(lte IE 8)]><script type="text/javascript" src="/html/js/selectivizr-min.js"></script><![endif]-->

    <!-- JS -->
    <script type="text/javascript" src="/html/js/main.js"></script>
    <script type="text/javascript" src="/html/js/functions.js"></script>
    <script type="text/javascript" src="/html/js/map.js"></script>

</head>
<body>

<div id="preloadPage">
    <div class="logo_transparent"><img src="/html/images/logo_transparent.png" alt="Loading..."/><div class="pulse"></div></div>
</div>

<div id="preloadImages"></div>



<div id="mainWrapper">

<div class="header">

    <a href="http://tin.brandivision.ru/" class="header_logo"><img src="/html/images/logo.png" alt="TourInfoNet.eu"/></a>

    <div class="header_search_wrap">
        <div class="header_search">
            <input type="submit" class="header_search_submit" />
            <input type="text" placeholder="Search hotels, restaurants and destinations" class="header_search_input" id="headerSearchInput" />
        </div><!-- header_search -->
    </div><!-- header_search_wrap -->

    <div class="header_lang_wrap">
        <div class="header_lang">
            <div class="header_lang_item ru">
                <span class="label">RU</span><i></i>
            </div>
        </div>
        <div class="lang_controls_ico"></div>

        <div class="header_lang_options">
            <div class="header_lang_options_arrow"></div>

            <div class="header_lang_item en">
                <span class="label">EN</span><i></i>
            </div>
            <div class="header_lang_item lt">
                <span class="label">LT</span><i></i>
            </div>
            <div class="header_lang_item pl">
                <span class="label">PL</span><i></i>
            </div>
        </div><!-- header_lang_options -->

    </div><!-- header_lang_wrap -->

</div><!-- header -->

<div id="mainInner">


<div class="mainnav">

    <div class="mainnav_border"></div>

    <ul class="mainnav_ul" id="mainnavUl">
        <li class="mainnav_map_li mainnav_main_li" data-link="/">главная</li>
        <li class="mainnav_text_li" data-link="/useful_info/">текстовая</li>
        <li class="mainnav_map_li" data-link="/where-to-stay/">где остановиться</li>
        <li class="mainnav_map_li" data-link="/what-to-see/">что посмотреть</li>
        <li class="mainnav_map_li" data-link="/where-to-eat/">где поесть</li>
        <li class="" data-link=""></li>
    </ul>

    <a href="" class="bdv">Website by<br/>Brandivision</a>

</div><!-- mainnav -->


<div class="first_fltr_pane_wrap">
    <div class="first_fltr_pane_shadow"></div>

    <div class="first_fltr_pane_cont">

        <div class="first_fltr_pane">

            <div class="mp_hello">

                <div class="mp_hello_logo"></div>

                <h1>Welcome on<br/>TourInfoNet!</h1>

                <p>Set up an online directory portal of any type – companies, shops, restaurants, real estate, websites and so on in no time with
                    TourInfoNet.</p>
            </div>
        </div><!-- first_fltr_pane -->

        <div class="first_fltr_pane">

            <div class="ip_ff_header">
                <div class="ip_ff_header_ico"></div>
                <h1>Important Info</h1>
                <p>This is our list of premier destinations, lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>
            </div>

            <div class="ip_ff_subcat_wrap">
                <a href="/html/textpage.html" class="ip_ff_subcat btn tp_ajax">Visas</a>
                <a href="/html/textpage.html" class="ip_ff_subcat btn tp_ajax">Entry regulations</a>
                <a href="/html/textpage.html" class="ip_ff_subcat btn tp_ajax">Need to know</a>
            </div>

        </div><!-- first_fltr_pane -->

        <div class="first_fltr_pane">

            <div class="ip_ff_header">
                <div class="ip_ff_header_ico"></div>
                <h1>Where to stay</h1>
                <p>This is our list of premier destinations, lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>
            </div>

            <div class="ip_ff_subcat_wrap">

                <h3>Country</h3>
                <div class="niceselect_wrap">
                    <select name="countrySelect" class="niceselect countrySelect">
                        <option value="">Chose country</option>
                        <option value="lithuania">Lithuania</option>
                        <option value="poland">Poland</option>
                        <option value="russia">Russia</option>
                    </select>
                </div>

                <h3>City</h3>
                <div class="niceselect_wrap citySelectWrap">
                    <select name="choseCitySelect" class="niceselect active" disabled>
                        <option value="">Chose city</option>
                    </select>
                    <select name="choseCityLithuania" class="niceselect citySelect">
                        <option value="">Chose city</option>
                        <option value="vilnus">Vilnus</option>
                        <option value="kaunas">Kaunas</option>
                    </select>
                    <select name="choseCityPoland" class="niceselect citySelect">
                        <option value="">Chose city</option>
                        <option value="gdansk">Gdansk</option>
                        <option value="warsaw">Warsaw</option>
                    </select>
                    <select name="choseCityRussia" class="niceselect citySelect">
                        <option value="">Chose city</option>
                        <option value="svetlogorsk">Svetlogorsk</option>
                        <option value="kaliningrad">Kaliningrad</option>
                    </select>
                </div>

                <h3>Price</h3>
                <div class="ip_ff_subcat checkbox map_f1" data-price="cheap">500-1500 RUB (10-35€) / day</div>
                <div class="ip_ff_subcat checkbox map_f1" data-price="middle">1500-3000 RUB (35-70€) / day</div>
                <div class="ip_ff_subcat checkbox map_f1" data-price="expensive">More than 3000 RUB (>70€) / day</div>


                <h3>Category</h3>
                <div class="ip_ff_subcat checkbox map_f1" data-type="hotels">Hotels</div>
                <div class="ip_ff_subcat checkbox map_f1" data-type="guest_houses">Guest houses</div>
                <div class="ip_ff_subcat checkbox map_f1" data-type="hostels">Hostels</div>

            </div><!-- ip_ff_subcat_wrap -->

        </div><!-- first_fltr_pane -->

        <div class="first_fltr_pane">

            <div class="ip_ff_header">
                <div class="ip_ff_header_ico"></div>
                <h1>Attractions</h1>
                <p>This is our list of premier destinations, lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>
            </div>

            <div class="ip_ff_subcat_wrap">
                <h3>Country</h3>
                <div class="niceselect_wrap">
                    <select name="countrySelect" class="niceselect countrySelect">
                        <option value="">Chose country</option>
                        <option value="lithuania">Lithuania</option>
                        <option value="poland">Poland</option>
                        <option value="russia">Russia</option>
                    </select>
                </div>

                <h3>City</h3>
                <div class="niceselect_wrap citySelectWrap" >
                    <select name="choseCitySelect" class="niceselect active" disabled>
                        <option value="">Chose city</option>
                    </select>
                    <select name="choseCityLithuania" class="niceselect citySelect">
                        <option value="">Chose city</option>
                        <option value="vilnus">Vilnus</option>
                        <option value="kaunas">Kaunas</option>
                    </select>
                    <select name="choseCityPoland" class="niceselect citySelect">
                        <option value="">Chose city</option>
                        <option value="gdansk">Gdansk</option>
                        <option value="warsaw">Warsaw</option>
                    </select>
                    <select name="choseCityRussia" class="niceselect citySelect">
                        <option value="">Chose city</option>
                        <option value="svetlogorsk">Svetlogorsk</option>
                        <option value="kaliningrad">Kaliningrad</option>
                    </select>
                </div>

                <h3>Category</h3>

                <div class="ip_ff_subcat checkbox map_f1" data-type="museums">Museums</div>
                <div class="ip_ff_subcat checkbox map_f1" data-type="castles">Castles</div>
                <div class="ip_ff_subcat checkbox map_f1" data-type="old_churches">Old churches</div>
                <div class="ip_ff_subcat checkbox map_f1" data-type="places_of_interest">Places of interest</div>
            </div><!-- ip_ff_subcat_wrap -->

        </div><!-- first_fltr_pane -->

        <div class="first_fltr_pane">

            <div class="ip_ff_header">
                <div class="ip_ff_header_ico"></div>
                <h1>Food and drink</h1>
                <p>This is our list of premier destinations, lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>
            </div>

            <div class="ip_ff_subcat_wrap">
                <h3>Country</h3>
                <div class="niceselect_wrap">
                    <select name="countrySelect" class="niceselect countrySelect">
                        <option value="">Chose country</option>
                        <option value="lithuania">Lithuania</option>
                        <option value="poland">Poland</option>
                        <option value="russia">Russia</option>
                    </select>
                </div>

                <h3>City</h3>
                <div class="niceselect_wrap citySelectWrap" >
                    <select name="choseCitySelect" class="niceselect active" disabled>
                        <option value="">Chose city</option>
                    </select>
                    <select name="choseCityLithuania" class="niceselect citySelect">
                        <option value="">Chose city</option>
                        <option value="vilnus">Vilnus</option>
                        <option value="kaunas">Kaunas</option>
                    </select>
                    <select name="choseCityPoland" class="niceselect citySelect">
                        <option value="">Chose city</option>
                        <option value="gdansk">Gdansk</option>
                        <option value="warsaw">Warsaw</option>
                    </select>
                    <select name="choseCityRussia" class="niceselect citySelect">
                        <option value="">Chose city</option>
                        <option value="svetlogorsk">Svetlogorsk</option>
                        <option value="kaliningrad">Kaliningrad</option>
                    </select>
                </div>

                <h3>Category</h3>

                <div class="ip_ff_subcat checkbox map_f1" data-type="bar">Bar</div>
                <div class="ip_ff_subcat checkbox map_f1" data-type="restaurant">Restaurant</div>
                <div class="ip_ff_subcat checkbox map_f1" data-type="cafe">Cafe</div>
            </div><!-- ip_ff_subcat_wrap -->

        </div><!-- first_fltr_pane -->

    </div><!-- first_fltr_pane_cont-->

</div><!-- first_fltr_pane_wrap -->



<div class="second_fltr_pane">
    <div class="first_fltr_pane_shadow"></div>
    <!--<h2 id="secondFltrPaneHeader"></h2>
    <div id="secondFltrPaneDescr"></div>-->
    <div class="second_fltr_pane_cont">
        <div id="secondFltrPaneCont"></div>
    </div>

</div><!-- second_fltr_pane -->



<div class="mainInnerMap" id="mainMapContainer">

    <div class="mp_selCat">

        <div class="close_btn js-mpSelCatClose"></div>

        <h2>Please, choose your category</h2>

        <div class="mp_selCat_in">

            <div class="mp_selCat_item" ><h3>Text</h3><div class="mp_selCat_item_lnk" data-link="/info/"></div></div>
            <div class="mp_selCat_item" ><h3>Where to stay</h3><div class="mp_selCat_item_lnk" data-link="/wheretostay/"></div></div>
            <div class="mp_selCat_item"><h3></h3></div>
            <div class="mp_selCat_item"><h3></h3></div>
            <div class="mp_selCat_item"><h3></h3></div>
            <div class="mp_selCat_item"><h3></h3></div>

            <div class="clr"></div>
        </div><!-- mp_selCat_in -->

        <div class="bluebtn mp_big_close js-mpSelCatClose"><span>Close</span></div>


    </div><!-- mp_selCat -->

    <div class="clr"></div>
</div><!-- mainInnerMap -->


</div><!-- mainInner -->



</div><!-- mainwrapper -->

<div id="mpContent">
    <div class="mp_selCat">

        <div class="close_btn js-mpSelCatClose"></div>

        <h2>Please, choose your category</h2>

        <div class="mp_selCat_in">

            <div class="mp_selCat_item"><h3>Text</h3><div class="mp_selCat_item_lnk" data-link="/info/"></div></div>
            <div class="mp_selCat_item"><h3>Where to stay</h3><div class="mp_selCat_item_lnk" data-link="/wheretostay/"></div></div>
            <div class="mp_selCat_item"><h3></h3></div>
            <div class="mp_selCat_item"><h3></h3></div>
            <div class="mp_selCat_item"><h3></h3></div>
            <div class="mp_selCat_item"><h3></h3></div>

            <div class="clr"></div>
        </div><!-- mp_selCat_in -->

        <div class="bluebtn mp_big_close js-mpSelCatClose"><span>Close</span></div>


    </div><!-- mp_selCat -->
</div>

</body>
</html>