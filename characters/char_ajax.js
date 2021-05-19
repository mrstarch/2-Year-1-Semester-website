function createChar() {
    const name = document.getElementById('charname').value;
    const str = document.getElementById('strength').value;
    const agi = document.getElementById('agility').value;
    const inte = document.getElementById('intelligence').value;

    if (name === "") {
        document.getElementById("createresponse").innerHTML = "break";
        return;
    } else {
        const xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                document.getElementById("createresponse").innerHTML = this.responseText;
                getChar();
            }
        };
        xhttp.open("POST", "createChar.php", true);
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhttp.send("name=" + name + "&str=" + str + "&agi=" + agi + "&inte=" + inte);
    }
}
function getChar() {
    const xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("exisChar").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "getChar.php", true);
    xhttp.send();
}

function checkChar() {
    const x = document.forms["select"]["exisChar"].value;
    if (x === '') {
        alert("Please Create a Character First");
        return false;
    }
}


