  @csrf
  <input type="hidden" name="id" value="{{ $course->id }}">
  <div class="mb-2">
      <label class="form-label">Course Category</label>
      <select class="form-control cursor-pointer" name="course_category" id="course_category" required>
          <option value=""> -- Select Course Category -- </option>
          @foreach ($course_categories as $category)
              <option value="{{ $category->id }}" {{ $course->course_category == $category->id ? 'selected' : '' }}>{{ $category->category_name }}</option>
          @endforeach
      </select>
      @error('course_category')
          <div class="invalid-feedback">{{ $message }}</div>
      @enderror
  </div>
  <div class="mb-2">
      <label class="form-label">Course Type</label>
      <select class="form-control cursor-pointer" name="course_type" id="course_type" required>
          <option value=""> -- Select Course Type -- </option>
          @foreach ($course_types as $type)
              <option value="{{ $type->id }}" {{ $course->course_type == $type->id ? 'selected' : '' }}>{{ $type->type_name }}</option>
          @endforeach
      </select>
      @error('course_type')
          <div class="invalid-feedback">{{ $message }}</div>
      @enderror
  </div>
  <div class="mb-2">
      <label class="form-label">Course Title</label>
      <input type="text" class="form-control @error('course_title')is-invalid @enderror" name="course_title" value="{{ $course->course_title }}" placeholder="Enter Course Title" required>
      @error('course_title')
          <div class="invalid-feedback">{{ $message }}</div>
      @enderror
  </div>
  
