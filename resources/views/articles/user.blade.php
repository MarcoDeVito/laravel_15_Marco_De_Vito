<x-main>
    <div class="container">

        <div class="row g-5">
            <div class="col-md-8">


                <article class="blog-post">
                    <h2 class="display-5 link-body-emphasis mb-1">{{ $user->name }}</h2>



                    <p><strong>Articoli:</strong></p>
                    
                        @forelse ($user->articles as $article)
                            <h3>{{ $article->id }}) {{ $article->title }}</h3>
                            <p>{{ $article->body }}</p>
                            <ul>
                                 @forelse ($article->categories as $category)
                                <li><a href="{{ route('categories.show', $category) }}">{{ $category->name }}</a></li>
                            @empty
                                Nessuna Categoria
                            @endforelse
                            </ul>
                           
                        @empty
                            <p>L'utente {{ $user->name }} non ha scritto nessun articolo</p>
                        @endforelse

                 

                </article>


            </div>

        </div>
    </div>
</x-main>
