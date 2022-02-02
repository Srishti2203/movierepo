@extends('layouts.app')

@section('content')

       
        <!DOCTYPE html>
    <html>
    <head>
        <title>Movie Project</title>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    </head>
 <body background="/upload/m7.jpg">
    <div class="row">
     <div class="col-md-2">
        <div class="form-group">
           <form method="get" action="/display-movie">
            <input type="hidden" name="playlist" value="0">
             <button type="submit" class="btn btn-outline-info">Public Playlist</button>
           </form>
        </div>
     </div>
     <div class="col-md-2">
        <div class="form-group">
           <form method="get" action="/display-movie">
            <input type="hidden" name="playlist" value="1">
             <button type="submit" class="btn btn-outline-info">Private Playlist</button>
           </form>
        </div>
     </div>
   </div>
    <div class="container">
         <h1 class="text-center mt-5" style="color: white"><span style="color: #377fd9">Movie Library</span> Web Application</h1>
        <form id="movieForm" autocomplete="off">
        <div class="row">
        <div class="col-md-10">
             <div class="form-group">
            <!-- <label for="Movie">Movie Name</label> -->
            <input class="form-control" type="text" id="movie" placeholder="Movie Name Search">
        </div>
        <br>
        </div>
        <div class="col-md-2">
            <div class="form-group">
            <button class="btn btn-info btn-block">
                Search Movie
            </button>
        </div>
        </div>
       </div>
       </form>
    <div id="result"></div>
    </div>

  

 </body>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
       
        $(document).ready(function(){

            var apikey ="ba1f4581"

            $("#movieForm").submit(function(event){
                event.preventDefault()

                var movie =$("#movie").val()

                var result =""

                var url ="http://www.omdbapi.com/?apikey="+apikey


                $.ajax({
                    method:'GET',
                    url:url+"&t="+movie,
                    success:function(data){
                        console.log(data);
                        if(data.Response != "False"){
                            result =`
                                  <img style ="float:left" class ="img-thumnail" width="200" height ="200" src ="${data.Poster}"/>
                                  <div class="movi-details" style="padding: 0px 0px 62px 241px;">   
                                    <h4 style="color:#dfe6f9">${data.Title}</h4>
                                    <h5 style="color:#dfe6f9">${data.Released}</h5>
                                    <p style="color:#dfe6f9">${data.Runtime}</p>
                                    <p style="color:#dfe6f9">${data.Genre}</p>
                                    <p style="color:#dfe6f9">${data.Director}</p>
                                    <p style="color:#dfe6f9">${data.Actors}</p>
                                    </div>
                                    <form method="post" action="{{url('movie-playlist')}}">
                                        @csrf
                                    <input type="hidden" name="movieName" style="color:white" 
                                    value="${data.Title}">
                                    <input type="hidden" name="Released" 
                                    value="${data.Released}">
                                    <input type="hidden" name="Runtime" 
                                    value="${data.Runtime}">
                                    <input type="hidden" name="Genre" 
                                    value="${data.Genre}">
                                    
                                    <input type="hidden" name="Actors" 
                                    value="${data.Actors}">
                                    <input type="hidden" name="Director" 
                                    value="${data.Director}">
                                    <input type="hidden" name="Poster" 
                                    value="${data.Poster}">

                                    
                                    <button class="btn btn-info" id="show-pop-up">Add To Playlist</button>
                                   </form>
                             `;                         
                                
                            $("#result").html(result);
                               
                        }else{
                            result =`
                                  <h1>Movie Not Found !</h1>
                                   
                             `;                         
                                
                            $("#result").html(result);
                        }
                        
                    },

                     
                })
 
            })
        })
    </script>
    </html>
    
@endsection
