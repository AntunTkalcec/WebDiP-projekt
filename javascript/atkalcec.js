window.addEventListener("load", pocetna);


function pocetna() {
    $('.close-cookie-banner').click(function () {
        $('.cookie-banner').fadeOut();
    });
    registracija();
}

function provjeri() {
    var username = document.getElementById("korisnicko_ime").value;
    if (username) {
        $.ajax({
            type: "POST",
            url: "provjeriKorime.php",
            data: {
                user_name: username
            },
            success: function (response) {
                $("#korimeStatus").html(response);
                if (response === "Korisničko ime je dostupno.") {
                    return true;
                } else {
                    return false;
                }
            }
        });
    } else {
        $("#korimeStatus").html("");
        return false;
    }
}

function provjeriBiografiju() {
    var naziv = document.getElementById("naziv").value;
    if (naziv) {
        $.ajax({
            type: "POST",
            url: "provjeriNaziv.php",
            data: {
                nazivBiografije: naziv
            },
            success: function (response) {
                $("#nazivStatus").html(response);
                if (response === "Naziv biografije je već zauzet.") {
                    return true;
                } else {
                    return false;
                }
            }
        });
    } else {
        $("#nazivStatus").html("");
        return false;
    }
}

function registracija() {
    var formular = document.getElementById("registracija");
    var email = document.getElementById("email");
    var ime = document.getElementById("ime");
    var prezime = document.getElementById("prezime");
    var korisnicko_ime = document.getElementById("korisnicko_ime");
    var lozinka = document.getElementById("lozinka");
    var lozinkaPotvrda = document.getElementById("lozinka_potvrda");
    email.addEventListener("focusout", function () {
        if (/[a-z0-9!#$%&'*+\/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+\/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/.test(email.value) === false) {
            email.style.border = "1px solid red";
        } else {
            email.style.border = "1px solid green";
        }
    });
    ime.addEventListener("focusout", function () {
        var str = ime.value;
        if (ime.value.includes("+") || ime.value.includes("-") || ime.value.includes("*") || ime.value.includes("!") || ime.value.includes("/")) {
            ime.style.border = "1px solid red";
        } else {
            if (str[0].toUpperCase() != str[0]) {
                ime.style.border = "1px solid red";
            } else {
                ime.style.border = "1px solid green";
            }
        }
    });
    prezime.addEventListener("focusout", function () {
        if (prezime.value.includes("+") || prezime.value.includes("-") || prezime.value.includes("*") || prezime.value.includes("!") || prezime.value.includes("/")) {
            prezime.style.border = "1px solid red";
        } else if (prezime.value === "") {
            prezime.style.border = "1px solid red";
        } else {
            prezime.style.border = "1px solid green";
        }
    });
    korisnicko_ime.addEventListener("focusout", function () {
        if (korisnicko_ime.value.length < 3) {
            korisnicko_ime.style.border = "1px solid red";
        } else {
            korisnicko_ime.style.border = "1px solid green";
        }
    });
    lozinka.addEventListener("focusout", function () {
        if (/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/.test(lozinka.value) === false) {
            lozinka.style.border = "1px solid red";
        } else {
            lozinka.style.border = "1px solid green";
        }
    });
    lozinkaPotvrda.addEventListener("keyup", function () {
        if (lozinkaPotvrda.value !== lozinka.value) {
            lozinkaPotvrda.style.border = "1px solid red";
        } else {
            lozinkaPotvrda.style.border = "1px solid green";
        }
    });
}

function pristupacnost() {
    var css = document.getElementsByTagName('link');
    console.log(location.pathname);
    for (i = 0; i < css.length; i++) {
        if (css[i].getAttribute('rel') === 'stylesheet') {
            let href = css[i].getAttribute('href').split('?')[0];
            if (href === "/WebDiP/2020_projekti/WebDiP2020x092/css/atkalcec.css") {
                let noviHref = '/WebDiP/2020_projekti/WebDiP2020x092/css/prilagodeno.css';
                css[i].setAttribute('href', noviHref);
            } else if (href === "/WebDiP/2020_projekti/WebDiP2020x092/css/prilagodeno.css") {
                let noviHref = '/WebDiP/2020_projekti/WebDiP2020x092/css/atkalcec.css';
                css[i].setAttribute('href', noviHref);
            }
        }
    }
}

function helper() {
    var modal = document.getElementById("help");
    modal.style.display = "block";
    var btnClose = document.getElementsByClassName("help1-close");
    btnClose.onclick = function () {
        modal.style.display = "none";
    };
    window.onclick = function (event) {
        if (event.target !== modal) {
            modal.style.display = "none";
        }
    };
}