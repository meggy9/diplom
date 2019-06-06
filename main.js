var app = new Vue({
	el: '#app',
	data: function() {
		return {
			organizationName: '',
			organizationNumber: '',
			dateOfEntry: '',
			organizationAddress: ''
		}
	},
	methods: {
		getList: function() {
			$.ajax({url: "list.php", success: function() {
				alert("Yo, guys!!!");
			}})
		}
	}
})