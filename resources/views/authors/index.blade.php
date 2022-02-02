@extends('layouts.app')

@section('content')

     <body background="/upload/m7.jpg">> 
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Movie') }}
                    <a href="/home">Search Page</a>
                </div>


                <div class="card-body">
                    
                    <div class="mt-3">
                        <h3>Lists Of Movie</h3>
                         <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    
                                    <th>Movie Name</th>
                                    <th>Released</th>
                                    <th>Runtime</th>
                                    <th>Genre</th>                              
                                    <th>Actors</th>
                                    <th>Director</th>
                                   
                                    
                                </tr>
                            </thead>
                        <ul class="smooth-scroll list-unstyled">
                             @forelse($movie as $movies)

                            <tr>
                                 
                                    <td>{{$movies->movieName}}</td>
                                    <td>{{$movies->Released}}</td>
                                    <td>{{$movies->Runtime}}</td>
                                    <td>{{$movies->Genre}}</td>
                                   
                                    <td>{{$movies->Actors}}</td>
                                     <td>{{$movies->Director}}</td>
                            </tr>
                             @empty
                             <li class="list-group-item">No Author Added Yet</li>
                             @endforelse
                        </ul>
                        
                     </div>   

                </div>
            </div>
        </div>
    </body> 
@endsection
