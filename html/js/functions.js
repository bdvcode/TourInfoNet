function addHistoryItem(title, url){
    if( title == '' || !title ) title = 'TourInfoNet.eu';

    if(url !== undefined){

//           пишем новую страницу в историю
        history.pushState({ tourinfonet: true }, title, url);
//        console.log('Added history: '+title + ' ' +url);
    }
}

//удалить все маркеры и кластеры
function removeAllMarkers(){
    if(!($map) || !(markerCluster)) return;
    google.maps.Map.prototype.clearOverlays = function() {
        for (var i = 0; i < $markers.length; i++ ) {
            $markers[i].setMap(null);
        }
        $markers.length = 0;
    };
    $map.clearOverlays();
    markerCluster.clearMarkers();
}

function updateParamsObj(){

    var activeF1Pane = $('.first_fltr_pane').filter('.active');

//    $paramsObj идет в урл, если фильтр есть -- добавляем в $paramsObj, если нет -- убираем
    if(activeF1Pane.find('[data-price]').length) $paramsObj.price = $pricecat;
    else delete $paramsObj.price;

    if(activeF1Pane.find('[data-type]').length) { $paramsObj.type = $type[$maincat]; }
    else delete $paramsObj.type;

    if(1) { $paramsObj.id = current_id; }
    else delete $paramsObj.id;


}

function updateFiltersInterface(){

//    если определены переменные фильтров включаем соответсвующие кнопки
    var pane = $('.first_fltr_pane');

    if($pricecat){
        for(var i = 0; i < $pricecat.length; i++){
            pane.find('[data-price='+ $pricecat[i] +']').addClass('active');
        }
    }

    if($type[$maincat]){
        for(var i = 0; i < $type[$maincat].length; i++){
            pane.find('[data-type='+ $type[$maincat][i] +']').addClass('active');
        }
    }

}

function sendMapAjaxRequest(showF2Pane){

    $.ajax({
        url: 'http://tin.brandivision.ru/where-to-eat/map_en.php',
        type: "GET",
        dataType: "json",
        timeout: 15000,
        cache: true,
        data: {
            category:   $maincat,
            country:   $country,
            city:      $city,
            price:  $pricecat,
            type: $type[$maincat]
        },
        beforeSend: function(jqXHR, settings) {
            console.log('Ajax request URL: ' + settings.url);
        },
        success: function(data){
            $db = data;
            if(!$dbloaded){ $(document).trigger('databaseload'); }
            $dbloaded = true;
            newItemsToF2(data, showF2Pane);
        },
        error: function(req, err){
            console.log(req);
            console.log(err);
        }
    });

}






function newItemsToF2(data, showF2Pane){

//    $db = data;

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
    if(showF2Pane){
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
    }

    removeAllMarkers();
    addMarkers(data);

    preloader.fadeOut(50);

}
// кнопка подробнее во всплывающем окне объекта
function infoBoxRm(){
    if($infoBoxRmState == true){
        $('#infoWin_rm').find('span').text(trnsl.readmore);
        $('.infoWinWrap').animate({
            height: 210,
            paddingBottom: 23
        }, 100);
        $infoBoxRmState = false
    } else if ($infoBoxRmState == false ){
        $('#infoWin_rm').find('span').text(trnsl.hide);
        $('.infoWinWrap').animate({
            height: $fullInfoBoxH,
            paddingBottom: 0
        }, 100);
        $infoBoxRmState = true
    }
}

function pushParamsObj(arrId, val){
    eval(arrId).push(val);
}
function removeParamsFromObj(arrId, val){
    eval(arrId).remove(val);
}

function addScrolls(){
    $('.first_fltr_pane_cont').jScrollPane({
        hideFocus: true
    });
    if($('.second_fltr_pane_cont').length){
        $('.second_fltr_pane_cont').jScrollPane({
            hideFocus: true
        });
    }
    if($('#tpContent').length){
        $('#tpContent').jScrollPane({
            hideFocus: true
        });
    }
}

function getCountryCity(){
//    берем значение выбранной страны и города из селектов в активной панели
    $country = $('.first_fltr_pane.active').find('.countrySelect').val();
    $city = $('.first_fltr_pane.active').find('.citySelectWrap').find('select.active').val();
}
function updateCountryCity(){

//    console.log('updateCountryCity: '+ $country +' ' + $city);

//    переносим выбранную страну во все скрытые селекты
    $('.countrySelect').each(function(){
        $(this).val($country).trigger('update');
    });

    $('.citySelectWrap').each(function(){
        $(this).find('.active').removeClass('active');
        $(this).find('select').eq($('.countrySelect')[0].selectedIndex).addClass('active');
    });

//    переносим выбранный город во все скрытые селекты
    $('.citySelectWrap').each(function(){
        $(this).children('.active').val($city).trigger('update');
    });
    $.datepicker.setDefaults($.datepicker.regional['ru']);
}