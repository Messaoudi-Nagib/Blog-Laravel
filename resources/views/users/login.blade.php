@extends("_includes.template")

@section("content")


    <div class="d-flex flex-column justify-content-center align-items-center h-100">
        <h4>Se connecter</h4>
        <form action="/users/login" method="POST">


            {{ csrf_field() }}

            <div class="form-group">
                <label for="email">Email :</label>
                <input id="email" type="text" class="form-control"
                       placeholder="Email" name="email">
            </div>

            <div class="form-group">
                <label for="password">Mot de passe : </label>
                <input id="password" type="password" class="form-control"
                       placeholder="Mot de passe" name="password">
            </div>



            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
