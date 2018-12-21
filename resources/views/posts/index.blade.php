@extends("_includes.template")

@section("content")
    <div class="row">
        <div class="col-12">
            <table class="table table-striped my-3">
                <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Titre</th>
                    <th>Auteur</th>
                    <th>Contenu</th>
                    <th>Date de création</th>
                    <th>Lien de l'article</th>
                </tr>
                </thead>
                <tbody>


                @foreach($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->titre }}</td>
                        <td>{{ "{$post->user->firstname} {$post->user->lastname}" }}</td>
                        <td>{{ $post->contenu }}</td>
                        <td>{{ Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</td>
                        <td><a href="{{ route("posts.show", [$post->id]) }}">
                                <btn class="btn btn-dark">Lire</btn>
                            </a>
                        </td>

                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>

@endsection
