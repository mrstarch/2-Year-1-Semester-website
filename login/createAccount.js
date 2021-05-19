/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function createAccount() {
    const username = document.getElementById('username').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState === 4) {
            if (this.status === 200) {
                document.getElementById('error-text').innerHTML = this.responseText;
            }
            else if (this.status === 303) {
                window.location.replace(`${this.getResponseHeader('Redirect')}`);
            }
        }
    };
    xhttp.open("POST", "createAccount.php", true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send(`username=${username}&email=${email}&password=${password}`);
};
