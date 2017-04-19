  //устраняем конфликт
  jQuery.noConflict();
  jQuery(document).ready(function($) {
    jQuery(".otpravitRaport").click(function(e){
    e.preventDefault();
    
    //#TODO надо будет еще допилить переменных из-за того если нету города с базы то открывалось доп поле для того что бы ввести новый город (для доп поля надо создать еще 1 переменную)
    //#TODO насчет субъекта тоже самое если нету то нужно создать нового (доп поле надо)
    //#TODO надо узнать что делать с картинками куда грузить и как их отображать
    let title = jQuery(".titleRaport").val();
    let city = jQuery(".cityRaport").val();
    let instant = jQuery(".instantRaport").val();
    let subject = jQuery(".subjectRaport").val();
    let fio = jQuery(".fioRaport").val();
    let doljnost = jQuery(".doljnostRaport").val();
    let work = jQuery(".workRaport").val();
    let sink = jQuery(".sinkRaport").val();
    let body = jQuery(".bodyRaport").val();
    let podpis = jQuery(".podpisRaport").val();
    let mail = jQuery(".emailRaport").val();
    let anon = jQuery(".anonInformRaport").val();
    let arr = [title, city, instant, subject, fio, doljnost, work, sink, body, podpis, mail, anon];  
    
    var data = {
			action: 'raport_callback', //на какой хук(функцию) отправлять запрос
			mas: arr
		};
   
		//ajax  запрос
		jQuery.post( raportAjax_object.url, data, function(response) {
			console.log(response);
		});
 
      });
    });