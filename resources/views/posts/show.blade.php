@extends("_includes.template")

@section("content")

    <div class="post mt-3">
        <div id="post" class="informations d-flex justify-content-between">
            <h2>
                {{ $post->titre }}
            </h2>

            <div>

            <a href="{{ route("posts.index") }}">

                <button class="btn btn-info">Retour</button>
            </a>

            <a href="{{ route("posts.edit", [$post->id]) }}">

                <button class="btn btn-outline-secondary">Edition</button>
            </a>

            </div>

        </div>
        <hr>
        <p>
            {{ $post->contenu }}
        </p>

    </div>
@endsection
