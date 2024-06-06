<x-main>

    <div class="px-4 px-md-5 mb-5">
        <div class="row gx-5 justify-content-center ">
            <div class="col-lg-8 col-xl-6 border p-5 rounded">

                <form action="{{route('articles.update',$article)}}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-floating mb-3">
                        <input class="form-control" id="title" value="{{$article->title}}" name="title" type="text">
                        <label for="title">Titolo Articolo</label>
                        @error('title')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <textarea class="form-control" id="body" name="body">{{$article->body}}</textarea>
                        <label for="body">Corpo Articolo</label>
                        @error('body')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-control mb-3">

                        @foreach ($categories as $category)
                        <div class="form-check">
                            <input class="form-check-input" @checked($article->categories->contains($category->id)) type="checkbox"
                                id="category_id" name="categories[]" value="{{ $category->id }}">
                            <label class="form-check-label" for="category_id">{{ $category->name }}</label>
                        </div>
                    @endforeach



                    </div>
                    <div class="form-floating mb-3">
                        <img width="100" src="{{Storage::url($article->image ?? "/template/assets/book.png")}}" alt="{{$article->slug}}"/>
                        <input class="form-control" id="image" name="image" value="" type="file">
                        @error('image')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="d-grid">
                        <button class="btn btn-primary btn-lg" type="submit">Salva</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-main>
