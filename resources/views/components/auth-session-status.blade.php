@props(['status','title'=>'ملاحظة !'])

@if ($status)

<div dir="rtl" {{ $attributes->merge(['class'=>"alert alert-info alert-dismissible fade show" ])}} role="alert">
    <span class="alert-icon mx-2"><i class="ni ni-like-2"></i></span>
    <span class="alert-text text-white"><strong>
    {{ $title }}
    <br>
    </strong> {{ $status }}</span>
    <button type="button" class="btn-close"  data-bs-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
