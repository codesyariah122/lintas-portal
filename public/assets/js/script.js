const options = {
  placement: 'center',
  backdrop: 'dynamic',
  backdropClasses: 'bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-40',
  closable: true,
  onHide: () => {
      console.log("hide modal")
      $('#vehicles').val('Pilih Jenis')
  },
  onShow: () => {
      console.log('modal is shown');
  },
  onToggle: () => {
      console.log('modal has been toggled');
  }
};

const loadingOverlay = $('#loading-overlay')
const $targetEl = document.getElementById('authenticateModal')
const authModal = new Modal($targetEl, options)
