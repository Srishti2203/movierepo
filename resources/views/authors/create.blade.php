@extends('layouts.app')

@section('content')

       
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Movie') }}</div>

                <div class="card-body">
                    <form action="{{route('authors.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">Movie</label>
                            <input type="text" name="name" class="form-control" id="name">
                        </div>
                        <button class="btn btn-primary">Save</button>
                    </form>

                </div>
            </div>
        </div>
    
@endsection
