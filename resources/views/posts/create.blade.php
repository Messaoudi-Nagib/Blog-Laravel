@extends("_includes.template")

@section("content")


    <div class="d-flex flex-column justify-content-center align-items-center h-100">
        <h4>Ajouter un article</h4>
        <form action="{{ route('posts.store') }}" method="POST">


            {{ csrf_field() }}

            <div class="form-group">
                <label for="title">Titre</label>
                <input id="title" type="text" class="form-control"
                       placeholder="Titre : " name="titre" value="{{ old("titre") }}">
            </div>

            <div class="form-group">
                <label for="content">Contenu</label>
                <textarea id="content"  class="form-control"
                          placeholder="Contenu :" name="contenu" value="{{ old("contenu") }}"></textarea>
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
