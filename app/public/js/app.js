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

        console.log('Sending data:', formData); 

        const csrfTokenMeta = document.querySelector('meta[name="csrf-token"]');
        const csrfToken = csrfTokenMeta ? csrfTokenMeta.getAttribute('content') : '';

        fetch('/usuarios', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify(formData)
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok ' + response.statusText);
            }
            return response.json();  
        })
        .then(data => {
            console.log('Parsed data:', data);
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
                    <td class="border px-4 py-2 text-center">${escapeHtml(String(row.Extension))}</td>
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
        if (unsafe === null || unsafe === undefined) {
            return ''; 
        }
        return unsafe
            .toString()
            .replace(/&/g, "&amp;")
            .replace(/</g, "&lt;")
            .replace(/>/g, "&gt;")
            .replace(/"/g, "&quot;")
            .replace(/'/g, "&#039;");
    }
});
