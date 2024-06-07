<x-main>
    <div class="container">

        <div class="row g-5">
            <div class="col-md-8">


                <article class="blog-post">
                    <h1 class="display-5 link-body-emphasis mb-1">{{ $category->name }}</h2>




                        <p>Articoli:</p>
                        <ul>
                            @forelse ($category->articles as $article)
                                <li>
                                    <h2><a href="{{route('articles.show',$article)}}">{{ $article->title }}</a></h2>
                                    <img class="card-img-top" style="width:3rem" src="{{Storage::url($article->image ?? "/template/assets/book.png")}}" alt="{{$article->title}}" />
                                    
                                   
                                    <p class="blog-post-meta"> Scritto da <a href="{{route('articles.user',$article->user->name)}}">{{$article->user->name}}</a> il {{$article->created_at}}</p>
    
                                  


                                </li>
                            @empty
                                Nessuna
                            @endforelse
                        </ul>

                </article>


            </div>

        </div>
    </div>
</x-main>
