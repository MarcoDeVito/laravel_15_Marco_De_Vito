<x-main>
    <div class="rounded-3 py-5 px-4 px-md-5 mb-5">

        <div class="container mt-5">
            <div class="align-middle gap-2 d-flex justify-content-between">
                <h3>Elenco Articoli inseriti</h3>
                <form class="d-flex" role="search" action="{{route("articles.search")}}" method="POST">
                    @csrf
                    <input class="form-control me-2" name="search" type="search" placeholder="Cerca Articolo"
                        aria-label="Search" value="{{old('search')}}"">
                    <button type="submit" class="btn btn-primary me-md-2">Cerca</button>
                </form>
                <a href="{{route("articles.create")}}" class="btn btn btn-success me-md-2">
                    Crea Nuovo Articolo
                </a>
            </div>
            <table class="table border mt-2">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Immagine</th>
                        <th scope="col">Titolo</th>
                        <th scope="col">Autore</th>
                        <th scope="col">Categorie</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($articles as $article )
                        <tr>
                              <th scope="row">{{$article->id}}</th>
                        <td>
                            <img class="card-img-top" style="width:3rem" src="{{Storage::url($article->image ?? "/template/assets/book.png")}}" alt="{{$article->title}}" />
                        </td>
                        <td>{{$article->title}}</td>

                        <td>{{$article->user->name}}</td>
                        <td>
                           @forelse ($article->categories as $category)
                               -{{$category->name}}
                           @empty
                               Nessuna categoria
                           @endforelse
                        </td>
                        <td>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">

                                <a href="{{route("articles.show",$article)}}" class="btn btn-primary me-md-2">
                                    Visualizza
                                </a>
                                @auth
                                    @if (auth()->user()->id==$article->user->id)
                                     <a href="{{route("articles.edit",$article)}}" class="btn btn-warning me-md-2">
                                    Modifica
                                </a>
                                <form action="{{route("articles.destroy",$article)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger me-md-2">Elimina</button>
                                </form>
                                @endif  
                                @endauth
                              
                               
                            </div>
                        </td> 
                        </tr>
                        @empty
                          <p>Non ci sono Articoli <a href="{{route("articles.create")}}">Creane Uno</a></p>  
                        @endforelse
                     
                </tbody>
            </table>

        </div>
    </div>

</x-main>
