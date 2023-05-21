@csrf
<input type="hidden" name="id" value="{{ $course->id }}">

<div class="mb-2">
    <label class="form-label">Course Category</label>
    <select name="category_id" class="form-select select2 @error('category_id')is-invalid @enderror" required>
        <option>Select an Option</option>
        @foreach ($course_categories as $course_category)
            <option value="{{ $course_category->id }}" {{ $course_category->id == $course->category_id ? 'selected' : '' }}>{{ $course_category->category_name }}</option>
        @endforeach
    </select>
    @error('category_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-2">
    <label class="form-label">Course Type</label>
    <select name="type_id" class="form-select select2 @error('type_id')is-invalid @enderror" required>
        <option>Select an Option</option>
        @foreach ($course_types as $course_type)
            <option value="{{ $course_type->id }}" {{ $course_type->id == $course->type_id ? 'selected' : '' }}>{{ $course_type->type_name }}</option>
        @endforeach
    </select>
    @error('type_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-2">
    <div class="img">
        <img class="mt-1" id="thumb-preview" src="{{ asset('assets/frontend/img/courses/' . $course->image) }}" alt="" width="100">
    </div>
    <label class="form-label">Course Thumbnail</label>
    <input type="file" class="form-control @error('image')is-invalid @enderror" name="image" onchange="document.getElementById('thumb-preview').src = window.URL.createObjectURL(this.files[0])" accept=".jpg, .png, jpeg, .gif, .webp" required>
    @error('image')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-2">
    <label class="form-label">Course Fee</label>
    <input type="number" class="form-control @error('price')is-invalid @enderror" name="price" value="{{ $course->price }}" placeholder="Enter The Course Fee (BDT)" required>
    @error('price')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-2">
    <label class="form-label">Discount</label>
    <input type="number" class="form-control @error('discount')is-invalid @enderror" name="discount" value="{{ old('discount') }}" placeholder="Enter Discount in Percentage (If Available)">
    @error('discount')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="mb-2">
    <label class="form-label">Sorting Priority</label>
    <input type="number" class="form-control @error('priority')is-invalid @enderror" name="priority" value="{{ $course->priority }}" placeholder="Enter The Priority Num" required>
    @error('priority')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="error"></div>
