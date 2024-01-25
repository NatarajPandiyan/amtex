@extends('layouts.app')
@push('css-script')
<style>
    .invalid{
        color:red;
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
                                    <h4 class="card-title">Model</h4>
                                    {{$mode}}
                                </div>

                                <div class="card-content">
                                    <div class="card-body">
                                    @if($mode=='Edit')
                                        <form class="form form-vertical" id="model" method="post" action="/model/update">
                                            <input type="hidden" name="id" value="{{$model->id}}">
                                    @else
                                    <form class="form form-vertical" id="model" method="post" action="/model/save">
                                    @endif
                                        @csrf
                                        <div class="form-body">
                                            
                                                <div class="row col-8">
                                              
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="first-name-vertical">Model Name</label>
                                                            <input type="text" id="name" value="{{old('name',$model->model_name)}}"
                                                                class="form-control" name="name"
                                                                placeholder="Material Name">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="email-id-vertical">Wastage Percentage</label>
                                                            <input type="text" id="wastage_per" value="{{old('wastage_per',$model->wastage_per)}}"
                                                                class="form-control" name="wastage_per"
                                                                placeholder="Wastage Percentage">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="contact-info-vertical">Wgt/PCS</label>
                                                            <input type="text" id="wgt_per_pcs" value="{{old('wgt_per_pcs',$model->wgt_per_pcs)}}"
                                                                class="form-control" name="wgt_per_pcs"
                                                                placeholder="Wgt/PCS">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="password-vertical">Length/PCS</label>
                                                            <input type="text" id="length_per_pcs" value="{{old('length_per_pcs',$model->length_per_pcs)}}"
                                                                class="form-control" name="length_per_pcs"
                                                                placeholder="Length/PCS">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class='form-check'>
                                                            <div class="checkbox mt-2">
                                                            @if($mode=='Edit')
                                                            <input type="checkbox" name="status" class="form-check-input" {{ ($model->isactive=='1') ? 'checked' : ''}} > IsActive
                                                            @else
                                                            <input type="checkbox" name="status" class="form-check-input"  checked="checked" > IsActive
                                                            @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 d-flex justify-content-end">
                                                        <button type="submit"
                                                            class="btn btn-primary me-1 mb-1">Submit</button>

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
$("#model").validate({
    rules: {
        name: {
            required: true,
        },
        wastage_per: {
             required: true,
             number:true
         },
         wgt_per_pcs: {
             required: true,
             number:true
         },
         length_per_pcs: {
             required: true,
             number:true,
         }
    },
    messages: {
        name: {
            required: 'This field is Required ',
        },
        wastage_per: {
             required: 'This field is Required ',
             number:'Only Number Allowed'
        },
        wgt_per_pcs: {
             required: 'This field is Required ',
             umber:'Only Number Allowed'
         },
       
         length_per_pcs:{
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