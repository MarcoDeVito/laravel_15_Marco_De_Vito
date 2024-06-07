<x-main>

    <div class="px-4 px-md-5 mb-5">
        <div class="row gx-5 justify-content-center ">
            <div class="col-lg-8 col-xl-6 border p-5 rounded">

                <form action="{{route("articles.store")}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-floating mb-3">
                        <input class="form-control" id="title" value="{{old('title')}}" name="title" type="text">
                        <label for="title">Titolo Articolo</label>
                        @error('title')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <textarea class="form-control" id="body" name="body">{{old('body')}}</textarea>
                        <label for="body">Corpo Articolo</label>
                        @error('body')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-control mb-3">

                        @forelse ( $categories as $category)
                            <div class="form-check">
                                 <input class="form-check-input" type="checkbox" id="category_id" name="categories[]"
                                value="{{ $category->id}}">
                            <label class="form-check-label" for="category_id">{{$category->name}}</label>
                            </div>
                            @empty
                                Nessun categoria, <a href="{{route("categories.create")}}">creane una</a>
                            @endforelse
                           



                    </div>
                    <div class="form-floating mb-3">
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
