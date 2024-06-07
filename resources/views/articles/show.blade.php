

    <x-main>
        <div class="container">
    
            <div class="row g-5">
                <div class="col-md-8">
    
    
                    <article class="blog-post">
                        <h2 class="display-5 link-body-emphasis mb-1">{{$article->title}}</h2>
                        <p class="blog-post-meta">{{$article->created_at}} by <a href="{{route('articles.user',$article->user->name)}}">{{$article->user->name}}</a></p>
    
                        <p>{{$article->body}}</p>
                       
                        <p>Categorie:</p>                    
                        <ul>
                            @forelse ($article->categories as $category)
                                <li><a href="{{route('categories.show',$category)}}">{{$category->name}}</a></li>
                            @empty
                                Nessuna
                            @endforelse
                        </ul>
                        
                    </article>
    
                    
                </div>
                
            </div>
        </div>
    </x-main>
    
