@extends('master')

@section('title') Add a scientist @endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h3>Add new scientist</h3>
            <p>Use the following form to add a new scientist to the system.</p>

            <hr>

            <form action="{{ route('scientists.store') }}" method="post">
                {{ csrf_field() }}

                <p><input autofocus type="text" placeholder="First name" name="firstname" class="form-control" /></p>
                <p><input type="text" placeholder="Last name" name="lastname" class="form-control" /></p>

                <hr>

                <p><button class="form-control btn btn-success">Add</button></p>
            </form>
        </div>
    </div>
@endsection