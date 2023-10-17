const loadingSetup = () => {
	loadingOverlay.removeClass('hidden')
	loadingOverlay.addClass('block')

	setTimeout(() => {
		loadingOverlay.removeClass('block')
		loadingOverlay.addClass('hidden')
	}, 1000)
}