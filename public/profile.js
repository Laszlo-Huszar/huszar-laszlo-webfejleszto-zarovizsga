const telefonszamMentes = async () => {
    const inputTelefonszam = document.getElementById('telefonszam');

    const res = await fetch('http://localhost/webfejleszto-zarovizsga/controller/telefonszam-mentes-controller.php', {
        method: 'POST',
        body: JSON.stringify({telefonszam: inputTelefonszam.value})
    });
}