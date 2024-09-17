document.querySelector('button').addEventListener('click', function() {
    const searchTerm = document.querySelector('input[type="text"]').value;
    const campus = document.querySelector('select:nth-of-type(1)').value;
    const departamento = document.querySelector('select:nth-of-type(2)').value;
    const puesto = document.querySelector('select:nth-of-type(3)').value;
    console.log("Buscando:", searchTerm, campus, departamento, puesto);
});
