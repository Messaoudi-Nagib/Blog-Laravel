@extends("_includes.template")

@section("content")


    <div class="d-flex flex-column justify-content-center align-items-center h-100">
        <h4>Editer un article</h4>
        <form action="{{ route("posts.update", [$post->id] ) }}" method="POST">


            {{ csrf_field() }}
            {{ method_field('PATCH') }}

            <div class="form-group">
                <label for="title">Titre</label>
                <input id="title" type="text" class="form-control"
                       placeholder="Titre : " name="titre" value="{{ old("titre") ?? $post->titre }}">
            </div>

            <div class="form-group">
                <label for="content">Contenu</label>
                <textarea id="content"  class="form-control"
                          placeholder="Contenu :" name="contenu">{{ old('contenu') ?? $post->contenu }}</textarea>
            </div>


                <div class="d-flex justify-content-between align-items-center">
            <button type="submit" class="btn btn-outline-primary">Modifier</button>


        </form>

        <form action="{{ route("posts.destroy", [$post]) }}" method="POST">
            {{ csrf_field() }}
            {{ method_field("DELETE") }}
            <button type="submit" class="btn btn-outline-danger">Supprimer</button>


        </form>
    </div>

    </div>
    </div>
@endsection
