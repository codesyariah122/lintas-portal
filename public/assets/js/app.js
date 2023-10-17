$(document).ready(function() {
	
	$('#atm-starting').on('click', '.start-atm', function(e) {
		e.preventDefault()
		loadingSetup()
		// setTimeout(() => {
		// 	authModal.show()
		// }, 1000)
		setTimeout(() => {
			$('#atm-starting').hide('slow').fadeOut(1000)
			$('#atm-showing').show('slow').fadeIn(1000)
		}, 1500)

	})

	$('#atm-starting').on('click', '.hide-modal', function(e) {
		e.preventDefault()
		authModal.hide()
	})

	$('#atm-showing').on('click', '.cancel-process', function(e){
		e.preventDefault()
		loadingSetup()
		setTimeout(() => {
			$('#atm-showing').hide('slow').fadeOut(1000)
			$('#atm-starting').show('slow').fadeIn(1000)
		}, 1500)
	})

	$('#atm-showing').on('click', '.services', function(e) {
		e.preventDefault()
		const servicesData = $(this).data('services')
		console.log(servicesData)
	})
})