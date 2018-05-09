<form method="POST" action="/movies/rate/{{$movie->id}}">
        @csrf

        <div class="form-group m-1">
            <label for="rate">write a short review: </label>
            <input type="text" class="form-control" placeholder="what a great movie" name="review">
        </div>

        <div class="form-group">
            <label for="rate" class="sr-only">Rate the movie: </label>
            <select name="rate" id="rate" class="p-1">
                <option value="1">1</option>    
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
            <input type="submit" value="Rate" class="btn btn-primary m-2"/>
        </div>
        
        @include('layouts.errors')
</form>