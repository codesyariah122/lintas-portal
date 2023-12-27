const texts = ["Cari Program Kebaikan ... ", "Beramal Quran ...", "Santri ...", "Sedekah Air ... ", "Inisiatif Kebaikan ...", "Berbagi Makanan ..."];
const navbarSearchInput = document.querySelector('#navbar-search-input')
navbarSearchInput.style.fontSize = "14px";
navbarSearchInput.style.marginLeft = "15px";
let index = 0;
let textIndex = 0;
let currentText = "";
let letter = "";

const publicModal = $('#popup-modal');

function closeModal() {
	publicModal.hide('slow').slideUp(1000)
}

function type() {
	if (textIndex === texts[index].length) {
		setTimeout(() => {
			erase();
		}, 2000);
		return;
	}

	currentText = texts[index].substring(0, textIndex + 1);
	letter = currentText.slice(-1);

	navbarSearchInput.value = currentText;
	textIndex++;

	setTimeout(type, 200);
}

function erase() {
	if (textIndex === 0) {
		index++;
		if (index === texts.length) {
			index = 0;
		}
		setTimeout(type, 1000);
		return;
	}

	currentText = texts[index].substring(0, textIndex - 1);
	letter = currentText.slice(-1);

	navbarSearchInput.value = currentText;
	textIndex--;

	setTimeout(erase, 100);
}

type();