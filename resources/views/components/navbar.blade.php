<nav class="nav nav-underline justify-content-between">
    @foreach ($categories as $category)
        <div class="nav-item nav-link link-body-emphasis active"><a href="{{route('categories.show',$category)}}">{{ $category->name }}</a>

            @auth
                <a href="{{ route('categories.edit', $category) }}"><svg xmlns="http://www.w3.org/2000/svg" width="15"
                        height="15" viewBox="0 0 24 24">
                        <path
                            d="M7.127 22.562l-7.127 1.438 1.438-7.128 5.689 5.69zm1.414-1.414l11.228-11.225-5.69-5.692-11.227 11.227 5.689 5.69zm9.768-21.148l-2.816 2.817 5.691 5.691 2.816-2.819-5.691-5.689z" />
                    </svg>
                </a>



                <!-- Button trigger modal -->
                <a data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <svg clip-rule="evenodd" fill-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2"width="18"
                        height="18" viewBox="0 0 24 24"xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="m4.015 5.494h-.253c-.413 0-.747-.335-.747-.747s.334-.747.747-.747h5.253v-1c0-.535.474-1 1-1h4c.526 0 1 .465 1 1v1h5.254c.412 0 .746.335.746.747s-.334.747-.746.747h-.254v15.435c0 .591-.448 1.071-1 1.071-2.873 0-11.127 0-14 0-.552 0-1-.48-1-1.071zm14.5 0h-13v15.006h13zm-4.25 2.506c-.414 0-.75.336-.75.75v8.5c0 .414.336.75.75.75s.75-.336.75-.75v-8.5c0-.414-.336-.75-.75-.75zm-4.5 0c-.414 0-.75.336-.75.75v8.5c0 .414.336.75.75.75s.75-.336.75-.75v-8.5c0-.414-.336-.75-.75-.75zm3.75-4v-.5h-3v.5z"
                            fill-rule="nonzero" />
                    </svg>
                </a>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <div class="modal-body">
                                Sei sicuro di voler cancellare la Categoria?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
                                <form action="{{route('categories.destroy', $category)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Cancella</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endauth
        </div>
    @endforeach
    <a class="nav-item nav-link link-body-emphasis active" href="{{ route('categories.create') }}">Nuova categoria</a>


</nav>
