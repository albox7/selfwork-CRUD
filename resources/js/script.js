
// Cancellazione post:
// forza il cambio di focus alla chiusura della modale per ripristinare lo stato :hover
const deleteModal = document.getElementById('deleteModal');

if (deleteModal) {
	deleteModal.addEventListener('hidden.bs.modal', function () {
		setTimeout(function () {
			document.querySelector('[data-bs-target="#deleteModal"]').blur();
		}, 100);
	});
}