  //устраняем конфликт
  jQuery.noConflict();
  jQuery(document).ready(function($) {
    jQuery(".otpravitRaport").click(function(){
    //e.preventDefault();
    
    //#TODO надо узнать что делать с картинками куда грузить и как их отображать
    let title = jQuery(".titleRaport").val();
    let city = jQuery(".cityRaport").val();
    let instant = jQuery(".instantRaport").val();
    let subject = jQuery(".subjectRaport").val();
    let body = jQuery(".bodyRaport").val();
    let podpis = jQuery(".podpisRaport").val();
    let mail = jQuery(".emailRaport").val();
    let anon = jQuery(".anonInformRaport").val();
    
    //проверяем если нету такого субъекта то создаем массив из данных о субъекте и отправляем на сервер
      if(subject == "Субъект не найден!"){
	var nameSub = jQuery(".fioRaport").val();
	var doljnost = jQuery(".doljnostRaport").val();
	var work = jQuery(".workRaport").val();
	var sink = jQuery(".sinkRaport").val();
	
	subject = [nameSub,doljnost,work,sink];
	
      }
    
      let arr = [title, city, instant, subject,body, podpis, mail, anon];  
    
   //заголовок поста обязательный
      if(!!title){
	  var data = {
			    action: 'raport_callback', //на какой хук(функцию) отправлять запрос
			    mas: arr
		    };
      
		    //ajax  запрос
		    jQuery.post( raportAjax_object.url, data, function(response) {
			    console.log(response);
		    });
      }else{
	jQuery(".titleRaport").css("border","1px solid red");
	 
      }
    
   });
    
    
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
        if(!!tagSub.indexOf(jQuery(this).val())) {
	  jQuery('.subjectRaport').css("color","red");
	  jQuery('.subjectRaport').val("Субъект не найден!");
        }
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