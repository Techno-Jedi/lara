export default {

    showPhone(event) {
        let showPhone = document.querySelector("#showPhone");

        showPhone.onclick = function (event) {
            let target = event.target;
            if (target.tagName !== 'P') return;
            showPhone.innerHTML = "+7 XXX XXX XXXX"
            setTimeout(() => showPhone.innerHTML = "Показать телефон", 5000)
        }
    }
}
