@extends("_includes.template")

@section("content")


    <div class="d-flex flex-column justify-content-center align-items-center h-100">
        <h4>S'enregistrer</h4>
        <form action="/users" method="POST">


            {{ csrf_field() }}

            <div class="form-group">
                <label for="firstname">FirstName</label>
                <input id="firstname" type="text" class="form-control"
                       placeholder="FirstName :" name="firstname">
            </div>

            <div class="form-group">
                <label for="lastname">LastName</label>
                <input id="lastname" type="text" class="form-control"
                       placeholder="LastName :" name="lastname">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" class="form-control"
                       placeholder="Email" name="email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.
                </small>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Password" name="password">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Password Confirmation</label>
                <input type="password" class="form-control" id="password" name="password_confirmation" placeholder="Password Confirmation">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
