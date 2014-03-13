var $db,
    $dbloaded = false,
    $infoBoxRmState = false,
    $fullInfoBoxH,
    $maincat,
//    здесь глобально хранятся значения фильтров
    $country, $city, $pricecat = [],
    $type = {},
    $markers = [],
    markerCluster,
    $map,
    infobox,
    $paramsObj = {};


$(function(){

    var mainnavItem = $('#mainnavUl').children('li');
    for(var i = 0; i <  mainnavItem.length; i++){
        var s = mainnavItem.eq(i).attr('data-link').replace(/\//g,'');
        if(s != '' && s) $type[s] = [];
    }

    var preloader = $('#preloadPage');


    // first load json database
    if($dbloaded == false){
        $.ajax({
            url: '/html/hotels.json',
            type: "GET",
            dataType: "json",
            timeout: 15000,
            cache: true,
            success: function(data){
                $db = data;
                $dbloaded = true;
                $(document).trigger('databaseload');
                //addMarkers(data);
            },
            error: function(){
                alert('error');
            }
        });
    }



    /**********************************
     *              MAP
     **********************************/



    function addMarkers(data){

        var objects = data,
            LatLngList = [];

        $.each(objects, function(key, val){
            var LatLng = new google.maps.LatLng(val.LatLng[0], val.LatLng[1]);
            LatLngList.push(LatLng);
            var marker = new google.maps.Marker({
                position: LatLng,
                title: val.name
            });


            // info boxes
            var data = '<div class="infoWinWrap_arrow"></div><div class="infoWinWrap">' +
                '<div class="infoWinWrap_head">' +
                '<h3>'+ val.name + '</h3>' + '<img src="" class="infoWinWrap_img" /> <div class="bluebtn infoWin_rm" id="infoWin_rm" onclick="infoBoxRm()"><span>'+ $trnsl.readmore +'</span></div> ' +
                ''+ val.contacts +
                '</div>' +
                '<div class="infoWinWrap_text">'+ val.text +'</div>' +
                '</div><div class="infoWinWrap_botFade"></div>';

            google.maps.event.addListener(marker, 'click', (function(marker, data) {

                return function() {
                    infobox.setContent(data);
                    infobox.open($map, marker);
                    setTimeout(function(){
                        $infoBoxRmState = false;
                        $fullInfoBoxH = $('.infoBox').height();
                        if($fullInfoBoxH > 245){
                            $('.infoBox').addClass('min');
                        }
                        $('.infoBox').animate({opacity: 1}, 50);

                    }, 10);

                }

            })(marker, data));

            $markers.push(marker);
        });

        markerCluster = new MarkerClusterer($map, $markers);


        //  Create a new viewpoint bound
        var bounds = new google.maps.LatLngBounds ();
        //  Go through each...
        for (var i = 0, LtLgLen = LatLngList.length; i < LtLgLen; i++) {
            //  And increase the bounds to take this point
            bounds.extend (LatLngList[i]);
        }
        //  Fit these bounds to the map
        $map.fitBounds (bounds);



    }

    function initMap(){
        var center = new google.maps.LatLng(54.939456, -20.188471);

        var options = {
            'zoom': 4,
            'center': center,
            'mapTypeId': google.maps.MapTypeId.ROADMAP
        };
        $map = new google.maps.Map(document.getElementById("mainMapContainer"), options);

        infobox = new InfoBox({
            map: $map,
            disableAutoPan: false,
            pixelOffset: new google.maps.Size(-217, -50),
            zIndex: null,
            alignBottom: true,
            boxStyle: {
                width: "380px",
                background: "#fff"
            },
            closeBoxMargin: "0",
            closeBoxURL: "/html/images/map_close.png",
            infoBoxClearance: new google.maps.Size(60, 60)

        });
    }
    //initMap();





    /**********************************
     *           END MAP
     **********************************/



    $('body').on('click', '.secondFltr_item', function(e){
        $(this).closest('#secondFltrPaneCont').children('.active').removeClass('active');
        $(this).addClass('active');
        var LatLng = $(this).attr('data-latlng').split(",");
        LatLng = new google.maps.LatLng(LatLng[0], LatLng[1]);
        google.maps.event.trigger($markers[$(e.target).attr('markerid')], 'click');
        $map.panTo(LatLng);
    });


    // обрабатываем клик в панели F1
    $('.map_f1').on('click', function(e){
        e.preventDefault();
        e.stopPropagation();
        actionsF1(e);
    });
    $('.countrySelect').on('change', function(e){
        $('.citySelectWrap').each(function(){
            $(this).find('.active').removeClass('active');
            $(this).find('select').eq(e.target.selectedIndex).addClass('active');
        });
        getCountryCity();
        updateCountryCity();
        actionsF1(e);
    });


    $('.citySelectWrap select').on('change', function(e){
        getCountryCity();
        updateCountryCity();
        actionsF1(e);
    });




    function actionsF1(e){

        preloader.show();

        // получаем значения фильтров и опеределяем с какой глобальной переменной работать
        var valToArr, arrId;

        if($(e.target).is('[data-price]')){
            valToArr = $(e.target).attr('data-price');
            arrId = '$pricecat';
        }
        if($(e.target).is('[data-type]')){
            valToArr = $(e.target).attr('data-type');
            arrId = '$type[$maincat]';
        }

        //формируем массив со всеми текущими значениями фильтров
        if(e.target.tagName !== 'SELECT'){
            if($(e.target).hasClass('active')){
                removeParamsFromObj(arrId, valToArr);
                $(e.target).removeClass('active');
            } else {
                pushParamsObj(arrId, valToArr);
                $(e.target).addClass('active');
            }
        }

        updateParamsObj();



        //запрос новой БД с отфильтрованными объектами
        $.ajax({
            url: '/html/hotels.json',
            type: "GET",
            dataType: "json",
            timeout: 15000,
            cache: true,
            data: {
                maincat:   $maincat,
//                objtype:   $objtype,
                pricecat:  $pricecat,
                country:   $country,
                city:      $city
            },
            success: newItemsToF2,
            error: function(){
                alert('error');
            }
        });


        var url = window.location.href.split("?")[0],
            val = $(e.target).val().toLowerCase();

        if(e.target.tagName == 'SELECT'){
//            var curUrl = location.pathname.split("/").filter(function(e){return e});

            if($(e.target).hasClass('countrySelect')){
//                если переключена страна
                if(val == ''){
                    url = '/'+ $maincat +'/';
                } else {
                    url = '/'+ $maincat +'/'+ $country +'/';
                    if($city && $city != '') url += $city +'/';
                }

            } else if ($(e.target).hasClass('citySelect')){
//                если переключен город
                if(val == ''){
                    url = '/'+ $maincat +'/'+ $country +'/';
                } else {
                    url = '/'+ $maincat +'/'+ $country +'/'+ $city +'/';
                }
            }
        }

        url = decodeURIComponent($.param.querystring( url, $paramsObj ));

        addHistoryItem('', url);


    }

    function newItemsToF2(data){

        $db = data;

        var items = [],
            count = 0;

        // вносим все объекты с их координатами в массив
        $.each($db, function(key, val){
            var current = $('<div class="secondFltr_item">'+ val.name +'</div>');
            current.attr('data-latlng', val.LatLng);
            current.attr('markerid', count);
            count++;
            items.push(current);
        });

        // пишем массив в панель F2
        var mylist = $('#secondFltrPaneCont');
        mylist.html(items);

        /*
         делаем сортировку
         var listitems = mylist.children('.secondFltr_item').get();
         listitems.sort(function(a, b) {
         return $(a).text().toUpperCase().localeCompare($(b).text().toUpperCase());
         });
         $.each(listitems, function(idx, itm) { mylist.append(itm); });
         */

        // показываем панель
        $('.second_fltr_pane').addClass('active');
        $(window).resize();

        removeAllMarkers();
        addMarkers(data);

        preloader.fadeOut(50);

    }








    // связываем пункты основной навигации с панелями
    $('.mainnav_ul').find('li').each(function(){
        $(this).attr('data-index', $(this).index());
    });
    $('.first_fltr_pane').each(function(){
        $(this).attr('data-index', $(this).index());
    });


//    выбор категории на главной странице
    $('body').on('click', '.mp_selCat_item_lnk', function(e){
        var urlToFind = $(e.target).attr('data-link');
        var currentLiForOpen = $('#mainnavUl').find('li[data-link="'+ urlToFind +'"]');
//        делаем клик
        currentLiForOpen.trigger('click');
    });
    $('body').on('click', '.js-mpSelCatClose', function(){
        $(this).closest('.mp_selCat').fadeOut(60);
    });

//    обработка клика в главном меню
//    $('.mainnav_ul').children('li').on('click', mainnavLiClick);
    $('.mainnav_ul').children('li').on('click', function(event){
        mainnavLiClick(event.target, true);
    });

    function mainnavLiClick(item, pushState){

//        item = $(event.target);
        item = $(item);


//        если категория уже открыта
        if(item.hasClass('active')) return;
//        если категория с картой
        if(item.hasClass('mainnav_map_li')) {
//            не запускать, если карта открыта
            //if(!($('.gm-style').length)){
            initMap();
            removeAllMarkers();
            addMarkers($db);
            newItemsToF2($db);
            // }
        }

//        если главная страница
        if(item.hasClass('mainnav_main_li')) {
            $('#mainMapContainer').append( $('#mpContent').html());
            $(window).resize();
        }


        $('.mainnav_ul').children('li.active').removeClass('active');
        $('.first_fltr_pane').filter('.active').removeClass('active');
        item.addClass('active');

        $maincat = item.attr('data-link').replace(/\//g,'');

        //показать панель
        var activeF1Pane = $('.first_fltr_pane[data-index='+item.attr('data-index')+']');
        activeF1Pane.addClass('active');


//        если текстовая, открываем первый пункт
        if(item.hasClass('mainnav_text_li')) {

            if(activeF1Pane.find('.tp_ajax.active').length){
//                действия, если есть включенная активная кнопка
                activeF1Pane.find('.tp_ajax.active').trigger('click');
            } else {
//                если активной кнопки нет, открыть первую
                $('.first_fltr_pane').find('.tp_ajax').first().trigger('click');
            }

        }


        //если включены фильтры показать панель F2
        if(activeF1Pane.find('.ip_ff_subcat_wrap').find('.checkbox.active').length){
            $('.second_fltr_pane').addClass('active');
        } else {
            $('.second_fltr_pane').removeClass('active');
        }
        $(window).resize();
        addScrolls();

        if(pushState){

            var url = item.attr('data-link').replace(/\//g,''),
                title = $('.first_fltr_pane').filter('active').find('h1').text();
//            var curUrl = location.pathname.split("/").filter(function(e){return e});

            if (activeF1Pane.find('.countrySelect').length) {
                if ($country && $country != '' && $city && $city !=''){
                    url = '/'+ url +'/'+ $country +'/'+ $city +'/';
                } else if ($country && $country != '') {
                    url = '/'+ url +'/'+ $country +'/';
                } else {
                    url = '/'+ url +'/';
                }
            } else {
                url = item.attr('data-link');
            }

            updateParamsObj();
            url = decodeURIComponent($.param.querystring( url, $paramsObj ));

            addHistoryItem(title, url);
        }




    }

    // фильтры-кнопки UX
    $('.ip_ff_subcat.btn').on('click', function(){
        $(this).closest('.ip_ff_subcat_wrap').find('.ip_ff_subcat.active').removeClass('active');
        $(this).addClass('active');
    });


    // стилизация селектов
    $('.niceselect').customSelect();




    function getParamsFromURL(){
        var pathArray = [];
        var array = location.pathname.split("/");

//        разбиваем адрес на массив
        for(var i = 0; i < array.length; i++){
            var c = array[i];
            if(c != '') pathArray.push(c);
        }

        if(pathArray[0]) { $maincat = pathArray[0]; $type[$maincat] = []; }
        if(pathArray[1]) { $country = pathArray[1]; }
        if(pathArray[2]) $city = pathArray[2];

        var paramsArrFromURL = $.deparam.querystring();


        if(paramsArrFromURL.price) $pricecat = paramsArrFromURL.price;
        if(paramsArrFromURL.type) $type[$maincat] = paramsArrFromURL.type;

        console.log($type[$maincat]);

    }

    getParamsFromURL();
    updateFiltersInterface();


    function activatePanesFromURL(){

//        формируем атрибут с адресом для поиска пункта
        var urlToFind = '/';
        if($maincat && $maincat !== '') urlToFind = urlToFind + $maincat + '/';


//        делаем поиск нужного пункта
        var currentLiForOpen = $('#mainnavUl').find('li[data-link="'+ urlToFind +'"]');
//        делаем клик
//        currentLiForOpen.trigger('click');
        mainnavLiClick(currentLiForOpen, false);

//        если в адресе указана страна или город, включаем их фильтры
        updateCountryCity();

    }

    $(document).on('databaseload', function(){
        activatePanesFromURL();
        $(window).resize();
        setTimeout(function(){
            preloader.hide().addClass('transparent');
        }, 600);

    });


    /* TEXT PAGE AJAX*/
    $('body').on('click', '.tp_ajax', function(e){
        event.preventDefault();
        event.stopPropagation();
        ajaxLoadPage_Textpage(e);
    });

    var loadLink;

    function ajaxLoadPage_Textpage(e) {

        loadLink =  e.target.href;
        if(!(loadLink)) loadLink = $(e.target).closest('a').attr('href');

        preloader.show();

        $.ajax({
            url: loadLink,
            type: "GET",
            dataType: "html",
            timeout: 10000,
            cache: true,
            success: onAjaxSuccess
        });

        function onAjaxSuccess(data){
            $('#mainMapContainer').html($(data).find('#mainInnerMap').html());
            $(window).resize();
            preloader.hide();
        }
        //console.log(loadLink)
    }




    // language select pane

    var timer;
    $("body").on('mouseleave', '.header_lang_wrap', function(){
        timer = setTimeout(function () {
            $('.header_lang_wrap').removeClass('active');
        }, 300);
    }).on('mouseenter', '.header_lang_wrap', function(){
            clearTimeout(timer);
            $(".header_lang_wrap").addClass('active');
        });


    function onResizeActions(){
        // main pane height
        if($('#mainInner').length){
            $('#mainInner').height($(window).height() - $('.header').outerHeight());
        }

        //map container width
        if($('.mainInnerMap').length){
            $('.mainInnerMap').width(
                $(window).width() - $('.mainnav').outerWidth() - $('.first_fltr_pane_wrap:visible').outerWidth() - $('.second_fltr_pane:visible').outerWidth()
            );
        }

        //text content pane height
        if($('#tpContent').length){
            $('#tpContent').height($(window).height() - $('#tpContent').offset().top - 14)
        }

        if($map){
            google.maps.event.trigger($map, "resize");
        }

        addScrolls();

    }

    window.onresize = function() {
        onResizeActions();
    };





    // search pane
    var headerSearchInput = $('#headerSearchInput');
    if(headerSearchInput.length){
        var placeholder = headerSearchInput.attr('placeholder');
        headerSearchInput
            .val(placeholder)
            .removeAttr('placeholder');
        headerSearchInput.on('focus', function(){
            if( !($(this).hasClass('active'))){
                $(this).val('');
            }
        }).on('blur', function(){
                if( $(this).val() == ''){
                    $(this).val(placeholder).removeClass('active');
                } else {
                    $(this).addClass('active');
                }
            });
    }



});












