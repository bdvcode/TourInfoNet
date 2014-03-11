function addHistoryItem(title, url){
    if(title == '') title = 'TourInfoNet.eu';

    if(url !== undefined){

//           пишем новую страницу в историю
        history.pushState({ tourinfonet: true }, title, url);
        console.log('Added history: '+title + ' ' +url);
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
    }
    $map.clearOverlays();
    markerCluster.clearMarkers();
}

function updateParamsStr(){
    /*$paramsStr = '?';
     //            $paramsStr += 'price=cheap,middle&type=hotels,guest_houses';

     var activeF1Pane = $('.first_fltr_pane').filter('.active');
     var str;
     if(activeF1Pane.find('[data-price]') && $pricecat.length != 0){

     if(window.location.href.indexOf('=') === -1){
     str = 'price=';
     } else {
     str = '&price=';
     }

     for(var i = 0; i < $pricecat.length; i++){
     str += $pricecat[i] + ',';
     }
     str = str.slice(0, -1);
     $paramsStr += str;
     } else if ( $pricecat.length == 0 ) {
     $paramsStr = removeParameterFromUrl($paramsStr, 'price');
     }

     if(activeF1Pane.find('[data-objtype]') && $objtype.length != 0){
     if(window.location.href.indexOf('=') === -1){
     str = 'type=';
     } else {
     str = '&type=';
     }

     for(var i = 0; i < $objtype.length; i++){
     str += $objtype[i] + ',';
     }
     str = str.slice(0, -1);
     $paramsStr += str;
     } else if ( $objtype.length == 0 ){
     $paramsStr = removeParameterFromUrl($paramsStr, 'type');
     }

     console.log($paramsStr);*/
    var activeF1Pane = $('.first_fltr_pane').filter('.active');

//    $paramsObj идет в урл, если фильтр есть -- добавляем в $paramsObj, если нет -- убираем
    if(activeF1Pane.find('[data-price]').length) $paramsObj.price = $pricecat;
    else delete $paramsObj.price;

    if(activeF1Pane.find('[data-objtype]').length) $paramsObj.type = $objtype;
    else delete $paramsObj.type;

}

function updateFiltersInterface(){

//    var pane = $('.first_fltr_pane').filter('.active');
    var pane = $('.first_fltr_pane');

    if($pricecat){
        for(var i = 0; i < $pricecat.length; i++){
            pane.find('[data-price='+ $pricecat[i] +']').addClass('active');
        }
    }

    if($objtype){
        for(var i = 0; i < $objtype.length; i++){
            pane.find('[data-objtype='+ $objtype[i] +']').addClass('active');
        }
    }



}




// кнопка подробнее во всплывающем окне объекта
function infoBoxRm(){
    if($infoBoxRmState == true){
        $('#infoWin_rm').find('span').text($trnsl.readmore);
        $('.infoWinWrap').animate({
            height: 210,
            paddingBottom: 23
        }, 100);
        $infoBoxRmState = false
    } else if ($infoBoxRmState == false ){
        $('#infoWin_rm').find('span').text($trnsl.hide);
        $('.infoWinWrap').animate({
            height: $fullInfoBoxH,
            paddingBottom: 0
        }, 100);
        $infoBoxRmState = true
    }
}

function pushParamsObj(arrId, val){
    window[arrId].push(val);
}
function removeParamsFromObj(arrId, val){
    window[arrId].remove(val);
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

//    переносим выбранный город во все скрытые селекты
    $('.citySelectWrap').each(function(){
        $(this).children('.active').val($city).trigger('update');
    });
}