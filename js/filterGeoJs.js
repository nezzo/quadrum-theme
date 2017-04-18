//устраняем конфликт
jQuery.noConflict();
jQuery(document).ready(function($) {
  //получаем данные с селектов
  jQuery('.searchGeo').click(function(){
    
    //Города
    let city = jQuery(".cityGeo option:selected").val();
    
    //Инстанции
    let truble = jQuery(".trubleGeo option:selected").val();
    
    //создаем ссылку по get  параметрам
    let url = city+"+"+truble ;
    
    //проверяем что бы в фильтре были выбраны параметры
    if(city != "false" && truble != "false"){
      
      //когда выбрали все параметры то перекидываем на нужную категорию
      location.href = "/category/"+url;
    }
    
  });
  
});