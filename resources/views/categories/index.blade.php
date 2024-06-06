<x-main>
    <div class="rounded-3 py-5 px-4 px-md-5 mb-5">

        <div class="container mt-5">
            <div class="align-middle gap-2 d-flex justify-content-between">
                <h3>Elenco Categorie inserite</h3>
                <form class="d-flex" role="search" action="#" method="POST">
                    <input class="form-control me-2" name="search" type="search" placeholder="Cerca Articolo"
                        aria-label="Search">
                </form>
                <a href="#" class="btn btn btn-success me-md-2">
                    Crea Nuova Categoria
                </a>
            </div>
            <table class="table border mt-2">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <th scope="row">#1</th>

                        <td>Nome</td>

                        <td>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">

                                <a href="#" class="btn btn-primary me-md-2">
                                    Visualizza
                                </a>
                                <a href="#"" class="btn btn-warning me-md-2">
                                    Modifica
                                </a>
                                <form action="#" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger me-md-2">Elimina</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>

</x-main>
