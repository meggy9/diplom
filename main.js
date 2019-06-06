var app = new Vue({
	el: '#app',
	data: {
		organizationName: '',
		organizationNumber: '',
		dateOfEntry: '',
		organizationAddress: ''
	}
	methods: {
		getList: function() {
			ajax({url: "list.php", success: function() {
				alert("Yo, guys!!!");
			}})
		}
	}
})