<form action="{{ route($route, $plate->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method($method)

    <div class="row">
        <div class="col-xs-12 col-lg-4">
            {{-- Nome --}}
            <div class="form-group ">
                <label for="name">Nome</label>
                <input required name="name" type="text" class="form-control" id="name" placeholder="Inserisci nome piatto"
                    value="{{old('name', $plate->name)}}">
                @error('name')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
                @enderror
            </div>
    
            {{-- Prezzo --}}
            <div class="form-group ">
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
            <div class="form-group ">
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
            <div class="form-group ">
                <label for="image">Immagine</label>
                <input name="image" type="file" class="form-control" id="image"
                    value="{{old('image', $plate->image)}}">
                @error('image')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
                @enderror
            </div>
        </div>


        <div class="col-xs-12 col-lg-8">
            {{-- Descrizione --}}
            <div class="form-group ">
                <label for="description">Descrizione</label>
                <textarea name="description" id="description" rows="5"
                    class="form-control">{{old('description', $plate->description)}}</textarea>
                @error('description')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
                @enderror
            </div>

            {{-- Ingredienti --}}
            <div class="form-group ">
                <label for="ingredients">Ingredienti</label>
                <textarea name="ingredients" id="ingredients" rows="4" class="form-control">
                    {{old('ingredients', $plate->ingredients)}}
                </textarea>
                @error('ingredients')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
                @enderror
            </div>

            
        </div>
        <div class="col-xs-12 d-flex justify-content-end align-items-center w-100 p-3">
            {{-- Disponibilità--}}
            <div class="form-group mb-0 d-flex">
                <label for="availability">Disponibile</label>
                <input class="form-check-input" type="checkbox" value="1" id="availability" name="availability" {{old('availability', $plate->availability) == 1 ? 'checked' : '' }}/>
                @error('availability')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
                @enderror
            </div>

            {{-- Submit --}}
            <div class="ml-3">
                <button type="submit" class="btn btn-primary">Completa modifiche</button>
            </div>
        </div>
    </div>
</form>