window.onload = () => {
    document.querySelectorAll("[data-reply]").forEach(element => {
        element.addEventListener('click', function() {
            document.querySelector("#comment_form_parentid").value = this.dataset.id;
        });
    })
}