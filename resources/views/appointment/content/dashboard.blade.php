@extends('appointment.appointment')

@section('content')
<div class="dashboard-doc-app" id="dashboard-doc-app"> 
    <div class="doc-app-head">
        <p class="display-6 font-mont font-bold"> Document Lists</p>
    </div>
    <small class="font-mont font-maroon notice-box d-flex flex-row w-100 mb-3">Please review your requirements and personal information first before scheduling an appointment.</small>
    {{-- <div class="d-flex flex-row font-mont justify-content-end mt-3">
        <div class="dropdown">
            <button class="btn btn-appoint dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Student Status
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" value="College" href="#">College</a></li>
                <li><a class="dropdown-item" value="High School" href="#">High School</a></li>
                <li><a class="dropdown-item" value="Masteral/Alumni" href="#">Masteral/Alumni</a></li>
            </ul>
        </div>
    </div> --}}
    <!--Starting sa document form-->
    <div class="accordion accordion-flush mb-1" id="accordionFlushExample">
    @foreach ($forms as $form)
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#{{ $form->id }}" aria-expanded="false" aria-controls="{{ $form->id }}">
                    {{ $form->name }}
                </button>
            </h2>
            <div id="{{ $form->id }}" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <div class="requirements d-flex flex-row flex-wrap fs-6">
                        <b class="me-1">Availability of the Service: </b> 
                        {{ $form->form_avail }}
                    </div>
                    <div class="requirements d-flex flex-column fs-6">
                    <b>Who May Avail the Service:  </b> 
                        {{ $form->form_who_avail }}
                    </div>
                    <div class="requirements d-flex flex-column fs-6">
                        <b>What Are the Requirements:</b> 
                            {{ $form->form_requirements }}
                    </div>
                    <div class="process">
                        <p class="fs-6"><b>Complete Processing Time: </b>
                            {{ $form->form_process }}</p>
                    </div>
                    <div class="fees">
                        <p class="fs-6"><b>Document Fee: </b>
                            {{ $form->fee }}</p>
                    </div>
                    <div class="max-time">
                        <p class="fs-6"><b>Maximum Time to Claim: </b>
                            {{ $form->form_max_time }}
                    </div>
                    <div class="row w-100 d-flex flex-row justify-content-end">
                        <button type="button" class="btn btn-appoint open-modal" style="background-color:maroon!important;" data-form-max-time="{{ $form->form_max_time }}" data-form-id="{{ $form->id }}" data-form-name="{{ $form->name }}" data-form-fee="{{ $form->fee }}">
                            Book Appoint
                        </button>
                    </div>

                </div>
            </div>
        </div>
    @endforeach
    </div>
    <!--endd sa document form-->
</div>
@endsection