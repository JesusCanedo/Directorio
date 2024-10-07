document.addEventListener('DOMContentLoaded', function () {
    fetchData();


    const form = document.getElementById('searchForm');

    if (form) {
        form.addEventListener('submit', function (event) {
            event.preventDefault();
            fetchData();
        });
    } else {
        console.error('Search form not found in the DOM');
    }

    function fetchData() {
        const search = document.getElementById('search')?.value || '';
        const campus = document.getElementById('campus')?.value || '';
        const departamento = document.getElementById('departamento')?.value || '';
        const puesto = document.getElementById('puesto')?.value || '';

        const formData = {
            search: search,
            campus: campus,
            departamento: departamento,
            puesto: puesto
        };

        console.log('Sending request with data:', formData);

        fetch('users.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(formData)
        })
        .then(response => {
            console.log('Response status:', response.status);
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            console.log('Received data:', data);
            if (data.error) {
                throw new Error(data.error);
            }
            populateTable(data);
        })
        .catch(error => {
            console.error('Error al cargar los datos:', error);
            displayError(error.message);
        });
    }

    function populateTable(data) {
        const tbody = document.querySelector('tbody');
        tbody.innerHTML = '';

        if (Array.isArray(data) && data.length > 0) {
            data.forEach((row, index) => {
                const tr = document.createElement('tr');

                tr.innerHTML = `
                    <td class="border px-4 py-2 text-center">${index + 1}</td>
                    <td class="border px-4 py-2 text-center">${escapeHtml(row.departamento)}</td>
                    <td class="border px-4 py-2 text-center">${escapeHtml(row.nombre)}</td>
                    <td class="border px-4 py-2 text-center">${escapeHtml(row.puesto)}</td>
                    <td class="border px-4 py-2 text-center">${escapeHtml(row.email)}</td>
                    <td class="border px-4 py-2 text-center">${escapeHtml(row.area)}</td>
                    <td class="border px-4 py-2 text-center">${escapeHtml(row.campus)}</td>
                `;

                tbody.appendChild(tr);
            });
        } else {
            const tr = document.createElement('tr');
            tr.innerHTML = `<td colspan="7" class="border px-4 py-2 text-center">No hay resultados.</td>`;
            tbody.appendChild(tr);
        }
    }

    function displayError(message) {
        const tbody = document.querySelector('tbody');
        tbody.innerHTML = `<tr><td colspan="7" class="border px-4 py-2 text-center text-red-500">Error: ${escapeHtml(message)}</td></tr>`;
    }

    function escapeHtml(unsafe) {
        return unsafe
            .replace(/&/g, "&amp;")
            .replace(/</g, "&lt;")
            .replace(/>/g, "&gt;")
            .replace(/"/g, "&quot;")
            .replace(/'/g, "&#039;");
    }
});