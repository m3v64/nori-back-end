@extends('layouts.wireframe')

@section('title', 'Edit ' . $dish->name . ' - Nori')

@section('content')
      <!-- Breadcrumb -->
      <div class="flex items-center gap-2 text-xs py-4">
        <a href="{{ route('menu.index') }}">Menu</a>
        <span class="text-gray-400">&rsaquo;</span>
        <a href="{{ route('menu.show', $dish) }}">{{ $dish->name }}</a>
        <span class="text-gray-400">&rsaquo;</span>
        <span>Edit</span>
      </div>

      <section class="mb-12 max-w-xl">
        <h2 class="text-3xl font-bold mb-8 pb-4 border-b-2 border-medium-gray">Edit Menu Item</h2>

        <form action="{{ route('menu.update', $dish) }}" method="POST">
          @csrf
          @method('PUT')

          <div class="border border-medium-gray rounded p-6 bg-white">
            <div class="flex flex-col gap-2 mb-6">
              <label class="text-sm font-semibold" for="name">Name</label>
              <input type="text" name="name" id="name" class="text-sm px-4 py-3 border border-gray-400 rounded outline-none focus:border-2 focus:border-primary" placeholder="Dish name" value="{{ old('name', $dish->name) }}">
              @error('name')
                <p class="text-xs text-danger mt-1">{{ $message }}</p>
              @enderror
            </div>

            <div class="flex flex-col gap-2 mb-6">
              <label class="text-sm font-semibold" for="category">Category</label>
              <input type="text" name="category" id="category" class="text-sm px-4 py-3 border border-gray-400 rounded outline-none focus:border-2 focus:border-primary" placeholder="e.g. Ramen, Sushi, Appetizers" value="{{ old('category', $dish->category) }}">
              @error('category')
                <p class="text-xs text-danger mt-1">{{ $message }}</p>
              @enderror
            </div>

            <div class="flex flex-col gap-2 mb-6">
              <label class="text-sm font-semibold" for="description">Description</label>
              <textarea name="description" id="description" class="text-sm px-4 py-3 border border-gray-400 rounded outline-none focus:border-2 focus:border-primary resize-y min-h-20" rows="3" placeholder="A short description of the dish">{{ old('description', $dish->description) }}</textarea>
              @error('description')
                <p class="text-xs text-danger mt-1">{{ $message }}</p>
              @enderror
            </div>

            <div class="flex flex-col gap-2 mb-6">
              <label class="text-sm font-semibold" for="image">Image URL</label>
              <input type="text" name="image" id="image" class="text-sm px-4 py-3 border border-gray-400 rounded outline-none focus:border-2 focus:border-primary" placeholder="https://..." value="{{ old('image', $dish->image) }}">
              @error('image')
                <p class="text-xs text-danger mt-1">{{ $message }}</p>
              @enderror
            </div>

            <div class="flex flex-col gap-2 mb-6">
              <label class="text-sm font-semibold" for="ingredients">Ingredients</label>
              <textarea name="ingredients" id="ingredients" class="text-sm px-4 py-3 border border-gray-400 rounded outline-none focus:border-2 focus:border-primary resize-y" rows="2" placeholder="List of ingredients">{{ old('ingredients', $dish->ingredients) }}</textarea>
              @error('ingredients')
                <p class="text-xs text-danger mt-1">{{ $message }}</p>
              @enderror
            </div>

            <div class="flex flex-col gap-2 mb-6">
              <label class="text-sm font-semibold" for="allergies">Allergies</label>
              <input type="text" name="allergies" id="allergies" class="text-sm px-4 py-3 border border-gray-400 rounded outline-none focus:border-2 focus:border-primary" placeholder="e.g. Gluten, Soy, Fish" value="{{ old('allergies', $dish->allergies) }}">
              @error('allergies')
                <p class="text-xs text-danger mt-1">{{ $message }}</p>
              @enderror
            </div>

            <div class="flex flex-col gap-2 mb-6">
              <label class="text-sm font-semibold" for="price">Price (in cents)</label>
              <input type="number" name="price" id="price" class="text-sm px-4 py-3 border border-gray-400 rounded outline-none focus:border-2 focus:border-primary" placeholder="e.g. 1250 for €12.50" min="0" value="{{ old('price', $dish->price) }}">
              @error('price')
                <p class="text-xs text-danger mt-1">{{ $message }}</p>
              @enderror
            </div>

            <div class="flex gap-4">
              <button type="submit" class="inline-flex items-center justify-center h-8 px-4 text-sm font-semibold bg-primary text-white rounded hover:bg-primary-light hover:text-black cursor-pointer">Save Changes</button>
              <a href="{{ route('menu.show', $dish) }}" class="inline-flex items-center justify-center h-8 px-4 text-sm font-semibold border-2 border-black rounded hover:bg-light-gray no-underline text-black">Cancel</a>
            </div>
          </div>
        </form>
      </section>
@endsection
