
var intervalo ;
var num_aleatorio = Math.floor((Math.random()*5)+1);


$(".productSliderList li").eq(3).hide();

$('#slider').css({'background-image': 'url(site_media/img/slider/slider_0'+num_aleatorio+'.jpg)',
                        'background-size':"100%"});

$("#formSearch").submit(function(){

        if($(".inputSearch").val()!=""){return true;}else{return false;}

    });

    $(".search").toggle(
        function(){

            $('.topSearch').slideDown('slow');

        },
        function(){

            $('.topSearch').slideUp('slow');

        });

$("#formLogin").submit(function(){

        if($("#usuario").val()!="" && $("#passwd").val()!=""){return true;}else{return false;}

    });

    $(".login").toggle(
        function(){

            $('.topLogin').slideDown('slow');

        },
        function(){

            $('.topLogin').slideUp('slow');

        });

$("#arrowRight").click(function(){
    $(".productSliderList li").eq(0).hide();
    $(".productSliderList li").eq(3).show();
});

$("#arrowLeft").click(function(){
    $(".productSliderList li").eq(3).hide();
    $(".productSliderList li").eq(0).show();
});


$("#compra").submit(function(){

    contadorBuenos = 0;
    if($("#name").val()==""){
        $("#reqname").show();
        contadorBuenos--;
    } else {
        $("#reqname").hide();
        contadorBuenos++;
    }
    if($("#firstname").val()==""){
        $("#reqfirstname").show();
        contadorBuenos--;
    } else {
        $("#reqfirstname").hide();
        contadorBuenos++;
    }
    if($("#phone").val()==""){
        $("#reqphone").show();
        contadorBuenos--;
    } else {
        $("#reqphone").hide();
        contadorBuenos++;
    }
    if($("#email").val()==""){
        $("#reqemail").show();
        contadorBuenos--;
    } else {
        $("#reqemail").hide();
        contadorBuenos++;
    }
    if($("#selectTarjeta").val()=="Seleccione un tipo de tarjeta"){
        $("#reqselectTarjeta").show();
        contadorBuenos--;
    } else {
        $("#reqselectTarjeta").hide();
        contadorBuenos++;

    }
    if($("#nameTitular").val()==""){
        $("#reqnameTitular").show();
        contadorBuenos--;
    } else {
        $("#reqnameTitular").hide();
        contadorBuenos++;
    }
    if($("#numTarjeta").val()==""){
        $("#reqnumTarjeta").show();
        contadorBuenos--;
    } else {
        $("#reqnumTarjeta").hide();
        contadorBuenos++;
    }
    if($("#fechaTarjeta").val()==""){
        $("#reqfechaTarjeta").show();
        contadorBuenos--;
    } else {
        $("#reqfechaTarjeta").hide();
        contadorBuenos++;
    }
    if($("#ccv").val()==""){
        $("#reqccv").show();
        contadorBuenos--;
    }else {
        $("#reqccv").hide();
        contadorBuenos++;
    }

    if($("#condicioneschk").is(':checked')){
        $("#reqcondicioneschk").hide();
        contadorBuenos++;
    } else {
        $("#reqcondicioneschk").show();
        contadorBuenos--;
    }

    if($("#politica").is(':checked')){
        $("#reqpolitica").hide();
        contadorBuenos++;
    }else{
         $("#reqpolitica").show();
         contadorBuenos--;
    }
    if(contadorBuenos==11){
        return true;
    }else{
	    return false;
    }
});


$("#name").change(function(){
    if($("#name").val()==""){
        $("#reqname").show();
    } else {
        $("#reqname").hide();
    }
});

$("#firstname").change(function(){
    if($("#firstname").val()==""){
        $("#reqfirstname").show();
    } else {
        $("#reqfirstname").hide();
    }
});

$("#phone").change(function(){
    if($("#phone").val()==""){
        $("#reqphone").show();
    } else {
        $("#reqphone").hide();
    }
});

$("#email").change(function(){
    if($("#email").val()==""){
        $("#reqemail").show();
    } else {
        $("#reqemail").hide();
    }
});

$("#selectTarjeta").change(function(){
    if($("#selectTarjeta").val()=="Seleccione un tipo de tarjeta"){
        $("#reqselectTarjeta").show();
    } else {
        $("#reqselectTarjeta").hide();
    }
});

$("#nameTitular").change(function(){
    if($("#nameTitular").val()==""){
        $("#reqnameTitular").show();
    } else {
        $("#reqnameTitular").hide();
    }

});

$("#numTarjeta").change(function(){
    if($("#numTarjeta").val()==""){
        $("#reqnumTarjeta").show();
    } else {
        $("#reqnumTarjeta").hide();
    }

});

$("#fechaTarjeta").change(function(){
    if($("#fechaTarjeta").val()==""){
        $("#reqfechaTarjeta").show();
    } else {
        $("#reqfechaTarjeta").hide();
    }
});

$("#ccv").change(function(){
    if($("#ccv").val()==""){
        $("#reqccv").show();
    }else {
        $("#reqccv").hide();
    }
});

$("#condiciones").change(function(){
    if($("#condiciones").is(':checked')){
        $("#reqcondiciones").hide();
    } else {
        $("#reqcondiciones").show();
    }
});

$("#politica").change(function(){
    if($("#politica").is(':checked')){
        $("#reqpolitica").hide();
    }else{
         $("#reqpolitica").show();
    }
});


$("#formRegistrar").submit(function(){
	
	contadorBuenos = 0;
    if($("#nombre").val()==""){
        contadorBuenos--;
    } else {
        contadorBuenos++;
    }
    
    if($("#apellido").val()==""){
        contadorBuenos--;
    } else {
        contadorBuenos++;
    }
    
    if($("#usu").val()==""){
        contadorBuenos--;
    } else {
        contadorBuenos++;
    }
    
    if($("#pass").val()==""){
        contadorBuenos--;
    } else {
        contadorBuenos++;
    }
    
    if($("#rpass").val()==""){
        contadorBuenos--;
    } else {
        contadorBuenos++;
    }
    
    if($("#	remail").val()==""){
        contadorBuenos--;
    } else {
        contadorBuenos++;
    }
    
    if(contadorBuenos==6){
        return true;
    }else{
	    return false;
	    $("#msnError"),html("Faltan datos");
    }
	
	
	
});



function mapGoogleHotel()
{
    var posicion = new google.maps.LatLng($("#x").val(), $("#y").val());

    var mapProp = {
      center:  posicion  ,
      zoom:      15,
      panControl: true,
      zoomControl: true,
      mapTypeControl: true,
      scaleControl: true,
      mapTypeId: google.maps.MapTypeId.TERRAIN
      };

      var styleArray = [
          {
            featureType: "all",
            stylers: [
              { saturation: -80 }
            ]
          },{
            featureType: "road.arterial",
            elementType: "geometry",
            stylers: [
              { hue: "#f25e4e" },
              { saturation: 50 }
            ]
          },{
            featureType: "poi.business",
            elementType: "labels",
            stylers: [
              { visibility: "off" }
            ]
          }
        ];


    var map = new google.maps.Map(document.getElementById("mapGoogle"), mapProp);
    map.setOptions({styles: styleArray});

    var marker = new google.maps.Marker({
      position: posicion,
      map: map
    });

}

if($("#x").length){
	google.maps.event.addDomListener(window, 'load', mapGoogleHotel());
}    
    