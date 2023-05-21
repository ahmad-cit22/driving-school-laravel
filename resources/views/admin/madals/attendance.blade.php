 @csrf
 <input type="hidden" name="id" value="{{ $enroll->id }}">
 <div class="mb-2">
     <label class="form-label">Student Name</label>
     <input type="text" class="form-control" id="name" name="name" value="{{ $enroll->user->name }}" readonly>
     @error('name')
         <div class="invalid-feedback">{{ $message }}</div>
     @enderror
 </div>

 <div class="mb-2">
     <label class="form-label">Class No.</label>
     <select name="class_no" class="form-select select2 @error('class_no')is-invalid @enderror" style="cursor: pointer;">
         <option value="0">-- Select Class No. --</option>
         <option value="{{ $attendances->count() + 1 }}" selected>Class No - {{ $attendances->count() + 1 }}</option>
     </select>
     @error('class_no')
         <div class="invalid-feedback">{{ $message }}</div>
     @enderror
 </div>

 <div class="mb-2">
     <label class="form-label">Date</label>
     <input type="date" class="form-control" id="date" name="date" value="{{ $current_date }}">
     @error('date')
         <div class="invalid-feedback">{{ $message }}</div>
     @enderror
 </div>

 <div class="error"></div>
