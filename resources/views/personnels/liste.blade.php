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
      <h4 class="card-title">Liste personnels</h4>
      <p class="card-description">
        Filtre <code>Liste employers</code>
      </p>
      <div class="search-container">
        <input type="text" id="searchInput" placeholder="Search...">
        </div>
      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>
                User
              </th>
              <th>
                First name
              </th>
              <th>
                Fonction
              </th>
              <th>
                Direction
              </th>
              <th>
                Date Embauche
              </th>
            </tr>
          </thead>
          <tbody>
            @forelse ($employes as $employe)
            <tr>
              <td class="py-1">
                <img src="{{ route('getfile', ['folder' => 'app/employes', 'filename' => 'face1.jpg']) }}" alt="Image">
              </td>
              <td>
                {{ $employe->nom }}
                {{ $employe->prenom }} 
              </td>
              <td>
                {{ $employe->fonction->nom }}
              </td>
              <td>
                {{ $employe->direction->nom }}
              </td>
              <td>
                {{ $employe->dateEmbauche }}
              </td>
            </tr>
            @empty
              <p>aucuns employes</p>
            @endforelse

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@endsection
