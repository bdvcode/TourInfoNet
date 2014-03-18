var map_db, guided_db,
    $dbloaded = false,
    $infoBoxRmState = false,
    $fullInfoBoxH,
    $maincat,
//    здесь глобально хранятся значения фильтров
    $country, $city, $pricecat = [], filter_date,
    $type = {},
    $markers = [],
    markerCluster,
    $map,
    infobox,
    $paramsObj = {},
    clickEvent  = 'click';


$(function(){

    document.ontouchmove = function(e) {e.preventDefault()};

    if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ){
        window.isMobileDevise = true;
        if(isMobileDevise){
            clickEvent = 'touchstart'
        }
    }



//    var $b = $('body');
//  var preloader = $('#preloadPage');

    window.$b = $('body');
    window.preloader = $('#preloadPage');


    // связываем пункты основной навигации с панелями
    var $mainnav_ul = $('.mainnav_ul');
    //    обработка клика в главном меню
    $mainnav_ul.children('li').on(clickEvent, function(event){
        var clicked;
        if(event.target.tagName.toLowerCase() == 'li'){ clicked = event.target; } else { clicked = $(this).closest('li'); }
        if($(clicked).hasClass('active')) return;
        mainnavLiClick(clicked, true);
    });


//    выбор категории на главной странице
    $b.on(clickEvent, '.mp_selCat_item_lnk', function(e){
        var urlToFind = $(e.target).attr('data-link');
        var currentLiForOpen = $('#mainnavUl').find('li[data-link="'+ urlToFind +'"]');
//        делаем клик
        currentLiForOpen.trigger(clickEvent);
    });
    $b.on(clickEvent, '.js-mpSelCatClose', function(){
        $(this).closest('.mp_selCat').fadeOut(60);
    });

    /* TEXT PAGE AJAX*/
    $b.on(clickEvent, '.tp_ajax', function(e){
        e.preventDefault();
        if($(e.target).hasClass('active')){ return;}
        ajaxLoadPage_Textpage(e);
    });
    // фильтры-кнопки UX
    $b.on(clickEvent, '.ip_ff_subcat.btn', function(){
        $(this).closest('.ip_ff_subcat_wrap').find('.ip_ff_subcat.active').removeClass('active');
        $(this).addClass('active');
    });



//    заполняем массив типов корневыми объектами-категориями
    var mainnavItem = $('#mainnavUl').children('li');
    for(var i = 0; i <  mainnavItem.length; i++){
        var s = mainnavItem.eq(i).attr('data-link').replace(/\//g,'');
        if(s != '' && s) $type[s] = [];
    }



    // first load json database
    /*if($dbloaded == false){
        sendMapAjaxRequest();
    }*/

    getParamsFromURL();
    updateFiltersInterface();
    activatePanesFromURL();

    function activatePanesFromURL(){

//        формируем атрибут с адресом для поиска пункта
        var urlToFind = '/';
        if($maincat && $maincat !== '') urlToFind = urlToFind + $maincat + '/';

//        делаем поиск нужного пункта
        var currentLiForOpen = $('#mainnavUl').find('li[data-link="'+ urlToFind +'"]');
//        делаем клик
        mainnavLiClick(currentLiForOpen, false);

//        если в адресе указана страна или город, включаем их фильтры
        updateCountryCity();

    }

    $(document).on('databaseload', function(){

        $(window).resize();
        setTimeout(function(){
            preloader.hide().addClass('transparent');
        }, 600);

    });





    /**********************************
     *              MAP
     **********************************/



    window.addMarkers = function(data){

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
            var template = '<div class="infoWinWrap_arrow"></div><div class="infoWinWrap"><div class="infoWinWrap_head"><h3>{obj-name}</h3><img src="" class="infoWinWrap_img" /><div class="bluebtn infoWin_rm" id="infoWin_rm" onclick="infoBoxRm()"><span>{readmore}</span></div>{obj-contacts}</div><div class="infoWinWrap_text">{obj-text}</div></div><div class="infoWinWrap_botFade"></div>';
            var data = template.replace('{obj-name}', val.name)
                .replace('{obj-contacts}', val.contacts)
                .replace('{obj-text}', val.text)
                .replace('{readmore}', trnsl.readmore);

            google.maps.event.addListener(marker, 'click', (function(marker, data) {

                return function() {
//                    селекторы написаны верно, нужно каждый раз получать объкт заново, т.к. он мог измениться
                    infobox.setContent(data);
                    infobox.open($map, marker);
                    setTimeout(function(){
                        $infoBoxRmState = false;
                        $fullInfoBoxH =  $('.infoBox').height();
                        if($fullInfoBoxH > 245){  $('.infoBox').addClass('min'); }
                        $('.infoBox').animate({opacity: 1}, 50);
                    }, 20);

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
        $map.fitBounds(bounds);

        google.maps.event.addListenerOnce($map, 'zoom_changed', function() {
            var oldZoom = $map.getZoom();
            if(oldZoom > 18) $map.setZoom(18);
        });

    };

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



    /**********************************
     *           END MAP
     **********************************/



    $b.on('click', '.secondFltr_item', function(e){
        $(this).closest('#secondFltrPaneCont').children('.active').removeClass('active');
        $(this).addClass('active');
        var LatLng = $(this).attr('data-latlng').split(",");
        LatLng = new google.maps.LatLng(LatLng[0], LatLng[1]);
        google.maps.event.trigger($markers[$(e.target).attr('markerid')], 'click');
        $map.panTo(LatLng);
    });


    // обрабатываем клик в панели F1
    $('.map_f1').on(clickEvent, function(e){
        e.preventDefault();
        e.stopPropagation();
        actionsF1(e);
    });
//    обработчики выбора страны


    $('.countrySelect').on('change', function(e){
        $('.citySelectWrap').each(function(){
            $(this).find('.active').removeClass('active');
            $(this).find('select').eq(e.target.selectedIndex).addClass('active');
        });
        getCountryCity();
        updateCountryCity();

        if($(this).closest('.map_pane').length){ actionsF1(e); }
        if($(this).closest('.guided_pane').length){
            updateParamsObj();
            var url = window.location.href.split("?")[0];
            url = decodeURIComponent($.param.querystring( url, $paramsObj ));
            addHistoryItem('', url);

            sendGuidedAjaxRequest();
        }

    });
//    обработчики выбора города

    $('.citySelectWrap select').on('change', function(e){
        getCountryCity();
        updateCountryCity();
        if($(this).closest('.map_pane').length){ actionsF1(e); }
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
        sendMapAjaxRequest(true);


        var url = window.location.href.split("?")[0];
        url = decodeURIComponent($.param.querystring( url, $paramsObj ));
        addHistoryItem('', url);

    }












    function mainnavLiClick(item, pushState){
//        item = $(event.target);
        item = $(item);
        $maincat = item.attr('data-link').replace(/\//g,'');

        preloader.show();


//        если категория уже открыта
        if(item.hasClass('active')) return;

//        показать панель, назначить active
        $('.mainnav_ul').children('li.active').removeClass('active');
        $('.first_fltr_pane').filter('.active').removeClass('active');
        item.addClass('active');

        window.activeF1Pane = $('.first_fltr_pane[data-index='+item.attr('data-index')+']');
        activeF1Pane.addClass('active');


        if(item.hasClass('mainnav_map_li')) {

//          если категория с картой
            if(!($('.gm-style').length)){ initMap(); }
            sendMapAjaxRequest(false);

        } else if (item.hasClass('mainnav_text_li')){

//          если текстовая
            if(activeF1Pane.find('.tp_ajax.active').length){
//                действия, если есть включенная активная кнопка
                activeF1Pane.find('.tp_ajax.active').trigger(clickEvent);
            } else {
//                если активной кнопки нет, открыть первую
                activeF1Pane.find('.tp_ajax').first().trigger(clickEvent);
            }

        } else if(item.hasClass('mainnav_guided_li')){
//          если guided tours-экскурсии

            sendGuidedAjaxRequest();

        }

//        если главная страница
//        выводить после инициализации карты
        if(item.hasClass('mainnav_main_li')) {
            $('#mainMapContainer').append( $('#mpContent').html());
            $(window).resize();
        } else {
            $('#mainMapContainer').find('.mp_selCat').remove();
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
            var url = item.attr('data-link'),
                title = $('.first_fltr_pane').filter('active').find('h1').text();
            updateParamsObj();
            url = decodeURIComponent($.param.querystring( url, $paramsObj ));

            addHistoryItem(title, url);
        }


    }




    // стилизация селектов
    $('.niceselect').customSelect();




    function getParamsFromURL(){
        /*var pathArray = [];
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
        if(paramsArrFromURL.type) $type[$maincat] = paramsArrFromURL.type;*/

        var pathArray = [];
         var array = location.pathname.split("/");

         //        разбиваем адрес на массив
         for(var i = 0; i < array.length; i++){
             var c = array[i];
             if(c != '') pathArray.push(c);
         }

         if(pathArray[0]) { $maincat = pathArray[0]; $type[$maincat] = []; }

         var paramsArrFromURL = $.deparam.querystring();

         if(paramsArrFromURL.country) $country = paramsArrFromURL.country;
         if(paramsArrFromURL.city) $city = paramsArrFromURL.city;
         if(paramsArrFromURL.price) $pricecat = paramsArrFromURL.price;
         if(paramsArrFromURL.type) $type[$maincat] = paramsArrFromURL.type;
         if(paramsArrFromURL.date) filter_date = paramsArrFromURL.date;

    }






    var loadLink;

    function ajaxLoadPage_Textpage(e){

        loadLink = e.target.href;
        if(!(loadLink)) loadLink = $(e.target).closest('a').attr('href');
        console.log('Ajax request URL: '+loadLink);

        preloader.show();

        $.ajax({
            url: loadLink,
            type: "GET",
            dataType: "html",
            timeout: 10000,
            cache: true,
            success: onAjaxSuccess,
            error: function(req, err){
                console.log(req);
                console.log(err);
            }
        });

        function onAjaxSuccess(data){
            $('#mainMapContainer').html($(data).find('#mainMapContainer').html());
            $(document).trigger('databaseload');
        }
        //console.log(loadLink)
    }




    // language select pane

    var timer;
    $b.on('mouseleave', '.header_lang_wrap', function(){
        timer = setTimeout(function () {
            $('.header_lang_wrap').removeClass('active');
        }, 300);
    }).on('mouseenter', '.header_lang_wrap', function(){
            clearTimeout(timer);
            $(".header_lang_wrap").addClass('active');
        });


    function onResizeActions(){

        var winWidth = $(window).width(),
            winHeight = $(window).height();

        // main pane height
        var mainInner = $('#mainInner');
        if(mainInner.length){
            mainInner.height(winHeight - $('.header').outerHeight());
        }

        //map container width
        var mainInnerMap = $('.mainInnerMap');
        if(mainInnerMap.length){
            mainInnerMap.width(
                winWidth - $('.mainnav').outerWidth() - $('.first_fltr_pane_wrap:visible').outerWidth() - $('.second_fltr_pane:visible').outerWidth()
            );
        }

        //text content pane height
        var tpContent = $('#tpContent');
        if(tpContent.length){
            tpContent.height(winHeight - tpContent.offset().top - 14)
        }



        if($map){ google.maps.event.trigger($map, "resize"); }

        addScrolls();

    }

    $(window).on('resize', onResizeActions);



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


    $.datepicker.setDefaults($.datepicker.regional[trnsl.langCode]);

    $('#js-guid_tours_datepicker').datepicker({
        firstDay: 1,
        minDate: 0,
        altField: "#js-guid_tours_datepicker_input",
        onSelect: function(dateText){

            filter_date = dateText;
            updateParamsObj();
            var url = window.location.href.split("?")[0];
            url = decodeURIComponent($.param.querystring( url, $paramsObj ));
            addHistoryItem('', url);

            sendGuidedAjaxRequest();
        }

    });

    if(filter_date && filter_date != ''){
        $('#js-guid_tours_datepicker').datepicker('setDate', filter_date);
    }


});