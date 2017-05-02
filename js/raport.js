  //устраняем конфликт
  jQuery.noConflict();
  jQuery(document).ready(function($) {

    
    
    /* ПРИМЕР работы функции по условию (Если нету такой категории то выполняем другое действие (Выводим сообщение об ошибке, если нету категории) )
     //создаем проверку если такого значение нету в массиве выводим сообщение и доп. поле
    jQuery('.instantRaport').focus(function() {
        jQuery(this).autocomplete({
        source: tagInstant,
        })
    }).blur(function() {
        if(!!tagInstant.indexOf(jQuery(this).val())) {
	  jQuery('.instantRaport').val("Нету такой инстанции!");
        }
    });
     
     */
    
    var tagSub = getCategoryName("subject");
    
    //функция по заполнению по 1 букве город
    jQuery( ".cityRaport" ).autocomplete({
               source: getCategoryName("city"), //массив города
 	});
    
    //функция по заполнению по 1 букве инстанция
    jQuery( ".instantRaport" ).autocomplete({
               source: getCategoryName("instant") //массив инстанций
	});
    
    /*функция по заполнению по 1 букве субъект
    jQuery( ".subjectRaport" ).autocomplete({
               source: getCategoryName("subject") //массив субъекта (использую эту функцию для получения имени субъекта)
	});
    */
    //создаем проверку если такого значение нету в массиве выводим сообщение и доп. поле
    jQuery('.subjectRaport').focus(function() {
      jQuery('.subjectRaport').css("color","black");
        jQuery(this).autocomplete({
        source: tagSub,
        })
    }).blur(function() {
      //если нету совпадения выводим предупреждение
       find(tagSub,jQuery(this).val());
    });

    
    
    
});

// с помощью функции получаем данные по вводу 1 символа  
function getCategoryName(category){
  
   var mas = [];
   var data = {
			action: 'searchSymbol_callback', //на какой хук(функцию) отправлять запрос
			category: category
		};
   
		//ajax  запрос
		jQuery.post( raportAjax_object.url, data, function(response) {
 		  
		  if(!!response){
		    var obj = JSON.parse(response);

 			 for(var i = 0; i<obj.length; ++i ){
			  mas[i] = obj[i].name;
			  
			  }
		      }
		      
			
		}); 
      
  return mas;
}  

//функция по поиску  сравнения в массиве и значения
function find(array, value) {
 
  for (var i = 0; i < array.length; i++) {
    if (array[i] === value)return i; 
  }

    jQuery('.subjectRaport').css("color","red");
    jQuery('.subjectRaport').val("Субъект не найден!");
  //return -1;
}
