<div class="mb-3">
   @if ($vessel->status == 1)
      <label class="form-label"><span class="badge bg-secondary me-1"></span>Docking</label>
      <div class="progress">
         <div class="progress-bar progress-bar-indeterminate bg-secondary"></div>
      </div>
      @elseif($vessel->status == 2)
      <label class="form-label"><span class="badge bg-info me-1"></span>Sailing</label>
      <div class="progress">
         <div class="progress-bar progress-bar-indeterminate bg-info"></div>
      </div>
   @endif
 </div>