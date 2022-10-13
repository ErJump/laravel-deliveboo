<form action="{{ route($route, $plate->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method($method)

    {{-- Nome --}}
    <div class="form-group mb-4">
        <label for="name">Nome</label>
        <input required name="name" type="text" class="form-control" id="name" placeholder="Inserisci nome piatto"
            value="{{old('name', $plate->name)}}">
        @error('name')
        <div class="alert alert-danger" role="alert">
            {{$message}}
        </div>
        @enderror
    </div>

    {{-- Descrizione --}}
    <div class="form-group mb-4">
        <label for="description">Descrizione</label>
        <textarea name="description" id="description" cols="30" rows="10"
            class="form-control">{{old('description', $plate->description)}}</textarea>
        @error('description')
        <div class="alert alert-danger" role="alert">
            {{$message}}
        </div>
        @enderror
    </div>

    {{-- Ingredienti --}}
    <div class="form-group mb-4">
        <label for="ingredients">Ingredienti</label>
        <textarea name="ingredients" id="ingredients" cols="30" rows="10" class="form-control">
            {{old('ingredients', $plate->ingredients)}}
        </textarea>
        @error('ingredients')
        <div class="alert alert-danger" role="alert">
            {{$message}}
        </div>
        @enderror
    </div>
    
    {{-- Prezzo --}}
    <div class="form-group mb-4">
        <label for="price">Prezzo</label>
        <input required name="price" type="number" step="0.01" class="form-control" id="price" placeholder="Inserisci prezzo"
            value="{{old('price', $plate->price)}}">
        @error('price')
        <div class="alert alert-danger" role="alert">
            {{$message}}
        </div>
        @enderror
    </div>

    {{-- Sconto --}}
    <div class="form-group mb-4">
        <label for="discount">Sconto (percentuale)</label>
        <input required name="discount" type="number" step="1" class="form-control" id="discount" placeholder="Inserisci sconto"
            value="{{old('discount', $plate->discount)}}">
        @error('discount')
        <div class="alert alert-danger" role="alert">
            {{$message}}
        </div>
        @enderror
    </div>

    {{-- Immagine --}}
    <div class="form-group mb-4">
        <label for="image">Immagine</label>
        <input name="image" type="file" class="form-control" id="image"
            value="{{old('image', $plate->image)}}">
        @error('image')
        <div class="alert alert-danger" role="alert">
            {{$message}}
        </div>
        @enderror
    </div>

    {{-- Disponibilità--}}
    <div class="form-group mb-4">
        <label for="availability">Disponibile</label>
        <input class="form-check-input" type="checkbox" value="1" id="availability" name="availability" {{old('availability', $plate->availability) == 1 ? 'checked' : '' }}/>
        @error('availability')
        <div class="alert alert-danger" role="alert">
            {{$message}}
        </div>
        @enderror
    </div>

    {{-- Submit --}}
    <div class="w-100 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>