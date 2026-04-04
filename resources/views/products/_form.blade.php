{{-- Reusable form fields for Create and Edit --}}

<div class="mb-3">
    <label class="form-label">Product Name *</label>
    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
           value="{{ old('name', $product->name ?? '') }}" required>
    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label class="form-label">Description *</label>
    <textarea name="description" rows="3"
              class="form-control @error('description') is-invalid @enderror"
              required>{{ old('description', $product->description ?? '') }}</textarea>
    @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Price (₱) *</label>
        <input type="number" step="0.01" name="price"
               class="form-control @error('price') is-invalid @enderror"
               value="{{ old('price', $product->price ?? '') }}" required>
        @error('price') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Stock *</label>
        <input type="number" name="stock"
               class="form-control @error('stock') is-invalid @enderror"
               value="{{ old('stock', $product->stock ?? 0) }}" required>
        @error('stock') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Category *</label>
        <select name="category" class="form-select @error('category') is-invalid @enderror" required>
            <option value="">Select...</option>
            @foreach(['Men', 'Women', 'Kids', 'Unisex'] as $cat)
                <option value="{{ $cat }}" {{ old('category', $product->category ?? '') == $cat ? 'selected' : '' }}>
                    {{ $cat }}
                </option>
            @endforeach
        </select>
        @error('category') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Size *</label>
        <select name="size" class="form-select @error('size') is-invalid @enderror" required>
            <option value="">Select...</option>
            @foreach(['XS', 'S', 'M', 'L', 'XL', 'XXL', 'Free Size'] as $size)
                <option value="{{ $size }}" {{ old('size', $product->size ?? '') == $size ? 'selected' : '' }}>
                    {{ $size }}
                </option>
            @endforeach
        </select>
        @error('size') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>

<div class="mb-3">
    <label class="form-label">Product Image</label>
    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" accept="image/*">
    @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror

    {{-- Show current image on edit --}}
    @if(!empty($product->image))
        <img src="{{ asset('storage/' . $product->image) }}"
             class="mt-2 rounded" style="height:100px;" alt="current image">
        <p class="text-muted small mt-1">Leave blank to keep current image.</p>
    @endif
</div>