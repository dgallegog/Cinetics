document.addEventListener("DOMContentLoaded", () => {
    input = document.getElementById('inputGroupFile01');
    otro = document.getElementById('chooseFile');

    input.addEventListener("change", function() {
        otro.innerText = input.value;
    });
});