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
        <input type="text" id="searchInput" placeholder="Search...">
        </div>
    <br>
      <h3 class="card-description">
        Conges disponible actuellement <span style="color:red;"> {{ $congerestant  }} jours</span>
      </h3>
      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>
                Type Conge
              </th>
              <th>
               Date debut
              </th>
              <th>
                Duree
              </th>
              <th>
                etat
              </th>
              <th>
                Choisisseur
              </th>
            </tr>
          </thead>
          <tbody>
            @forelse ($conges as $conge)
            <tr>
              <td>
                {{ $conge->type_conge->nom }} 
              </td>
              <td>
                {{ $conge->dateDebut }} 
              </td>
              <td>
                {{ $conge->duree }} 
              </td>
              <td>
                {{ $conge->etat }} 
              </td>
              <td>
                {{ $conge->choisisseur }} 
              </td>
            </tr>
            @empty
              <p>aucune demande</p>
            @endforelse

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@endsection
