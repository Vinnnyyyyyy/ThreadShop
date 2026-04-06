{{-- Reusable form fields --}}

<div class="mb-4">
    <label class="block text-zinc-300 font-semibold mb-1">Product Name *</label>
    <input type="text" name="name"
           class="w-full bg-[#111111] border border-zinc-700 text-white px-4 py-2 rounded-lg focus:outline-none focus:border-[#ffaa00] @error('name') border-red-500 @enderror"
           value="{{ old('name', $product->name ?? '') }}" required>
    @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
</div>

<div class="mb-4">
    <label class="block text-zinc-300 font-semibold mb-1">Description *</label>
    <textarea name="description" rows="3"
              class="w-full bg-[#111111] border border-zinc-700 text-white px-4 py-2 rounded-lg focus:outline-none focus:border-[#ffaa00] @error('description') border-red-500 @enderror"
              required>{{ old('description', $product->description ?? '') }}</textarea>
    @error('description') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
</div>

<div class="grid grid-cols-2 gap-4 mb-4">
    <div>
        <label class="block text-zinc-300 font-semibold mb-1">Price (₱) *</label>
        <input type="number" step="0.01" name="price"
               class="w-full bg-[#111111] border border-zinc-700 text-white px-4 py-2 rounded-lg focus:outline-none focus:border-[#ffaa00] @error('price') border-red-500 @enderror"
               value="{{ old('price', $product->price ?? '') }}" required>
        @error('price') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
    </div>
    <div>
        <label class="block text-zinc-300 font-semibold mb-1">Stock *</label>
        <input type="number" name="stock"
               class="w-full bg-[#111111] border border-zinc-700 text-white px-4 py-2 rounded-lg focus:outline-none focus:border-[#ffaa00] @error('stock') border-red-500 @enderror"
               value="{{ old('stock', $product->stock ?? 0) }}" required>
        @error('stock') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
    </div>
</div>

<div class="grid grid-cols-2 gap-4 mb-4">
    <div>
        <label class="block text-zinc-300 font-semibold mb-1">Category *</label>
        <select name="category"
                class="w-full bg-[#111111] border border-zinc-700 text-white px-4 py-2 rounded-lg focus:outline-none focus:border-[#ffaa00] @error('category') border-red-500 @enderror"
                required>
            <option value="">Select...</option>
            @foreach(['Men', 'Women', 'Kids', 'Unisex'] as $cat)
                <option value="{{ $cat }}" {{ old('category', $product->category ?? '') == $cat ? 'selected' : '' }}>
                    {{ $cat }}
                </option>
            @endforeach
        </select>
        @error('category') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
    </div>
    <div>
        <label class="block text-zinc-300 font-semibold mb-1">Size *</label>
        <select name="size"
                class="w-full bg-[#111111] border border-zinc-700 text-white px-4 py-2 rounded-lg focus:outline-none focus:border-[#ffaa00] @error('size') border-red-500 @enderror"
                required>
            <option value="">Select...</option>
            @foreach(['XS', 'S', 'M', 'L', 'XL', 'XXL', 'Free Size'] as $size)
                <option value="{{ $size }}" {{ old('size', $product->size ?? '') == $size ? 'selected' : '' }}>
                    {{ $size }}
                </option>
            @endforeach
        </select>
        @error('size') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
    </div>
</div>

<div class="mb-6">
    <label class="block text-zinc-300 font-semibold mb-1">Product Image</label>
    <input type="file" name="image" accept="image/*"
           class="w-full bg-[#111111] border border-zinc-700 text-zinc-300 px-4 py-2 rounded-lg focus:outline-none focus:border-[#ffaa00] @error('image') border-red-500 @enderror">
    @error('image') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror

    @if(!empty($product->image))
        <img src="{{ asset('storage/' . $product->image) }}"
             class="mt-3 h-24 rounded-lg border border-zinc-700" alt="current image">
        <p class="text-zinc-500 text-xs mt-1">Leave blank to keep current image.</p>
    @endif
</div>