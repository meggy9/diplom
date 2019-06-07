var app = new Vue({
	el: '#app',
	data: function() {
		return {
			organizationName: '',
			area: '',
			organizationType: '',
			serviceForm: [],
			socialServicesType: [],
			recipientCategory: [],		
			ownershipType: []
		}
	},
	methods: {
		getList: function() {
			$.ajax({
		        url:     url, //url страницы (list.php)
		        type:     "POST", //метод отправки
		        dataType: "html", //формат данных
		        data: $("#"+ajax_form).serialize(),  // Сеарилизуем объект
		        success: function(response) { //Данные отправлены успешно
		        	result = $.parseJSON(response);
		        	$('#result_form').html('Имя: '+result.name+'<br>Телефон: '+result.phonenumber);
		    	},
		    	error: function(response) { // Данные не отправлены
		            $('#result_form').html('Ошибка. Данные не отправлены.');
		    	}
		 	})
		}		
	}
})