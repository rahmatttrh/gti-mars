@if (auth()->user()->hasRole('vessel'))
   @if ($vdr->status == 0 || $vdr->status == 101 || $vdr->status == 202 || $vdr->status == 303) 
   <a href="#" class="btn  btn-info" data-toggle="modal" data-target="#modalAddActivity">
      <i class="fa fa-plus"></i> Add
   </a>
   @endif
@endif

{{-- @if (auth()->user()->hasRole('administrator'))
<a href="#" class="btn  btn-info" data-toggle="modal" data-target="#modalAddActivity">
   <i class="fa fa-plus"></i> Add
</a>
@endif --}}


<table class=" table-striped  mt-2">
    <thead>
        <tr>
            <th colspan="2" class="text-center">TIME</th>
            <th colspan="8" class="text-center">Operation Mode Duration (hh::mm) <br> <small>Except Maintenance & Downtime</small> </th>
            <th rowspan="2" class="text-center align-middle">ACTIVITIES</th>
            <th rowspan="2" class="text-center align-middle">Action</th>
        </tr>
        <tr>
            <th class="text-center">Start</th>
            <th>Finish</th>
            <th>High</th>
            <th>Normal</th>
            <th>Slow</th>
            <th>Manu</th>
            <th>Idle</th>
            <th>Tow</th>
            <th>A/H</th>
            <th>S/B</th>
        </tr>
    </thead>
    <tbody>

        @php
        $totalHigh = 0;
        $totalNormal = 0;
        $totalSlow = 0;
        $totalManu = 0;
        $totalIdle = 0;
        $totalTow = 0;
        $totalAh = 0;
        $totalAb = 0;
        @endphp
        @foreach ($activities as $activity)
        <tr>
            <td class="text-info">{{substr($activity->start, 0, 5)}}  </td>
            <td class="text-danger">{{substr($activity->finish, 0, 5)}}</td>
            <td>{{getTotalHours($activity->high)}}</td>
            <td>{{getTotalHours($activity->normal)}}</td>
            <td>{{getTotalHours($activity->slow)}}</td>
            <td>{{getTotalHours($activity->manu)}}</td>
            <td>{{getTotalHours($activity->idle)}}</td>
            <td>{{getTotalHours($activity->tow)}}</td>
            <td>{{getTotalHours($activity->ah)}}</td>
            <td>{{getTotalHours($activity->sb)}}</td>
            <td>
               {{$activity->activity}}
            </td>
            <td>
               @if ($vdr->status == 0 || $vdr->status == 101 || $vdr->status == 202 || $vdr->status == 303) 
               <a href="#" data-toggle="modal" data-target="#editActivity-{{$activity->id}}"> Edit </a>
               <a href="#" class="text-danger" data-toggle="modal" data-target="#deleteActivity-{{$activity->id}}"> Delete </a>
               @endif
               
            </td>
        </tr>

        <!-- Modal Delete -->

        <div class="modal modal-blur fade" id="deleteAct-{{$activity->id}}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">

                    <form action="{{route('vdr.delete.activity')}}" method="POST">
                        <div class="modal-body">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{$activity->id}}" id="">
                            <div class="card-body">
                                @if ($errors->any())
                                <div class="alert alert-danger text-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li><small>{{ $error }}</small></li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                <h4 class="text-center"> Anda yakin ingin menghapussss activity {{$activity->activity}} ?</h4>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-link link-secondary me-auto" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-danger">Ya, Saya yakin </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- End Modal  -->


        <!-- Modal Edit -->

        <div class="modal modal-blur fade" id="editAct-{{$activity->id}}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                <div class="modal-content">

                    <form action="{{route('vdr.update.activity')}}" method="POST">
                        <div class="modal-body">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="vdr_id" value="{{$vdr->id}}">
                            <input type="hidden" name="id" value="{{$activity->id}}" id="">
                            <div class="card-body">
                                @if ($errors->any())
                                <div class="alert alert-danger text-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li><small>{{ $error }}</small></li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif

                                <div class="form-floating mb-3">
                                    <textarea type="text" rows="50" required class="form-control" id="activity" name="activity" value="{{$activity->activity}}">{{$activity->activity}}</textarea>
                                    <label for="activity">Activities</label>
                                    @error('activity')
                                    <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="row">
                                    <label for="email">Time</label>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="time" required class="form-control jam24" id="start" name="start" value="{{$activity->start}}" value="1">
                                            <label for="start">Start</label>
                                            @error('start')
                                            <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="time" required class="form-control jam24" id="finish" name="finish" value="{{$activity->finish}}" value="1">
                                            <label for="finish">Finish</label>
                                            @error('finish')
                                            <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form- mb-3">
                                            <label for="high">High</label>
                                            <input type="text" placeholder="HH.mm" class="form-control waktu" id="high" name="high" value="{{$activity->high}}">
                                            @error('high')
                                            <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form- mb-3">
                                            <label for="normal">Normal</label>
                                            <input type="text" placeholder="HH.mm" class="form-control waktu" id="normal" name="normal" value="{{$activity->normal}}">
                                            @error('normal')
                                            <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form mb-3">
                                            <label for="slow">Slow</label>
                                            <input type="text" placeholder="HH.mm" class="form-control waktu" id="slow" name="slow" value="{{$activity->slow}}">
                                            @error('slow')
                                            <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form mb-3">
                                            <label for="manu">Manu</label>
                                            <input type="text" placeholder="HH.mm" class="form-control waktu" id="manu" name="manu" value="{{$activity->manu}}">
                                            @error('manu')
                                            <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form mb-3">
                                            <label for="idle">Idle</label>
                                            <input type="text" placeholder="HH.mm" class="form-control waktu" id="idle" name="idle" value="{{$activity->idle}}">
                                            @error('idle')
                                            <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form mb-3">
                                            <label for="tow">Tow</label>
                                            <input type="text" placeholder="HH.mm" class="form-control waktu" id="tow" name="tow" value="{{$activity->tow}}">
                                            @error('tow')
                                            <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form mb-3">
                                            <label for="ah">A/H</label>
                                            <input type="text" placeholder="HH.mm" class="form-control waktu" id="ah" name="ah" value="{{$activity->ah}}">
                                            @error('ah')
                                            <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form mb-3">
                                            <label for="sb">S/B</label>
                                            <input type="text" placeholder="HH.mm" class="form-control waktu" id="sb" name="sb" value="{{$activity->sb}}">
                                            @error('sb')
                                            <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-link link-secondary me-auto" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- End Modal  -->
        @endforeach

        <tr>
            <td colspan="2" class="text-center">Total</td>
            @foreach ($operatings as $operating)
            @if($operating->heading->field)
            <td>{{getTotalHours($operating->time)}}</td>
            @endif
            @endforeach
        </tr>



    </tbody>
</table>