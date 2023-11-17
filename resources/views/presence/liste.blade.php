@extends('./layouts/app')

@section('page-content')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const searchInput = document.getElementById("searchInput");
        const table = document.querySelector("table");
        const rows = table.querySelectorAll("tbody tr");

        searchInput.addEventListener("input", function () {
            const searchValue = this.value.toLowerCase();

            rows.forEach(function (row) {
                let found = false;
                row.querySelectorAll("td").forEach(function (cell) {
                    const cellText = cell.textContent.toLowerCase();
                    if (cellText.includes(searchValue)) {
                        found = true;
                    }
                });

                if (found) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        });
    });
</script>

<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Striped Table</h4>
      <div class="search-container">
        <input type="text" id="searchInput" placeholder="Date">
        </div>
    <br>
      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>
                Employe
              </th>
              <th>
               Date Entree
              </th>
              <th>
                Date Sortie
              </th>
            </tr>
          </thead>
          <tbody>
            @forelse ($presences as $presence)
            <tr>
              <td>
                {{ $presence->employe->nom }} {{ $presence->employe->prenom }} 
              </td>
              <td>
                {{ $presence->dateEntree }} 
              </td>
              <td>
                {{ $presence->dateSortie }} 
              </td>
            </tr>
            @empty
              <p>aucune presence</p>
            @endforelse

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@endsection
