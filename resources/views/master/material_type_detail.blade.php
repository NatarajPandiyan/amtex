@extends('layouts.app')
@push('css-script')
<style>
    .invalid{
        color:red;
    }
    .card .card-body
{
    padding:10px;
}
.card-header
{
    padding:10px;       
}
</style>
@endpush
@section('content')
<section id="basic-vertical-layouts">
                    <div class="row match-height">
                        <div class="col-md-12 col-12">
                            <div class="col-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title mb-3 border-bottom">MaterialType</h4>
                                    <h4 class="card-title mb-3">{{$mode}}</h4>
                                </div>

                                <div class="card-content">
                                    <div class="card-body">
                                    @if($mode=='Edit')
                                        <form class="form form-vertical" id="materialtype" method="post" action="/materialtype/update">
                                            <input type="hidden" name="id" value="{{$materialType->id}}">
                                    @else
                                    <form class="form form-vertical" id="materialtype" method="post" action="/materialtype/save">
                                    @endif
                                        @csrf
                                        <div class="form-body">
                                            
                                                <div class="col-12">
                                              
                                                  <div class="row">
                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label for="first-name-vertical">Material Name</label>
                                                            <input type="text" id="name" value="{{old('name',$materialType->material_name)}}"
                                                                class="form-control" name="name"
                                                                placeholder="Material Name">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label for="email-id-vertical">Width</label>
                                                            <input type="text" id="width" value="{{old('width',$materialType->width)}}"
                                                                class="form-control" name="width"
                                                                placeholder="Width">
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="row">
                                                    
                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label for="contact-info-vertical">Diamention</label>
                                                            <input type="text" id="diamention" value="{{old('dimension',$materialType->dimension)}}"
                                                                class="form-control" name="diamention"
                                                                placeholder="Diamention">
                                                        </div>
                                                    </div>
                                                   
                                                        <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label for="password-vertical">Thickness</label>
                                                            <input type="text" id="thickness" value="{{old('thickness',$materialType->thickness)}}"
                                                                class="form-control" name="thickness"
                                                                placeholder="Thickness">
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="row">
                                                    <div class="col-6">
                                                        <div class='form-check'>
                                                            <div class="checkbox mt-2">
                                                            @if($mode=='Edit')
                                                            <input type="checkbox" name="status" class="form-check-input" {{ ($materialType->isactive=='1') ? 'checked' : ''}} > IsActive
                                                            @else
                                                            <input type="checkbox" name="status" class="form-check-input"  checked="checked" > IsActive
                                                            @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 d-flex justify-content-end">
                                                        <button type="submit"
                                                            class="btn btn-primary me-1 mb-1">Submit</button>

                                                </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </section>
@stop

    @push('js-plugin')
    <script src="{{asset('./js/jquery.validate.min.js')}}"></script>
    @endpush
    @push('js-script')
    <script>
(function ($) {

"use strict";
$("#materialtype").validate({
    rules: {
        name: {
            required: true,
        },
        width: {
             required: true,
             number:true
         },
         thickness: {
             required: true,
             number:true
         },
         diamention: {
             required: true,
             number:true,
         }
    },
    messages: {
        name: {
            required: 'This field is Required ',
        },
        width: {
             required: 'This field is Required ',
             number:'Only Number Allowed'
        },
        thickness: {
             required: 'This field is Required ',
             umber:'Only Number Allowed'
         },
       
         diamention:{
             required: 'This field is Required ',
             number:'Only Number Allowed',
        }

    },
    errorPlacement: function (error, element) {
        error.insertAfter(element.parent());
    }
});
})(jQuery);
</script>
@endpush