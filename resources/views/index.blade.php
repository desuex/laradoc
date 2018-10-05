@extends('master')

@section('title') Scientists List @endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h3>Scientists List</h3>
            <a href="{{route('scientists.create')}}">Add new to list</a>
            <table class="table table-striped">
                <tr>
                    <th>ID</th>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Status</th>
                    <th>Operations</th>
                </tr>

                @forelse($scientists as $scientist)
                    <tr>
                        <td>{{ $scientist->getId() }}</td>
                        <td>{{ $scientist->getFirstname() }}</td>
                        <td>{{ $scientist->getLastname() }}</td>
                        <td>
{{--                            @if($scientist->isDone())--}}
                                {{--Done--}}
                            {{--@else--}}
                                {{--Not Done--}}
                            {{--@endif--}}
                        </td>
                        <td></td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">No scientists in the list... for now!</td>
                    </tr>
                @endforelse
            </table>
        </div>
    </div>
@endsection