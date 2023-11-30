<style>
    .myFlex {
        display: flex;
        /* gap: 3rem; */
        justify-content: space-around;
    }
    .suplement{
        width: 20%;
    }
    .myCompany{
        width: 20%;
    }

</style>
<div class="fournisseurCompany">
    <h1>{{ $fournisseur->nom }}</h1>
    <h4>{{ $fournisseur->adresse }}</h4>
    <h4>{{ $fournisseur->email }}</h4>
    <h4>{{ $fournisseur->telephone }}</h4>

</div>
<hr>
<div class="myFlex" style="display: flex">
    <div class="myCompany">
        <h3>myCompany</h3>
        <h4>contact</h4>
        <h4>adress</h4>
    </div>
    <div class="suplement" style="background: red" >
        <h4>date : 20/11/2023</h4>
    </div>
</div>

<table border="1">
    <thead>
        <tr>
            <th>Produit</th>
            <th>Prix unitaire</th>
            <th>nature</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $produit->nom }}</td>
            <td>{{ $prixProduit->prix }} ar</td>
            <td>{{ $produit->nature }}</td>
        </tr>
    </tbody>
</table>

<div class="total">
    <h3>Prix total : {{ $prixProduit->prix }} ar</h3>
</div>
