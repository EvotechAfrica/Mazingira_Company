<script>
    function previewPhoto(event) {
        const preview = document.getElementById('photo-output');
        const iconUser = document.querySelector('#photo-preview .fa-image');
        const reader = new FileReader();
        reader.onload = function() {
            preview.src = reader.result;
            preview.style.display = 'block';
            if (iconUser) {
                iconUser.style.display = 'none';
            }
        }
        if (event.target.files.length > 0) {
            reader.readAsDataURL(event.target.files[0]);
        }
    }

    // Script pour la recherche automatique
    function searchTable() {
        // Déclarer les variables
        const input = document.getElementById('searchInput');
        const filter = input.value.toUpperCase();
        const table = document.getElementById('articleTable');
        const tr = table.getElementsByTagName('tr');

        // Parcourir toutes les lignes du tableau (sauf l'en-tête)
        for (let i = 1; i < tr.length; i++) {
            let found = false;
            // Parcourir toutes les cellules de la ligne
            const td = tr[i].getElementsByTagName('td');
            for (let j = 0; j < td.length; j++) {
                const cell = td[j];
                if (cell) {
                    const cellText = cell.textContent || cell.innerText;
                    // Si le texte de la cellule correspond au filtre, afficher la ligne
                    if (cellText.toUpperCase().indexOf(filter) > -1) {
                        found = true;
                        break;
                    }
                }
            }
            // Afficher ou masquer la ligne en fonction du résultat
            if (found) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
</script>