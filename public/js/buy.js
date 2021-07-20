"use strict";
let buttons = document.querySelectorAll('.buy');
buttons.forEach((elem) => {
    elem.addEventListener('click', () => {
        let id = elem.getAttribute('data-id');
        (
            async () => {
                const response = await fetch('/cart/add', {
                    method: 'POST',
                    headers: {'Content-Type': 'application/json;charset=utf-8'},
                    body: JSON.stringify({
                        id: id
                    })
                });
                const answer = await response.json();
                console.log(window.JSON.response);
                document.getElementById('count').innerText = answer.count;
            }
        )();
    })
})