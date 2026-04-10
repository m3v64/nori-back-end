@extends('layouts.wireframe')

@section('title', 'Add Menu Item - Nori')

@section('content')
      <!-- Breadcrumb -->
      <div class="breadcrumb">
        <a href="{{ route('menu.index') }}">Menu</a>
        <span class="breadcrumb-separator">&rsaquo;</span>
        <span>Add Item</span>
      </div>

      <section class="section" style="max-width: 640px;">
        <h2 class="page-title">Add Menu Item</h2>

        <form action="{{ route('menu.store') }}" method="POST">
          @csrf

          <div class="card-bordered" style="padding: var(--space-md);">
            <div class="form-group mb-md">
              <label class="form-label" for="restaurant_id">Restaurant</label>
              <select name="restaurant_id" id="restaurant_id" class="form-select" style="width: 100%;">
                <option value="">Select a restaurant</option>
                @foreach (\App\Models\Restaurant::all() as $restaurant)
                  <option value="{{ $restaurant->id }}" @selected(old('restaurant_id') == $restaurant->id)>{{ $restaurant->name }}</option>
                @endforeach
              </select>
              @error('restaurant_id')
                <p class="text-small" style="color: var(--danger); margin-top: var(--space-xs);">{{ $message }}</p>
              @enderror
            </div>

            <div class="form-group mb-md">
              <label class="form-label" for="name">Name</label>
              <input type="text" name="name" id="name" class="form-input" placeholder="Dish name" value="{{ old('name') }}">
              @error('name')
                <p class="text-small" style="color: var(--danger); margin-top: var(--space-xs);">{{ $message }}</p>
              @enderror
            </div>

            <div class="form-group mb-md">
              <label class="form-label" for="description">Description</label>
              <textarea name="description" id="description" class="form-input" rows="3" placeholder="A short description of the dish">{{ old('description') }}</textarea>
              @error('description')
                <p class="text-small" style="color: var(--danger); margin-top: var(--space-xs);">{{ $message }}</p>
              @enderror
            </div>

            <div class="form-group mb-md">
              <label class="form-label" for="image">Image URL</label>
              <input type="text" name="image" id="image" class="form-input" placeholder="https://..." value="{{ old('image') }}">
              @error('image')
                <p class="text-small" style="color: var(--danger); margin-top: var(--space-xs);">{{ $message }}</p>
              @enderror
            </div>

            <div class="form-group mb-md">
              <label class="form-label" for="ingredients">Ingredients</label>
              <textarea name="ingredients" id="ingredients" class="form-input" rows="2" placeholder="List of ingredients">{{ old('ingredients') }}</textarea>
              @error('ingredients')
                <p class="text-small" style="color: var(--danger); margin-top: var(--space-xs);">{{ $message }}</p>
              @enderror
            </div>

            <div class="form-group mb-md">
              <label class="form-label" for="allergies">Allergies</label>
              <input type="text" name="allergies" id="allergies" class="form-input" placeholder="e.g. Gluten, Soy, Fish" value="{{ old('allergies') }}">
              @error('allergies')
                <p class="text-small" style="color: var(--danger); margin-top: var(--space-xs);">{{ $message }}</p>
              @enderror
            </div>

            <div class="form-group mb-md">
              <label class="form-label" for="price">Price (in cents)</label>
              <input type="number" name="price" id="price" class="form-input" placeholder="e.g. 1250 for €12.50" min="0" value="{{ old('price') }}">
              @error('price')
                <p class="text-small" style="color: var(--danger); margin-top: var(--space-xs);">{{ $message }}</p>
              @enderror
            </div>

            <div class="flex gap-sm">
              <button type="submit" class="btn btn-primary btn-sm">Add Item</button>
              <a href="{{ route('menu.index') }}" class="btn btn-secondary btn-sm">Cancel</a>
            </div>
          </div>
        </form>
      </section>
@endsection
