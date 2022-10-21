<form action="{{ route($route, $plate->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method($method)

    <div class="row">
        <div class="col-xs-12 col-lg-4">
            {{-- Nome --}}
            <div class="form-group">
                <label for="input-name">Nome*</label>
                <input required name="name" type="text" class="form-control" id="input-name" placeholder="Inserisci nome piatto"
                    minlength="3" maxlength="255"
                    value="{{old('name', $plate->name)}}">
                <div>
                    <small class="form-text text-muted fs-small px-2">Min:3 - Max:255 caratteri.</small>
                </div>
                @error('name')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
                @enderror
            </div>
    
            {{-- Prezzo --}}
            <div class="form-group ">
                <label for="input-price">Prezzo* (€)</label>
                <input required name="price" type="number" step="0.01" class="form-control" id="input-price" placeholder="Inserisci prezzo"
                    min="0"
                    value="{{old('price', $plate->price)}}">
                @error('price')
                    <div class="alert alert-danger" role="alert">
                        {{$message}}
                    </div>
                @enderror
            </div>
    
            {{-- Sconto --}}
            <div class="form-group ">
                <label for="input-discount">Sconto* (in percentuale)</label>
                <input required name="discount" type="number" step="1" class="form-control" id="input-discount" placeholder="Inserisci sconto"
                    min="0" max="100"    
                    value="{{old('discount', $plate->discount)}}">
                @error('discount')
                    <div class="alert alert-danger" role="alert">
                        {{$message}}
                    </div>
                @enderror
            </div>
    
            {{-- Immagine --}}
            <div class="form-group ">
                <label for="input-image">Immagine</label>
                <input name="image" type="file" class="form-control" id="input-image"
                    accept="image/png, image/jpeg, image/jpg"
                    value="{{old('image', $plate->image)}}">
                <div>
                    <small class="form-text text-muted fs-small px-2">Max: 2MB</small>
                </div>
                @error('image')
                    <div class="alert alert-danger" role="alert">
                        {{$message}}
                    </div>
                @enderror
            </div>


            {{-- Disponibilità --}}
            <div class="form-group">
                <div>
                    <label class="d-block" for="input-avaible">Disponibilità*</label>
                </div>
                <div class="d-flex align-items-center mr-5 px-4">
                    <input class="form-check-input" type="radio" id="input-available" name="availability" value="1" {{old('availability', $plate->availability) == 1 ? 'checked' : '' }}>
                    <label class="mb-0" for="available">Disponibile</label>
                </div>
                <div class="d-flex align-items-center px-4">
                    <input class="form-check-input" type="radio" id="notAvailable" name="availability" value="0" {{old('availability', $plate->availability) == 0 ? 'checked' : '' }}>
                    <label class="mb-0"for="notAvailable">Non disponibile</label>
                </div>
                @error('availability')
                    <div class="alert alert-danger" role="alert">
                        {{$message}}
                    </div>
                @enderror
            </div>
        </div>


        <div class="col-xs-12 col-lg-8">
            {{-- Descrizione --}}
            <div class="form-group ">
                <label for="area-description">Descrizione*</label>
                <textarea name="description" id="area-description" rows="8" class="form-control" required minlength="5" maxlength="1000">{{old('description', $plate->description)}}</textarea>
                <div>
                    <small class="form-text text-muted fs-small px-2">Min:5 - Max:1000 caratteri.</small>
                </div>
                @error('description')
                    <div class="alert alert-danger" role="alert">
                        {{$message}}
                    </div>
                @enderror
            </div>

            {{-- Ingredienti --}}
            <div class="form-group ">
                <label for="area-ingredients">Ingredienti*</label>
                <textarea name="ingredients" id="area-ingredients" rows="8" class="form-control" required minlength="5" maxlength="1000">{{old('ingredients', $plate->ingredients)}}</textarea>
                <div>
                    <small class="form-text text-muted fs-small px-2">Min:5 - Max:1000 caratteri.</small>
                </div>
                @error('ingredients')
                    <div class="alert alert-danger" role="alert">
                        {{$message}}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 d-flex justify-content-end align-items-center w-100 p-3">
            {{-- Submit --}}
            <div class="ml-3">
                <button type="submit" class="btn btn-primary">Invio</button>
            </div>
        </div>
    </div>
</form>